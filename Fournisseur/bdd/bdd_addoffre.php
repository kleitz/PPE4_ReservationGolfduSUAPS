<?php

include("bdd_pdo.php");

$sql_addoffre = "INSERT INTO offre (libelleOffre, tarif, descriptionOffre, utilisateur,commentaire, dateheure) VALUES('$offre','$tarif','$description','$identifiant','$commentaire', NOW())";

$resultat_sql = $db->query($sql_addoffre);

$db = null;

