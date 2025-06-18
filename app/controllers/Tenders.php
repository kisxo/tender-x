<?php


class Tenders
{
    use Controller;

    public function index($id = '')
    {
        $category = new Category;
        $tender = new Tender;
        $user = new User;
        $bid = new Bid;
        $data["bids"] = [];
        $data["tenders"] = [];
        $data["categories"] = [];

        if (empty($_SESSION["USER"]))
        {
            redirect('/');
        }


        $data["category"] = $category->findAll();

        if(!empty($_GET["category"]))
        {
            $arr['category_id'] = $_GET["category"];
            $data["tender"] = $tender->where($arr);
        }else
        {
            $data["tender"] = $tender->findAll();
        }
        if(empty($data["tender"]))
        {
            $data["tender"] = [];
        }

        //default category
        $data["categories"][''] = ['id' => '', 'name' => "All"];
        foreach($data["category"] as $row)
        {
            $data["categories"][$row->id] = ['id' => $row->id, 'name' => $row->name];
        }
        foreach($data["tender"] as $row)
        {
            $data["tenders"][] = ['id' => $row->id, 'title' => $row->title, 'category_id' => $row->category_id, 'location' => $row->location, 'deadline' => $row->deadline, 'status' => $row->status,];
        }

        // show($data["categories"]);

        if (!empty($id))
        { 
            $arr["id"] = $id;
            $result = $tender->first($arr);
            if (!empty($result))
            {
                $data["is_creator"] = $_SESSION["USER"]->id == $result->posted_by;
                $user_data = $user->first(["id" => $result->posted_by]);

                // set total bids of tender
                $result->total_bids = $bid->query("SELECT COUNT(*) FROM bids where tender_id = :tender_id", ["tender_id" => $id])["0"]->count;
                $data["bids"] = $bid->where(['tender_id' => $id]);
                if ( empty($data["bids"]))
                {
                    $data["bids"] = [];
                }

                $result->posted_by = $user_data->name;
                $result->category = $data["categories"][$result->category_id]["name"];
                $data["exclude"] = ['id', 'category_id'];

                //check creator to display edit button
                //check tender deadline
                $data["deadline_over"] = date('Y-m-d', strtotime($result->deadline)) < date('Y-m-d');

                $data["tender"] = $result;
                return $this->view("tenders.detail", $data);
            }
        }

        $this->view("tenders", $data);
    }

    public function create()
    {
        loginRequired();

        $category = new Category;
        $tender = new Tender;
        $data["tenders"] = [];

        //fetch categories 
        $data["categories"] = [];
        $data["category"] = $category->findAll();
        foreach($data["category"] as $row)
        {
            $data["categories"][] = ['id' => $row->id, 'name' => $row->name];
        }

        // create a tender
        if($_SERVER['REQUEST_METHOD'] === 'POST')
        {

            $_POST["posted_by"] = $_SESSION["USER"]->id;
            // validate tender uploaded form-data
            if ($tender->validate($_POST))
            {
                $tender->insert($_POST);

                // redirect to login page after successfull registration
                redirect("/tenders");
            }

        }

        $this->view("tenders.create", $data);
    }

    public function posts()
    {
        loginRequired();

        $category = new Category;
        $tender = new Tender;
        $user = new User;
        $data["tenders"] = [];
        $data["categories"] = [];

        if (empty($_SESSION["USER"]))
        {
            redirect('/');
        }


        $data["category"] = $category->findAll();

        if(!empty($_GET["category"]))
        {
            $arr['category_id'] = $_GET["category"];
            $data["tender"] = $tender->where($arr);
        }else
        {
            $data["tenders"] = $tender->where(['posted_by' => $_SESSION["USER"]->id]);
        }
        if(empty($data["tender"]))
        {
            $data["tender"] = [];
        }

        //default category
        $data["categories"][''] = ['id' => '', 'name' => "All"];
        foreach($data["category"] as $row)
        {
            $data["categories"][$row->id] = ['id' => $row->id, 'name' => $row->name];
        }
        // foreach($data["tender"] as $row)
        // {
        //     $data["tenders"][] = ['id' => $row->id, 'title' => $row->title, 'category_id' => $row->category_id, 'location' => $row->location, 'deadline' => $row->deadline, 'status' => $row->status,];
        // }

        $this->view("tenders.posts", $data);
    }

