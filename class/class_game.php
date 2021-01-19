<?php
    class game{
        private $_bdd;

        public function __construct($bdd)
        {  
            $this->_bdd = $bdd;
        }

        public function getGames($id){
            /*$reqGames = $this->_bdd->query('SELECT * FROM `assoc_user-game` WHERE id_user = '.$id.'');
            $i = 0;
            while($assocInfo = $reqGames->fetch()){
                $reqTeam = $this->_bdd->query('SELECT * FROM team WHERE id_team = '.$assocInfo['id_team'].'');
                $teamInfo = $reqTeam->fetch();
                $reqGame = $this->_bdd->query('SELECT * FROM game WHERE id_game = '.$assocInfo['id_game'].'');
                $gameInfo = $reqGame->fetch();
                $games[$i]['team'] = $teamInfo['ville']." ".$teamInfo['nom'];
                $games[$i]['id_game'] = $assocInfo['id_game'];
                $games[$i]['dateGame'] = $gameInfo['date'];
                $i++;
            }
            return $games;*/
        }

        public function newGame($iduser,$idteam){
            $date = date("Y-m-d");
            $this->_bdd->query('INSERT INTO `game`(`id_game`, `date_game`,`id_user`) VALUES (NULL,"'.$date.'","'.$iduser.'")');
            $reqGame = $this->_bdd->query('SELECT MAX(id_game) FROM game WHERE `id_user` = '.$iduser.'');
            $id = $reqGame->fetch();
            $this->_bdd->query("LOAD DATA LOCAL INFILE 'C:\Program Files (x86)/EasyPHP-Devserver-17/eds-www/BasketManager/bdd/Team.csv' INTO TABLE `team` FIELDS TERMINATED BY ',' LINES STARTING BY '' TERMINATED BY '\n' IGNORE 1 LINES (abreviation,city,name_team,gym,id_division)");
            $this->_bdd->query("UPDATE `team` SET `id_game` = '".$id['MAX(id_game)']."',`id_game_fav` = '0'  WHERE `id_team` IN (select TOP 30 `id_team` from `team` order by `id_team` DESC)");
            header('Location:choosegame.php');
        }
    }
?>