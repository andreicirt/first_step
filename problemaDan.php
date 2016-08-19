<?php
require_once ('mysqldatabase.php');

//if(isset($database)){echo"true";} else {echo "false";}
//echo "<br/>";
//echo "is this working?";

// Include database class
//include 'database.class.php';

// Define configuration
//define("DB_HOST", "localhost");
//define("DB_USER", "root");
//define("DB_PASS", "");
//define("DB_NAME", "problemaphpdd");

// Set options
//$options = array(
//    PDO::ATTR_PERSISTENT => true,
//    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
//);

// Instantiate database.
//$database = new Database();



//Test if connection occured.
//?>
<?php
//if(mysqli_connect_errno()) {
//    die("Database connection failed: " .
//        mysqli_connect_error() .
//        " (" . mysqli_connect_errno() . ")"
//    );
////    ?>
<!--    --><?php


    class Angajat
    {
        protected $name;
        protected $age;
        protected $numeEchipa;

        public function setName($nume)
        {
            $this->name = $nume;

        }

        public function getName()
        {
            return $this->name;
        }

        public function setVechime($vechime)
        {
            $this->age = $vechime;
        }

        public function getVechime()
        {
            return $this->age;
        }


        public function setEchipa($echipa)
        {
            $this->numeEchipa = $echipa;
        }

        public function getEchipa()
        {
            return $this->numeEchipa;
        }
    }

    class Manager extends Angajat
    {
        protected $nrSubalterni = 0;
        protected $rank;
        protected $subalterni = array();

        public function setNrSubalterni($numar)
        {
            $this->nrSubalterni = $numar;
        }

        public function getNrSubalterni()
        {
            $this->nrSubalterni;
        }

        public function setRank($rang)
        {
            $this->rank = $rang;
        }

        public function getRank()
        {
            $this->rank;
        }

        /**
         * @return mixed
         */
        public function getSubalterni()
        {
            return $this->subalterni;
        }

        /**
         * @param mixed $subalterni
         */
        public function setSubalterni($subalterni)
        {
            $this->subalterni = $subalterni;
        }

        public function addSubaltern(Angajat $angajat)
        {
            $this->subalterni[] = $angajat;
            $this->setNrSubalterni($this->getNrSubalterni() + 1);
        }

        public function removeSubaltern(Angajat $angajat)
        {
            $subalterniArray = $this->subalterni;

            /**
             * @var$subalternKey
             * @var Angajat $curentSubaltern
             */
            foreach ($subalterniArray as $subalternKey => $curentSubaltern) {
                if ($angajat === $curentSubaltern) {
                    unset($subalterniArray[$subalternKey]);
                }
            }
            $this->setSubalterni($subalterniArray);
        }
    }

    class Echipa
    {
        protected $numeEchipa;
        protected $nrMembri;
        protected $membri = array();

        public function setNumeEchipa($nume)
        {
            $this->numeEchipa = $nume;
        }

        public function getNumeEchipa()
        {
            return $this->numeEchipa;
        }

        public function setNrMembri($nr)
        {
            $this->nrMembri = $nr;
        }

        public function getNrMembri()
        {
            return $this->nrMembri = count($this->membri);
        }

        public function getMembri()
        {
            return $this->membri;
        }

        public function setMembri($membru)
        {
            $this->membri = $membru;
        }

        public function addMembri(Angajat $angajat)
        {
            $this->membri[] = $angajat;
            $this->setNrMembri($this->getNrMembri() + 1);
        }

        public function removeMembru(Angajat $angajat)
        {
            $membriArray = $this->membri;

            foreach ($membriArray as $membriKey => $curentMembru) {
                if ($angajat === $curentMembru) {
                    unset($membriArray[$membriKey]);
                }
            }
            $this->setMembri($membriArray);
        }

    }

    class Departament extends Echipa
    {
        protected $numeDep;
        protected $nrEchipe;
        protected $echipe = array();

        public function setNumeDep($dep)
        {
            $this->numeDep = $dep;
        }

        public function printNumeDep()
        {
            echo $this->numeDep;
        }

        public function setNrEchipe($echipe)
        {
            $this->nrEchipe = $echipe;
        }

        public function getNrEchipe()
        {
            return $this->nrEchipe = count($this->echipe);
        }

        public function getEchipe()
        {
            return $this->echipe;
        }

        public function setEchipe($echipe)
        {
            $this->echipe = $echipe;
        }

        public function addEchipa(Echipa $echipa)
        {
            $this->echipe[] = $echipa;
        }

        public function removeEchipa(Echipa $echipa)
        {
            $echipeArray = $this->echipe;

            foreach ($echipeArray as $echipeKey => $echipaAsta) {
                if ($echipa === $echipaAsta) {
                    unset($echipeArray[$echipeKey]);
                }
            }
            $this->setEchipe($echipeArray);
        }

    }

    $angajat4 = new Angajat();
    $angajat4->setName('Cornel');
    $angajat4->setVechime('1');

    $angajat1 = new Angajat();
    $angajat1->setName('mihai');
    $angajat1->setVechime('1');

    $angajat2 = new Angajat();
    $angajat2->setName('cristi');
    $angajat2->setVechime(2);

    $angajat3 = new Angajat();
    $angajat3->setName('Flore');
    $angajat3->setVechime(2);


    $echipa1 = new Echipa();
    $echipa1->setNumeEchipa('OM');
    $echipa1->addMembri($angajat2);
    $echipa1->addMembri($angajat3);
    $echipa1->addMembri($angajat4);


    $echipa2 = new Echipa();
    $echipa2->setNumeEchipa('DMS');
    $echipa2->addMembri($angajat1);


    $departament1 = new Departament();
    $departament1->setNumeDep('Programare');
    $departament1->addEchipa($echipa1);
    $departament1->addEchipa($echipa2);


    $manager1 = new Manager();
    $manager1->setName('vasilica');
    $manager1->setVechime(5);
    $manager1->setRank('CEO');
    $manager1->addSubaltern($angajat1);
    $manager1->addSubaltern($angajat2);
    $manager1->addSubaltern($angajat3);

