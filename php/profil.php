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
            <form>
                <label for="login"> Login <br>
                <input type="text" name="login" placeholder="Login">
                </label><br>

                <label for="login"> Password <br>
                <input type="password" name="password" placeholder="Password">
                </label><br>

                <label for="login"> Confirmer password <br>
                <input type="password" name="password_conf" placeholder="Confirmez votre password">
                </label><br>

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