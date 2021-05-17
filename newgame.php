<?php
    session_start();
    require('class/class_game.php');
    require('class/bdd.php');
    $game = new game($bdd);
    if(isset($_POST['subTeam'])){
        $game->newGame($_SESSION['userLogged'],$_POST['id_team']);
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
            <h5 class="center-align"><i>Choisissez une franchise</i></h5>
            <div class="carousel" id="demo-carousel">
                <?php
                    for($i = 1; $i <= 30; $i++){
                        echo "<a class='carousel-item' onclick='displayTeamInfo(".$i.")'><img src='img/team".$i.".png'></a>";
                    }
                ?>
            </div>
            <div class="center-align">
                <div class="row" id="nameFranchise">
                </div>
            </div>
            <div class="row" id="chooseBtn">
                <form method="post" action="" id="formButton">
                    <input type="hidden" id="id_team" name="id_team" value="">
                    <div class="col s2 offset-s5">
                        <button type="submit" class="btn waves-effect waves-light" id="subTeam" name="subTeam" style="display:none;">Choisir</button>
                    </div>  
                </form>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){$('#demo-carousel').carousel();});
    </script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
</body>

</html>

<script type="text/javascript">
    function displayTeamInfo(id){
        var franchise = document.getElementById('nameFranchise');
        var id_team = document.getElementById('id_team');
        var button = document.getElementById('subTeam');
        id_team.setAttribute('value',id);
        button.style.display = "block";
        fetch("API_getTeamInfo.php?var="+id+"").then((resp) => resp.json())
            .then(function(data) {
                franchise.innerHTML = data;
        });
    }
</script>