<?php

/**
 * Profile Class
 */
class Profile
{
    // import base controller trait
    use Controller;

    public function index()
    {
        $user = new User;

        loginRequired();

        $data["user"] = $_SESSION["USER"];
        $this->view("profile", $data);
    }

}