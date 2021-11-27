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
    <link rel="stylesheet" href="style/style.css">
    <title>Livre d'or</title>
</head>

<body>

    <!-- 2 : Si $_SESSION['login'] est définie et qu'il est différent d'admin alors l'user est considéré comme connecté. -->
    <?php if (isset($_SESSION['id']) && $_SESSION['login'] != 'admin') { ?>
        <header>
            <h1 class="titre_index">Livre d'or</h1>
            <h2 class="sous_titre_index">Bienvenue <?= $_SESSION['login'] ?></h2>
            <nav>
                <ul class="liste_nav">
                    <li><a href="php/inscription.php">Profil</a></li>
                    <li>Livre d'or</li>
                    <li><a href="php/connexion.php">Déconnexion</a></li>
                </ul>
            </nav>
        </header>
    <!-- 2 : Fin de l'affichage du header  -->
    <?php } ?>

    <!-- 3 : Si $_SESSION['login'] n'est pas définie alrs l'user est considéré comme déconnecter -->
    <?php if (!isset($_SESSION['id'])) { ?>
        <header>
            <h1 class="titre_index">Livre d'or</h1>
            <h2 class="sous_titre_index">Vous avez de l'or dans les mains?</h2>
            <nav>
                <ul class="liste_nav">
                    <li><a href="php/inscription.php">Inscription</a></li>
                    <li>Livre d'or</li>
                    <li><a href="php/connexion.php">Connexion</a></li>
                </ul>
            </nav>
        </header>
    <!-- 3 : Fin de l'affichage du header  -->
    <?php } ?>

    <main>
        <div class="contenu_index">

        </div>

    </main>
    <?php if (isset($_SESSION['id']) && $_SESSION['login'] != 'admin') { ?>
        <footer>
            <div class="bloc_footer_nav">
                <h4 class="titre_footer_nav">Navigation</h4>
                <ul class="liste_footer_nav">
                    <li><a href="php/inscription.php">Profil</a></li>
                    <li>Livre d'or</li>
                    <li><a href="php/connexion.php">Déconnexion</a></li>
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
    <?php } ?>

    <?php if (!isset($_SESSION['id'])) { ?>
        <footer>
            <div class="bloc_footer_nav">
                <h4 class="titre_footer_nav">Navigation</h4>
                <ul class="liste_footer_nav">
                    <li><a href="php/inscription.php">Inscription</a></li>
                    <li>Livre d'or</li>
                    <li><a href="php/connexion.php">Connexion</a></li>
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
    <?php } ?>
</body>

</html>