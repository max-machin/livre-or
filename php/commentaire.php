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

require "../require/requireHeader.php";

?>
    <main>
        <div class="bloc_main_commentaire">
            <form action="" method="post">
                <label for="lab_commentaire"> Laissez nous un commentaire <br>
                    <a class="erreur"><?= $error ?></a><br>
                    <textarea class="text_ar" wrap="hard" placeholder="Entrez votre commentaire" name="commentaire" rows="9" cols="70" maxlength="500" minlength="20"></textarea><br>
                    
                    <input type="submit" name="sub_commentaire" value="Envoyer">
                    <br>
                    <a class="echo"><?= $echo ?></a>
                </label>
            </form>
        </div>
    </main>

<?php 
require "../require/requireFooter.php";
?>