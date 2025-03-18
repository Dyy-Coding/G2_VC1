<?php

// Include required files
require_once "Router.php";

// Controller link files
require_once "Controllers/BaseController.php";
require_once "Controllers/adminController/authenicationController/loginController.php";
require_once "Controllers/adminController/authenicationController/registerController.php";
require_once "Controllers/adminController/authenicationController/forgotPasswordController.php";
require_once "Controllers/adminController/InventoryController.php";
require_once "Controllers/AdminController/DashboardController.php";
require_once "Controllers/adminController/BashInfoController.php";
require_once 'Controllers/adminController/InventoryTest/productController.php';
require_once 'Controllers/errorController.php';

// Database link files
require_once __DIR__ . '/../Database/Database.php';
require_once "Controllers/adminController/accountController/BaseInfoController.php";
require_once "Controllers/adminController/accountController/adminUserFormController.php";
require_once 'Controllers/validateionHelper.php';
require_once "Models/usersModel.php";
require_once "Models/invenoryModel/meterailModel.php";

// Initialize Router
$route = new Router();

// Group routes by controller for better organization
$route->group('auth', function($route) {
    $route->get('/login', [LoginController::class, 'login']);  // Display Login Form (GET)
    $route->post('/login', [LoginController::class, 'login']); // Handle Login (POST)
    $route->get('/logout', [LoginController::class, 'logout']);
    $route->get('/register', [RegisterController::class, 'register']); // Display Registration Form (GET)
    $route->post('/register', [RegisterController::class, 'register']); // Handle Registration Form (POST)
    $route->get('/forgot', [AuthController::class, 'forgot']); // Forgot Password Form (GET)
    $route->post('/forgot-password', [AuthController::class, 'resetPasswordRequest']); // Handle Forgot Password (POST)
});

$route->group('dashboard', function($route) {
    $route->get('/', [DashboardController::class, 'index']);
    $route->get('/user', [DashboardController::class, 'userDashboard']);
});

$route->group('inventory', function($route) {
    $route->get('/inventory', [InventoryController::class, 'inventory']);
    $route->get('/materials/form', [MaterialController::class, 'showAddForm']);
    $route->post('/materials/add', [MaterialController::class, 'addMaterial']);
    $route->get('/category', [InventoryController::class, 'category']);
    $route->get('/order', [InventoryController::class, 'order']);

});


$route->group('profile', function($route) {
    $route->get('/profile', [BashInfoController::class, 'profile']);
});

$route->get('/error', [ErrorController::class, 'error']);


// Route Handling: match the requested URI with the defined routes
$route->route();
$route->printRoutes();
