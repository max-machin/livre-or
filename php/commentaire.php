<?php

require "../require/require_bdd.php";

session_start();

$error = "";
$echo = "";

if ( isset ($_POST['sub_commentaire'])){
    if ( !empty ($_POST['commentaire'])){
        $comm = addslashes( $_POST['commentaire']);
        $req = mysqli_query($conn, "INSERT INTO `commentaires`(`id`, `commentaire`, `id_utilisateur`, `date`) VALUES (NULL,'$comm', '". $_SESSION['id'] ."', NOW())");
        $echo = "Votre commentaire a été posté avec succés";
    } else {
        $error = "Impossible d'envoyer un commentaire vide";
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
    <title>Commentaire</title>
</head>

<body>
    <header>
        <h1 class="titre_index">Commentaire</h1>
        <h2 class="sous_titre_index">Vous avez quelque chose à dire ?</h2>
        <nav>
            <ul class="liste_nav">
                <li><a href="../index.php">Accueil</a></li>
                <li><a href="livre-or.php">Livre d'or</a></li>
                <li><a href="profil.php">Mon profil</a></li>
                <form method="post" action="../require/deconnexion.php">
                    <input type="submit" name="deconnexion" value="Deconnexion">
                </form>
            </ul>
        </nav>
    </header>
    <main>
        <div class="bloc_main_commentaire">
            <form action="" method="post">
                <label for="lab_commentaire"> Votre commentaire <br>
                    <a class="erreur"><?= $error ?></a><br>
                    <textarea placeholder="Entrez votre commentaire" name="commentaire" rows="9" cols="70" maxlength="500" minlength="20"></textarea><br>
                    
                    <input type="submit" name="sub_commentaire" value="Envoyer">
                    <br>
                    <a class="echo"><?= $echo ?></a>
                </label>
            </form>
        </div>
    </main>

    <footer>
        <div class="bloc_footer_nav">
            <h4 class="titre_footer_nav">Navigation</h4>
            <ul class="liste_footer_nav">
                <li><a href="../index.php">Accueil</a></li>
                <li><a href="livre-or.php">Livre d'or</a></li>
                <li><a href="profil.php">Mon profil</a></li>
                <form method="post" action="../require/deconnexion.php">
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