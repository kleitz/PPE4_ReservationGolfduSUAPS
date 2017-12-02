<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/login.css">
        <title>Login fournisseur</title>
    </head>

    <body>

        <?php
        if (isset($_GET['identifiant'])) {
            $identifiant = $_GET['identifiant'];
        } else {
            $identifiant = "";
        }

        if (isset($_GET['erreur'])) {
            $erreur = $_GET['erreur'];
            switch ($erreur) {
                case 1: {
                        echo "<script>alert('Erreur d'identification !');</script>";
                        break;
                    }
                
            }
        } else {
            $erreur = 0;
        }

        if (isset($_GET['login'])) {
            $login = $_GET['login'];
            if ($login == "ok") {

                header("Location: http://localhost/stage/Fournisseur/vue/plateforme.php?identifiant=$identifiant");
            } else if ($login == "no") {
                echo "<script>alert('Erreur identitfiant - mot de passe !');</script>";
            } else if ($login == "nopass") {
                echo "<script>alert('Erreur identitfiant - mot de passe !');</script>";
            }
        } else {
            $login = "";
        }
        ?>



        <div align="center">

            <form method="post" action="../trt/trt_login.php">
                <table>
                    <tr>
                        <td class="titre_tab" colspan=2>Connexion utilisateur</td>
                    </tr>
                    <tr>
                        <td class="td_im">
                            <label for="identifiant">Identifiant : </label>
                        </td>
                        <td>
                            <input type="text" id="identifiant" name="identifiant" required></input>
                        </td>
                    </tr>
                    <tr>
                        <td class="td_im">
                            <label for="motdepasse">Mot de passe : </label>
                        </td>
                        <td>
                            <input type="password" id="motdepasse" name="motdepasse" required></input>
                        </td>
                    </tr>
                    <tr>
                        <td colspan=2 align="center">
                            <input type="submit" name="valider" value="Valider">
                        </td>
                    </tr>
                </table>
            </form>
        </div>

        <script type="text/javascript" src="bootstrap/js/jquery.js"></script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    </body>

</html>
