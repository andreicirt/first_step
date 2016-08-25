<?php
/**
 * Created by PhpStorm.
 * User: andrei.cirt
 * Date: 8/19/2016
 * Time: 16:59
 */

require_once ("MySQLDatabase.php");

if(isset($database)) {echo "true";} else {echo "false";}
echo "<br/>";

$sql = "INSERT INTO angajati (nume_angajat,nume_echipa,data_angajare,tip_angajat)";
$sql .= " VALUES ( 'Mircea','OM1',now(),'ROOKIE')";
//echo $sql;
$mysqlConnection = new MySQLDatabase();



//$result = $mysqlConnection->query($sql);


$sql2 = 'SELECT * FROM angajati';

$result = $mysqlConnection->query($sql2);

$a=mysqli_fetch_all($result, MYSQLI_ASSOC);
var_dump($a); die();
foreach ($a as $currentRow) {
    foreach ($currentRow as $key => $value)
    echo $key . ' = '. $value . '<br/>';
}

//echo $database->mysql_prep("It's Working ?<br/>");
//$sql = "select * from angajati";


//$result = $database->query($sql);
//$a=mysqli_fetch_array($result);
//var_dump($a);
//$sql = "SELECT * FROM angajati WHERE id_angajat=4";
//$result = $database->query($sql);
//$found_user = mysqli_fetch_array($result);
//echo $found_user['nume_angajat'];