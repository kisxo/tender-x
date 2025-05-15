<?php


class Tenders
{
    use Controller;

    public function index($id = '')
    {
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
            $data["tenders"][] = ['id' => $row->id, 'title' => $row->title, 'category_id' => $row->category_id, 'location' => $row->location, 'deadline' => $row->deadline];
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

        //fetcch categories 
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
            $data["tenders"][] = ['id' => $row->id, 'title' => $row->title, 'category_id' => $row->category_id, 'location' => $row->location, 'deadline' => $row->deadline];
        }

        $this->view("tenders.posts", $data);
    }
}