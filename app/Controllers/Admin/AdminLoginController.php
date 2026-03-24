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
                $sql = "SELECT email, password, admin
                        FROM staff
                        WHERE email = ? AND admin = 1
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

                    if (
                        !$user ||
                        empty($user['password']) ||
                        !password_verify($password, $user['password'])
                    ) {
                        $errors[] = 'Incorrect email or password.';
                    } else {
                        // Success: prevent session fixation
                        session_regenerate_id(true);

                        // Build display name
                        $customerName = trim(($user['first_name'] ?? '') . ' ' . ($user['last_name'] ?? ''));

                        // Generate auth token for this session (server-side)
                        $authToken = bin2hex(random_bytes(32)); // 64-char token

                        // Store auth state in session
                        $_SESSION['auth'] = [
                            'logged_in' => true,
                            'token' => $authToken,
                            'token_issued_at' => time(),
                            'is_admin' => 1

                        ];

                        // Store customer details you want handy
                        $_SESSION['customer'] = [
                            'customer_id' => (int)$user['customer_id'],
                            'name' => $customerName,
                            'first_name' => $user['first_name'],
                            'last_name' => $user['last_name'],
                            'email' => $user['email'],
                        ];

                        // Redirect after login
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