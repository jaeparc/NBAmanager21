<?php
    class team{
        private $_id;
        private $_nom;
        private $_city;
        private $_gym;
        private $_staffsalary;
        private $_salarycap;
        private $_game;
        private $_fav;
        private $_division;
        private $_bdd;

        public function __construct($bdd){
            $this->_bdd = $bdd;
        }

        public function loadDataTeam(){
            $rawData = $this->_bdd->query('SELECT * FROM team WHERE `id_team` = '.$this->_id);
            $cleanData = $rawData->fetch();
            $this->_id = $cleanData['id_team'];
            $this->_nom = $cleanData['name_team'];
            $this->_city = $cleanData['city'];
            $this->_gym = $cleanData['gym'];
            $this->_staffsalary = $cleanData['staffsalary'];
            $this->_salarycap = $cleanData['salarycap'];
            $this->_fav = $cleanData['id_game_fav'];
            $this->_game = new game($this->_bdd);
            $this->_game->setId($cleanData['id_game']);
            $this->_game->loadDataGame();
            $this->_division = new division($this->_bdd);
            $this->_division->setId($cleanData['iddivision']);
            $this->_division->loadDataDivision();
        }

        public function loadDataTeamFav(){
            $rawData = $this->_bdd->query('SELECT * FROM team WHERE `id_game_fav` = '.$this->_game->getId());
            $cleanData = $rawData->fetch();
            $this->_id = $cleanData['id_team'];
            $this->_nom = $cleanData['name_team'];
            $this->_city = $cleanData['city'];
            $this->_gym = $cleanData['gym'];
            $this->_staffsalary = $cleanData['staffsalary'];
            $this->_salarycap = $cleanData['salarycap'];
            $this->_fav = $cleanData['id_game_fav'];
            $this->_game = new game($this->_bdd);
            $this->_game->setId($cleanData['id_game']);
            $this->_game->loadDataGame();
            $this->_division = new division($this->_bdd);
            $this->_division->setId($cleanData['iddivision']);
            $this->_division->loadDataDivision();
        }

        public function getId(){
            return $this->_id;
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
        public function getStaffSalary(){
            return $this->_staffsalary;
        }
        public function getSalarycap(){
            return $this->_salarycap;
        }
        public function getFav(){
            return $this->_fav;
        }
        public function getGame(){
            return $this->_game;
        }
        public function getDivision(){
            return $this->_division;
        }

        public function setId($newId){
            $this->_id = $newId;
        }
        public function setNom($newNom){
            $this->_nom = $newNom;
        }
        public function setCity($newCity){
            $this->_city = $newCity;
        }
        public function setGym($newGym){
            $this->_gym = $newGym;
        }
        public function setStaffSalary($newStaffSalary){
            $this->_staffsalary = $newStaffSalary;
        }
        public function setSalaryCap($newSalaryCap){
            $this->_salarycap = $newSalaryCap;
        }
        public function setFav($newFav){
            $this->_fav = $newFav;
        }
        public function setGame($newGame){
            $this->_game = $newGame;
        }
        public function setDivision($newDivision){
            $this->_division = $newDivision;
        }
    
    }
?>