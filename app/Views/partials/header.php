<?php
   // This partial contains the opening HTML tags and page header.
   // It is shared by all pages.
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= $title ?? 'Fast Burgers' ?></title>
<script>
  tailwind.config = {
    theme: {
      extend: {
        colors: {
          primary: '#ea580c',
          accent: '#fcd34d',
          dark: '#111827',
        }
      }
    }
  }
</script>
<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
<link rel="stylesheet" href="/assets/css/style.css">
<style>
  /* Override Tailwind defaults with our brand colors */
  :root {
    --tw-color-primary: #ea580c;
    --tw-color-accent: #fcd34d;
    --tw-color-dark: #111827;
  }
</style>
</head>
<body>