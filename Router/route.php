<?php
require_once "Router.php";
require_once "Controllers/BaseController.php";
require_once "Database/Database.php";



$route = new Router();


$route->route();