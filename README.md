Random bs goooo!!


C:\xampp\php\php.exe -S localhost:8000 -t public 

<?php

class RegisterController
{
    public function index(): void
    {
        // Page title used by the layout
        $title = 'Fast Burgers - Register';

        // Tell the layout which view to display
        $view = BASE_PATH . '/app/Views/register.php';

        // Load the layout (which will load the view)
        require BASE_PATH . '/app/Views/layout.php';
    }
}


do an echo "line 45" (example) to find where code stops running in RegisterController.php

