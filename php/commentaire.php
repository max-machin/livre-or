<?php

require "../require/require_bdd.php";

session_start();

$error = "";
$echo = "";

$display1 = "block";
$display2 = "none";



if ( isset ($_POST['sub_commentaire'])){
    if ( !empty ($_POST['commentaire'])){
        $comm = addslashes( $_POST['commentaire']);
        $req = mysqli_query($conn, "INSERT INTO `commentaires`(`id`, `commentaire`, `id_utilisateur`, `date`) VALUES (NULL,'$comm', '". $_SESSION['id'] ."', NOW())");
        $echo = "Votre commentaire a été posté avec succés";
    } else {
        $error = "Impossible d'envoyer un commentaire vide";
    }
}

$error2 = "";
$echo2 = "";



if (isset($_POST['sub_avis'])){
    if ( $_POST['avis'] != 0){
        $req_exist_vote = mysqli_query($conn, "SELECT COUNT(*) FROM notes WHERE id_utilisateur = '".$_SESSION['id']."'");
        $res_exist_vote = mysqli_fetch_array($req_exist_vote);
        var_dump($res_exist_vote['COUNT(*)']);
        if ($res_exist_vote['COUNT(*)'] == 1){
            $error2 = "Vous avez déjà donné une note";    
        } else {
        $id = $_SESSION['id'];
        $note = $_POST['avis'];
        $req_avis = mysqli_query($conn, " INSERT INTO notes (id_note , id_utilisateur , note) VALUES (NULL, '$id' , '$note' )");
        $echo2 = "Merci pour votre note";
        }
    } else {
        $error2 = "Veuillez choisir une note";
    }
}

$echo3 = "";
$requete_notes = mysqli_query($conn, "SELECT AVG(note) FROM notes WHERE id_utilisateur = '". $_SESSION['id'] ."' ");
$result_notes = mysqli_fetch_all($requete_notes);

$req_exist_vote = mysqli_query($conn, "SELECT COUNT(*) FROM notes WHERE id_utilisateur = '".$_SESSION['id']."'");
$res_exist_vote = mysqli_fetch_array($req_exist_vote);
        
    if ($res_exist_vote['COUNT(*)'] !== 0){
        $display1 = "none";
        $display2 = "block";
    }

if ( isset ($_POST['sub_modif'])){
    if ($_POST['modif'] != 0 ){
        $note = $_POST['modif'];
        $req_update_modif = mysqli_query($conn , "UPDATE notes SET note = $note WHERE id_utilisateur = '". $_SESSION['id'] . "'");
        $echo3 = "Votre note a bien été modifier";
        header('location: commentaire.php');
    } else {
        $error2 = "Veuillez choisir une note";
    }
}

$display3 = "none";

if ( isset ($_POST['supp_modif'])){
    $display3 = "block";
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
            <form action="" method="post"  style="display: <?= $display1 ?>">
            <label for="note"> Laissez nous un avis! <br></label>
            <select name="avis" value="Notez sur/">
                <option selected value="0">Notez sur/10</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
            </select><br>
            <a class="erreur"> <?= $error2 ?> </a><br>
            <a class="echo"> <?= $echo2 ?> </a><br>
            <input type="submit" name="sub_avis" value="Notez">
            </form>

            
            <div class="form_2_note" style="display:<?= $display2 ?> ">
            <p class="note_user">Votre note</p>
            <progress class="progress" max="10" value="<?= $result_notes[0][0] ?>"><?= $result_notes[0][0] ?></progress>
                    <br>
                <?= round($result_notes[0][0],1) ?>
            <form action="" method="post">
            <label for="note"> Modifiez votre note <br></label>
            <select name="modif" value="Notez sur/">
                <option selected value="0">Modifez votre note</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
            </select><br>
            <a class="erreur"> <?= $error2 ?> </a><br>
            <a class="echo"> <?= $echo2 ?> </a><br>
            <input type="submit" name="sub_modif" value="Modifier">
            </form>
            </div>
        </div> 
    </main>

<?php 



require "../require/requireFooter.php";
?>