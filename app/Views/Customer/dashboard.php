<?php
if (session_status() === PHP_SESSION_NONE) session_start();

if (empty($_SESSION['auth']['logged_in']) || empty($_SESSION['auth']['token'])) {
    header("Location: /login");
    exit;
}
?>
<h1>Customer Dashboard</h1>
<p>Welcome, <?= htmlspecialchars($_SESSION['customer']['name'] ?? 'Guest') ?>!</p>