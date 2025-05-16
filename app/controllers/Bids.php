<?php


class Bids
{
    use Controller;

    public function index()
    {
        loginRequired();
        $bid = new Bid;
        $data["bids"] = [];

        try {
            $data["bids"] = $bid->query("SELECT bids.id as bid_id, bids.*, tenders.* FROM bids JOIN tenders ON bids.tender_id = tenders.id WHERE bids.user_id = :user_id", ["user_id" => $_SESSION["USER"]->id]);
        } catch (\Throwable $th) {
            // throw $th;
        }

        $this->view("bids", $data);
    }

    public function create($tender_id = '')
    {
        loginRequired();
        $tender = new Tender;
        $bid = new Bid;
        $data["tender"] = [];
        $arr["id"] = $tender_id;

        try {
            $data["tender"] = $tender->first($arr);
        } catch (Throwable $th) {
            $data["errors"] = ["Tender id" => "Tender not found!"];
        }

        if(empty($data["tender"]))
        {
            $data["errors"] = ["Tender id" => "Tender not found!"];
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            $_POST["user_id"] = $_SESSION["USER"]->id;
            $_POST["bid"] = $bid;
            if ($bid->validate($_POST))
            {
                $bid->insert($_POST);
                redirect("/bids");
            }
        }

        $data["errors"] = $bid->errors;
        $this->view("bids.create", $data);
    }

}