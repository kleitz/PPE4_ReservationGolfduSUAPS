<?php


if ((isset($_POST['mot_de_passe'])) && (isset($_POST['pseudo']))) {
    $mdp = $_POST['mot_de_passe'];
    $pseudo = $_POST['pseudo'];
}
require '../bdd/bdd_connexion.php';
$res = verif_mdp($pseudo, $mdp);

if ($res == 0) {
    header("Location: http://localhost/Git/PPE4_ReservationGolfduSUAPS/ReservationGolf/vue/reservation.php?con=$res&pseudo=$pseudo");
    exit();
}
