<?php

/**
 * Registration Class
 */
class Register
{
    // import base controller trait
    use Controller;

    public function index()
    {
        $user = new User;

        // user registration on post request
        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            // validate user uploaded form-data
            if ($user->validate($_POST))
            {
                // hash user password
                $_POST["password"] = sha1($_POST["password"]);
                $user->insert($_POST);

                // redirect to login page after successfull registration
                redirect("/login");
            }
        }

        //show if any errors found
        $data["errors"] = $user->errors;

        $this->view("register", $data);
    }

}