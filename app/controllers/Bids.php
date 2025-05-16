<?php


class Bids
{
    use Controller;

    public function index($id = '')
    {
        loginRequired();
        $bid = new Bid;
        $data["bids"] = [];

        try {
            $data["bids"] = $bid->query("SELECT bids.id as bid_id, bids.*, tenders.* FROM bids JOIN tenders ON bids.tender_id = tenders.id WHERE bids.user_id = :user_id", ["user_id" => $_SESSION["USER"]->id]);
        } catch (\Throwable $th) {
            // throw $th;
        }

        // show($data["categories"]);
        if (!empty($id))
        { 
            try {
                $result = $bid->query("SELECT bids.id as bid_id, bids.*, tenders.* FROM bids JOIN tenders ON bids.tender_id = tenders.id WHERE bids.id = :bid_id", ["bid_id" => $id]);
            } catch (\Throwable $th) {
                // throw $th;
            }
            // $arr["id"] = $id;
            // $result = $tender->first($arr);
            if (!empty($result))
            { 
                $data["bids"] = $result[0];
                $data["is_creator"] = $_SESSION["USER"]->id == $data["bids"]->posted_by;
                // show($data);
                return $this->view("bids.detail", $data);
            }
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