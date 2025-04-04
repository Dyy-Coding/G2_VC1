<?php

// Include required files
require_once "Router.php";

// Controller link files
require_once "Controllers/BaseController.php";
require_once "Controllers/adminController/authenicationController/loginController.php";
require_once "Controllers/adminController/authenicationController/forgotPasswordController.php";
require_once "Controllers/adminController/authenicationController/registerController.php";
require_once "Controllers/adminController/InventoryController.php";
require_once "Controllers/adminController/InventoryController/categoriesController.php";
// require_once "Controllers/adminController/sales/salesController.php";
require_once "Controllers/AdminController/DashboardController.php";
require_once "Controllers/adminController/BashInfoController.php";
require_once 'Controllers/errorController.php';

// require_one Controllers/adminController/dashboardController/stockListController.php;
require_once 'Controllers/adminController/dashboardController/stockListController.php';


// Database link files
require_once __DIR__ . '/../Database/Database.php';
require_once "Controllers/adminController/accountController/adminProfileController.php";
require_once "Controllers/adminController/accountController/listUserController.php";
require_once 'Controllers/validateionHelper.php';
require_once "Models/usersModel.php";
require_once "Models/invenoryModel/meterailModel.php";
require_once "Models/invenoryModel/categoryModel.php";
require_once "Models/dashboard/dashboardModel.php";



// Customer Controller 

require_once "Controllers/userController/welcomeController/welcomeController.php";


// User View Controller
require_once "Controllers/userController/ShopController/salesController.php";

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
    // Crud
    $route->get('/materials/add', [InventoryController::class, 'addMaterial']);
    $route->post('/materials/add', [InventoryController::class, 'addMaterial']);
    $route->get('/editmaterial/{id}', [InventoryController::class, 'materialEditForSome']);
    $route->post('/materials/update', [InventoryController::class, 'updateMaterial']);
    $route->get('/materials/delete/{id}', [InventoryController::class, 'deleteMaterial']);
    // View detail
    $route->get('/materials/view/{id}', [InventoryController::class, 'viewMaterial']);
    // Import 
    $route->get('/inventory/import', [InventoryController::class, 'importInventory']);
    $route->post('/inventory/import', [InventoryController::class, 'importInventory']);

    // Export file
    $route->get('/inventory/export', [InventoryController::class, 'exportInventory']);


    // $route->get('/materials/view/{id}', [InventoryController::class, 'viewMaterial']);
    // $route->get('/category', [InventoryController::class, 'category']);
    // $route->post('/category/add', [InventoryController::class, 'addCategory']);
    // $route->get('/category/delete/(.*)', [InventoryController::class, 'deleteCategory']);
    // $route->post('/category/deleteSelected', [InventoryController::class, 'deleteSelectedCategories']);
    // $route->get('/category/category_edit/(.*)', [InventoryController::class, 'editCategory']);
    // $route->post('/category/update/(.*)', [InventoryController::class, 'updateCategory']);

    $route->get('/order', [InventoryController::class, 'order']);

});

     // Router Categories 
$route->group('category', function ($route) {
    $route->get('/category', [CategoriesController::class, 'category']);
    $route->post('/category/add', [CategoriesController::class, 'addCategory']);
    $route->get('/category/delete/(.*)', [CategoriesController::class, 'deleteCategory']);
    $route->post('/category/deleteSelected', [CategoriesController::class, 'deleteSelectedCategories']);
    $route->get('/category/category_edit/(.*)', [CategoriesController::class, 'editCategory']);
    $route->post('/category/update/(.*)', [CategoriesController::class, 'updateCategory']);
    $route->get('/category/detail/{id}', [CategoriesController::class, 'categoryDetail']);

});


$route->group('profile', function ($route) {
    // Profile admin
    $route->get('/profile/account', [ProfileAccountController::class, 'profileadmin']);

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
    // Add this new route for single user deletion
    $route->get('/deleteuser/{id}', [AccountListController::class, 'destroySingleUserAccProfile']);
});


// UserView
$route->group('shop', function($route) {
    $route->get('/sales', [SalesController::class, 'sales']);
});

/**
 * Defines a GET route for handling error pages
 * Maps the '/error' URI to the 'error' method of the ErrorController
 */
$route->get('/error', [ErrorController::class, 'error']);

// $route->printRoutes();


// Route Handling: match the requested URI with the defined routes
$route->route();
// $route->printRoutes();