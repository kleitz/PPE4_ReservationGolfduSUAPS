<?php

function verif_mdp($identifiant,$motdepasse){

    if (presence_identifiant($identifiant) != 0){
        include("bdd_pdo.php");
        $sql_mdplogin = "SELECT motdepasse FROM utilisateur WHERE identifiant = '$identifiant'"; 
        $res_sql_mdplogin = $db->query($sql_mdplogin);
        
        while($row = $res_sql_mdplogin->fetch(PDO::FETCH_NUM)){
             if(password_verify($motdepasse,$row[0])==true){
                    return "1";
             }else{
                    return "0";
             }
    }
        }else{
         return "2";
    }
    
}


function presence_identifiant($idtf){
    include("bdd_pdo.php");
    
    $sql_identifiant = "SELECT COUNT(*) from utilisateur WHERE identifiant = '$idtf'";
    $res_sql_identifiant = $db->query($sql_identifiant); 
    $r = $res_sql_identifiant->fetch(PDO::FETCH_NUM);
                  
    return $r[0];
}


