<?php

session_start();
$identifiant = $_SESSION['identifiant'];
$offre_ok = false;
$tarif_ok = false;

if (isset($_POST['offre'])) {
    $offre = $_POST['offre'];
    $offre_ok = true;
} else {
    header("Location: http://localhost/stage/fournisseur/vue/frm/board.php?erreur=3");
}

if (isset($_POST['tarif'])) {
    $tarif = $_POST['tarif'];
    if (!is_numeric($tarif)) {
        header("Location: http://localhost/stage/fournisseur/vue/frm/plateforme.php?erreur=1");
    } else {
        $tarif_ok = true;
    }
} else {
    header("Location: http://localhost/stage/fournisseur/vue/frm/plateforme.php?erreur=2");
}


if (isset($_POST['description'])) {
    $description = $_POST['description'];
} else {
    $description = "";
}

if (isset($_POST['commentaire'])) {
    $commentaire = $_POST['commentaire'];
} else {
    $commentaire = "";
}

if (($offre_ok == true) && ($tarif_ok == true)) {
    include("../bdd/bdd_addoffre.php");
    echo $sql_addoffre;
    header("Location: http://localhost/stage/fournisseur/vue/plateforme.php?ajout=ok");
}
?>