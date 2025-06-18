<?php


class Admin
{
    use Controller;

    public function index()
    {
        adminRequired();
        $user = new User;
        $tender = new Tender;
        $bid = new Bid;
        try {
            $data["users"] = $user->query("SELECT COUNT(*) AS total_users  FROM users")[0];
            $data["tenders"] = $tender->query("SELECT COUNT(*) AS total_tenders  FROM tenders")[0];
            $data["bids"] = $bid->query("SELECT COUNT(*) AS total_bids  FROM bids")[0];
            $data["openTenders"] = $tender->query("SELECT COUNT(*) AS total_open_tenders  FROM tenders WHERE status = 'open'")[0];
        } catch (Exception $e) {

        }

        $this->view("admin", $data);
    }

}