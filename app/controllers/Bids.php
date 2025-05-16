<?php


class Bids
{
    use Controller;

    public function index()
    {
        echo "bid";
    }

    public function create($tender_id = '')
    {
        loginRequired();
        $tender = new Tender;
        $bid = new Bid;
        $data["tender"] = [];
        $arr["id"] = $tender_id;
        $data["tender"] = $tender->first($arr);

        if(empty($data["tender"]))
        {
            $data["errors"] = ["Tender id" => "Tender not found!"];
        }

        $this->view("bids.create", $data);
    }

}