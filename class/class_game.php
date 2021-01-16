<?php
    class game{
        private $_bdd;

        public function __construct($bdd)
        {  
            $this->_bdd = $bdd;
        }

        public function getGames($id){
            $reqGames = $this->_bdd->query('SELECT * FROM `assoc_user-game` WHERE id_user = '.$id.'');
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
            return $games;
        }

        public function newGame($iduser,$idteam){
            $date = date("Y-m-d");
            $this->_bdd->query('INSERT INTO `game`(`id_game`, `date`) VALUES (NULL,"'.$date.'")');
            $reqGame = $this->_bdd->query('SELECT MAX(id_game) FROM game');
            $id = $reqGame->fetch();
            $this->_bdd->query('INSERT INTO `assoc_user-game` (`id_user`,`id_game`,`id_team`) VALUES ("'.$iduser.'", "'.$id['MAX(id_game)'].'","'.$idteam.'")');
            header('Location:choosegame.php');
        }
    }
?>