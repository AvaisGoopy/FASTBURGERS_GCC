<?php

class AdminDashboardController
{
    public function index(): void
    {
        $title = 'Fast Burgers - Admin Dashboard';

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Optional protection
        if (empty($_SESSION['auth']['logged_in'])) {
            header('Location: /login');
            exit;
        }

        /** @var mysqli $conn */
        $conn = require BASE_PATH . '/config/database.php';

        if (!$conn || !($conn instanceof mysqli)) {
            die('Database connection not available.');
        }

        // Default values
        $totalCustomers = 0;
        $totalOrders = 0;
        $totalRevenue = 0;
        $topStaffName = 'N/A';
        $topStaffOrders = 0;
        $recentOrders = [];
        $stockItems = [];
        $staffShifts = [];
        $restockAction = 'add';

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['restock_product_id'], $_POST['restock_quantity'], $_POST['restock_action'])) {
            $restockProductId = (int)($_POST['restock_product_id'] ?? 0);
            $restockQuantity = (int)($_POST['restock_quantity'] ?? 0);
            $restockAction = $_POST['restock_action'] === 'remove' ? 'remove' : 'add';

            if ($restockProductId <= 0 || $restockQuantity <= 0) {
                $restockError = 'Please choose a valid product and quantity to update.';
            } else {
                $stockSign = $restockAction === 'remove' ? -1 : 1;
                $adjustedQuantity = $restockQuantity * $stockSign;

                $currentQuantityStmt = $conn->prepare('SELECT stock_quantity FROM stock WHERE product_id = ? LIMIT 1');
                $currentQuantity = 0;

                if ($currentQuantityStmt) {
                    $currentQuantityStmt->bind_param('i', $restockProductId);
                    $currentQuantityStmt->execute();
                    $currentQuantityStmt->bind_result($currentQuantity);
                    $currentQuantityStmt->fetch();
                    $currentQuantityStmt->close();
                }

                if ($restockAction === 'remove' && $restockQuantity > $currentQuantity) {
                    $restockError = 'Cannot remove more stock than currently available.';
                } else {
                    $updateStockStmt = $conn->prepare(
                        'UPDATE stock SET stock_quantity = stock_quantity + ?, last_restock_date = CURDATE() WHERE product_id = ?'
                    );

                    if ($updateStockStmt) {
                        $updateStockStmt->bind_param('ii', $adjustedQuantity, $restockProductId);
                        $updateStockStmt->execute();
                        $updateStockStmt->close();

                        $restockLogStmt = $conn->prepare(
                            'INSERT INTO restock (restock_id, product_id, restock_quantity, restock_date) VALUES (?, ?, ?, CURDATE())'
                        );

                        if ($restockLogStmt) {
                            $restockLogQuantity = $stockSign * $restockQuantity;

                            $nextId = 1;
                            $nextIdResult = $conn->query('SELECT COALESCE(MAX(restock_id), 0) + 1 AS next_id FROM restock');
                            if ($nextIdResult && $nextRow = $nextIdResult->fetch_assoc()) {
                                $nextId = (int)$nextRow['next_id'];
                            }

                            $restockLogStmt->bind_param('iii', $nextId, $restockProductId, $restockLogQuantity);
                            $restockLogStmt->execute();
                            $restockLogStmt->close();
                        }

                        $restockMessage = $restockAction === 'remove'
                            ? 'Stock removed successfully.'
                            : 'Stock added successfully.';
                    } else {
                        $restockError = 'Unable to update stock at this time.';
                    }
                }
            }
        }

        // Total customers
        $sqlCustomers = "SELECT COUNT(*) AS total_customers FROM customer";
        $resultCustomers = $conn->query($sqlCustomers);

        if ($resultCustomers && $row = $resultCustomers->fetch_assoc()) {
            $totalCustomers = (int) $row['total_customers'];
        }

        // Total orders
        $sqlOrders = "SELECT COUNT(*) AS total_orders FROM `order`";
        $resultOrders = $conn->query($sqlOrders);

        if ($resultOrders && $row = $resultOrders->fetch_assoc()) {
            $totalOrders = (int) $row['total_orders'];
        }

        // Total revenue from all orders
        $sqlRevenue = "
            SELECT IFNULL(SUM(p.product_price * oi.quantity), 0) AS total_revenue
            FROM `order` o
            LEFT JOIN order_item oi ON oi.order_id = o.order_id
            LEFT JOIN product p ON p.product_id = oi.product_id
        ";
        $resultRevenue = $conn->query($sqlRevenue);

        if ($resultRevenue && $row = $resultRevenue->fetch_assoc()) {
            $totalRevenue = (float) $row['total_revenue'];
        }

        // Staff member with the most orders
        $sqlTopStaff = "
            SELECT
                s.staff_name,
                COUNT(o.order_id) AS order_count
            FROM `order` o
            INNER JOIN staff s ON o.staff_id = s.staff_id
            GROUP BY s.staff_id, s.staff_name
            ORDER BY order_count DESC, s.staff_name ASC
            LIMIT 1
        ";
        $resultTopStaff = $conn->query($sqlTopStaff);

        if ($resultTopStaff && $row = $resultTopStaff->fetch_assoc()) {
            $topStaffName = trim($row['staff_name']);
            $topStaffOrders = (int) $row['order_count'];
        }

        // Recent orders with customer, staff, payment and item details
        $sqlRecentOrders = "
            SELECT
                o.order_id,
                o.order_timestamp,
                o.payment_type,
                c.customer_name,
                s.staff_name,
                s.staff_role,
                IFNULL(SUM(p.product_price * oi.quantity), 0) AS total_amount,
                GROUP_CONCAT(
                    CONCAT(
                        COALESCE(p.product_name, CONCAT('Saver Menu #', oi.savers_menu_id)),
                        ' x',
                        IFNULL(oi.quantity, 1)
                    )
                    ORDER BY oi.order_item_id
                    SEPARATOR ', '
                ) AS items
            FROM `order` o
            LEFT JOIN customer c ON o.customer_id = c.customer_id
            LEFT JOIN staff s ON o.staff_id = s.staff_id
            LEFT JOIN order_item oi ON oi.order_id = o.order_id
            LEFT JOIN product p ON p.product_id = oi.product_id
            GROUP BY o.order_id, o.order_timestamp, o.payment_type, c.customer_name, s.staff_name, s.staff_role
            ORDER BY o.order_timestamp DESC
            LIMIT 10
        ";
        $resultRecentOrders = $conn->query($sqlRecentOrders);

        if ($resultRecentOrders) {
            while ($row = $resultRecentOrders->fetch_assoc()) {
                $row['payment_type'] = $row['payment_type'] ? ucfirst(strtolower($row['payment_type'])) : 'Unknown';
                $row['staff_name'] = $row['staff_name'] ?? 'Unassigned';
                $row['customer_name'] = $row['customer_name'] ?? 'Guest';
                $row['items'] = $row['items'] ?? 'No items';
                $recentOrders[] = $row;
            }
        }

        // Stock items for restocking
        $sqlStock = "
            SELECT
                s.stock_id,
                s.product_id,
                COALESCE(p.product_name, 'Unknown') AS product_name,
                COALESCE(p.product_price, 0) AS product_price,
                s.stock_quantity,
                s.last_restock_date
            FROM stock s
            LEFT JOIN product p ON p.product_id = s.product_id
            ORDER BY p.product_name ASC
        ";
        $resultStock = $conn->query($sqlStock);

        if ($resultStock) {
            while ($row = $resultStock->fetch_assoc()) {
                $stockItems[] = $row;
            }
        }

        // Shifts for managers and sales staff
        $sqlShifts = "
            SELECT
                sh.shift_id,
                sh.shift_start,
                sh.shift_end,
                s.staff_name,
                s.staff_role
            FROM shift sh
            INNER JOIN staff s ON sh.staff_id = s.staff_id
            WHERE LOWER(s.staff_role) LIKE '%manager%' OR LOWER(s.staff_role) LIKE '%sales%'
            ORDER BY s.staff_role ASC, sh.shift_start ASC
        ";
        $resultShifts = $conn->query($sqlShifts);

        if ($resultShifts) {
            while ($row = $resultShifts->fetch_assoc()) {
                $staffShifts[] = $row;
            }
        }

        $view = BASE_PATH . '/app/Views/admin/dashboard.php';
        require BASE_PATH . '/app/Views/layout.php';
    }
}