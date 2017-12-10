<!DOCTYPE HTML>
<HTML>

<head>
    <meta charset="utf-8"/>

    <link rel="stylesheet" href="../lib/bootstrap/css/style.css">
    <link rel="stylesheet" href="../lib/bootstrap/css/bootstrap.min.css">
    <title>RESERVATION GOLF</title>

</head>

<body>

<?php
session_start();

require '../metier/Calendrier.php';

$page = 0;
if (isset($_GET['pseudo'])) {
    $_SESSION['pseudo'] = $_GET['pseudo'];
    $pseudo = $_SESSION['pseudo'];
}
if (isset($_GET['con'])) {
    $c = $_GET['con'];
} else {
    $c = 9;
}
if (isset($_GET['page']) && (isset($_GET['changer_page']))) {
    $page = intval($_GET['page']);
    $changer_page = ($_GET['changer_page']);
    if ($changer_page == 'suiv') {
        $page++;
    } elseif ($changer_page == 'prec') {
        $page--;
    }
}
?>


<div class="barre"></div>
<div id="conteneur_header">
    <div class="row">
        <div class="col-md-3"><img src="../logo_suaps.png" alt="logo1"/></div>
        <div class="col-md-7" id="titre_principal">

            <h2>
                RESERVATION GOLF DE LA WANTZENAU
            </h2>
        </div>
        <div class="col-md-2"><img src="../logo_droite.png" alt="logo2"/>
        </div>
    </div>
</div>
<div class="barre barre_date">
    <?php echo Calendrier::date_du_jour_en_chaine(); ?>
</div>
<div id="barre_connexion">
    <div class="row">
        <div id="connexion" class="col-md-6">

            <form method="POST" action="../trt/trt_connexion.php">

                <label for="pseudo">Pseudo : </label>
                <input type="text" id="pseudo" name="pseudo"/>

                <label for="mot_de_passe">Mot de passe : </label>
                <input type="password" id="mot_de_passe" name="mot_de_passe"/>

                <input type="submit" id="btn_connexion" value="se connecter"/>
            </form>
        </div>

    </div>


</div>


<div id="conteneur">
    <div class="row">

        <div class="col-md-2 menu_gauche">
            <div class="menu_titre">
                <?php if (isset($pseudo)) {
                    echo $pseudo;
                } ?>
            </div>
        </div>
        <div class="col-md-10 contenu">
            <div id="reservation">
                <div class="changer_date">
                    <a href="reservation.php?con=<?php echo $c ?>&pseudo=<?php echo $pseudo ?>&changer_page=prec&page= <?php
                    if ($page > 0) {
                        echo $page;
                    } else {
                        echo '1';
                    } ?>">
                        <input type=button id="btn-avant"
                               class="btn btn-info" value="précédent"
                               name="precedent"/></a>
                    <a href="reservation.php?con=<?php echo $c ?>&pseudo=<?php echo $pseudo ?>&changer_page=suiv&page= <?php
                    echo $page ?>"> <input type=button id="btn-suivant"
                                           class="btn btn-info"
                                           value="suivant"
                                           name="suivant"/></a>

                    <input type=button id="btn-validation"
                           class="btn btn-success"
                           value="validation"
                           name="validation"/>

                </div>
            </div>

            <?php


            $cal = new Calendrier('04-12-2017', 3650);

            $sem1 = $cal->charger_semaine_du_tableau($page);
            $sem2 = $cal->charger_semaine_du_tableau($page + 1);
            $classe_sem1 = $cal->charger_classes_du_tableau($page);
            $classe_sem2 = $cal->charger_classes_du_tableau($page + 1);

            echo "<table class='table table-responsive table-bordered table-stripped' id='tableau_reservation'>";
            echo "<thead>";
            echo "<tr><th>Date</th><th class='res'>Joueur n°1</th><th class='res'>Joueur n°2</th><th class='res'>Joueur n°3</th><th class='res'>Joueur n°4</th></tr>";
            echo "</thead>";
            echo "<tbody>";
            $cpt = 0;
            foreach ($sem1 as $s) {

                if (Calendrier::date_du_jour_en_chaine() == $s) {
                    echo "<tr class='jour'>";
                } else if ($cpt == 5) {
                    echo "<tr class='samedi'>";
                } else if ($cpt == 6) {
                    echo "<tr class='dimanche'>";

                } else {
                    echo
                    "<tr>";
                }


                echo "<td class='col-date'>$s</td>";

                echo "<td class='res1_" . $classe_sem1[$cpt] . "'></td>";
                echo "<td class='res2_" . $classe_sem1[$cpt] . "'></td>";
                echo "<td class='res3_" . $classe_sem1[$cpt] . "'></td>";
                echo "<td class='res4_" . $classe_sem1[$cpt] . "'></td>";
                echo "</tr>";
                $cpt++;
            }
            // echo "<tr style='background-color: #409cff;'><td ></td><td></td><td></td>";
            //echo "<td></td><td></td></tr>";
            $cpt = 0;
            foreach ($sem2 as $s) {

                if ($cpt == 5) {
                    echo "<tr class='samedi'>";
                } else if ($cpt == 6) {
                    echo "<tr class='dimanche'>";

                } else {
                    echo
                    "<tr>";
                }
                echo "<td class='col-date'>$s</td>";
                echo "<td class='res1_" . $classe_sem2[$cpt] . "'></td>";
                echo "<td class='res2_" . $classe_sem2[$cpt] . "'></td>";
                echo "<td class='res3_" . $classe_sem2[$cpt] . "'></td>";
                echo "<td class='res4_" . $classe_sem2[$cpt] . "'></td>";
                $cpt++;
            }
            echo "</tbody>";
            echo "</table>";
            ?>
        </div>

    </div>
</div>


<script>
    var get_con = -1;
    get_con = <?php echo $c ?>;

    if (get_con === 0) {
        document.getElementById('connexion').style.visibility = "hidden";
    } else if (get_con === 1) {
        alert("Mot de passe incorrect");
    } else if (get_con === 2) {
        alert("Utilisateur incorrect");
    }


</script>
<script type="text/javascript" src="../lib/bootstrap/js/jquery.js"></script>
<script type="text/javascript" src="../lib/bootstrap/js/script.js"></script>
</body>
</HTML>
