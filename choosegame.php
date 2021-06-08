<?php
    session_start();
    include 'class/class_user.php';
    include 'class/class_game.php';
    include 'class/class_team.php';
    include 'class/bdd.php';
    include 'function/function_displayGames.php';
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
            <table class="responsive-table centered striped">
                <thead>
                    <tr>
                        <th>Date de création</th>
                        <th>Equipe choisie</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        displayGames($bdd,$_SESSION['userLogged']);
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>