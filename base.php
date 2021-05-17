<?php
    session_start();
    $bdd = new PDO('mysql:host=localhost; dbname=nbamanager21; charset=utf8', 'root', '');
    $reqGame = $bdd->query('SELECT MAX(id_game) FROM game');
    $id = $reqGame->fetch();
    $result = $id[0] + 1;
    echo $result;
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
        </div>
    </div>
</body>

</html>