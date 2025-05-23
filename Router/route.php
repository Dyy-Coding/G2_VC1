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
require_once "Controllers/adminController/settingController/settingController.php";
// require_once "Controllers/adminController/InventoryController/exportByPython.php";
// require_once "Controllers/adminController/InventoryController/exportImportController.php";

// Dashboard Controllers
require_once "Controllers/adminController/DashboardController.php";

// Account Controllers
require_once "Controllers/adminController/accountController/adminProfileController.php";
require_once "Controllers/adminController/accountController/listUserController.php";

// Suppliers Controller
require_once 'Controllers/adminController/supplierController/SupplierControoler.php';

// Customers Controller
require_once 'Controllers/adminController/customerController.php/customerListController.php';
require_once 'Controllers/adminController/saleController/salesOrderController.php';
require_once 'Controllers/adminController/saleController/purchaseController.php';

// Shop Controller
require_once "Controllers/adminController/shopController/ShopController.php";
require_once "Controllers/userController/aboutController/aboutController.php";
require_once "Controllers/userController/contactController/contactController.php";
require_once "Controllers/userController/profileController/userProfileController.php";
require_once "Controllers/adminController/employeeController/employyeeController.php";
require_once "Controllers/adminController/reportController/financalController.php";

// Other Controllers
require_once "Controllers/adminController/BashInfoController.php";
require_once "Controllers/errorController.php";

// Help Controller
// require_once "Controllers/adminController/SupportController.php";


// Models
require_once "Models/usersModel.php";
require_once "Models/invenoryModel/meterailModel.php";
require_once "Models/invenoryModel/categoryModel.php";
require_once "Models/dashboard/dashboardModel.php";
require_once "Models/supplierModel/SupplierModel.php";
require_once "Models/invenoryModel/import&export/material.php";
require_once "Models/accountModel/userModel.php";
require_once "Models/salesModel/salesOrderModel.php";

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

// Group routes by controller for better organization
$route->group('auth', function ($route) {
    // Login Routes
    $route->get('/login', [LoginController::class, 'login']);  // Display Login Form (GET)
    $route->post('/login', [LoginController::class, 'login']); // Handle Login (POST)
    $route->get('/logout', [LoginController::class, 'logout']); // Handle Logout

    // // Forgot Password
    // $route->match(['GET', 'POST'], '/forgot-password', [ForgotPasswordController::class, 'handleForgotPassword']);

    // // Password Reset
    // $route->match(['GET', 'POST'], '/reset-password', [ForgotPasswordController::class, 'handleResetPassword']);

    // Registration
    $route->match(['GET', 'POST'], '/register', [RegisterController::class, 'register']);
});


// Sale order route group
$route->group('sale', function ($route) {
    $route->get('/sale/order', [SaleOrderController::class, 'saleInfo']);
    $route->get('/admin/saleorder/add', [SaleOrderController::class, 'addSaleOrder']);
    $route->post('/admin/saleorder/add', [SaleOrderController::class, 'addSaleOrder']);
    $route->get('/purchase/order', [PurchaseOrderController::class, 'purchaseInfo']);
});
// Employee route group
$route->group('employee', function ($route) {
    $route->get('/employee/managment', [EmployeeController::class, 'employeeManagement']);

});
// Setting route group
$route->group('setting', function ($route) {
    $route->get('/setting/managment', [SettingController::class, 'settingManagement']);

});
// report route group
$route->group('report', function ($route) {
    $route->get('/financal/managment', [FinancalController::class, 'financalManagement']);

});



$route->group('supplier', function ($route) {
    // read 
    $route->get('/suppliers', [supplierController::class, 'suppliersInfo']);

    // create
    $route->get('/add/supplier', [supplierController::class, 'addSupplierInfo']);
    $route->post('/store/supplier', [supplierController::class, 'storeSupplierInfo']);

    // edit
    $route->get('/supplier/edit/{id}', [supplierController::class, 'getSupplier']);
    $route->post('/supplier/update/{id}', [SupplierController::class, 'updateSupplier']);

    // delete
    $route->post('/supplier/delete/{id}', [supplierController::class, 'destroySupplier']);

    // supplier detail
    $route->get('/supplier/detail/{id}', [SupplierController::class, 'supplierDetailById']);



    // export supplier detail
    $route->get('/suppliers/export/{format}', [SupplierController::class, 'exportSuppliers']);
});


$route->group('customers', function ($route) {
    // show customer or read
    $route->get('/customers', [CustomerInfoController::class, 'getCustomersController']);
    $route->get('/customer/detail', [CustomerInfoController::class, 'getCustomerDetailController']);


    // edit
    $route->get('/edit/customer', [CustomerInfoController::class, 'getCustomerController']);
    $route->post('/update/customer', [CustomerInfoController::class, 'updateCustomerController']);

    // delete 
    $route->get('/delete/customer', [CustomerInfoController::class, 'destroyCustomerController']);
});


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
    $route->get('/contact', [ContactController::class, 'contact']);
    $route->get('/about', [AboutController::class, 'about']);
    $route->get('/profile', [UserProfileController::class, 'profile']);
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
    $route->get('/profile/account', [ProfileAccountController::class, 'profileadmin']);

    // User List & Details
    $route->get('/userList', [AccountListController::class, 'viewUsersAccListProfile']);
    $route->get('/userDetail/{id}', [AccountListController::class, 'viewUserDetail']);

    // // User Management
    $route->get('/createuser', [AccountListController::class, 'createNewUserAccProfile']);
    $route->post('/userstore', [AccountListController::class, 'storeUserAccProfile']);
    $route->get('/edituser/{id}', [AccountListController::class, 'editUserAccProfile']);
    $route->post('/storeupdate/{id}', [AccountListController::class, 'updateUserAccProfile']);
    $route->match(['post', 'delete'], '/deleteuser/{id}', [AccountListController::class, 'destroySingleUserAccProfile']);
});


// shop route group
$route->group('shop', function ($route) {
    $route->get('/shop', [ShopController::class, 'shop']);
    $route->get('/payment', [ShopController::class, 'payment']);
    $route->get('/material/detail/{id}', [ShopController::class, 'viewMaterial']);
    $route->get('/help', [ShopController::class, 'help']);
});
/**
 * Error Handling Route
 */
$route->get('/error', [ErrorController::class, 'error']);

/**
 * Route Handling: Match the requested URI with the defined routes
 */
$route->route();