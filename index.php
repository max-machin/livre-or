<?php

session_start();

require "require/require_bdd.php";

$display ="";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="12";/>
    <script src="https://kit.fontawesome.com/81dc42ea59.js" crossorigin="anonymous"></script>
    <link href="image/fontawesome-free-5.15.4-web.zip/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="style/style.css">
    <style>@import url('https://fonts.googleapis.com/css2?family=Oxygen:wght@300&display=swap');</style>
    
    <title>Livre d'or</title>
</head>

<body>

    <!-- 2 : Si $_SESSION['login'] est définie et qu'il est différent d'admin alors l'user est considéré comme connecté. -->
    <?php if (isset($_SESSION['id']) && $_SESSION['login'] != 'admin') { ?>
        <header>
            <h1 class="titre_index">Bonjour</h1>
            <h2 class="sous_titre_index">Bienvenue <?= $_SESSION['login'] ?></h2>
            <nav>
                <ul class="liste_nav">
                    <li><a href="php/profil.php">Mon profil</a></li>
                    <li><a href="php/livre-or.php">Livre d'or</a></li>
                    <li><a href="php/commentaire.php">Commentaire</a></li>
                    <li><a href="require/deconnexion.php">Deconnexion</a></li>
                </ul>
            </nav>
        </header>
    <!-- 2 : Fin de l'affichage du header  -->
    <?php } ?>

    <!-- 3 : Si $_SESSION['login'] n'est pas définie alrs l'user est considéré comme déconnecter -->
    <?php if (!isset($_SESSION['id'])) { ?>
        <header>
            <h1 class="titre_index">Livre d'or</h1>
            <h2 class="sous_titre_index">Vous avez de l'or dans les pensées ?</h2>
            <nav>
                <ul class="liste_nav">
                    <li><a href="php/inscription.php"><span>Inscription</span></a></li>
                    <li><a href="php/livre-or.php"><span>Livre d'or</span></a></li>
                    <li><a href="php/connexion.php"><span>Connexion</span></a></li>
                </ul>
            </nav>
        </header>
    <!-- 3 : Fin de l'affichage du header  -->
    <?php } ?>

    <main>
        <div class="contenu_index">
            <div class="sous_contenu_index">
                <h3 class="titre_contenu_index">Laissez nous une trace de votre imagination ...</h3>    
                <p class="sous_titre_contenu_index">Une fois inscrit sur notre site, vous pourrez nous laisser un commentaire    
                </br> dans le <a class="href_livre" href="php/livre-or.php"> livre d'or</a>.
                </p>
            </div>

            <div class="cont_comm">
                <?php
                    $comm = 4;

                    $requete_comm = mysqli_query($conn, "SELECT `login`,commentaire, DATE_FORMAT(date, '%d/%m/%Y') AS 'datefr' , DATE_FORMAT(date, '%H:%i:%s') AS 'heurefr' FROM `commentaires` INNER JOIN `utilisateurs` ON commentaires.id_utilisateur = utilisateurs.id ORDER BY rand() LIMIT $comm");
                    while ($row_comm = mysqli_fetch_array($requete_comm,MYSQLI_ASSOC)){
                ?>
            
                <div class="index_comm">
                    <p class="login_comm">Posté par : <a><?= $row_comm['login'] ?></a> </p>
                    <p class="date_comm">Le <?= $row_comm['datefr']?> à <?= $row_comm['heurefr'] ?></p>
                    <p class="comm"><?= nl2br($row_comm['commentaire']) ?></p>
                </div>
            
                <?php
                }
                ?>
            </div>
        </div>

    </main>

    <!-- 2 : Affichage footer en mode 'connecté' -->
    <?php if (isset($_SESSION['id']) && $_SESSION['login'] != 'admin') {
        $display = "co";
        ?>
        <footer class="<?= $display ?>_footer">
            <div class="bloc_footer_nav">
                <h4 class="titre_footer_nav">Navigation</h4>
                <ul class="liste_footer_nav">
                    <li><a href="php/profil.php">Mon profil</a></li>
                    <li><a href="php/livre-or.php">Livre d'or</a></li>
                    <li><a href="php/commentaire.php">Commentaire</a></li>
                    <form method="post" action="require/deconnexion.php">
                        <input type="submit" name="deconnexion" value="Deconnexion">
                    </form>
                </ul>
            </div>
            <div class="bloc_footer_media">
                <h4 class="titre_footer_media">Réseaux sociaux</h4>
                <ul class="liste_footer_media">
                    <li><a href="https://www.facebook.com/LaPlateformeIO"><i class="fab fa-facebook-square"></i></a></li>
                    <li><a href="https://github.com/max-machin/livre-or"><i class="fab fa-github-square"></i></a></li>
                    <li><a href="https://twitter.com/LaPlateformeIO"><i class="fab fa-twitter-square"></i></a></li>
                    <li><a href="https://www.instagram.com/laplateformeio/?hl=am-et"><i class="fab fa-instagram-square"></i></a></li>
                    <li><a href="https://www.youtube.com/watch?v=a7_WFUlFS94&ab_channel=Fireship"><i class="fab fa-youtube-square"></i></a></li>
                </ul>
            </div>
        </footer>
    <!-- 2 : Fin d'affichage footer mode 'connecté' -->
    <?php } ?>

    <!-- 3 : Affichage du footer en mode 'déconnecté' -->
    <?php if (!isset($_SESSION['id'])) {
        $display = "deco";
        ?>
        <footer class="<?= $display ?>_footer">
            <div class="bloc_abso_footer">
                <div class="sous_bloc_abso">
                    <p class="titre_abso">Envie de nous rejoindre ?</p>
                    <p class="sous_titre_abso">Rien de plus simple</p>
                </div>
                <a href="php/inscription.php">S'inscrire</a>
            </div>
            <div class="bloc_footer_nav">
                <h4 class="titre_footer_nav">Navigation</h4>
                <ul class="liste_footer_nav">
                    <li><a href="php/inscription.php">Inscription</a></li>
                    <li><a href="php/livre-or.php">Livre d'or</a></li>
                    <li><a href="php/connexion.php">Connexion</a></li>
                </ul>
            </div>
            <div class="bloc_footer_media">
                <h4 class="titre_footer_media">Réseaux sociaux</h4>
                <ul class="liste_footer_media">
                    <li><a href="https://www.facebook.com/LaPlateformeIO"><i class="fab fa-facebook-square"></i></a></li>
                    <li><a href="https://github.com/max-machin/livre-or"><i class="fab fa-github-square"></i></a></li>
                    <li><a href="https://twitter.com/LaPlateformeIO"><i class="fab fa-twitter-square"></i></a></li>
                    <li><a href="https://www.instagram.com/laplateformeio/?hl=am-et"><i class="fab fa-instagram-square"></i></a></li>
                    <li><a href="https://www.youtube.com/watch?v=a7_WFUlFS94&ab_channel=Fireship"><i class="fab fa-youtube-square"></i></a></li>
                </ul>
            </div>
        </footer>
    <!-- 3 : Fin de l'affichage du footer en mode 'déconnecté' -->
    <?php } ?>
</body>

</html>