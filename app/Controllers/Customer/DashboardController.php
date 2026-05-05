<?php

class DashboardController
    {
        public function index(): void
        {
            // Page title used by the layout
            $title = 'Fast Burgers - Dashboard';

            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }

            $isAdmin = false;
            $customerName = $_SESSION['customer']['name'] ?? 'Customer';
            $customerEmail = $_SESSION['customer']['email'] ?? '';
            $recentOrders = [];

            // Fetch products for order placement
            $products = [];
            $saverMenus = [];
            $conn = require BASE_PATH . '/config/database.php';
            $result = $conn->query("SELECT product_id, product_name, product_price FROM product ORDER BY product_name");
            if ($result) {
                $products = $result->fetch_all(MYSQLI_ASSOC);
            }

            // Fetch saver menus for order placement
            $saverMenus = [];
            $result = $conn->query("SELECT savers_menu_id, menu_type, menu_section FROM saver_menu ORDER BY savers_menu_id");
            if ($result) {
                $saverMenus = $result->fetch_all(MYSQLI_ASSOC);
                foreach ($saverMenus as &$menu) {
                    if ($menu['menu_type'] === 'Lunch Deal') {
                        $menu['menu_price'] = 7.99;
                    } elseif ($menu['menu_type'] === 'Evening Deal') {
                        $menu['menu_price'] = 6.99;
                    } else {
                        $menu['menu_price'] = 0.00;
                    }
                }
                unset($menu);
            }

            // Fetch outlet locations for order placement
            $outlets = [];
            $result = $conn->query("SELECT outlet_id, outlet_location FROM outlet ORDER BY outlet_location");
            if ($result) {
                $outlets = $result->fetch_all(MYSQLI_ASSOC);
            }

            // Get customer ID from session
            $customerId = $_SESSION['customer']['customer_id'] ?? null;
            $isFirstOrder = false;
            if ($customerId) {
                $orderCountStmt = $conn->prepare("SELECT COUNT(*) AS order_count FROM `order` WHERE customer_id = ?");
                if ($orderCountStmt) {
                    $orderCountStmt->bind_param("i", $customerId);
                    $orderCountStmt->execute();
                    $resultCount = $orderCountStmt->get_result();
                    $rowCount = $resultCount ? $resultCount->fetch_assoc() : null;
                    $isFirstOrder = isset($rowCount['order_count']) && (int)$rowCount['order_count'] === 0;
                    $orderCountStmt->close();
                }

                if (empty($customerEmail)) {
                    $emailStmt = $conn->prepare("SELECT customer_email FROM customer WHERE customer_id = ? LIMIT 1");
                    if ($emailStmt) {
                        $emailStmt->bind_param("i", $customerId);
                        $emailStmt->execute();
                        $emailResult = $emailStmt->get_result();
                        $emailRow = $emailResult ? $emailResult->fetch_assoc() : null;
                        if (!empty($emailRow['customer_email'])) {
                            $customerEmail = $emailRow['customer_email'];
                        }
                        $emailStmt->close();
                    }
                }
            }

            if ($customerId) {
                // Database connection
                $conn = require BASE_PATH . '/config/database.php';

                // Fetch orders for this customer
                $sql = "SELECT o.order_id, o.order_timestamp, o.payment_type, o.outlet_id, COALESCE(ot.outlet_location, 'N/A') AS outlet_location, oi.quantity, p.product_name, p.product_price, oi.savers_menu_id, sm.menu_type AS saver_menu_type, sm.menu_section AS saver_menu_section
                        FROM `order` o
                        LEFT JOIN outlet ot ON o.outlet_id = ot.outlet_id
                        LEFT JOIN order_item oi ON o.order_id = oi.order_id
                        LEFT JOIN product p ON oi.product_id = p.product_id
                        LEFT JOIN saver_menu sm ON oi.savers_menu_id = sm.savers_menu_id
                        WHERE o.customer_id = ?
                        ORDER BY o.order_timestamp DESC, o.order_id DESC";
                $stmt = $conn->prepare($sql);
                if ($stmt) {
                    $stmt->bind_param("i", $customerId);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $ordersData = $result->fetch_all(MYSQLI_ASSOC);
                    $stmt->close();
                }

                // Group items by order_id
                $recentOrders = [];
                foreach ($ordersData as $row) {
                    $orderId = $row['order_id'];
                    if (!isset($recentOrders[$orderId])) {
                        $recentOrders[$orderId] = [
                            'order_id' => $row['order_id'],
                            'order_timestamp' => $row['order_timestamp'],
                            'payment_type' => $row['payment_type'],
                            'outlet_location' => $row['outlet_location'] ?? 'N/A',
                            'items' => []
                        ];
                    }
                    if ($row['product_name']) {
                        $recentOrders[$orderId]['items'][] = [
                            'product_name' => $row['product_name'],
                            'quantity' => $row['quantity'],
                            'product_price' => $row['product_price']
                        ];
                    } elseif (!empty($row['savers_menu_id'])) {
                        $label = 'Saver Menu';
                        $price = 0.00;
                        if (!empty($row['saver_menu_type'])) {
                            $label = $row['saver_menu_type'];
                            if (!empty($row['saver_menu_section'])) {
                                $label .= ' - ' . $row['saver_menu_section'];
                            }
                            if ($row['saver_menu_type'] === 'Lunch Deal') {
                                $price = 7.99;
                            } elseif ($row['saver_menu_type'] === 'Evening Deal') {
                                $price = 6.99;
                            }
                        } else {
                            $label .= ' #' . $row['savers_menu_id'];
                        }
                        $recentOrders[$orderId]['items'][] = [
                            'product_name' => $label,
                            'quantity' => $row['quantity'],
                            'product_price' => $price
                        ];
                    }
                }
                // Convert to indexed array
                $recentOrders = array_values($recentOrders);

                $conn->close();
            }

            // Tell the layout which view to display
            $view = BASE_PATH . '/app/Views/customer/dashboard.php';

            // Load the layout (which will load the view)
            require BASE_PATH . '/app/Views/layout.php';
        }

        public function deleteOrder(): void
        {
            if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                http_response_code(405);
                echo 'Method not allowed';
                return;
            }

            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }

            $orderId = $_POST['order_id'] ?? null;
            $customerId = $_SESSION['customer']['customer_id'] ?? null;

            if (!$orderId || !$customerId) {
                http_response_code(400);
                echo 'Invalid request';
                return;
            }

            $conn = require BASE_PATH . '/config/database.php';

            // Delete order items first
            $stmt = $conn->prepare("DELETE FROM order_item WHERE order_id = ?");
            $stmt->bind_param("i", $orderId);
            $stmt->execute();
            $stmt->close();

            // Delete order
            $stmt = $conn->prepare("DELETE FROM `order` WHERE order_id = ? AND customer_id = ?");
            $stmt->bind_param("ii", $orderId, $customerId);
            $stmt->execute();
            $stmt->close();

            $conn->close();

            // Redirect back to dashboard
            header('Location: /customer-dashboard');
            exit;
        }

        public function changeOrder(): void
        {
            // Placeholder for changing order
            // For now, just redirect back
            header('Location: /customer-dashboard');
            exit;
        }

        public function placeOrder(): void
        {
            if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                http_response_code(405);
                echo 'Method not allowed';
                return;
            }

            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }

            $customerId = $_SESSION['customer']['customer_id'] ?? null;
            $paymentType = $_POST['payment_type'] ?? null;
            $outletId = (int)($_POST['outlet_id'] ?? 0);
            $menuType = $_POST['menu_type'] ?? 'regular';
            $products = $_POST['products'] ?? [];
            $quantities = $_POST['quantities'] ?? [];
            $saverMenuId = $_POST['saver_menu_id'] ?? null;
            $saverQuantity = (int)($_POST['saver_quantity'] ?? 0);

            $validMenuTypes = ['regular', 'saver'];
            if (!$customerId || !$paymentType || $outletId <= 0 || !in_array($menuType, $validMenuTypes, true)) {
                http_response_code(400);
                echo 'Invalid request data';
                return;
            }

            if ($menuType === 'regular') {
                if (empty($products) || empty($quantities) || count($products) !== count($quantities)) {
                    http_response_code(400);
                    echo 'Invalid request data';
                    return;
                }
            } else {
                if (empty($saverMenuId) || $saverQuantity <= 0) {
                    http_response_code(400);
                    echo 'Invalid request data';
                    return;
                }
            }

            $conn = require BASE_PATH . '/config/database.php';
            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

            // Validate outlet exists
            $outletStmt = $conn->prepare("SELECT outlet_id FROM outlet WHERE outlet_id = ?");
            $outletStmt->bind_param("i", $outletId);
            $outletStmt->execute();
            $outletResult = $outletStmt->get_result();
            if (!$outletResult || $outletResult->num_rows === 0) {
                http_response_code(400);
                echo 'Invalid location selected';
                return;
            }
            $outletStmt->close();

            // Start transaction
            $conn->begin_transaction();

            try {
                // Insert order
                $stmt = $conn->prepare("INSERT INTO `order` (payment_type, customer_id, outlet_id) VALUES (?, ?, ?)");
                $stmt->bind_param("sii", $paymentType, $customerId, $outletId);
                $stmt->execute();
                $orderId = $conn->insert_id;
                $stmt->close();

                // Insert order items
                $nextOrderItemIdResult = $conn->query("SELECT MAX(order_item_id) AS max_id FROM order_item");
                $nextOrderItemIdRow = $nextOrderItemIdResult ? $nextOrderItemIdResult->fetch_assoc() : null;
                $nextOrderItemId = ($nextOrderItemIdRow && $nextOrderItemIdRow['max_id'] !== null) ? (int)$nextOrderItemIdRow['max_id'] + 1 : 1;

                if ($menuType === 'regular') {
                    $stmt = $conn->prepare("INSERT INTO order_item (order_item_id, order_id, product_id, quantity) VALUES (?, ?, ?, ?)");
                    foreach ($products as $index => $productId) {
                        $quantity = (int)$quantities[$index];
                        $productId = (int)$productId;
                        if ($productId > 0 && $quantity > 0) {
                            $stmt->bind_param("iiii", $nextOrderItemId, $orderId, $productId, $quantity);
                            $stmt->execute();
                            $nextOrderItemId++;
                        }
                    }
                } else {
                    $saverMenuId = (int)$saverMenuId;
                    $saverMenuStmt = $conn->prepare("SELECT savers_menu_id FROM saver_menu WHERE savers_menu_id = ?");
                    $saverMenuStmt->bind_param("i", $saverMenuId);
                    $saverMenuStmt->execute();
                    $saverMenuResult = $saverMenuStmt->get_result();
                    if (!$saverMenuResult || $saverMenuResult->num_rows === 0) {
                        throw new Exception('Invalid saver menu selected');
                    }
                    $saverMenuStmt->close();

                    $stmt = $conn->prepare("INSERT INTO order_item (order_item_id, order_id, savers_menu_id, quantity) VALUES (?, ?, ?, ?)");
                    $stmt->bind_param("iiii", $nextOrderItemId, $orderId, $saverMenuId, $saverQuantity);
                    $stmt->execute();
                }
                $stmt->close();

                // Commit transaction
                $conn->commit();

            } catch (Exception $e) {
                // Rollback on error
                if ($conn->in_transaction) {
                    $conn->rollback();
                }
                http_response_code(500);
                echo 'Failed to place order: ' . $e->getMessage();
                return;
            }

            $conn->close();

            // Redirect back to dashboard
            header('Location: /customer-dashboard');
            exit;
        }
    }