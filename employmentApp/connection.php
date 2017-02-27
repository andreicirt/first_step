<?php
/**
 * Created by PhpStorm.
 * User: andrei.cirt
 * Date: 2/21/2017
 * Time: 16:24
 */

function Connect()
{
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "problemaphp";

    // Create connection
    $connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname) or die($connection->connect_error);

    return $connection;
}