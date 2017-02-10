<?php

class Connection
{
    private $mysqli;
    public $insert_id;

    public function __construct()
    {
        require __DIR__ . '../config/config.php';

        $this->mysqli = new mysqli($dbServer, $dbUser, $dbPassword, $dbName);

        if($this->mysqli->connect_error)
        {
            die('Databse connection error: '.$this->mysqli->connect_error);
        } else
        {
            $this->mysqli->set_charset("utf8");
            return true;
        }
    }

    public function query($sql)
    {
        $result = $this->mysqli->query($sql);

        if($result == false)
        {
            die('Query error: '.$this->mysqli->error);
        } else {
            return $result;
        }
    }
}
