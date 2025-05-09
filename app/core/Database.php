<?php

Trait Database
{
    private function connect()
    {
        $con = new PDO(DBDRIVER.":host=".DBHOST.";dbname=".DBNAME.";charset=utf8mb4", DBUSER, DBPASS);
        return $con;
    }

    public function query($query, $data = [])
    {

        $db_connection = $this->connect();
        $smt = $db_connection->prepare($query);

        $check = $smt->execute($data);
        if ($check) {
            $result = $smt->fetchAll(PDO::FETCH_OBJ);
            if (is_array($result) && count($result) ) {
                return $result;
            }
        }

        return false;
    }
}