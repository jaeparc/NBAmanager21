<?php

    function logIn($mail,$password,$bdd){
        $login = new user($bdd);
        $messageLogin = $login->verifUser($mail,$password);
        if($messageLogin == "ok"){
            $_SESSION['userLogged'] = $login;
            $messageLogin = $login->getPseudo();
            return $messageLogin;
            //header('Location:choosegame.php');
        } else {
            return $messageLogin;
        }
    }

?>