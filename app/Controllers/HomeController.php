<?php

namespace App\Controllers;

class HomeController
{
    public function index()
    {
        $title = "Welcome Home";
        
         // 'home' is App/View/home.php file
        $content = $this->renderView('home');

        // Render the page with the layout
        echo $this->renderLayout($title, $content);
    }

    private function renderView($viewName)
    {
        ob_start();

        include __DIR__ . '/../views/' . $viewName . '.php';

        return ob_get_clean();
    }

    private function renderLayout($title, $content)
    {
        ob_start();
        
        include __DIR__ . '/../views/layout.php';
        
        return ob_get_clean();
    }
}
