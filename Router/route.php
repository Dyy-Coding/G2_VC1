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
require_once "Controllers/adminController/InventoryController/importExportController.php";
// require_once "Controllers/adminController/InventoryController/exportByPython.php";
// require_once "Controllers/adminController/InventoryController/exportImportController.php";

// Dashboard Controllers
require_once "Controllers/adminController/DashboardController.php";
require_once "Controllers/adminController/dashboardController/stockListController.php";

// Account Controllers
require_once "Controllers/adminController/accountController/adminProfileController.php";
require_once "Controllers/adminController/accountController/listUserController.php";

// Suppliers Controller
require_once 'Controllers/adminController/supplierController/SupplierControoler.php';
require_once 'Controllers/adminController/supplierController/DetailSupplierController.php';

// Customers Controller
require_once 'Controllers/adminController/customerController.php/customerListController.php';

// Shop Controller
require_once "Controllers/adminController/shopController/ShopController.php";

// Other Controllers
require_once "Controllers/adminController/BashInfoController.php";
require_once "Controllers/errorController.php";



// Models
require_once "Models/usersModel.php";
require_once "Models/invenoryModel/meterailModel.php";
require_once "Models/invenoryModel/categoryModel.php";
require_once "Models/dashboard/dashboardModel.php";
require_once "Models/supplierModel/SupplierModel.php";
require_once "Models/invenoryModel/import&export/material.php";

// Shop model 
require_once "Models/shopModel/ShopModel.php";


// Helper files
require_once 'Controllers/validateionHelper.php';

// Customer Controller
require_once "Controllers/userController/welcomeController/welcomeController.php";


// User View Controller
require_once "Controllers/userController/ShopController/salesController.php";

// Initialize Router
$route = new Router();

// UserView
$route->group('shop', function($route) {
    $route->get('/sales', [SalesController::class, 'sales']);
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
    $route->get('/material', [MaterialsController::class, 'material']);

    // Material Management
    $route->match(['get', 'post'], '/materials/add', [MaterialsController::class, 'addMaterial']);
    $route->get('/materials/edit/{id}', [MaterialsController::class, 'materialEditForSome']);
    $route->post('/materials/update', [MaterialsController::class, 'updateMaterial']);
    $route->get('/materials/delete/{id}', [MaterialsController::class, 'deleteMaterial']);
    $route->post('/materials/deleteSelectedMaterials', [MaterialsController::class, 'DeleteSelectedMaterials']);


    $route->get('/materials/view/{id}', [MaterialsController::class, 'viewMaterial']);


    
});

/**
 * Category Routes
 */
$route->group('category', function ($route) {
    $route->get('/category', [CategoriesController::class, 'category']);
    $route->post('category/add', [CategoriesController::class, 'addCategory']);
    $route->get('/category/delete/{id}', [CategoriesController::class, 'deleteCategory']);
    $route->post('/category/deleteSelected', [CategoriesController::class, 'deleteSelectedCategories']);
    $route->get('/category/edit/{id}', [CategoriesController::class, 'editCategory']);
    $route->post('/category/update/{id}', [CategoriesController::class, 'updateCategory']);
    $route->get('/category/detail/{id}', [CategoriesController::class, 'categoryDetail']);
});

/**
 * Profile Routes
 */
$route->group('profile', function ($route) {
    // Admin Profile
    $route->get('/account', [ProfileAccountController::class, 'profileadmin']);

    // User List & Details
    // $route->get('/userList', [AccountListController::class, 'viewUsersAccListProfile']);
    // $route->get('/userDetail/{id}', [AccountListController::class, 'viewUserDetail']);

    // // User Management
    // $route->get('/createuser', [AccountListController::class, 'createNewUserAccProfile']);
    // $route->post('/userstore', [AccountListController::class, 'storeUserAccProfile']);
    // $route->get('/edituser/{id}', [AccountListController::class, 'editUserAccProfile']);
    // $route->post('/storeupdate/{id}', [AccountListController::class, 'updateUserAccProfile']);
    // $route->match(['post', 'delete'], '/deleteuser/{id}', [AccountListController::class, 'destroySingleUserAccProfile']);
});



// shop route group
$route->group('shop', function ($route) {
    $route->get('/shop', [ShopController::class, 'shop']);
    $route->get('/material/detail/{id}', [ShopController::class, 'viewMaterial']);
});
/**
 * Error Handling Route
 */
$route->get('/error', [ErrorController::class, 'error']);

/**
 * Route Handling: Match the requested URI with the defined routes
 */
$route->route();