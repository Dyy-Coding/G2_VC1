<?php


// Include core files
require_once "Router.php";
require_once __DIR__ . '/../Database/Database.php';

// Include base controller
require_once "Controllers/BaseController.php";

// Authentication Controllers
require_once "Controllers/adminController/authenicationController/loginController.php";
require_once "Controllers/adminController/authenicationController/forgotPasswordController.php";
require_once "Controllers/adminController/authenicationController/registerController.php";

// Inventory Controllers
require_once "Controllers/adminController/InventoryController/materialsController.php";
require_once "Controllers/adminController/InventoryController/categoriesController.php";

// Dashboard Controllers
require_once "Controllers/adminController/DashboardController.php";
require_once "Controllers/adminController/dashboardController/stockListController.php";

// Account Controllers
require_once "Controllers/adminController/accountController/adminProfileController.php";
require_once "Controllers/adminController/accountController/listUserController.php";

// Other Controllers
require_once "Controllers/adminController/BashInfoController.php";
require_once "Controllers/errorController.php";

// Models
require_once "Models/usersModel.php";
require_once "Models/invenoryModel/meterailModel.php";
require_once "Models/invenoryModel/categoryModel.php";
require_once "Models/dashboard/dashboardModel.php";

// Helper files
require_once 'Controllers/validateionHelper.php';

// Customer Controller
require_once "Controllers/userController/welcomeController/welcomeController.php";

// Initialize Router
$route = new Router();

/**
 * Authentication Routes
 */
$route->group('auth', function ($route) {
    $route->get('/login', [LoginController::class, 'login']);
    $route->post('/login', [LoginController::class, 'login']);
    $route->get('/logout', [LoginController::class, 'logout']);

    // Forgot Password
    $route->get('/forgot', [AuthController::class, 'forgot']);
    $route->post('/forgot-password', [AuthController::class, 'handleForgotPassword']);

    // Password Reset
    $route->get('/reset-password', [AuthController::class, 'handleResetPassword']);
    $route->post('/reset-password', [AuthController::class, 'handleForgotPassword']);

    // Registration
    $route->get('/register', [RegisterController::class, 'register']);
    $route->post('/register', [RegisterController::class, 'register']);

    // Password Reset Status
    $route->get('/password-reset-success', [AuthController::class, 'passwordResetSuccess']);
    $route->get('/password-reset-error', [AuthController::class, 'passwordResetError']);
});

/**
 * Dashboard Routes
 */
$route->group('dashboard', function ($route) {
    $route->get('/', [DashboardController::class, 'index']);
    $route->get('/user', [DashboardController::class, 'userDashboard']);
});

/**
 * Welcome Routes
 */
$route->group('welcome', function ($route) {
    $route->get('/welcome', [WelcomeController::class, 'welcome']);
});

/**
 * Inventory Routes
 */
$route->group('inventory', function ($route) {
    $route->get('/materail', [MaterialsController::class, 'inventory']);

    // Material Management
    $route->get('/materials/add', [MaterialsController::class, 'addMaterial']);
    $route->post('/materials/add', [MaterialsController::class, 'addMaterial']);
    $route->get('/materials/edit/{id}', [MaterialsController::class, 'materialEditForSome']);
    $route->post('/materials/update', [MaterialsController::class, 'updateMaterial']);
    $route->get('/materials/delete/{id}', [MaterialsController::class, 'deleteMaterial']);
    $route->get('/materials/view/{id}', [MaterialsController::class, 'viewMaterial']);

    // Inventory Import/Export
    $route->get('/import', [MaterialsController::class, 'importInventory']);
    $route->post('/import', [MaterialsController::class, 'importInventory']);
    $route->get('/export', [MaterialsController::class, 'exportInventory']);

    // Category Management
    $route->get('/category', [CategoriesController ::class, 'category']);
    $route->post('/category/add', [CategoriesController ::class, 'addCategory']);
    $route->get('/category/delete/{id}', [CategoriesController ::class, 'deleteCategory']);
    $route->post('/category/deleteSelected', [CategoriesController ::class, 'deleteSelectedCategories']);
    $route->get('/category/edit/{id}', [CategoriesController ::class, 'editCategory']);
    $route->post('/category/update/{id}', [CategoriesController ::class, 'updateCategory']);

    // Orders
    $route->get('/order', [CategoriesController ::class, 'order']);
});


/**
 * Profile Routes
 */
$route->group('profile', function ($route) {
    // Admin Profile
    $route->get('/account', [ProfileAccountController::class, 'profileadmin']);

    // User List & Details
    $route->get('/userList', [AccountListController::class, 'viewUsersAccListProfile']);
    $route->get('/userDetail', [AccountListController::class, 'viewUserDetail']);

    // User Management
    $route->get('/createuser', [AccountListController::class, 'createNewUserAccProfile']);
    $route->post('/userstore', [AccountListController::class, 'storeUserAccProfile']);
    $route->get('/edituser', [AccountListController::class, 'editUserAccProfile']);
    $route->post('/storeupdate', [AccountListController::class, 'updateUserAccProfile']);
    $route->post('/deleteuser', [AccountListController::class, 'destroyUserAccProfile']);
    $route->get('/deleteuser/{id}', [AccountListController::class, 'destroySingleUserAccProfile']);
});

/**
 * Error Handling Route
 */
$route->get('/error', [ErrorController::class, 'error']);

/**
 * Route Handling: Match the requested URI with the defined routes
 */
$route->route();
