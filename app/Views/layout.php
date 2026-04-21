<?php
// This file defines the main page structure.
// It includes the header, navigation, the selected view, and the footer.

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$baseUrl = rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'])), '/');

require BASE_PATH . '/app/Views/partials/header.php';
require BASE_PATH . '/app/Views/partials/nav.php';
?>

<main>
    <?php
    // Load the view chosen by the controller
    require $view;
    ?>
</main>

<?php
require BASE_PATH . '/app/Views/partials/footer.php';
