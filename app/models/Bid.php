<?php

class Bid
{

    use Model;
    protected $table = "bids";

    protected $allowedColumns = [
        "tender_id",
        "user_id",
        "bid_amount",
        "message",
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