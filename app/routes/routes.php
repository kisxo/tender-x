<?php

// home route
require_once '../App/Controllers/HomeController.php';
use App\Controllers\HomeController;
$router->get('/', [HomeController::class, 'index']); 

// home route
require_once '../App/Controllers/LoginController.php';
use App\Controllers\LoginController;
$router->get('/login', [LoginController::class, 'getLogin']); 

$router->get('/about', function() { echo "This is the About page!";});