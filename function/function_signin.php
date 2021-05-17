<?php

    function signIn($mail,$password,$pseudo,$prenom,$nom,$bdd){
        $signin = new user($bdd);
        $messageSignin = $signin->signUser($mail,$password,$pseudo,$prenom,$nom);
        return $messageSignin;
    }

?>