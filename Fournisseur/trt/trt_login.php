<?php
        $champslogin_ok = false;

        if(!empty($_POST['identifiant'])){
            $identifiant = $_POST['identifiant'];
            $champslogin_ok = true;
            
        }else{
             $identifiant='';
            header("Location: http://localhost/stage/Fournisseur/vue/login.php?erreur=1");
        }

        if(!empty($_POST['motdepasse'])){
            $motdepasse = $_POST['motdepasse'];
            $champslogin_ok = true;
            
        }else{
             $motdepasse='';
            header("Location: http://localhost/stage/Fournisseur/vue/login.php?erreur=1");
        }

        if($champslogin_ok == true){
            include('../bdd/bdd_fonctions.php');
            $code_verif = verif_mdp($identifiant,$motdepasse);
            if($code_verif == "1"){
                header("Location:  http://localhost/stage/Fournisseur/vue/login.php?login=ok&identifiant=$identifiant");
            }else if ($code_verif == "0"){
                header("Location: http://localhost/stage/Fournisseur/vue/login.php?login=nopass");
            }else if ($code_verif == "2"){
                header("Location: http://localhost/stage/Fournisseur/vue/login.php?login=no");
            }
        }else{
             header("Location: http://localhost/stage/Fournisseur/vue/login.php?erreur=1");
        }




