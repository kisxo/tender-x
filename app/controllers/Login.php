<?php


class Login
{
    use Controller;

    public function index()
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Handle GET request
            echo "This is a POST request.";
        } else {
            
            $this->view("login", []);
        }
    }

}