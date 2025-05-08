<?php


class _404 extends Controller
{
    public function index()
    {
        show("404 Not Found");
        show("Current URL: " . $_SERVER['REQUEST_URI']);
    }
}