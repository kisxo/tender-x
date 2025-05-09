<?php


class _404
{
    use Controller;

    public function index()
    {
        show("404 Not Found");
        show("Current URL: " . $_SERVER['REQUEST_URI']);
    }
}