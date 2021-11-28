<?php

session_start();



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
    <!-- 2 : Si $_SESSION['login'] est définie et qu'il est différent d'admin alors l'user est considéré comme connecté. -->
    <?php if (isset($_SESSION['id']) && $_SESSION['login'] != 'admin') { ?>
        <header>
            <h1 class="titre_index">Livre d'or</h1>
            <nav>
                <ul class="liste_nav">
                    <li><a href="../index.php">Accueil</a></li>
                    <li><a href="profil.php">Mon profil</a></li>
                    <li><a href="commentaire.php">Commentaire</a></li>
                    <form method="post" action="../require/deconnexion.php">
                        <input type="submit" name="deconnexion" value="Deconnexion">
                    </form>
                </ul>
            </nav>
        </header>
    <!-- 2 : Fin de l'affichage du header  -->
    <?php } ?>

    <!-- 3 : Si $_SESSION['login'] n'est pas définie alrs l'user est considéré comme déconnecter -->
    <?php if (!isset($_SESSION['id'])) { ?>
    <header>
        <h1 class="titre_index">Livre d'or</h1>
        <nav>
            <ul class="liste_nav">
                <li><a href="../index.php">Accueil</a></li>
                <li><a href="inscription.php">Inscription</a></li>
                <li><a href="connexion.php">Connexion</a></li>
            </ul>
        </nav>
    </header>
    <!-- 3 : Fin de l'affichage du header  -->
    <?php } ?>

    <main>
        <table class="livre_or_table">
            <thead>
                <tr>
                    <th></th>
                </tr>
            </thead>
        </table>
    </main>



    <!-- 2 : Affichage footer en mode 'connecté' -->
    <?php if (isset($_SESSION['id']) && $_SESSION['login'] != 'admin') { ?>
        <footer>
            <div class="bloc_footer_nav">
                <h4 class="titre_footer_nav">Navigation</h4>
                <ul class="liste_footer_nav">
                    <li><a href="../index.php">Accueil</a></li>
                    <li><a href="profil.php">Mon profil</a></li>
                    <li><a href="commentaire.php">Commentaire</a></li>
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
    <!-- 2 : Fin d'affichage footer mode 'connecté' -->
    <?php } ?>

    <!-- 3 : Affichage du footer en mode 'déconnecté' -->
    <?php if (!isset($_SESSION['id'])) { ?>
    <footer>
        <div class="bloc_footer_nav">
            <h4 class="titre_footer_nav">Navigation</h4>
            <ul class="liste_footer_nav">
                <li><a href="../index.php">Accueil</a></li>
                <li><a href="inscription.php">Inscription</a></li>
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
    <!-- 3 : Fin de l'affichage du footer en mode 'déconnecté' -->
    <?php } ?>
</body>

</html>