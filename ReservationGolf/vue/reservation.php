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
        <div class="col-md-3"><img src="../logo_suaps.png" alt="logo1"></div>
        <div class="col-md-7" id="titre_principal">

            <h2>
                RESERVATION GOLF DE LA WANTZENAU
            </h2>
        </div>
        <div class="col-md-2"> <img src="../logo_droite.png" alt="logo2">
        </div>
    </div>
</div>
<div class="barre"></div>

<div id="barre_connexion">
    <div class="row">
        <div class="col-md-12">
            utilisateur connecté
        </div>
    </div>
</div>

<div id="conteneur">
    <div class="row">

        <div class="col-md-2 menu_gauche">Philippe Schaeffer</div>

        <div class="col-md-10 contenu">
            <?php
            include '../trt/calendrier.php';
            ?>
        </div>
    </div>
</div>

<script type="text/javascript" src="bootstrap/js/jquery.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</body>
</HTML>
