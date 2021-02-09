<?php
    class user{
        private $_bdd;
        private $_iduser;
        private $_mail;
        private $_password;
        private $_pseudo;
        private $_prenom;
        private $_nom;

        public function __construct($bdd)
        {
            $this->_bdd = $bdd;
        }

        public function getId(){
            return $this->_iduser;
        }

        public function getMail(){
            return $this->_mail;
        }

        public function getPassword(){
            return $this->_password;
        }

        public function getPseudo(){
            return $this->_pseudo;
        }

        public function getPrenom(){
            return $this->_prenom;
        }

        public function getNom(){
            return $this->_nom;
        }

        public function setId($newId){
            $this->_iduser = $newId;
        }

        public function setMail($newMail){
            $this->_mail = $newMail;
        }

        public function setPassword($newPassword){
            $this->_password = $newPassword;
        }

        public function setPseudo($newPseudo){
            $this->_pseudo = $newPseudo;
        }

        public function setPrenom($newPrenom){
            $this->_prenom = $newPrenom;
        }

        public function setNom($newNom){
            $this->_nom = $newNom;
        }

        public function loadDataUser(){
            $reqUser = $this->_bdd->prepare("SELECT * FROM user WHERE 'id_user' = ?");
            $reqUser->execute(array($this->_iduser));
            $userExist = $reqUser->rowCount();
            $userInfo = $reqUser->fetch();
            if ($userExist != 0) {
                $this->_iduser = $userInfo['id_user'];
                $this->_mail = $userInfo['mail'];
                $this->_password = $userInfo['password'];
                $this->_pseudo = $userInfo['pseudo'];
                $this->_prenom = $userInfo['prenom'];
                $this->_nom = $userInfo['nom'];
            }
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
                        $this->_iduser = $userInfo['id_user'];
                        $this->_mail = $userInfo['mail'];
                        $this->_password = $userInfo['password'];
                        $this->_pseudo = $userInfo['pseudo'];
                        $this->_prenom = $userInfo['prenom'];
                        $this->_nom = $userInfo['nom'];
                        return "ok";
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
                    $reqUser = $this->_bdd->prepare("SELECT * FROM user WHERE mail = ? AND password = ?");
                    $reqUser->execute(array($mail, $password));
                    $userExist = $reqUser->rowCount();
                    if($userExist == 0){
                        $this->_bdd->query("INSERT INTO `user` (`id_user`, `pseudo`, `mail`, `password`, `prenom`, `nom`) VALUES (NULL, '".$pseudo."', '".$mail."', '".$password."','".$prenom."', '".$nom."')");
                        return "<h6 class='green-text'><i>Inscrit!</i></h6>";
                    } else {
                        return "<h6 class='red-text'><i>Adresse mail déjà utilisée</i></h6>";
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
    }

?>