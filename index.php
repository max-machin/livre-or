<?php

session_start();

require "require/require_bdd.php";

$display ="";
$requete_notes = mysqli_query($conn, "SELECT AVG(note) FROM notes ");
$result_notes = mysqli_fetch_all($requete_notes);
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
                <div class="sous_livreor">
                    <p class="notes_livreor">La note des utilisateurs</p>
                    <progress class="progress" max="10" value="<?= $result_notes[0][0] ?>"><?= $result_notes[0][0] ?></progress>
                    <br>
                    <a class="note_users"> <?= round($result_notes[0][0],1) ?> </a>
                </div>
            </div>

            <div class="cont_comm">
                <h3 class="selec_comm">Sélection commentaires</h3>
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

<?php
    require "require/requireFooter_index.php";
?>