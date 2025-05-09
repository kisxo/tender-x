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
        $data = array_merge($data, $data_not);
        return $this -> query($query, $data);
    }


    public function first($data, $data_not = [])
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
        $data = array_merge($data, $data_not);
        $result =  $this -> query($query, $data);

        if ($result)
        {
            return $result[0];
        }

        return false;
    }


    public function insert($data)
    {
        $keys = array_keys($data);

        $query = "INSERT INTO $this->table (".implode(",", $keys).") VALUES (:".implode(",:", $keys).")";

        // echo $query;
        $this -> query($query, $data);

        return false;
    }


    public function update($id, $data, $id_column = "id")
    {

        $keys = array_keys($data);

        //dynamically select from a table
        $query = "UPDATE $this->table SET ";

        foreach ($keys as $key)
        {
            $query .= $key . " = :" . $key . ", ";
        }
        $query = trim($query, ", ");

        $query .= " WHERE $id_column = :$id_column";

        $data[$id_column] = $id;

        // echo $query;
        $this -> query($query, $data);
        return false;
    }


    public function delete($id, $id_column = "id")
    {
        $data[$id_column] = $id;
        $query = "DELETE FROM $this->table WHERE $id_column = :$id_column";

        // echo $query;
        $this -> query($query, $data);

        return false;
    }
}