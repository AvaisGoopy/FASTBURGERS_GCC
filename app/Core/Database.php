<?php

$host = 'localhost';   // IMPORTANT: forces TCP, avoids socket error on macOS/MAMP
$username = 'Admin1';
$password = '123698745';
$database = 'fastfood';


$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die('Database connection failed: ' . $conn->connect_error);
}

$conn->set_charset('utf8mb4');

return $conn;