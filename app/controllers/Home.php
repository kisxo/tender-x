<?php


class Home extends Controller
{
    public function index($a = '', $c = '')
    {
        echo "Home Controller";
        $this->view('home');
    }
}