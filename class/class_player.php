<?php

    class player{
        private $_bdd;
        private $_id;
        private $_numJersey;
        private $_position;
        private $_atk;
        private $_def;
        private $_hurt;
        private $_person;
        private $_game;

        public function __construct($bdd)
        {
            $this->_bdd = $bdd;
        }

        public function getId(){
            return $this->_id;
        }
        public function getNumJersey(){
            return $this->_numJersey;
        }
        public function getPosition(){
            return $this->_position;
        }
        public function getAtk(){
            return $this->_Atk;
        }
        public function getDef(){
            return $this->_def;
        }
        public function getHurt(){
            return $this->_hurt;
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
        public function setNumJersey($newNumJersey){
            $this->_numJersey = $newNumJersey;
        }
        public function setPosition($newPosition){
            $this->_position = $newPosition;
        }
        public function setAtk($newAtk){
            $this->_atk = $newAtk;
        }
        public function setDef($newDef){
            $this->_def = $newDef;
        }
        public function setHurt($newHurt){
            $this->_hurt = $newHurt;
        }
        public function setPerson($newPerson){
            $this->_person = $newPerson;
        }
        public function setGame($newGame){
            $this->_game = $newGame;
        }

        public function loadDataPlayer(){
            $rawData = $this->_bdd->query('SELECT * FROM player WHERE "id_player" = '.$this->_id);
            $cleanData = $rawData->fetch();
            $this->_id = $cleanData['id_player'];
            $this->_numJersey = $cleanData['num_jersey'];
            $this->_position = $cleanData['position'];
            $this->_atk = $cleanData['player_atk'];
            $this->_def = $cleanData['player_def'];
            $this->_hurt = $cleanData['hurt'];
            $this->_person = new person($this->bdd);
            $this->_person->setId($cleanData['id_person']);
            $this->_person->loadDataPerson();
            $this->_game = new game($this->_bdd);
            $this->_game->setId($cleanData['id_game']);
            $this->_game->loadDataGame();
        }
    }

?>