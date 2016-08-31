<?php

/**
 * Created by PhpStorm.
 * User: andrei.cirt
 * Date: 8/19/2016
 * Time: 13:09
 */

require_once("config.php");

class MySQLDatabase
{
    private $connection;

    function __construct()
    {
        $this->open_connection();
    }

    public function open_connection()
    {
       $this->connection = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
        if(mysqli_connect_errno())
        {
            die("Database connection failed:" .
            mysqli_connect_error() .
            "(" . mysqli_connect_errno() . ")"
            );
        }
    }

    public function close_connection()
    {
        if(isset($this->connection))
        {
            mysqli_close($this->connection);
            unset($this->connection);
        }

    }

    public function query ($sql)
    {
        $result = mysqli_query($this->connection,$sql);
        $this->confirm_query($result, mysqli_error($this->connection));

        return $result;
    }
    private function confirm_query ($result, $error)
    {
        if(!$result){
            die("Database query failed :(. Error reported: ". $error);
        }
    }
    public function mysql_prep ($string)
    {
        $escaped_string = mysqli_real_escape_string($this->connection,$string);
        return $escaped_string;
    }

}

//$database = new MySQLDatabase();
//$db =& $database;