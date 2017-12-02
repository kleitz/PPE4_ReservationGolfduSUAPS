<?php
    $identifiant_ok= false;
    $mdp1_ok = false;
    $mdp2_ok = false;

    if(!empty($_POST['identifiant'])){
        $identifiant=trim($_POST['identifiant']);
        if(strlen($identifiant)<8){
             header("Location: http://localhost/stage/Fournisseur/vue/inscription.php?erreur=2");
        }else{
            include("../bdd/bdd_fonctions.php");
            if(presence_identifiant($identifiant)!= 0){
                 header("Location: http://localhost/stage/Fournisseur/vue/inscription.php?erreur=5");
            }else{
                $identifiant_ok = true;
            }
        }
    }else{
        $identifiant='';
        header("Location: http://localhost/stage/Fournisseur/vue/inscription.php?erreur=1");
    }

     if(!empty($_POST['mdp1'])){
        $mdp1=$_POST['mdp1'];
        if(strlen($mdp1)<8){
             header("Location: http://localhost/stage/Fournisseur/vue/inscription.php?erreur=3");
        }else{
            $mdp1_ok = true;
        }
    }else{
        $mdp1='';
        header("Location: http://localhost/stage/Fournisseur/vue/inscription.php?erreur=1");
    }

     if(!empty($_POST['mdp2'])){
        $mdp2=$_POST['mdp2'];
        if($mdp1 != $mdp2){
             header("Location: http://localhost/stage/Fournisseur/vue/inscription.php?erreur=4");
        }else{
            $mdp2_ok = true;
        }
    }else{
        $mdp2='';
        header("Location: http://localhost/stage/Fournisseur/vue/inscription.php?erreur=1");
    }

    
    if(($identifiant_ok == true) && ($mdp1_ok == true) && ($mdp2_ok == true)){
        $mdp_crypte = password_hash($mdp1, PASSWORD_BCRYPT);
        include("../bdd/bdd_adduser.php");
        header("Location: http://localhost/stage/Fournisseur/vue/inscription.php?adduser=ok");
    }


?>
