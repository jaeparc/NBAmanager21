<?php
    class matches{
        private $_id;
        private $_date;
        private $_score;
        private $_teamDom;
        private $_teamExt;
        private $_bdd;

        public function __construct($bdd)
        {
            $this->_bdd = $bdd;
        }

        public function getId(){
            return $this->_id;
        }
        public function getDate(){
            return $this->_date;
        }
        public function getScore(){
            return $this->_score;
        }
        public function getTeamDom(){
            return $this->_teamDom;
        }
        public function getTeamExt(){
            return $this->_teamExt;
        }

        public function setId($newId){
            $this->_id = $newId;
        }
        public function setDate($newDate){
            $this->_date = $newDate;
        }
        public function setScore($newScore){
            $this->_score = $newScore;
        }
        public function setTeamDom($newTeamDom){
            $this->_teamDom = $newTeamDom;
        }
        public function setTeamExt($newTeamExt){
            $this->_teamExt = $newTeamExt;
        }

        public function loadDataMatch(){
            $rawData = $this->_bdd->query('SELECT * FROM MATCH WHERE "id_match" = '.$this->_id);
            $cleanData = $rawData->fetch();
            $this->_id = $cleanData['id_match'];
            $this->_date = $cleanData['date_match'];
            $this->_score = $cleanData['score'];
            $this->_teamDom = new team($this->_bdd);
            $this->_teamDom->setId($cleanData['id_team_dom']);
            $this->_teamDom->loadDataTeam();
            $this->_teamExt = new team($this->_bdd);
            $this->_teamExt->setId($cleanData['id_team_ext']);
            $this->_teamExt->loadDataTeam();
        }
}

?>
