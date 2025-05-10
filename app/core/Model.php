<?php

Trait Model
{
    use Database;
    
    //every model class should have table value for dynamic qyerying
    //example 
    // protected $table = "users";

    protected $limit        = 10;
    protected $offset       = 0;
    protected $order_type   = "desc";
    protected $order_column = "id";
    public $errors          = [];


    public function findAll()
    {

        //dynamically select from a table
        $query = "SELECT * FROM $this->table ORDER BY $this->order_column $this->order_type LIMIT $this->limit OFFSET $this->offset";

        // echo $query;
        return $this -> query($query);
    }


    public function where($data, $data_not = [])
    {
        $keys = array_keys($data);
        $keys_not = array_keys($data_not);

        //dynamically select from a table
        $query = "SELECT * FROM $this->table WHERE ";

        foreach ($keys as $key)
        {
            $query .= $key . " = :" . $key . " && ";
        }

        foreach ($keys_not as $key)
        {
            $query .= $key . " != :" . $key . " && ";
        }

        $query = trim($query, " && ");
        $query .= " ORDER BY $this->order_column $this->order_type LIMIT $this->limit OFFSET $this->offset";

        // echo $query;
        $data = array_merge($data, $data_not);
        return $this -> query($query, $data);
    }


    public function first($data, $data_not = [])
    {
        $keys = array_keys($data);
        $keys_not = array_keys($data_not);

        //dynamically select from a table
        $query = "SELECT * FROM $this->table WHERE ";

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
        /** remove unwanted data */
        if (!empty($this->allowedColumns))
        {
            foreach($data as $key => $value)
            {
                if (!in_array($key, $this->allowedColumns))
                {
                    unset($data[$key]);
                }
            }
        }
        
        $keys = array_keys($data);

        $query = "INSERT INTO $this->table (".implode(",", $keys).") VALUES (:".implode(",:", $keys).")";

        // echo $query;
        $this -> query($query, $data);

        return false;
    }


    public function update($id, $data, $id_column = "id")
    {
        /** remove unwanted data */
        if (!empty($this->allowedColumns))
        {
            foreach($data as $key => $value)
            {
                if (!in_array($key, $this->allowedColumns))
                {
                    unset($data[$key]);
                }
            }
        }

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