<?php
// Include the header
require_once "views/layouts/header.php"; 

// Check if this is an authentication-related page (login or register)
$isAuthPage = isset($isAuthPage) ? $isAuthPage : false; // Default to false if not set

// Include the navbar only if it's not an authentication page
if (!$isAuthPage) {
    require_once "views/layouts/navbar.php";
}

// Output the content of the page
echo $content;

// Include the footer
require_once "views/layouts/footer.php";
?>
