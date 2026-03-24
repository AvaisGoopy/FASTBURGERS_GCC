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

        // Total customers
        $sqlCustomers = "SELECT COUNT(*) AS total_customers FROM customers";
        $resultCustomers = $conn->query($sqlCustomers);

        if ($resultCustomers && $row = $resultCustomers->fetch_assoc()) {
            $totalCustomers = (int) $row['total_customers'];
        }

        // Total orders
        $sqlOrders = "SELECT COUNT(*) AS total_orders FROM orders";
        $resultOrders = $conn->query($sqlOrders);

        if ($resultOrders && $row = $resultOrders->fetch_assoc()) {
            $totalOrders = (int) $row['total_orders'];
        }

        // Total revenue from paid orders
        $sqlRevenue = "SELECT IFNULL(SUM(total_gbp), 0) AS total_revenue 
                       FROM orders 
                       WHERE status = 'paid'";
        $resultRevenue = $conn->query($sqlRevenue);

        if ($resultRevenue && $row = $resultRevenue->fetch_assoc()) {
            $totalRevenue = (float) $row['total_revenue'];
        }

        // Staff member with the most orders
        $sqlTopStaff = "
            SELECT
                s.first_name,
                s.last_name,
                COUNT(o.order_id) AS order_count
            FROM orders o
            INNER JOIN staff s ON o.taken_by_staff_id = s.staff_id
            GROUP BY s.staff_id, s.first_name, s.last_name
            ORDER BY order_count DESC, s.last_name ASC, s.first_name ASC
            LIMIT 1
        ";
        $resultTopStaff = $conn->query($sqlTopStaff);

        if ($resultTopStaff && $row = $resultTopStaff->fetch_assoc()) {
            $topStaffName = trim($row['first_name'] . ' ' . $row['last_name']);
            $topStaffOrders = (int) $row['order_count'];
        }

        // Recent orders with customer and staff names
        $sqlRecentOrders = "
            SELECT
                o.order_id,
                o.ordered_at,
                o.payment_method,
                o.total_gbp,
                o.status,
                c.first_name AS customer_first_name,
                c.last_name AS customer_last_name,
                s.first_name AS staff_first_name,
                s.last_name AS staff_last_name
            FROM orders o
            INNER JOIN customers c ON o.customer_id = c.customer_id
            INNER JOIN staff s ON o.taken_by_staff_id = s.staff_id
            ORDER BY o.ordered_at DESC
            LIMIT 5
        ";
        $resultRecentOrders = $conn->query($sqlRecentOrders);

        if ($resultRecentOrders) {
            while ($row = $resultRecentOrders->fetch_assoc()) {
                $recentOrders[] = $row;
            }
        }

        $view = BASE_PATH . '/app/Views/admin/dashboard.php';
        require BASE_PATH . '/app/Views/layout.php';
    }
}