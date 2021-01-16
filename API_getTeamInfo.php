<?php
    $bdd = new PDO('mysql:host=localhost; dbname=nbamanager21; charset=utf8', 'root', '');
    $reqInfo = $bdd->query("SELECT * FROM team WHERE id_team = ".$_GET['var']."");
    $data = $reqInfo->fetch();
    echo json_encode($data['ville']." ".$data['nom']);
?>