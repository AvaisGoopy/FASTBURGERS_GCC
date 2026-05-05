<?php

class AdminOrdersController
{
    public function index(): void
    {
        $title = 'Fast Burgers - Manage Orders';

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (empty($_SESSION['auth']['logged_in']) || empty($_SESSION['auth']['is_admin'])) {
            header('Location: /admin-login');
            exit;
        }

        /** @var mysqli $conn */
        $conn = require BASE_PATH . '/config/database.php';

        if (!$conn || !($conn instanceof mysqli)) {
            die('Database connection not available.');
        }

        $orders = [];
        $customers = [];
        $outlets = [];
        $selectedOrder = null;
        $message = '';
        $error = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $action = $_POST['action'] ?? '';
            $orderId = isset($_POST['order_id']) ? (int) $_POST['order_id'] : 0;

            if ($action === 'delete') {
                if ($orderId <= 0) {
                    $error = 'Invalid order selected for deletion.';
                } else {
                    $stmt = $conn->prepare('DELETE FROM order_item WHERE order_id = ?');
                    if ($stmt) {
                        $stmt->bind_param('i', $orderId);
                        $stmt->execute();
                        $stmt->close();
                    }

                    $stmt = $conn->prepare('DELETE FROM `order` WHERE order_id = ?');
                    if ($stmt) {
                        $stmt->bind_param('i', $orderId);
                        $stmt->execute();
                        $stmt->close();
                        header('Location: /admin/orders?deleted=1');
                        exit;
                    } else {
                        $error = 'Unable to delete the order.';
                    }
                }
            }

            if ($action === 'update') {
                $customerId = isset($_POST['customer_id']) ? (int) $_POST['customer_id'] : 0;
                $paymentType = trim($_POST['payment_type'] ?? '');
                $outletId = isset($_POST['outlet_id']) ? (int) $_POST['outlet_id'] : 0;

                if ($orderId <= 0 || $customerId <= 0 || $outletId <= 0 || $paymentType === '') {
                    $error = 'Please select an order, customer, outlet and payment type.';
                } else {
                    $stmt = $conn->prepare(
                        'UPDATE `order` SET customer_id = ?, payment_type = ?, outlet_id = ? WHERE order_id = ?'
                    );
                    if ($stmt) {
                        $stmt->bind_param('isii', $customerId, $paymentType, $outletId, $orderId);
                        $stmt->execute();
                        $stmt->close();
                        header('Location: /admin/orders?edit=' . $orderId . '&updated=1');
                        exit;
                    } else {
                        $error = 'Unable to update the order.';
                    }
                }
            }
        }

        if (isset($_GET['updated']) && $_GET['updated'] == '1') {
            $message = 'Order updated successfully.';
        }

        if (isset($_GET['deleted']) && $_GET['deleted'] == '1') {
            $message = 'Order deleted successfully.';
        }

        $sqlOrders = "
            SELECT
                o.order_id,
                o.order_timestamp,
                o.payment_type,
                o.outlet_id,
                COALESCE(ot.outlet_location, 'N/A') AS outlet_location,
                o.customer_id,
                COALESCE(c.customer_name, 'Guest') AS customer_name,
                COALESCE(c.customer_email, 'N/A') AS customer_email,
                COALESCE(s.staff_name, 'Unassigned') AS staff_name,
                s.staff_role
            FROM `order` o
            LEFT JOIN customer c ON o.customer_id = c.customer_id
            LEFT JOIN outlet ot ON o.outlet_id = ot.outlet_id
            LEFT JOIN staff s ON o.staff_id = s.staff_id
            ORDER BY o.order_timestamp DESC, o.order_id DESC
        ";

        $resultOrders = $conn->query($sqlOrders);
        if ($resultOrders) {
            while ($row = $resultOrders->fetch_assoc()) {
                $orders[] = $row;
            }
        }

        $sqlCustomers = 'SELECT customer_id, customer_name, customer_email FROM customer ORDER BY customer_name ASC';
        $resultCustomers = $conn->query($sqlCustomers);
        if ($resultCustomers) {
            while ($row = $resultCustomers->fetch_assoc()) {
                $customers[] = $row;
            }
        }

        $sqlOutlets = 'SELECT outlet_id, outlet_location FROM outlet ORDER BY outlet_location ASC';
        $resultOutlets = $conn->query($sqlOutlets);
        if ($resultOutlets) {
            while ($row = $resultOutlets->fetch_assoc()) {
                $outlets[] = $row;
            }
        }

        if (isset($_GET['edit'])) {
            $editOrderId = (int) $_GET['edit'];
            if ($editOrderId > 0) {
                $stmt = $conn->prepare(
                    "SELECT o.order_id, o.order_timestamp, o.payment_type, o.customer_id, o.outlet_id,
                        COALESCE(c.customer_name, 'Guest') AS customer_name,
                        COALESCE(c.customer_email, 'N/A') AS customer_email,
                        COALESCE(ot.outlet_location, 'N/A') AS outlet_location
                     FROM `order` o
                     LEFT JOIN customer c ON o.customer_id = c.customer_id
                     LEFT JOIN outlet ot ON o.outlet_id = ot.outlet_id
                     WHERE o.order_id = ? LIMIT 1"
                );

                if ($stmt) {
                    $stmt->bind_param('i', $editOrderId);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $selectedOrder = $result ? $result->fetch_assoc() : null;
                    $stmt->close();
                }
            }
        }

        $view = BASE_PATH . '/app/Views/admin/orders.php';
        require BASE_PATH . '/app/Views/layout.php';
    }
}
