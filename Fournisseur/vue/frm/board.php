<!DOCTYPE HTML>
<html>

    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="../vue/bootstrap/css/bootstrap.min.css"/>
        <title>Board</title>
    </head>
    <style>
    </style>
    <body>



        <div id="mainform">
            <div id="form1">
                <form action="../trt/trt_addoffre.php" method="POST">
                    <div class="offre">
                        <label for="offre">Libellé de l'offre : </label><br>
                        <input class="input_txt" type="text" name="offre" id="offre" required/><br>
                    </div>
                    <div class="tarif">
                        <label for="tarif">Tarif proposé : </label><br>
                        <input class="input_nb" type="number" name="tarif" id="tarif" step="0.01" required>&nbsp;€<br>
                    </div>
                    <div class="description">
                        <label for="description">Description de l'offre (recommandé)</label><br>
                        <textarea class="textarea_taille" name="description" id="description"></textarea>
                    </div>
                    <div class="commentaire">
                        <label for="commentaire">Commentaire(s) concernant l'offre (optionnel)</label><br>
                        <textarea class="textarea_taille" name="commentaire" id="commentaire"></textarea>
                    </div>
                    <div class="conteneur_horiz">
                        <input type="submit" class="envoyer" name="submit" value="Envoyer"/>
                </form>
                <form action="../trt/trt_supproffre.php" method="POST">
                    <input style="margin-left:20%" type="submit" class="supprimer" name="supprimer" value="Supprimer offre id: " />

                    <input style="width:50px" type="text" name="suppr_id" required />
                </form>
            </div>

        </div>
        <div id="voirdemande">
            <a href="#">Voir besoins de l'entreprise Viwametal</a>
        </div>
    </div>

    <script type="text/javascript" src="bootstrap/js/jquery.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
