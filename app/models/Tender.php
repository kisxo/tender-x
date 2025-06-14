<?php

class Tender
{

    use Model;

    protected $table = "tenders";

    protected $allowedColumns = [
        "title",
        "description",
        "category_id",
        "posted_by",
        "budget",
        "deadline",
        "winner_bid",
        "location",
        "status",
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