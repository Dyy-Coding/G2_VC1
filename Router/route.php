<?php
require_once "Router.php";
require_once "Controllers/BaseController.php";
require_once "Database/Database.php";
require_once "Controllers/UserController.php";
require_once "Controllers/InventoryController.php";
require_once "Controllers/DashboardController.php";



$route = new Router();

// Dashboard
$route->get('/', [DashboardController::class, 'index']);

// User
$route->get('/user', [UserController::class, 'index']);

// Register 
$route->get('/register', [UserController::class, 'register']);

// Login
$route->get('/login', [UserController::class, 'login']);

// Inventory
$route->get('/inventory', [InventoryController::class, 'inventory']);

$route->route();