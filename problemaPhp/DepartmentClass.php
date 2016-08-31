<?php

/**
 * Created by PhpStorm.
 * User: andrei.cirt
 * Date: 8/31/2016
 * Time: 13:30
 */

require_once('MySQLDatabase.php');
require_once('ManagerClass.php');
require_once ('EmploymentClass.php');

class Department
{
    protected $depName;
    protected $teamNr;
    protected $teams = array();

    public function setDepName($dep)
    {
        $this->depName = $dep;
    }

    public function getTeamNr()
    {
        return $this->teamNr = count($this->teams);
    }

    public function setTeamNr($teams)
    {
        $this->teamNr = $teams;
    }

    public function getTeamNrFromDb()
    {
        $sql = "select count(*) from echipe v0 where v0.nume_departament={$this->printDepName()}";
        return $sql;
    }

    public function printDepName()
    {
        echo $this->depName;
    }

    public function getTeams()
    {
        return $this->teams;
    }

    public function setTeams($teams)
    {
        $this->teams = $teams;
    }

    public function addTeam(Team $teams)
    {
        $this->teams[] = $teams;
    }

    public function removeTeam(Team $team)
    {
        $teamsArray = $this->teams;

        foreach ($teamsArray as $teamsKey => $currentTeam) {
            if ($team === $currentTeam) {
                unset($teamsArray[$teamsKey]);
            }
        }
        $this->setTeams($teamsArray);
    }

}