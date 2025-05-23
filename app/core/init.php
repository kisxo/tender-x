<?php

spl_autoload_register(function($classname){
    require $filename = "../app/models/".ucfirst($classname).".php";
});

require "config.php";
require "functions.php";
require "Database.php";
require "Model.php";
require "Controller.php";

//load the app class after loading the all core
require "App.php";