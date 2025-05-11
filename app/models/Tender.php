<?php

class Tender
{

    use Model;

    protected $table = "tenders";

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