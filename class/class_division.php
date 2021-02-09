<?php
    class division{
        private $_bdd;
        private $_id;
        private $_nom;
        private $_conference;

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
        public function getConference(){
            return $this->_conference;
        }

        public function setId($newId){
            $this->_id = $newId;
        }
        public function setNom($newNom){
            $this->_nom = $newNom;
        }
        public function setConference($newConference){
            $this->_conference = $newConference;
        }

        public function loadDataDivision(){
            $rawData = $this->_bdd->query('SELECT * FROM division WHERE "id_division" = '.$this->_id);
            $cleanData = $rawData->fetch();
            $rawConf = $this->_bdd->query('SELECT * FROM conference WHERE "id_conference" = '.$this->_conference);
            $cleanConf = $rawConf->fetch();
            $this->_id = $cleanData['id_division'];
            $this->_nom = $cleanData['nom_division'];
            $this->_conference = $cleanConf['nom_conference'];
        }
    }
?>