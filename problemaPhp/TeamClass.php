<?php

/**
 * Created by PhpStorm.
 * User: andrei.cirt
 * Date: 8/31/2016
 * Time: 14:47
 */



class Team
{
    protected $teamName;
    protected $membersNr;
    protected $members = array();

    public function getMembersNrFromDb(){
        $sql = "select count(*) from angajati v1 where v1.nume_echipa='{$this->getTeamName()}'";
    }

    public function getTeamName()
    {
        return $this->teamName;
    }

    public function setTeamName($name)
    {
        $this->teamName = $name;
    }

    public function getMembers()
    {
        return $this->members;
    }

    public function setMembers($membre)
    {
        $this->members = $membre;
    }

    public function addMember(Employment $employee)
    {
        $this->members[] = $employee;
        $this->setMembersNr($this->getMembersNr() + 1);
    }

    public function getMembersNr()
    {
        return $this->membersNr = count($this->members);
    }

    public function setMembersNr($nr)
    {
        $this->membersNr = $nr;
    }

    public function removeMember(Employment $employee)
    {
        $membersArray = $this->members;

        foreach ($membersArray as $membersKey => $curentMember) {
            if ($employee === $curentMember) {
                unset($membersArray[$membersKey]);
            }
        }
        $this->setMembers($membersArray);
    }


}