<?php 
// This is the single entry point for the entire website.
// Every request (/, /contact, /admin/users, etc.) is routed through this file.

// Define the filesystem path to the project root
define('BASE_PATH', dirname(__DIR__));

// Load the Router class
require BASE_PATH . '/app/Core/Router.php';

// Create the router
$router = new Router();

// Tell the router to handle the request
$router->dispatch();