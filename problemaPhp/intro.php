<?php
/**
 * Created by PhpStorm.
 * User: andrei.cirt
 * Date: 8/19/2016
 * Time: 16:59
 */

require_once("MySQLDatabase.php");
require_once("EmploymentClass.php");
require_once ('ManagerClass.php');
require_once ('TeamClass.php');
require_once ('DepartmentClass.php');



if(isset($database)) {echo "true";} else {echo "false";}
echo "<br/>";

$angajat4 = new Employment();
$angajat4->setName('Cornel');


$angajat1 = new Employment();
$angajat1->setName('mihai');
$angajat1->getEldershipFromDb();

$angajat2 = new Employment();
$angajat2->setName('cristi');
$angajat2->getEldershipFromDb();

$angajat3 = new Employment();
$angajat3->setName('Flore');
$angajat3->getEldershipFromDb();


$echipa1 = new Team();
$echipa1->setTeamName('OM');
$echipa1->addMember($angajat2);
$echipa1->addMember($angajat3);
$echipa1->addMember($angajat4);


$echipa2 = new Team();
$echipa2->setTeamName('DMS');
$echipa2->addMember($angajat1);


$departament1 = new Department();
$departament1->setDepName('Programare');
$departament1->addTeam($echipa1);
$departament1->addTeam($echipa2);



$manager1 = new Manager();
//$manager1->setName('vasilica');
//$manager1->set();
$manager1->setRank('CEO');
$manager1->addSubordinate($angajat1);
$manager1->addSubordinate($angajat2);
$manager1->addSubordinate($angajat3);



$sql = "INSERT INTO angajati (nume_angajat,nume_echipa,data_angajare,tip_angajat)";
$sql .= " VALUES ( 'Mirceaa','OM1',now(),'ROOKIE')";
//echo $sql;
$mysqlConnection = new MySQLDatabase();



$result = $mysqlConnection->query($sql);


//$sql2 = 'SELECT * FROM angajati';
//
//$result = $mysqlConnection->query($sql2);
//
//$a=mysqli_fetch_all($result, MYSQLI_ASSOC);
//var_dump($a); die();
//foreach ($a as $currentRow) {
//    foreach ($currentRow as $key => $value)
//    echo $key . ' = '. $value . '<br/>';
//}

$sql = $departament1->getNrMembri();
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