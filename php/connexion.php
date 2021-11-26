<?php

require "../require/require_bdd.php";

$error = "";

if ( isset ( $_POST['submit'])){
    if ( !empty ( $_POST['login'] && $_POST['password'])){
        
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
        <h2 class="sous_titre_index">Connexion</h2>
        <nav>
            <ul class="liste_nav">
                <li><a href="inscription.php">Inscription</a></li>
                <li>Livre d'or</li>
                <li><a href="connexion.php">Connexion</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <div class="bloc_main_connexion">
            <form method="post" action="">
                <label for="login"> Login <br>
                <input type="text" name="login" placeholder="login">
                </label><br>

                <label for="password"> Password <br>
                <input type="password" name="password" placeholder="password">
                </label><br>

                <a class="erreur"><?= $error ?></a><br>
                <input type="submit" name="submit" value="connexion">
            </form>
        </div>
    </main>

    <footer>
        <div class="bloc_footer_nav">
            <h4 class="titre_footer_nav">Navigation</h4>
            <ul class="liste_footer_nav">
                <li><a href="inscription.php">Inscription</a></li>
                <li>Livre d'or</li>
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