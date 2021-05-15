<?php

    class medic{
        private $_bdd;
        private $_id;
        private $_skill;
        private $_person;
        private $_game;

        public function __construct($bdd)
        {
            $this->_bdd = $bdd;
        }

        public function getId(){
            return $this->_id;
        }
        public function getSkill(){
            return $this->_skill;
        }
        public function getPerson(){
            return $this->_person;
        }
        public function getGame(){
            return $this->_game;
        }

        public function setId($newId){
            $this->_id = $newId;
        }
        public function setSkill($newSkill){
            $this->_skill = $newSkill;
        }
        public function setPerson($newPerson){
            $this->_person = $newPerson;
        }
        public function setGame($newGame){
            $this->_game = $newGame;
        }

        public function loadDataMedic(){
            $rawData = $this->_bdd->query('SELECT * FROM MEDIC WHERE "id_medic" = '.$this->_id);
            $cleanData = $rawData->fetch();
            $this->_id = $cleanData['id_medic'];
            $this->_skill = $cleanData['skill'];
            $this->_person = new person($this->_bdd);
            $this->_person->setId($cleanData['id_person']);
            $this->_person->loadDataPerson();
            $this->_game = new game($this->_bdd);
            $this->_game->setId($cleanData['id_game']);
        }
    }

?>
