<?php
function displayGames($bdd,$idUserLogged){
    $userLogged = new user($bdd);
    $userLogged->setId($idUserLogged);
    $userLogged->loadDataUser();
    $rawCount = $bdd->query("SELECT COUNT(*) FROM `game` WHERE `id_user` = ".$userLogged->getId());
    $count = $rawCount->fetch();
    for($i = 0; $i < $count['COUNT(*)']; $i++){
        if(isset($_POST['deleteGame'.$i])){
            $gameToDelete = new game($bdd);
            $gameToDelete->setId($_POST['id_game']);
            $gameToDelete->delete();
        }
    }
    $rawId = $bdd->query("SELECT `id_game` FROM `game` WHERE `id_user` = ".$userLogged->getId()." ORDER BY `date_game` DESC");
    $i = 0;
    while($pureId = $rawId->fetch()){
        ${"game".$i} = new game($bdd);
        ${"game".$i}->setId($pureId['id_game']);
        ${"game".$i}->loadDataGame();
        $teamFav = new team($bdd);
        $teamFav->setGame(${"game".$i});
        $teamFav->loadDataTeamFav();
        echo "<tr>
            <td>".${"game".$i}->getDate()."</td>
            <td>".$teamFav->getCity()." ".$teamFav->getNom()."</td>
            <td>
                <form method='POST' action=''>
                    <input type='hidden' name='id_game' value='".${"game".$i}->getId()."'>
                    <input type='submit' name='deleteGame".$i."' value='Supprimer'>
                </form>
            </td>
        </tr>";
        $i++;
    }
}

?>