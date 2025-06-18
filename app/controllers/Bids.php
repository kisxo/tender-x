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
                unset($data["bids"]->id);
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
            $_POST["posted_by"] = $data["tender"]->posted_by;
            $_POST["user_id"] = $_SESSION["USER"]->id;
            $_POST["bid"] = $bid;
            if ($bid->validate($_POST))
            {
                $bid->insert($_POST);
                redirect("/bids/list");
            }
        }

        $data["errors"] = $bid->errors;
        $this->view("bids.create", $data);
    }

    public function list()
    {
        loginRequired();
        $bid = new Bid;
        $data["limit"] = 10;
        $data["is_admin"] = false;


        // Get the current page from the URL, default is 1
        $data["page"] = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        if ($data["page"] < 1) $data["page"] = 1;
        $data["offset"] = ($data["page"] - 1) * $data["limit"];

        try {
            // if admin
            if ($_SESSION["USER"]->role === "admin")
            {
                $data["is_admin"] = true;
                // Fetch total number of bids
                $data["totalBids"] = $bid->query("SELECT COUNT(*) AS total_bids  FROM bids")[0]->total_bids;
                $data["totalPages"] = ceil($data["totalBids"] / $data["limit"]);
                $data["bids"] = $bid->query(
                    "SELECT 
                        bids.*,
                        users.name AS user_name,
                        users.email AS user_email,
                        tenders.title AS tender_title,
                        tenders.status AS tender_status,
                        tenders.winner_bid AS tender_winner_bid,
                        tenders.category_id AS tender_category_id
                    FROM bids
                    JOIN users ON bids.user_id = users.id
                    JOIN tenders ON bids.tender_id = tenders.id
                    ORDER BY bids.id DESC
                    LIMIT :limit OFFSET :offset",
                    [
                        "limit" => (int)$data["limit"],
                        "offset" => (int)$data["offset"]
                    ]
                );
            }
            else
            {
                // Fetch total number of bids
                $data["totalBids"] = $bid->query("SELECT COUNT(*) AS total_bids  FROM bids WHERE user_id = :user_id", [
                    "user_id" => $_SESSION["USER"]->id
                ])[0]->total_bids;
                $data["totalPages"] = ceil($data["totalBids"] / $data["limit"]);
                $data["bids"] = $bid->query(
                    "SELECT 
                        bids.*,
                        users.name AS user_name,
                        users.email AS user_email,
                        tenders.title AS tender_title,
                        tenders.status AS tender_status,
                        tenders.winner_bid AS tender_winner_bid,
                        tenders.category_id AS tender_category_id
                    FROM bids
                    JOIN users ON bids.user_id = users.id
                    JOIN tenders ON bids.tender_id = tenders.id
                    WHERE bids.user_id = :user_id
                    ORDER BY bids.id DESC
                    LIMIT :limit OFFSET :offset",
                    [
                        "user_id" => $_SESSION["USER"]->id,
                        "limit" => (int)$data["limit"],
                        "offset" => (int)$data["offset"]
                    ]
                );

            }

        } catch (Exception $e) {

        }
        
        $this->view("bids.list", $data);
    }
}
