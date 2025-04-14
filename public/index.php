<?php 

// Include the core router class
require_once '../core/router.php';

$router = new Router();

// Include the routes from the routes.php file
require_once '../app/routes/routes.php';  // This will register all routes

$router->dispatch($_SERVER['REQUEST_URI']);