<?php
    session_start();
    require('class/class_game.php');
    require('class/bdd.php');
    $game = new game($bdd); 
    $gamesInfo = $game->getGames($_SESSION['id_logged']);
    if(!empty($gamesInfo)){
        for($j = 0; $j < count($gamesInfo); $j++){
            if(isset($_POST[''.$gamesInfo[$j]['id_game'].''])){

            }
        }
    }
?>

<!DOCTYPE html>
<html>

<head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" href="img/icone.png" />
    <title>NBA Manager 21</title>
</head>

<body style="background-image: url('img/background.jpg');background-attachment: fixed;background-position: center center;">
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <div class="white container z-depth-3" style="margin-top:2%;margin-bottom:2%;padding-top : 2%; padding-bottom : 2%;">
        <div class="container">
            <h1 class="center-align"><b>NBA Manager 21</b></h1>
            <div class='row'>
                <div class="col s12 center-align">
                    <a class="waves-effect waves-light btn" href="newgame.php">Créer une partie</a>
                </div>
            </div>
            <?php if(!empty($gamesInfo)){ ?>
            <table class="responsive-table centered striped">
                <thead>
                    <tr>
                        <th>Franchise</th>
                        <th>Date de création</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        for($i = 0; $i < count($gamesInfo); $i++){
                            echo "
                            <tr>
                                <td>".$gamesInfo[$i]['team']."</td>
                                <td>".$gamesInfo[$i]['dateGame']."</td>
                                <td>
                                    <form method='post' action=''>
                                        <button class='btn waves-effect waves-light' type='submit' name='".$gamesInfo[$i]['id_game']."'>
                                            Jouer
                                        </button>
                                    </form>
                                </td>
                            </tr>";
                        }
                    ?>
                </tbody>
            </table>
            <?php } ?>
        </div>
    </div>
</body>

</html>