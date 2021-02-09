<?php
function displayGames($bdd,$userLogged){
    $rawCount = $bdd->query("SELECT COUNT(*) FROM `game` WHERE `id_user` = ".$userLogged->getId());
    $count = $rawCount->fetch();
    for($i = 0; $i < $count[0]; $i++){
        if(isset($_POST['deleteGame'.$i])){
            $_POST['game']->delete();
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
        $teamFav->loadDataTeam("fav");
        echo "<tr>
            <td>".$teamFav->getCity()." ".$teamFav->getNom()."</td>
            <td>".${"game".$i}->getDate()."</td>
            <td>
                <form method='POST' action=''>
                    <input type='hidden' name='game' value='".${"game".$i}."'>
                    <input type='submit' name='deleteGame".$i."' value='Supprimer'>
                </form>
            </td>
        </tr>";
        $i++;
    }
}

?>