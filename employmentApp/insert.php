<?php
/**
 * Created by PhpStorm.
 * User: andrei.cirt
 * Date: 2/21/2017
 * Time: 16:25
 */


$conn    = Connect();
$name    = $conn->real_escape_string($_POST['u_name']);
$team   = $conn->real_escape_string($_POST['team_name']);
$rank    = $conn->real_escape_string($_POST['rank']);
$date = $conn->real_escape_string($_POST['manager_id']);
$query   = "INSERT into employment (name,team,rank,id_manager,hire_date) VALUES  ('$name' ,'$team','$rank','', now() )";
//echo $query; die;
$success = $conn->query($query);

if (!$success) {
    die("Couldn't enter data: ".$conn->error);

}

echo "Success <br>";

$conn->close();