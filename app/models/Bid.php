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
        // check amount
        if (($data["bid_amount"]) < 0)
        {
            $this->errors["Bid Amount"] = "Invalid amount!";
        }

        //check message
        if (empty($data["message"]))
        {
            $this->errors["Message"] = "Message is required!";
        }

        if ($data["bid"]->where(["user_id" => $data["user_id"], "tender_id" => $data["tender_id"]]))
        {
            $this->errors["Message"] = "Cannot bid twice on a single tender!";
        }

        if ($data["user_id"] == $data["posted_by"])
        {
            $this->errors["User"] = "Cannot bid on self created tender!";
        }

        if (empty($this->errors))
        {
            return true;
        }
        return false;
    }
}
