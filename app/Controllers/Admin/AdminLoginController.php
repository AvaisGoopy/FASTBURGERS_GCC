<?php

class AdminLoginController
{
    public function index(): void
    {
        $title = 'Fast Burgers - Login';
        $errors = [];

        // Start session
        if (session_status() === PHP_SESSION_NONE) {
            // Optional: strengthen session cookie settings (works if HTTPS in prod)
            // ini_set('session.cookie_secure', '1');   // only over HTTPS
            // ini_set('session.cookie_httponly', '1'); // JS cannot read cookie
            // ini_set('session.cookie_samesite', 'Lax');
            session_start();
        }

        // If already logged in, redirect away (optional)
        if (!empty($_SESSION['auth']['logged_in'])) {
            header('Location: /');
            exit;
        }

        /** @var mysqli $conn */
        $conn = require BASE_PATH . '/config/database.php';

        if (!$conn || !($conn instanceof mysqli)) {
            die('Database connection not available.');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';

            // Validate
            if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = 'Please enter a valid email address.';
            }
            if ($password === '') {
                $errors[] = 'Please enter your password.';
            }

            if (empty($errors)) {
                // Use the customer table for authentication and allow the documented admin user.
                $sql = "SELECT customer_id, customer_name, customer_email, passwordHash AS password
                        FROM customer
                        WHERE customer_email = ?
                        LIMIT 1";

                $stmt = $conn->prepare($sql);

                if (!$stmt) {
                    $errors[] = 'Database error. Please try again.';
                } else {
                    $stmt->bind_param("s", $email);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $user = $result ? $result->fetch_assoc() : null;
                    $stmt->close();

                    $adminEmail = 'admin@fastburgers.co.uk';
                    $adminPassword = 'tastyburger';
                    $isAdminUser = strcasecmp($email, $adminEmail) === 0;

                    $isValidAdmin = false;

                    if ($user && !empty($user['password'])) {
                        $isValidAdmin = password_verify($password, $user['password']) && $isAdminUser;
                    }

                    if (!$isValidAdmin && $isAdminUser && $password === $adminPassword) {
                        $isValidAdmin = true;
                    }

                    if (!$isValidAdmin) {
                        $errors[] = 'Incorrect email or password.';
                    } else {
                        session_regenerate_id(true);

                        $customerName = $user['customer_name'] ?? 'Admin';
                        $firstName = 'Admin';
                        $lastName = '';
                        $customerId = $user['customer_id'] ?? 0;

                        $authToken = bin2hex(random_bytes(32));

                        $_SESSION['auth'] = [
                            'logged_in' => true,
                            'token' => $authToken,
                            'token_issued_at' => time(),
                            'is_admin' => 1,
                        ];

                        $_SESSION['customer'] = [
                            'customer_id' => (int)$customerId,
                            'name' => $customerName,
                            'first_name' => $firstName,
                            'last_name' => $lastName,
                            'email' => $email,
                        ];

                        header('Location: admin-dashboard');
                        exit;
                    }
                }
            }
        }

        // Render view
        $view = BASE_PATH . '/app/Views/admin/login.php';
        require BASE_PATH . '/app/Views/layout.php';
    }
}