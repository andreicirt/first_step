<?php

/**
 * Created by PhpStorm.
 * User: andrei.cirt
 * Date: 8/31/2016
 * Time: 13:24
 */

require_once('MySQLDatabase.php');
require_once('EmploymentClass.php');


class Manager
{
    protected $subordinatesNr = 0;
    protected $rank;
    protected $subordinates = array();

    public function getSubordinatesNrfromDb()
    {
        return "select count(*)
                from angajati v
                inner join echipe b
                on v.id_manager=b.id_manager
                and b.manager_echipa='{$this->getName()}'";
    }

    public function getRank()
    {
       return $this->rank;
    }

    public function setRank($rang)
    {
        $this->rank = $rang;
    }

    /**
     * @return mixed
     */
    public function getSubordinates()
    {
        return $this->subordinates;
    }

    /**
     * @param mixed $subs
     */
    public function setSubordinates($subs)
    {
        $this->subordinates = $subs;
    }

    function getSubordinatesFromDb()
    {
        $sql = "select i1.nume_angajat
                from angajati i1
                inner join echipe vv
                on i1.id_manager=vv.id_manager
                where i1.id_angajat !=vv.id_manager
                and vv.manager_echipa='{$this->getName()}'";
        return $sql ;
    }

    public function addSubordinate(Employment $employee)
    {
        $this->subordinates[] = $employee;
        $this->setSubordinatesNr($this->getSubordinatesNr() + 1);
    }

    public function getSubordinatesNr()
    {
        return $this->subordinatesNr;
    }

    public function setSubordinatesNr($number)
    {
        $this->subordinatesNr = $number;
    }

    public function removeSubordinate(Employment $employee)
    {
        $subordinatesArray = $this->subordinates;

        /**
         * @var$subordinateKey
         * @var Employment $curentSubordinate
         */
        foreach ($subordinatesArray as $subordinateKey => $curentSubordinate) {
            if ($employee === $curentSubordinate) {
                unset($subordinatesArray[$subordinateKey]);
            }
        }
        $this->setSubordinates($subordinatesArray);
    }

}