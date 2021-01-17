<?php
    class user{
        private $_bdd;

        public function __construct($bdd)
        {
            $this->_bdd = $bdd;
        }

        public function verifUser($mail, $password) 
        {
            if (!empty($password) && !empty($mail)) {
                if(filter_var($mail, FILTER_VALIDATE_EMAIL)){
                    $reqUser = $this->_bdd->prepare("SELECT * FROM user WHERE mail = ? AND password = ?");
                    $reqUser->execute(array($mail, $password));
                    $userExist = $reqUser->rowCount();
                    $userInfo = $reqUser->fetch();
                    if ($userExist != 0) {
                        $_SESSION['id_logged'] = $userInfo['id_user'];
                        header('Location:choosegame.php');
                        return "<h6 class='green-text'><i>Connecté ".$_SESSION['id_logged']."</i></h6>";
                    }else{
                        return "<h6 class='red-text'><i>Mail ou mot de passe incorrect</i></h6>";
                    }
                }   
                else{
                    return "<h6 class='red-text'><i>Adresse mail non valide</i></h6>";
                }
            }
            else{
                return "<h6 class='red-text'><i>Un des champs est vide</i></h6>";
            }
        }

        public function signUser($mail,$password,$pseudo,$prenom,$nom){ 
            if(!empty($mail) && !empty($password) && !empty($pseudo) &&!empty($nom) && !empty($prenom)){
                if(filter_var($mail, FILTER_VALIDATE_EMAIL)){
                    $reqUser = $this->_bdd->query("INSERT INTO `user` (`id_user`, `mail`, `password`, `pseudo`, `prenom`, `nom`) VALUES (NULL, '".$mail."', '".$password."', '".$pseudo."','".$prenom."', '".$nom."')");
                    return "<h6 class='green-text'><i>Inscrit!</i></h6>";
                }
                else{
                    return "<h6 class='red-text'><i>Adresse mail non valide</i></h6>";
                }
            }
            else{
                return "<h6 class='red-text'><i>Un des champs est vide</i></h6>";
            }
        }
    }

?>