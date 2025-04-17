<?php

namespace App\Controllers;

class HomeController
{
    public function index()
    {
        $title = "Welcome Home";
        echo "Home Page";
        // Option 1: Simple view include
        // require_once __DIR__ . '/../Views/home.php';

        // Option 2: Use a view helper if you created one
        // $viewPath = __DIR__ . '/../Views/home.php';
        // include __DIR__ . '/../Views/layout.php';
        
    }
}