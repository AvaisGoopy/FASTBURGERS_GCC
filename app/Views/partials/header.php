<?php
   // This partial contains the opening HTML tags and page header.
   // It is shared by all pages.
   // PHP variables are called on the page (red) these are declared on the individual controllers for each page
?>
<?php
// This partial contains the opening HTML tags and page header.
// It is shared by all pages.
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title><?= $title ?? 'Fast Burgers' ?></title>
<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
<link rel="stylesheet" href="<?= BASE_PATH?>/assets/css/style.css">
</head>
<body>