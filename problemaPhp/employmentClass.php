<?php

/**
 * Created by PhpStorm.
 * User: andrei.cirt
 * Date: 8/31/2016
 * Time: 13:21
 */

require_once('MySQLDatabase.php');

class Employment
{
    protected $name;
    protected $teamName;

    public function getSeniorityFromDb ()
    {
        return "select DATEDIFF(NOW(),i.data_angajare) from angajati i where i.nume_angajat={$this->getName()}";
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setTeam($team)
    {
        $this->teamName = $team;
    }

    public function InsertEmployeeToDb()
    {
        $sql = "INSERT INTO angajati (nume_angajat,nume_echipa,tip_angajat,id_manager,data_angajare)";
        $sql .= " VALUES ( {$this->getName()},{$this->getTeam()},{$this->getRank()},'18',now())";
    }

    public function getTeam()
    {
        return $this->teamName;
    }
}

}