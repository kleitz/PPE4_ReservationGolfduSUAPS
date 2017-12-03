<!DOCTYPE HTML>
<HTML>

<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="../vue/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>RESERVATION GOLF</title>
</head>

<body>
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
<div class="barre"></div>

<div id="barre_connexion">
    <div class="row">
        <div id="connexion" class="col-md-6">
            <form method="POST" action="../trt/connexion.php">

                <label for="pseudo">Pseudo : </label>
                <input type="text" id="pseudo" name="pseudo" value="pseudo">

                <label for="mot_de_passe">Mot de passe : </label>
                <input type="password" id="mot_de_passe" name="mot_de_passe" value="pseudo"/>

                <input type="submit" id="btn_connexion" value="se connecter">
            </form>
        </div>

    </div>


</div>


<div id="conteneur">
    <div class="row">

        <div class="col-md-2 menu_gauche">
            <div class="menu_titre">
                Philippe Schaeffer
            </div>
        </div>
        <div class="col-md-10 contenu">
            <div id="tableau_reservation">
                <?php
                require '../trt/Calendrier.php';

                $cal = new Calendrier('04-12-2017', 3650);
                $tab = $cal->charger_dates();
                $jan2018 = $cal->tableau_date_suivantes($tab,"février","2018");
                foreach ($jan2018 as $j){
                    echo $j."<br>";
                }
                ?>

            </div>

        </div>
    </div>
</div>
<script type="text/javascript" src="bootstrap/js/jquery.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</body>
</HTML>
