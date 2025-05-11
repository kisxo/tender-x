<?php

class Category
{

    use Model;

    protected $table = "categories";

    protected $allowedColumns = [
        "name",
        "description",
    ];

    public function validate($data)
    {
        $this->errors = [];

        if (empty($this->errors))
        {
            return true;
        }
        return false;
    }
}