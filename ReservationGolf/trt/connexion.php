<?php
require '../bdd/bdd_connexion.php';

if ((isset($_POST['mot_de_passe'])) && (isset($_POST['pseudo']))) {
    $mdp = $_POST['mot_de_passe'];
    $pseudo = $_POST['pseudo'];
}

$res = verif_mdp($pseudo, $mdp);
if($res == 0){
    echo $pseudo." est connecté";
    header('Location : http://localhost/Git/PPE4_ReservationGolfduSUAPS/ReservationGolf/vue/reservation.php');
}else if($res == 1){
    echo "Mot de passe incorrect";
}else if ($res == 2){
    echo "Utilisateur inconnu";
}



