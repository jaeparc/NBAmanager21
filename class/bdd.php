<?php
try{
    $bdd = new PDO('mysql:host=mysql-jaeparc.alwaysdata.net; dbname=jaeparc_nbamanager21; charset=utf8', 'jaeparc', 'Theo200901');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}