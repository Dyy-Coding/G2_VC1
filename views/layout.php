<?php
// Define the authentication-related pages
$authPages = ['login.php', 'register.php', 'forgot_password.php', 'reset_password.php'];

// Get the current page (sanitized)
$currentPage = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

// Extract the base file name from the current page URL to match with the authPages array
$currentFile = basename($currentPage);

// Check if the current page is in the authentication-related pages
$isAuthPage = in_array($currentFile, $authPages);

// Include the header
require_once 'views/layouts/header.php';

// Include the navbar only if it's NOT an auth-related page (including forgot-password and reset-password)
if (!$isAuthPage) {
    require_once 'views/layouts/navbar.php';
}

// Output the page content
echo $content;

// Include the footer only if it's NOT an auth-related page (including forgot-password and reset-password)
if (!$isAuthPage) {
    require_once 'views/layouts/footer.php';
}
?>
