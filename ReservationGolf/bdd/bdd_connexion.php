<?php


function verif_mdp($pseudo, $motdepasse)
{
        require("bdd_pdo.php");
    if (presence_pseudo($pseudo) != 0) {

        $sql_mdp_utilisateur = "SELECT motdepasse FROM utilisateur WHERE pseudo = '$pseudo'";
        $res_sql_mdp_utilisateur = $db->query($sql_mdp_utilisateur);

        while ($row = $res_sql_mdp_utilisateur->fetch(PDO::FETCH_NUM)) {
            if ($motdepasse == $row[0]) {
                return "0";
            } else {
                return "1";
            }
        }
    } else {
        return "2";
    }

}


function presence_pseudo($ps)
{
    require("bdd_pdo.php");

    $sql_pseudo = "SELECT COUNT(*) from utilisateur WHERE pseudo = '$ps'";
    $res_sql_pseudo = $db->query($sql_pseudo);
    $r = $res_sql_pseudo->fetch(PDO::FETCH_NUM);

    return $r[0];
}


