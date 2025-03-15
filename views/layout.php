<?php
// Function to render views without navbar (for login/register pages)
function authenticationView($content) {
    require_once "views/layouts/header.php"; 
    $content;  // Output content
    require_once "views/layouts/footer.php"; 
}

// Function to render views with navbar (for all pages except login/register)
function simpleView($content) {
    require_once "views/layouts/header.php"; 
    require_once "views/layouts/navbar.php";  // Include navbar for non-login/register pages
    $content;  // Output content
    require_once "views/layouts/footer.php"; 
}

// Conditional check for login or register
if ($content !== "views/authentication/login.php" && $content !== "views/authentication/register.php") {
    // Call simpleView if content is not login or register
    simpleView($content);

} else {
    // Call authenticationView for login/register pages
    authenticationView($content);
}
?>
