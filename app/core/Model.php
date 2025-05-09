<?php

class Model
{
    use Database;

    public function test()
    {
        $query = "SELECT * FROM users";

        $result = $this->query($query);

        show($result);
    }
}