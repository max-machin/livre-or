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