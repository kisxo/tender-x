<?php


class Tenders
{
    use Controller;

    public function index()
    {
        $category = new Category;

        if (empty($_SESSION["USER"]))
        {
            redirect('/');
        }


        $data["category"] = $category->findAll();

        foreach($data["category"] as $row)
        {
            $data["categories"][] = ['id' => $row->id, 'name' => $row->name];
        }

        $this->view("tenders", $data);
    }
}