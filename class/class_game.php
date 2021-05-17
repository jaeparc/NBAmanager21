<?php
    class game{
        private $_bdd;
        private $_id;
        private $_date;
        private $_user;

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
        public function getUser(){
            return $this->_user;
        }

        public function setId($newId){
            $this->_id = $newId;
        }
        public function setDate($newDate){
            $this->_date = $newDate;
        }
        public function setUser($newUser){
            $this->_user = $newUser;
        }

        public function loadDataGame(){
            $rawData = $this->_bdd->query('SELECT * FROM `game` WHERE `id_game` = '.$this->_id);
            $cleanData = $rawData->fetch();
            $this->_id = $cleanData['id_game'];
            $this->_date = $cleanData['date_game'];
            $this->_user = new user($this->_bdd);
            $this->_user->setId($cleanData['id_user']);
            $this->_user->loadDataUser();
        }

        public function delete(){
            $this->_bdd->query('DELETE FROM game WHERE `id_game` = '.$this->_id);
        }

        /*public function newGame($iduser,$idteam){
            $date = date("Y-m-d");
            $this->_bdd->query('INSERT INTO `game`(`id_game`, `date_game`,`id_user`) VALUES (NULL,"'.$date.'","'.$iduser.'")');
            $reqGame = $this->_bdd->query('SELECT MAX(id_game) FROM game WHERE `id_user` = '.$iduser.'');
            $id = $reqGame->fetch();
            $this->_bdd->query("LOAD DATA LOCAL INFILE 'C:\Program Files (x86)/EasyPHP-Devserver-17/eds-www/BasketManager/bdd/Team.csv' INTO TABLE `team` FIELDS TERMINATED BY ',' LINES STARTING BY '' TERMINATED BY '\n' IGNORE 1 LINES (abreviation,city,name_team,gym,id_division)");
            $this->_bdd->query("UPDATE `team` SET `id_game` = '".$id['MAX(id_game)']."',`id_game_fav` = '0'  WHERE `id_team` IN (select TOP 30 `id_team` from `team` order by `id_team` DESC)");
        }*/
        public function newGame($iduser,$idteam){
            $date = date("Y-m-d H:i:s");
            $this->_bdd->query('INSERT INTO GAME(id_game, date_game,id_user) VALUES (NULL,"'.$date.'","'.$iduser.'")');
            $reqGame = $this->_bdd->query('SELECT MAX(id_game) FROM GAME WHERE id_user = '.$iduser.'');
            $id = $reqGame->fetch();
            $this->_bdd->query("LOAD DATA LOCAL INFILE 'bdd/Team.csv' INTO TABLE TEAM FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n'");
            $this->_bdd->query("UPDATE TEAM SET id_game = '".$id['MAX(id_game)']."',id_game_fav = '0'  WHERE id_team IN (select id_team from TEAM order by id_team DESC)");
        }
    }
?>