    public function bids($id = '')
    {
        $category = new Category;
        $tender = new Tender;
        $user = new User;
        $bid = new Bid;
        $data["bids"] = [];
        $data["tenders"] = [];
        $data["categories"] = [];

        if (empty($_SESSION["USER"]))
        {
            redirect('/');
        }


        $data["category"] = $category->findAll();

        if(!empty($_GET["category"]))
        {
            $arr['category_id'] = $_GET["category"];
            $data["tender"] = $tender->where($arr);
        }else
        {
            $data["tender"] = $tender->findAll();
        }
        if(empty($data["tender"]))
        {
            $data["tender"] = [];
        }

        //default category
        $data["categories"][''] = ['id' => '', 'name' => "All"];
        foreach($data["category"] as $row)
        {
            $data["categories"][$row->id] = ['id' => $row->id, 'name' => $row->name];
        }
        foreach($data["tender"] as $row)
        {
            $data["tenders"][] = ['id' => $row->id, 'title' => $row->title, 'category_id' => $row->category_id, 'location' => $row->location, 'deadline' => $row->deadline, 'status' => $row->status,];
        }

        // show($data["categories"]);

        if (!empty($id))
        { 
            $arr["id"] = $id;
            $result = $tender->first($arr);
            if (!empty($result))
            {
                $data["is_creator"] = $_SESSION["USER"]->id == $result->posted_by;
                $user_data = $user->first(["id" => $result->posted_by]);

                // set total bids of tender
                $result->total_bids = $bid->query("SELECT COUNT(*) FROM bids")["0"]->count;

                $result->posted_by = $user_data->name;
                $result->category = $data["categories"][$result->category_id]["name"];
                $data["exclude"] = ['id', 'category_id'];

                //check creator to display edit button
                //check tender deadline
                $data["deadline_over"] = date('Y-m-d', strtotime($result->deadline)) < date('Y-m-d');

                $data["tender"] = $result;
                return $this->view("tenders.detail", $data);
            }
        }

        $this->view("tenders", $data);
    }

    public function finish()
    {
        $tender = new Tender;
        $bid = new Bid;

        show($_POST);
        // redirect('/tenders');

        // $tender = new Tender;

        if (empty($_SESSION["USER"]))
        {
            redirect('/');
        }

        show($_SESSION["USER"]);

        $data["tender"] = [];
        $data["bid"] = [];
        try{
            $data["tender"] = $tender->first(['id' => $_POST["tender_id"]]);
            $data["bid"] = $bid->first(['id' => $_POST["bid_id"]]);
            show($data);
        } catch (Exception $e) {
            show($e->getMessage());
        }

        if(empty($data["tender"]) || empty($data["bid"]))
                if (empty($_SESSION["USER"]))
        {
            redirect('/');
        }

        if($data["tender"]->status === "open")
        {
            $arr["winner_bid"] = $_POST["bid_id"];
            $arr["status"] = "awarded";
            $tender->update($_POST["tender_id"], $arr);
        }

        redirect('/tenders/'.$_POST["tender_id"]);
    }

    public function edit($id = "")
    {
        loginRequired();
        $user = new User;
        $tender = new Tender;
        $category = new Category;

        if (empty($id))
        {
            redirect('/tenders');
        }

        $data["tender"] = $tender->first(['id' => $id]);
        $data["is_creator"] = $_SESSION["USER"]->id == $data["tender"]->posted_by;
        $data["categories"] = $category->findAll();


        if (!$data["is_creator"])
        {
            redirect('/tenders');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            // validate tender uploaded form-data
            if ($tender->validate($_POST))
            {
                $_POST["id"] = $id;
                $tender->update($id, $_POST);

                // redirect to login page after successfull registration
                redirect("/tenders/edit/".$id);
            }
        }

        $this->view("tenders.edit", $data);
    }
}