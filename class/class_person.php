<?php

    class person{
        private $_bdd;
        private $_id;
        private $_nom;
        private $_age;
        private $_wage;
        private $_contractyear;
        private $_team;

        public function __construct($bdd)
        {  
            $this->_bdd = $bdd;
        }

        public function getId(){
            return $this->_id;
        }
        public function getNom(){
            return $this->_nom;
        }
        public function getAge(){
            return $this->_age;
        }
        public function getWage(){
            return $this->_age;
        }
        public function getContractYear(){
            return $this->_contractyear;
        }
        public function getTeam(){
            return $this->_team;
        }

        public function setId($newId){
            $this->_id = $newId;
        }
        public function setNom($newNom){
            $this->_nom = $newNom;
        }
        public function setAge($newAge){
            $this->_age = $newAge;
        }
        public function setWage($newWage){
            $this->_wage = $newWage;
        }
        public function setContractYear($newContractYear){
            $this->_contractyear = $newContractYear;
        }
        public function setTeam($newTeam){
            $this->_team = $newTeam;
        }

        public function loadDataPerson(){
            $rawData = $this->_bdd->query('SELECT * FROM person WHERE "id_person" = '.$this->_id);
            $cleanData = $rawData->fetch();
            $this->_id = $cleanData['id_person'];
            $this->_nom = $cleanData['nom_person'];
            $this->_age = $cleanData['age'];
            $this->_wage = $cleanData['wage'];
            $this->_contractyear = $cleanData['contract_year'];
            $this->_team = new team($this->_bdd);
            $this->_team->setId($cleanData['id_team']);
            $this->_team->loadDataTeam(); 
        }
    }

?>