<?php

// Include required files
require_once "Router.php";
require_once "Controllers/BaseController.php";
require_once __DIR__ . '/../Database/Database.php';
require_once "Controllers/adminController/loginController.php";
require_once "Controllers/adminController/registerController.php";
require_once "Controllers/adminController/InventoryController.php";
require_once "Controllers/AdminController/DashboardController.php";
require_once "Controllers/adminController/BashInfoController.php";
require_once 'Controllers/validateionHelper.php';
require_once "Models/usersModel.php";

// Initialize Router
$route = new Router();
// Group routes by controller for better organization
$route->post('/login', [LoginController::class, 'login']);
// Dashboard Routes
$route->get('/', [DashboardController::class, 'index']);

// Authentication Routes (Login and Register)
$route->get('/login', [LoginController::class, 'login']);

$route->get('/logout', [LoginController::class, 'logout']);
$route->get('/register', [RegisterController::class, 'register']);
$route->post('/register', [RegisterController::class, 'register']);

// Inventory Routes
$route->get('/inventory', [InventoryController::class, 'inventory']);
$route->get('/sales', [InventoryController::class, 'sales']);

// Profile Routes
$route->get('/profile', [BashInfoController::class, 'profile']);

// Print the registered routes for debugging purposes
// $route->printRoutes();

// Route Handling: match the requested URI with the defined routes
$route->route();
