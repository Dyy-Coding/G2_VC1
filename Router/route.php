<?php
require_once "Router.php";
require_once "Controllers/BaseController.php";
require_once __DIR__ . '/../Database/Database.php';
require_once "Controllers/adminController/loginController.php";
require_once "Controllers/adminController/registerController.php";
require_once "Controllers/adminController/InventoryController.php";
require_once "Controllers/AdminController/DashboardController.php";
require_once "Models/usersModel.php";

$route = new Router();


// Dashboard Routes
$route->get('/', [DashboardController::class, 'index']);
$route->get('/login', [LoginController::class, 'login']);
$route->post('/login', [LoginController::class, 'login']);
$route->get('/logout', [LoginController::class, 'logout']);
$route->get('/register', [RegisterController::class, 'register']);
$route->post('/register', [RegisterController::class, 'register']);

// Inventory Routes
$route->get('/inventory', [InventoryController::class, 'inventory']);
$route->get('/sales', [InventoryController::class, 'sales']);

// Route Handling
$route->route();
