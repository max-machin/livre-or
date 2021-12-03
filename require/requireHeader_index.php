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