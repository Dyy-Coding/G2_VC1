<?php

// Include required files
require_once "Router.php";

// Controller link files
require_once "Controllers/BaseController.php";
require_once "Controllers/adminController/authenicationController/loginController.php";
require_once "Controllers/adminController/authenicationController/forgotPasswordController.php";
require_once "Controllers/adminController/authenicationController/registerController.php";
require_once "Controllers/adminController/InventoryController.php";
// require_once "Controllers/adminController/sales/salesController.php";
require_once "Controllers/AdminController/DashboardController.php";
require_once "Controllers/adminController/BashInfoController.php";
require_once 'Controllers/errorController.php';

// Database link files
require_once __DIR__ . '/../Database/Database.php';
require_once "Controllers/adminController/accountController/adminUserFormController.php";
require_once "Controllers/adminController/accountController/adminUserListController.php";
require_once 'Controllers/validateionHelper.php';
require_once "Models/usersModel.php";
require_once "Models/invenoryModel/meterailModel.php";



// Customer Controller 

require_once "Controllers/userController/welcomeController/welcomeController.php";

// Initialize Router
$route = new Router();

// Group routes by controller for better organization
$route->group('auth', function($route) {
    // Login Routes
    $route->get('/login', [LoginController::class, 'login']);  // Display Login Form (GET)
    $route->post('/login', [LoginController::class, 'login']); // Handle Login (POST)
    $route->get('/logout', [LoginController::class, 'logout']); // Handle Logout

    // Forgot Password Routes
    $route->get('/forgot', [AuthController::class, 'forgot']);  // Display Forgot Password Form (GET)
    $route->post('/forgot-password', [AuthController::class, 'handleForgotPassword']); // Handle Forgot Password Request (POST)

    // Password Reset Routes
    $route->get('/reset-password', [AuthController::class, 'handleResetPassword']); // Show Reset Form (GET)
    $route->post('/reset-password', [AuthController::class, 'handleForgotPassword']); // Handle Reset Password Form (POST)

    // Registration Routes
    $route->get('/register', [RegisterController::class, 'register']);  // Display Registration Form (GET)
    $route->post('/register', [RegisterController::class, 'register']); // Handle Registration Form (POST)

    // Password Reset Confirmation Route (Redirect after successful reset)
    $route->get('/password-reset-success', [AuthController::class, 'passwordResetSuccess']);  // Display success page after reset

    // Error Route (For invalid or expired token error)
    $route->get('/password-reset-error', [AuthController::class, 'passwordResetError']);  // Show error page when token is invalid/expired
});



$route->group('dashboard', function($route) {
    $route->get('/', [DashboardController::class, 'index']);
    $route->get('/user', [DashboardController::class, 'userDashboard']);
});
$route->group('welcome', function($route) {
    $route->get('/welcome', [WelcomeController::class, 'welcome']);

});

$route->group('inventory', function ($route) {
    $route->get('/inventory', [InventoryController::class, 'inventory']);
    $route->get('/materials/add', [InventoryController::class, 'addMaterial']);
    $route->post('/materials/add', [InventoryController::class, 'addMaterial']);
    $route->get('/editmaterial/{id}', [InventoryController::class, 'materialEditForSome']);
    $route->post('/materials/update', [InventoryController::class, 'updateMaterial']);
    $route->get('/materials/delete/{id}', [InventoryController::class, 'deleteMaterial']);
    $route->get('/category', [InventoryController::class, 'category']);
    $route->get('/order', [InventoryController::class, 'order']);

});

$route->group('profile', function ($route) {
    // $route->get('/addusersform', [AccountController::class, 'viewAddusersForm']);
    $route->get('/userList', [AccountListController::class, 'viewUsersAccListProfile']);
    $route->get('/userdetail', [AccountListController::class, 'viewUserDetail']);

    // add user 
    $route->get('/createuser', [AccountListController::class, 'createNewUserAccProfile']);
    $route->post('/userstore', [AccountListController::class, 'storeUserAccProfile']);

    // update user
    $route->get('/edituser', [AccountListController::class, 'editUserAccProfile']);
    $route->post('/storeupdate', [AccountListController::class, 'updateUserAccProfile']);

    // delete user
    $route->post('/deleteuser', [AccountListController::class, 'destroyUserAccProfile']);
});

$route->get('/error', [ErrorController::class, 'error']);

// $route->printRoutes();


// Route Handling: match the requested URI with the defined routes
$route->route();
// $route->printRoutes();