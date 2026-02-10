<?php

// Database connection details
$host = 'localhost';
$username = 'Admin1';
$password = '123698745';
$database = 'fastfood';

/**
 * Create a new mysqli connection
 */
$conn = new mysqli($host, $username, $password, $database);

/**
 * Check for connection errors
 */
if ($conn->connect_error) {
    die('Database connection failed: ' . $conn->connect_error);
}

/**
 * Set the character set (important for security and emojis)
 */
$conn->set_charset('utf8mb4');

/**
 * Return the connection so it can be used elsewhere
 */
return $conn;
