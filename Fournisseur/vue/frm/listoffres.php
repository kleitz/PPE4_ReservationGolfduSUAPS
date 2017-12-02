<!DOCTYPE HTML>
<html>

    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="../vue/bootstrap/css/bootstrap.min.css"/>
        <title>Liste Offres</title>
    </head>
    <body>

        <?php
        
        $identifiant = $_SESSION['identifiant'];
        try {
            $db = new PDO('mysql:host=localhost;dbname=stage', 'root', '');
            $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        } catch (Exception $e) {
            echo 'Impossible de se connecter à la base de données';
            echo $e->getMessage();
            die();
        }
        $sql_req = "SELECT idOffre,libelleOffre, tarif, descriptionOffre, dateheure FROM offre WHERE utilisateur = '$identifiant'";
        echo "<table style='width:100%'><caption>Liste des offres</caption>";
        echo "<thead><tr><th>ID</th><th>Libellé</th><th>Prix demandé</th><th>Description</th><th>Quand?</th></tr><tbody>";
        foreach ($db->query($sql_req) as $row) {
            echo "<tr><td>" . $row['idOffre'] . "</td>";
            echo "<td>" . $row['libelleOffre'] . "</td>";
            echo "<td>" . $row['tarif'] . "</td>";
            echo "<td>" . $row['descriptionOffre'] . "</td>";
            echo "<td>" . $row['dateheure'] . "</td>";
        }
        echo "<tbody></table>";
        ?>
        <script type="text/javascript" src="bootstrap/js/jquery.js"></script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>