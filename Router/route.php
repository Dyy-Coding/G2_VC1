<?php

// Include required files
require_once "Router.php";
require_once "Controllers/BaseController.php";
require_once __DIR__ . '/../Database/Database.php';
require_once "Controllers/adminController/authenicationController/loginController.php";
require_once "Controllers/adminController/authenicationController/registerController.php";
require_once "Controllers/adminController/authenicationController/forgotPasswordController.php";
require_once "Controllers/adminController/InventoryController.php";
require_once "Controllers/AdminController/DashboardController.php";
require_once "Controllers/adminController/accountController/BaseInfoController.php";
require_once "Controllers/adminController/accountController/adminUserFormController.php";
require_once 'Controllers/validateionHelper.php';
require_once "Models/usersModel.php";

// Initialize Router
$route = new Router();
// Group routes by controller for better organization
$route->post('/login', [LoginController::class, 'login']);
// Dashboard Routes
$route->get('/', [DashboardController::class, 'index']);
$route->get('/user', [DashboardController::class, 'userDashboard']);





// Forgot Password Route (GET request to show form)
$route->post('/forgotpasswordform', [AuthController::class, 'showForgotPasswordForm']);

$route->get('/forgot', [AuthController::class, 'forgot']);

// Forgot Password Route (POST request to handle the reset email request)
$route->post('/forgot-password', [AuthController::class, 'resetPasswordRequest']);



// Authentication Routes (Login and Register)
$route->get('/login', [LoginController::class, 'login']);

$route->get('/logout', [LoginController::class, 'logout']);
// Authentication Routes (Login and Register)
$route->get('/register', [RegisterController::class, 'register']); // Display Registration Form (GET)
$route->post('/register', [RegisterController::class, 'register']); // Handle Registration Form (POST)


// Inventory Routes
$route->get('/inventory', [InventoryController::class, 'inventory']);
$route->get('/sales', [InventoryController::class, 'sales']);

// Profile Routes
$route->get('/profile', [BashInfoController::class, 'baseinfoprofile']);
// $route->get('/userList', [BashInfoController::class, 'viewUsers']);
$route->get('/addusersForm', [AccountController::class, 'viewAddusersForm']);

// Print the registered routes for debugging purposes
// $route->printRoutes();

// Route Handling: match the requested URI with the defined routes
$route->route();
