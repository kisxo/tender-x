<?php


class Tenders
{
    use Controller;

    public function index()
    {
        $category = new Category;
        $tender = new Tender;
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
        foreach($data["category"] as $row)
        {
            $data["categories"][] = ['id' => $row->id, 'name' => $row->name];
        }
        foreach($data["tender"] as $row)
        {
            $data["tenders"][] = ['id' => $row->id, 'title' => $row->title, 'category_id' => $row->category_id, 'location' => $row->location, 'deadline' => $row->deadline];
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
            // validate user uploaded form-data
            if ($tender->validate($_POST))
            {
                $tender->insert($_POST);

                // redirect to login page after successfull registration
                redirect("/tenders");
            }

        }

        $this->view("tenders.create", $data);
    }
}