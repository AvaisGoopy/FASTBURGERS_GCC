<?php

class LoginController
{
    public function index(): void
    {
        // Page title used by the layout
        $title = 'Fast Burgers - Login';

        // Tell the layout which view to display
        $view = BASE_PATH . '/app/Views/login.php';

        // Load the layout (which will load the view)
        require BASE_PATH . '/app/Views/layout.php';
    }
}