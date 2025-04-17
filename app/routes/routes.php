<?php

// home route
require_once '../App/Controllers/HomeController.php';
use App\Controllers\HomeController;
$router->get('/', [HomeController::class, 'index']); 


$router->get('/about', function() { echo "This is the About page!";});