<?php

session_start();

require "../require/require_bdd.php";

$error = "";
$echo = "";

$display1 = "block";
$display2 = "none";

//Si le formulaire est envoyé
if ( isset ( $_POST['sub_login'] ) ) {
    if ( !empty ( $_POST['login'])){
        //On récupére les informations du l'utilisateurs ou l'id est correspondant à celui récupérer en session
        $requete_profil1 = mysqli_query($conn, " SELECT * FROM `utilisateurs` WHERE `id` = '$_SESSION[id]'");
        $result_profil1 = mysqli_fetch_array($requete_profil1);

        if ( $_POST['login'] != $result_profil1['login'] ) {
            $requete_log_profil = mysqli_query($conn, "SELECT COUNT(*) FROM `utilisateurs` WHERE `login` = '$_POST[login]' ");
            $result_log_profil = mysqli_fetch_array($requete_log_profil);
            if ( $result_log_profil['COUNT(*)'] == 0) {
                $login = $_POST['login'];
                $requete_profil2 = mysqli_query($conn, "UPDATE `utilisateurs` SET `login`='$login' WHERE `login` = '$result_profil1[login]'");
                $_SESSION['login'] = $login;
                $echo = "Login modifié avec succés";
            } else {
                $error = "Le login est déjà utilisé";
            }
        } else {
            $error = "Veuillez insérer un login différent de votre ancien";
        }
    } else {
        $error = "Veuillez remplir le champ login";
    }
}


if ( isset ( $_POST['sub_oldpassword'] ) ) {
    if ( !empty ( $_POST['old_password'] ) ) {
        $requete_profil2 = mysqli_query($conn, " SELECT * FROM `utilisateurs` WHERE `login` = '$_SESSION[login]'");
        $result_profil2 = mysqli_fetch_assoc($requete_profil2);

        if ( password_verify ( $_POST['old_password'], $result_profil2['password'] ) ) {
            $echo = "Password correct";
            $display1 = "none";
            $display2 = "block";
        } else {
            $error = "Ancien password incorrect";
        }
    } else {
        $error = "Veuillez remplir le champ password";
    }
}
        
$error2 = "";
$echo2 = "";    
if ( isset ( $_POST['sub_newpassword'] ) ) {

    if ( !empty ($_POST['password'] && $_POST['password_conf'])){
                
        if ( $_POST['password'] == $_POST['password_conf'] ) {

            $requete_password = mysqli_query ( $conn , "SELECT * FROM `utilisateurs` where `id` = '$_SESSION[id]'");
            $result_password = mysqli_fetch_assoc($requete_password);

            if ( password_verify ( $_POST['password'], $result_password['password'])){
                $error2 = "Veuillez insérer un password différent de votre ancien";
                $display1 = "none";
                $display2 = "block";
                
            } else {
                $hash_password = password_hash( $_POST['password'] , PASSWORD_DEFAULT);
                $requete_update_password = mysqli_query ( $conn , "UPDATE `utilisateurs` SET `password` = '$hash_password' WHERE `id` = '$_SESSION[id]'");
                $echo2 = "password modifié avec succés";
            }

        } else {
            $error2 = "Entrez 2 password identiques";
            $display1 = "none";
            $display2 = "block";
        }
    } else {
        $error2 = "Veuillez remplir les champs password";
        $display1 = "none";
        $display2 = "block";
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/81dc42ea59.js" crossorigin="anonymous"></script>
    <link href="image/fontawesome-free-5.15.4-web.zip/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="../style/style.css">
    <title>Profil</title>
</head>

<body>
    <header>
        <h1 class="titre_index">Mon profil</h1>
        <nav>
            <ul class="liste_nav">
                <li><a href="../index.php">Accueil</a></li>
                <li>Livre d'or</li>
                <form method="post" action="../require/deconnexion.php">
                    <input type="submit" name="deconnexion" value="Deconnexion">
                </form>
            </ul>
        </nav>
    </header>

    <main>
        <div class="bloc_main_profil">
            <h3>Modifier vos informations</h3>
            <form method="post" action="">
                <label for="login"> Login <br>
                    <input type="text" name="login" placeholder="<?= $_SESSION['login'] ?>">
                    <input type="submit" name="sub_login" value="✎">
                </label><br>
                <a class="erreur"><?= $error ?></a>

                <a class="echo"><?= $echo ?></a>
            </form>
            <?php


            ?>
            <form method="post" action="" style="display: <?= $display1 ?>;">
                <label for="password"> Ancien password <br>
                    <input type="password" name="old_password" placeholder="Votre ancien password">
                    <input type="submit" name="sub_oldpassword" value="✎">
                </label><br>
                <a class="echo"><?= $echo2 ?></a>
            </form>

            <form method="post" action="" style="display: <?= $display2 ?>;">
                <label for="new_password">Nouveau password <br>
                    <input type="password" name="password" placeholder="Password">
                </label><br>

                <label for="new_password_conf"> Confirmer nouveau password <br>
                    <input type="password" name="password_conf" placeholder="Confirmez votre password">
                    <br>
                </label>
                <a class="erreur"><?= $error2 ?></a>
                <br>
                <input type="submit" name="sub_newpassword" value="Modifier">
            </form>

        </div>
    </main>

    <footer>
        <div class="bloc_footer_nav">
            <h4 class="titre_footer_nav">Navigation</h4>
            <ul class="liste_footer_nav">
                <li><a href="php/profil.php">Profil</a></li>
                <li>Livre d'or</li>
                <form method="post" action="require/deconnexion.php">
                    <input type="submit" name="deconnexion" value="Deconnexion">
                </form>
            </ul>
        </div>
        <div class="bloc_footer_media">
            <h4 class="titre_footer_media">Réseaux sociaux</h4>
            <ul class="liste_footer_media">
                <li><i class="fab fa-facebook-square"></i></li>
                <li><i class="fab fa-github-square"></i></li>
                <li><i class="fab fa-twitter-square"></i></li>
                <li><i class="fab fa-instagram-square"></i></li>
                <li><i class="fab fa-youtube-square"></i></li>
            </ul>
        </div>
    </footer>
</body>

</html>