<?php

namespace App\Controllers;

class LoginController
{
    public function getLogin()
    {
        $title = "Welcome Home";
        
         // 'home' is App/View/home.php file
        $content = $this->renderView('login');

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
