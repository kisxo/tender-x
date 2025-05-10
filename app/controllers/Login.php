<?php

/**
 * Login Class
 */
class Login
{
    // import base controller trait
    use Controller;

    public function index()
    {
        $user = new User;

        // user login on post request
        if ($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            $arr["email"] = $_POST["email"];
            // query a user from input data
            $row = $user->first($arr);

            // check if user exists
            if ($row)
            {
                // match input password hash with stored password hash
                if ($row->password === sha1($_POST["password"]))
                {
                    // store user data in session 
                    $_SESSION["USER"] = $row;

                    // redirect to home page after successfull login
                    redirect("/");
                }
            }

            // register error if user not found or password does not match
            $user->errors["email"] = "Wrong email or password!";
        }

        // show if any errors found
        $data["errors"] = $user->errors;

        // render login view
        $this->view("login", $data);
    }

}