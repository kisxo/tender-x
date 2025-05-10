<?php


class Tenders
{
    use Controller;

    public function index()
    {
        if (empty($_SESSION["USER"]))
        {
            redirect('/');
        }

        $this->view("tenders", []);
    }
}