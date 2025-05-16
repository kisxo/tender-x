<?php

Trait Database
{
    private function connect()
    {
        $con = new PDO(DBDRIVER.":host=".DBHOST.";dbname=".DBNAME.";", DBUSER, DBPASS, [
            PDO::ATTR_EMULATE_PREPARES => true
        ]);
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

    public function get_row($query, $data = [])
    {

        $db_connection = $this->connect();
        $smt = $db_connection->prepare($query);

        $check = $smt->execute($data);
        if ($check) {
            $result = $smt->fetchAll(PDO::FETCH_OBJ);
            if (is_array($result) && count($result) ) {
                return $result[0];
            }
        }

        return false;
    }
}