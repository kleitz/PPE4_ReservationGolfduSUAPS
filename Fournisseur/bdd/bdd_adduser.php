<?php
    
    include("bdd_pdo.php");

    $sql_adduser = "INSERT INTO utilisateur (identifiant, motdepasse) VALUES('$identifiant','$mdp_crypte')";
    
    $resultat_sql = $db->query($sql_adduser);
    
    

    $db = null;




?>
