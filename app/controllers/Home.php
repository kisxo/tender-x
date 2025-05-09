<?php


class Home extends Controller
{
    public function index($a = '', $c = '')
    {   
        $model = new Model();
        $model->test();

        echo "Home Controller";
        $this->view('home');
    }
}