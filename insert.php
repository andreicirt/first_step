<?php
/**
 * Created by PhpStorm.
 * User: andrei.cirt
 * Date: 2/21/2017
 * Time: 16:25
 */

require 'connection.php';
$conn    = Connect();
$name    = $conn->real_escape_string($_POST['u_name']);
$teamName   = $conn->real_escape_string($_POST['team_name']);
$rank    = $conn->real_escape_string($_POST['rank']);
$date = $conn->real_escape_string($_POST['manager_id']);
$query   = "INSERT into angajati (nume_angajat,nume_echipa,tip_angajat,id_manager,data_angajare) VALUES  ('$name' ,'$teamName','$rank','', now() )";
//echo $query; die;
$success = $conn->query($query);

if (!$success) {
    die("Couldn't enter data: ".$conn->error);

}

echo "Success <br>";

$conn->close();