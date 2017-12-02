<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../vue/bootstrap/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="css/login.css">
        <title>Inscription d'un fournisseur</title>
    </head>

    <body>

        <?php
        if (isset($_GET['erreur'])) {
            $erreur = $_GET['erreur'];
            switch ($erreur) {
                case 1: {
                        echo "<script>alert('Veuillez remplir tous les champs avant de valider svp !');</script>";
                        break;
                    }
                case 2: {
                        echo "<script>alert('Identifiant trop court (au moins 8 caractères svp !)');</script>";
                        break;
                    }
                case 3: {
                        echo "<script>alert('Mot de passe trop court (au moins 8 caractères svp !)');</script>";
                        break;
                    }
                case 4: {
                        echo "<script>alert('Les mots de passe ne sont pas identiques');</script>";
                        break;
                    }
                case 5: {
                        echo "<script>alert('Identifiant déjà utilisé');</script>";
                        break;
                    }
            }
        } else {
            $erreur = 0;
        }

        if (isset($_GET['adduser'])) {
            $adduser = $_GET['adduser'];
            if ($adduser == "ok") {
                echo "<script>alert('Utilisateur ajouté dans la base de données')</script>";
            }
        } else {
            $adduser = "";
        }
        ?>

        <div align="center">
            <form method="post" action="../trt/trt_inscription.php">
                <table>
                    <tr>
                        <td class="titre_tab" colspan=2>Ajout d'un nouvel utilisateur</td>
                    </tr>
                    <tr>
                        <td class="td_im">
                    <labelfor="identifiant">Choix de l'identifiant : </label>
                        </td>
                        <td>
                            <input type="text" id="identifiant" name="identifiant" required></input>
                        </td>
                        </tr>
                        <tr>
                            <td class="td_im">
                                <label for="motdepasse">Choix du mot de passe :<br>
                                </label>
                            </td>
                            <td>
                                <input type="password" id="mdp1" name="mdp1" required></input>
                            </td>
                        </tr>
                        <tr>
                            <td class="td_im">
                                <label for="motdepasse">Retapez le mot de passe : </label>
                            </td>
                            <td>
                                <input type="password" id="mdp2" name="mdp2" required></input>
                            </td>
                        </tr>
                        <tr>
                            <td colspan=2 align="center">
                                <input type="submit" name="ajouter" value="Ajouter">
                            </td>
                        </tr>
                </table>
            </form>
        </div>


        <script type="text/javascript" src="bootstrap/js/jquery.js"></script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    </body>

</html>
