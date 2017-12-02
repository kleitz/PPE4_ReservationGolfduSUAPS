<?php


    $identifiant = $_SESSION['identifiant'];
    try {
        $db = new PDO('mysql:host=localhost;dbname=stage', 'root', '');
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    } catch (Exception $e) {
        echo 'Impossible de se connecter à la base de données';
        echo $e->getMessage();
        die();
    }

    $sql_req = "DELETE FROM `stage`.`offre` WHERE `offre`.`idOffre` = $id";

    $res_sql = $db->query($sql_req);
   

