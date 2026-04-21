<?php

class RegisterController
{
    public function index(): void
    {
        $title = 'Fast Burgers - Register';
        $errors = [];

        require BASE_PATH . '/config/database.php';

        if (!isset($conn) || !($conn instanceof mysqli)) {
            die("Database connection not available.");
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $first_name = trim($_POST['first_name'] ?? '');
            $last_name  = trim($_POST['last_name'] ?? '');
            $email      = trim($_POST['email'] ?? '');
            $username   = trim($_POST['username'] ?? '');
            $password   = $_POST['password'] ?? '';

            // ---- Validation ----
            if ($first_name === '') $errors[] = "First name is required.";
            if ($last_name === '')  $errors[] = "Last name is required.";
            if ($username === '')   $errors[] = "Username is required.";

            if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "A valid email is required.";
            }

            if ($password === '' || strlen($password) < 8) {
                $errors[] = "Password must be at least 8 characters.";
            }

            // ---- Check duplicate email ----
            if (empty($errors)) {
                $sql = "SELECT customer_id FROM customer WHERE customer_email = ? LIMIT 1";
                $stmt = $conn->prepare($sql);

                if (!$stmt) {
                    die("Prepare failed (email check): " . $conn->error);
                }

                $stmt->bind_param("s", $email);
                $stmt->execute();
                $stmt->store_result();

                if ($stmt->num_rows > 0) {
                    $errors[] = "Email already exists.";
                }

                $stmt->close();
            }

            // ---- Check duplicate username ----
            if (empty($errors)) {
                $sql = "SELECT customer_id FROM customer WHERE username = ? LIMIT 1";
                $stmt = $conn->prepare($sql);

                if (!$stmt) {
                    die("Prepare failed (username check): " . $conn->error);
                }

                $stmt->bind_param("s", $username);
                $stmt->execute();
                $stmt->store_result();

                if ($stmt->num_rows > 0) {
                    $errors[] = "Username already exists.";
                }

                $stmt->close();
            }

            // ---- Insert customer ----
            if (empty($errors)) {
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $full_name = $first_name . ' ' . $last_name;

                $sql = "INSERT INTO customer (customer_name, customer_email, username, passwordHash)
                        VALUES (?, ?, ?, ?)";

                $stmt = $conn->prepare($sql);

                if (!$stmt) {
                    die("Prepare failed (insert): " . $conn->error);
                }

                $stmt->bind_param("ssss", $full_name, $email, $username, $hashed_password);

                if (!$stmt->execute()) {
                    //  SHOW REAL ERROR (this is what you were missing)
                    die("Execute failed: " . $stmt->error);
                }

                $stmt->close();

                header("Location: /login");
                exit;
            }
        }

        $view = BASE_PATH . '/app/Views/register.php';
        require BASE_PATH . '/app/Views/layout.php';
    }
}