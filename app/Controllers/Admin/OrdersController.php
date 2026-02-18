<?php

class OrdersController
    {
        public function index(): void
        {
            // Page title used by the layout
            $title = 'Fast Burgers - Orders';

            // Tell the layout which view to display
            $view = BASE_PATH . '/app/Views/Admin/orders.php';

            // Load the layout (which will load the view)
            require BASE_PATH . '/app/Views/layout.php';
        }
    }