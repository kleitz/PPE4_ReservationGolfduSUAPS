<?php

if(isset($_POST['suppr_id'])){
    $id=$_POST['suppr_id'];
    include '../bdd/bdd_supproffre.php';
   
    
    header("Location: http://localhost/stage/fournisseur/vue/plateforme.php?suppr=ok");
}else{
    $id=0;
    header("Location: http://localhost/stage/fournisseur/vue/plateforme.php?suppr=nr");

;}



