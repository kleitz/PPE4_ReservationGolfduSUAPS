<!DOCTYPE HTML>
<HTML>

    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="../vue/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <title>PLATEFORME FOURNISSEUR</title>
    </head>

    <body>
        <header>
            <?php
            session_start();

            if (isset($_GET['suppr'])) {
                $suppr = $_GET['suppr'];
                if ($suppr == "ok") {
                    echo "<h3 style='color:orange'>L'offre a été supprimé </h3>";
                } else if ($suppr == "nr") {
                    echo "<h3 style='color:red'>ID a supprimé non renseigné </h3>";
                }
            } else {
                $ajout = "";
            }

            if (isset($_GET['ajout'])) {
                $ajout = $_GET['ajout'];
                if ($ajout == "ok") {
                    echo "<h3 style='color:green'>L'offre a été ajouté </h3>";
                }
            } else {
                $ajout = "";
            }

            if (isset($_GET['erreur'])) {
                $erreur = $_GET['erreur'];
                if ($erreur == 1) {
                    echo "<h3 style='color:red'>Erreur : le prix n'est pas correct</h3>";
                } else if ($erreur == 2) {
                    echo "<h3 style='color:red'>Erreur : Pas de prix</h3>";
                } else if ($erreur == 3) {
                    echo "<h3 style='color:red'>Erreur : Pas d'offre</h3>";
                }
            } else {
                $erreur = "";
            }



            if (isset($_SESSION['identifiant'])) {
                $identifiant = $_SESSION['identifiant'];

                $ch = $identifiant . " est connecté.";
            } else {
                $identifiant = "";
                $ch = "<a href='login.php'>connectez-vous</a>";
            }
            ?>

        </header>
        <div id="bonjour">
            <?php echo $ch; ?>
        </div>


        <div id="main">
            <div id="part1">
                <?php include'frm/listoffres.php' ?>
            </div>
            <div id="part2">
                <?php include'frm/board.php' ?>
            </div>
        </div>
        <footer> </footer>
        <script type="text/javascript" src="bootstrap/js/jquery.js"></script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    </body>
</HTML>
