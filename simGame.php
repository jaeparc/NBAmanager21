<?php
    session_start();
    require('class/bdd.php');
    require('class/class_match.php');
    require('class/class_team.php');
    if(isset($_POST['simuler'])){
        $teamDom = new team(1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,$bdd);
        $teamExt = new team(2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,$bdd);
        $teamDom->loadDataTeam();
        $teamExt->loadDataTeam();
        $nomTeamDom = $teamDom->getCity().' '.$teamDom->getNom(); 
        $nomTeamExt = $teamExt->getCity().' '.$teamExt->getNom(); 
        $match = new matches($teamDom,$teamExt,$bdd);
    }
?>

<!DOCTYPE html>
<html>

<head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" href="img/icone.png" />
    <script type = "text/javascript" src = "https://code.jquery.com/jquery-2.1.1.min.js"></script>    
    <title>NBA Manager 21</title>
</head>

<body style="background-image: url('img/background.jpg');background-attachment: fixed;background-position: center center;">
    <div class="white container z-depth-3" style="margin-top:2%;margin-bottom:2%;padding-top : 2%; padding-bottom : 2%;">
        <div class="container">
            <h1 class="center-align"><b>NBA Manager 21</b></h1>
        </div>
    </div>
    <div class="row">
        <form action="" method="post">
            <input name="simuler" value="Simuler!" type="submit">
        </form>
    </div>
    <script type="text/javascript" src="js/materialize.min.js"></script>
</body>

</html>