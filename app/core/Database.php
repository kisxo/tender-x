<?php


try {
    $db_connection = new PDO(DBDRIVER.":host=".DBHOST.";dbname=".DBNAME.";charset=utf8mb4", DBUSER, DBPASS);
}catch (PDOException $e) {
    die("DB Connection failed: " . $e->getMessage());
}

show($db_connection);