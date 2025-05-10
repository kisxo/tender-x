<?php


class Home
{
    use Controller;

    public function index()
    {
        // example usage for USER class
        // $data['errors'] = $user->errors;

        $data['errors'] = "Test Error";

        // $this->view('sign');
        $this->view("home", $data);
    }

}