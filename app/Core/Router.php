<?php
// The Router decides which controller should handle the request
// based on the URL path.

class Router
{
    public function dispatch(): void
{
    $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? '/';

    // Base path = where index.php lives (e.g. /fastburgers_ks/public)
    $basePath = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');

    // Remove base path from the start of the URL
    if ($basePath !== '' && str_starts_with($path, $basePath)) {
        $path = substr($path, strlen($basePath));
    }

    // Normalise empty to /
    // if path is empty string, set to '/'
    $path = $path === '' ? '/' : $path;

    switch ($path) {
        case '/':
            require BASE_PATH . '/app/Controllers/HomeController.php';
            (new HomeController())->index();
            break;

        case '/contact':
            require BASE_PATH . '/app/Controllers/ContactController.php';
            (new ContactController())->index();
            break;

        case '/about':
            require BASE_PATH . '/app/Controllers/AboutController.php';
            (new AboutController())->index();
            break;
        case '/register':
            require BASE_PATH . '/app/Controllers/RegisterController.php';
            (new RegisterController())->index();
            break;
        case '/login':
            require BASE_PATH . '/app/Controllers/LoginController.php';
            (new LoginController())->index();
            break;
        case '/logout':
             require BASE_PATH . '/app/Controllers/LogoutController.php';
            (new LogoutController())->index();
            break;
            // customer dashboard
        case '/customer-dashboard':
            require BASE_PATH . '/app/Controllers/Customer/DashboardController.php';
            (new DashboardController())->index();
            break;
            // admin
        case '/admin-dashboard':
            require BASE_PATH . '/app/Controllers/Admin/AdminDashboardController.php';
            (new AdminDashboardController())->index();
            break;
         case '/admin-login':
            require BASE_PATH . '/app/Controllers/Admin/AdminLoginController.php';
            (new AdminLoginController())->index();
            break;
         default:
            http_response_code(404);
            echo '<h1>404 - Page Not Found</h1>';
    }
}

}