<?php

require "../require/require_bdd.php";

$error = "";

if ( isset ( $_POST['submit'])){

    if ( !empty ( $_POST['login']) && !empty ( $_POST['password']) && !empty ( $_POST['conf_password'])){

        if ( $_POST['password'] === $_POST['conf_password'] ){
            $requete_log = mysqli_query($conn, "SELECT COUNT(*) FROM `utilisateurs` WHERE `login` = '". htmlspecialchars($_POST['login']) ."' ");
            $result_log = mysqli_fetch_array($requete_log);

            if( $result_log['COUNT(*)'] == 1){
                $error = "Le login est déjà utilisé";
            }
           
            else{
                $hash_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $requete = mysqli_query($conn, "INSERT INTO `utilisateurs`(`login`, `password`) VALUES ('". htmlspecialchars($_POST['login']) ."', '$hash_password')");
                header('location: connexion.php');
            }

        }else{

            $error = "Veuillez renseigner deux mot de passe indentiques";
        }
    }else{
        $error = "Veuillez remplir tous les champs";
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
    <title>Livre d'or</title>
</head>

<body>
    <header>
        <h1 class="titre_index">Livre d'or</h1>
        <h2 class="sous_titre_index">Inscription</h2>
        <nav>
            <ul class="liste_nav">
                <li><a href="inscription.php">Inscription</a></li>
                <li><a href="livre-or.php">Livre d'or</a></li>
                <li><a href="connexion.php">Connexion</a></li>
            </ul>
        </nav>
    </header>


    <main>
        <div class="contenu_index">

            <form action="" method="post">

                <label for="login"> Login <br>
                <input type="text" name="login" placeholder="login">
                </label><br>

                <label for="password"> password <br>
                <input type="password" name="password" placeholder="password">
                </label><br>

                <label for="conf_password"> confirm password <br>
                <input type="password" name="conf_password" placeholder="confirm your password">
                </label><br>
                <a class="erreur"><?= $error ?></a>
                <br>
                <input type="submit" name="submit" value="S'inscrire">
            </form>

        </div>

    </main>

    <footer>
        <div class="bloc_footer_nav">
            <h4 class="titre_footer_nav">Navigation</h4>
            <ul class="liste_footer_nav">
                <li><a href="inscription.php">Inscription</a></li>
                <li><a href="livre-or.php">Livre d'or</a></li>
                <li><a href="connexion.php">Connexion</a></li>
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