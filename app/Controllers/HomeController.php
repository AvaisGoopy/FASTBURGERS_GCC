<?php
// This controller handles the home page (/)
class HomeController
    {
        public function index(): void
        {
            $conn = require BASE_PATH . '/config/database.php';
            

            // Page title used by the layout
            $title = 'Fast Burgers - Home';

            // Tell the layout which view to display
            $view = BASE_PATH . '/app/Views/home.php';

            // Load the layout (which will load the view)
            require BASE_PATH . '/app/Views/layout.php';
        }
    }

    