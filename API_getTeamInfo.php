<?php
    require('class/bdd.php');
    $reqInfo = $bdd->query("SELECT * FROM team WHERE `id_team` = ".$_GET['var']."");
    $data = $reqInfo->fetch();
    echo json_encode($data['city']." ".$data['name_team']);
?>