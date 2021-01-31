<?php
    class team{
        private $_id;
        private $_abreviation;
        private $_nom;
        private $_city;
        private $_gym;
        private $_staffsalary;
        private $_salarycap;
        private $_idgame;
        private $_idgamefav;
        private $_iddivision;
        private $_bdd;

        public function __construct(
            $id,$abreviation,$nom,$city,$gym,$staffsalary,$salarycap,
            $idgame,$idgamefav,$iddivision,$bdd
        )
        {
            $this->_id = $id;
            $this->_abreviation = $abreviation;
            $this->_nom = $nom;
            $this->_city = $city;
            $this->_gym = $gym;
            $this->_staffsalary = $staffsalary;
            $this->_salarycap = $salarycap;
            $this->_idgame = $idgame;
            $this->_idgamefav = $idgamefav;
            $this->_iddivision = $iddivision;
            $this->_bdd = $bdd;
        }

        public function loadDataTeam(){
            $rawData = $this->_bdd->query('SELECT * FROM team WHERE "id_team" = '.$this->_id);
            $cleanData = $rawData->fetch();
            $this->_abreviation = $cleanData['abreviation'];
            $this->_nom = $cleanData['name_team'];
            $this->_city = $cleanData['city'];
            $this->_gym = $cleanData['gym'];
            $this->_staffsalary = $cleanData['staffsalary'];
            $this->_salarycap = $cleanData['salarycap'];
            $this->_idgame = $cleanData['idgame'];
            $this->_idgamefav = $cleanData['idgamefav'];
            $this->_iddivision = $cleanData['iddivision'];
        }

        public function getId(){
            return $this->_id;
        }
        public function getAbreviation(){
            return $this->_abreviation;
        }
        public function getNom(){
            return $this->_nom;
        }
        public function getCity(){
            return $this->_city;
        }
        public function getGym(){
            return $this->_gym;
        }
        public function getStaffsalary(){
            return $this->_staffsalary;
        }
        public function getSalarycap(){
            return $this->_salarycap;
        }
        public function getIdGame(){
            return $this->_idgame;
        }
        public function getIdGameFav(){
            return $this->_idgamefav;
        }
        public function getIdDivision(){
            return $this->_iddivision;
        }
    }
?>