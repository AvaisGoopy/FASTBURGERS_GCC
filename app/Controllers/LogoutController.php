<?php

class LogoutController
{
    public function index(): void
    {
        // Start session if not started
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Completely clear the session
        session_unset();
        $_SESSION = [];

        // Delete the session cookie BEFORE destroying the session
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params["path"],
                $params["domain"],
                $params["secure"],
                $params["httponly"]
            );
        }

        // Destroy session
        session_destroy();

        // Redirect to login page
        header("Location: /login");
        exit;
    }
}