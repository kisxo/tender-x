<?php

function show($stuff)
{
    echo "<pre>";
    print_r($stuff);
    echo "</pre>";
}

function esc($str)
{
    return htmlspecialchars($str);
}

function redirect($path)
{
    header("Location: ".$path);
    die;
}

function loginRequired()
{
    if (!empty($_SESSION["USER"]))
    {
        return false;
    }

    redirect("/");
}