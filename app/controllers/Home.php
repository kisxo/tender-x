<?php


class Home
{
    use Controller;

    public function index()
    {
        // show tenders if user logged in
        if (!empty($_SESSION["USER"]))
        {
            redirect('/tenders');
        }

        $this->view("home", []);
    }

}