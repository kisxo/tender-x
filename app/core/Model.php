<?php

class Model
{
    use Database;
    protected $table = "users";
    protected $limit = 10;
    protected $offset = 0;

    public function where($data, $data_not = [])
    {
        $keys = array_keys($data);
        $keys_not = array_keys($data_not);

        //dynamically select from a table
        $query = "SELECT * FROM $this->table where ";

        foreach ($keys as $key)
        {
            $query .= $key . " = :" . $key . " && ";
        }

        foreach ($keys_not as $key)
        {
            $query .= $key . " != :" . $key . " && ";
        }

        $query = trim($query, " && ");
        $query .= " LIMIT $this->limit OFFSET $this->offset";

        // echo $query;
        $query_data = array_merge($data, $data_not);
        return $this -> query($query, $query_data);
    }

    public function first($data, $data_not = [])
    {

    }

    public function insert($data)
    {
    
    }

    public function update($id, $data, $id_column = "id")
    {

    }

    public function delete($id, $id_column = "id")
    {

    }
}