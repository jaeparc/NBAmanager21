<?php
    session_start();
    include 'class/bdd.php';
    include 'class/class_user.php';
    include 'function/function_login.php';
    include 'function/function_signin.php';

    if(isset($_POST['subLogin'])){ //Actions quand l'utilisateur soumet le formulaire de connexion
        $messageLogin = logIn($_POST['emailLogin'],$_POST['passwordLogin'],$bdd);
        $signinDisplay = false;
    }
    if(isset($_POST['subSignin'])){ //Actions quand l'utilisateur soumet le formulaire d'inscription
        $messageSignin = signIn($_POST['emailSignin'],$_POST['passwordSignin'],$_POST['pseudoSignin'],$_POST['first_name'],$_POST['last_name'],$bdd);
        if($messageSignin != "<h6 class='green-text'><i>Inscrit!</i></h6>"){
            $signinDisplay = true;
        } else {
            $signinDisplay = false;
            $messageLogin = $messageSignin;
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
            <?php if(!isset($signinDisplay) || $signinDisplay != true){ //Si l'utilisateur ne vient pas de soumettre de formulaire d'inscription
                echo "<div class='row' id='login'>";
            }
            else{ //Si l'utilisateur vient de soumettre un formulaire d'inscription
                echo "<div class='row' id='login' style='display:none'>";
            }
            ?>
                <h5 class="center-align"><i>Se connecter</i></h5>
                <form method="POST" action="">
                    <div class="row" style="margin-top:5%;">
                        <?php 
                        if(isset($messageLogin)){ //Affichage d'un message d'erreur pour le formulaire de connexion si erreur il y a
                            echo $messageLogin;
                        } ?>
                        <div class="input-field col s8 offset-s2">
                            <input id="emailLogin" name="emailLogin" type="text" class="validate">
                            <label for="emailLogin">Adresse mail</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s8 offset-s2">
                            <input id="passwordLogin" name="passwordLogin" type="password" class="validate">
                            <label for="passwordLogin">Mot de passe</label>
                        </div>
                    </div>
                    <div class="row">
                        <a href="#" onclick="displaySignin()">S'inscrire</a>
                        <div class="right-align">
                            <button class="btn waves-effect waves-light" type="submit" name="subLogin">Se connecter
                                <i class="material-icons right">send</i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <?php if(isset($signinDisplay) && $signinDisplay == true){ //Si l'utilisateur vient de soumettre un formulaire d'inscription
                echo "<div class='row' id='signin'>";
            }
            else{ //Si l'utilisateur ne vient pas de soumettre un formulaire d'inscription
                echo "<div class='row' id='signin' style='display:none'>";
            }
            ?>
                <h5 class="center-align"><i>S'inscrire</i></h5>
                <form method="POST" action="">
                    <div class="row" style="margin-top:5%;">
                        <?php 
                        if(isset($messageSignin)){ //Affichage d'un message d'erreur pour le formulaire d'inscription si erreur il y a
                            echo $messageSignin;
                        } ?>
                        <div class="input-field col s8 offset-s2">
                            <input id="emailSignin" name="emailSignin" type="text" class="validate">
                            <label for="emailSignin">Adresse mail</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s8 offset-s2">
                            <input id="passwordSignin" name="passwordSignin" type="password" class="validate">
                            <label for="passwordSignin">Mot de passe</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s8 offset-s2">
                            <input id="pseudoSignin" name="pseudoSignin" type="text" class="validate">
                            <label for="pseudoSignin">Pseudo</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col m4 s8 offset-s2 offset-m2">
                            <input id="first_name" name="first_name" type="text" class="validate">
                            <label for="first_name">Prénom</label>
                        </div>
                        <div class="input-field col m4 s8 offset-s2">
                            <input id="last_name" name="last_name" type="text" class="validate">
                            <label for="last_name">Nom</label>
                        </div>
                    </div>
                    <div class="row">
                        <a href="#" onclick="displayLogin()">Se connecter</a>
                        <div class="right-align">
                            <button class="btn waves-effect waves-light" type="submit" name="subSignin">S'inscrire
                                <i class="material-icons right">send</i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>


<script type="text/javascript">
    function displaySignin() { //Fonction permettant l'affichage du formulaire d'inscription
        var formSignin = document.getElementById("signin");
        var formLogin = document.getElementById("login");
        formSignin.style.display = "block";
        formLogin.style.display = "none";
    }

    function displayLogin() { //Fonction permettant l'affichage du formulaire de connexion
        var formSignin = document.getElementById("signin");
        var formLogin = document.getElementById("login");
        formSignin.style.display = "none";
        formLogin.style.display = "block";
    }
</script>