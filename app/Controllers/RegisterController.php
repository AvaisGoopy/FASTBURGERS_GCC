<?php

class RegisterController
{
    public function index(): void
    {
        $title = 'Fast Burgers - Register';
        $errors = [];

        // Load DB connection: must define $conn = new mysqli(...)
        require BASE_PATH . '/config/database.php';

        // Basic safety check
        if (!isset($conn) || !($conn instanceof mysqli)) {
            die("Database connection not available.");
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $first_name = trim($_POST['first_name'] ?? '');
            $last_name  = trim($_POST['last_name'] ?? '');
            $email      = trim($_POST['email'] ?? '');
            $password   = $_POST['password'] ?? '';
            $username   = trim($_POST['username'] ?? '');
            

            // ---- Validation ----
            if ($first_name === '') $errors[] = "First name is required.";
            if ($last_name === '')  $errors[] = "Last name is required.";

            if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "A valid email is required.";
            }

            if ($password === '' || strlen($password) < 8) {
                $errors[] = "Password must be at least 8 characters.";
            }

            // ---- Check duplicate email ----
            if (empty($errors)) {
                $sql = "SELECT customer_id FROM customer WHERE email = ? LIMIT 1";
                $stmt = $conn->prepare($sql);

                if (!$stmt) {
                    $errors[] = "Database error (prepare failed).";
                } else {
                    $stmt->bind_param("s", $email);
                    $stmt->execute();
                    $stmt->store_result();

                    if ($stmt->num_rows > 0) {
                        $errors[] = "An account with this email already exists.";
                    }

                    $stmt->close();
                }
            }

            // ---- Insert customer ----
            if (empty($errors)) {
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                // NOTE: column is assumed to be `hashed_password`
                $sql = "INSERT INTO customer (first_name, last_name, email, password, username)
                        VALUES (?, ?, ?, ?, ?)";

                $stmt = $conn->prepare($sql);

                if (!$stmt) {
                    $errors[] = "Database error (prepare failed).";
                } else {
                    // bind_param types: s = string. phone can be null; mysqli handles it if you pass null.
                    $stmt->bind_param("sssss", $first_name, $last_name, $email, $hashed_password, $username);

                    if ($stmt->execute()) {
                        $stmt->close();

                        // Redirect on success
                        header("Location: /loginController");
                        exit;
                    } else {
                        $errors[] = "Registration failed. Please try again.";
                        $stmt->close();
                    }
                }
            }
        }

        // Render view
        $view = BASE_PATH . '/app/Views/register.php';
        require BASE_PATH . '/app/Views/layout.php';
    }
}