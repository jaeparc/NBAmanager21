<?php

    function logIn($mail,$password,$bdd){
        $login = new user($bdd);
        $messageLogin = $login->verifUser($mail,$password);
        if($messageLogin == "ok"){
            $_SESSION['userLogged'] = $login->getId();
            header('Location:choosegame.php');
            return $messageLogin;
        } else {
            return $messageLogin;
        }
    }

?>