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
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname) or die($conn->connect_error);

    return $conn;
}