//var_dump($echipa1->getNrMembri());die;

//Cate echipe contin un Departament
//Cati oameni contine o Echipa


//$departament1->removeEchipa($echipa1);

    echo "<h3>Departamentul contine urmatoarele echipe:</h3>";
    echo "<ul>";
    /* @var $curentEchipe Echipa */
    foreach ($departament1->getEchipe() as $curentEchipe) {
        echo "<li>" . $curentEchipe->getNumeEchipa() . "</br>";
        echo "<ol>";
        foreach ($curentEchipe->getMembri() as $currentMembri) {

            echo "<li>" . $currentMembri->getName() . "</li>";
        }
        echo "</ol>";
        echo "</li>";
    }
    echo "</ul>";


//echo "<h3> Echipa 1 contine urmatorii membrii : </h3>";
//echo "<ul>";
///* @var $curentMembri Angajat */
//foreach ($echipa1->getMembri() as $curentMembri) {
//    echo "<li>" .  $curentMembri->printName() . '</li>';
//}
//echo "</ul>";


    echo $departament1->getNrEchipe();


//echo "<h3>Angajatii managerului sunt:</h3>";
//echo "<ul>";
///** @var Angajat $curentSubaltern */
//foreach ($manager1->getSubalterni() as $curentSubaltern) {
//    echo "<li>" . $curentSubaltern->printName() . '</li>';
//}
//echo "</ul>";
//
//$manager1->removeSubaltern($angajat1);
//echo "<h3> dupa ce a fost sters, au mai ramas:</h3>";
//echo "<ul>";
///** @var Angajat $curentSubaltern */
//foreach ($manager1->getSubalterni() as $curentSubaltern) {
//    echo "<li>" . $curentSubaltern->printName() . '</li>';
//}
//echo "</ul>";



