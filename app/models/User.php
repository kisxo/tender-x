<?php

class User
{

    use Model;

    protected $table = "users";

    protected $allowedColumns = [
        "name",
        "email",
        "password",
    ];

    public function validate($data)
    {
        $this->errors = [];

        // check email
        if (empty($data["email"]))
        {
            $this->errors["email"] = "Email is required!";

        }else if (!filter_var($data["email"], FILTER_VALIDATE_EMAIL))
        {
            $this->errors["email"] = "Email is invalid!";
        }else{

            // check if email exists
            $arr["email"] = $data["email"];
            $row = $this->first($arr);
            if (!empty($row))
            {
                $this->errors["email"] = "Email already exists!";
            }
        }

        // check name
        if (empty($data["name"]))
        {
            $this->errors["name"] = "Name is required!";

        }else if (strlen($data["name"]) < 4)
        {
            $this->errors["name"] = "Name is invalid!";
        }

        // check password
        if (empty($data["password"]))
        {
            $this->errors["password"] = "Password is required!";
        }else if (strlen($data["password"]) < 6)
        {
            $this->errors["password"] = "Password must be at least 6 characters!";
        }


        if (empty($this->errors))
        {
            return true;
        }
        return false;
    }
}