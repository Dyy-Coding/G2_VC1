<?php
require_once "Router.php";
require_once "Controllers/BaseController.php";
require_once "Database/Database.php";
require_once "Controllers/UserController.php";



$route = new Router();

// Dashboard


// User
$route->get('/', [UserController::class, 'index']);

// Register 
$route->get('/register', [UserController::class, 'register']);

// Login
$route->get('/login', [UserController::class, 'login']);

$route->route();