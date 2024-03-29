<?php

session_start();

require "../require/require_bdd.php";

$error = "";
$echo = "";

$display1 = "block";
$display2 = "none";

//Si le formulaire est envoyé
if ( isset ( $_POST['sub_login'] ) ) {

    //Si le login est bien rempli
    if ( !empty ( $_POST['login'])){
        //On récupére les informations du l'utilisateurs ou l'id est correspondant à celui récupérer en session
        $requete_profil1 = mysqli_query($conn, " SELECT * FROM `utilisateurs` WHERE `id` = '$_SESSION[id]'");
        $result_profil1 = mysqli_fetch_array($requete_profil1);

        if ( $_POST['login'] != $result_profil1['login'] ) {

            $requete_log_profil = mysqli_query($conn, "SELECT COUNT(*) FROM `utilisateurs` WHERE `login` = '$_POST[login]' ");
            $result_log_profil = mysqli_fetch_array($requete_log_profil);

            if ( $result_log_profil['COUNT(*)'] == 0) {
                $login = htmlspecialchars($_POST['login']);
                $requete_profil2 = mysqli_query($conn, "UPDATE `utilisateurs` SET `login`='$login' WHERE `login` = '$result_profil1[login]'");
                $_SESSION['login'] = htmlspecialchars($login);
                $echo = "Login modifié avec succés";

            } else {
                $error = "Le login est déjà utilisé";
            }

        } else {
            $error = "Veuillez insérer un login différent de votre ancien";
        }

    } else {
        $error = "Veuillez remplir le champ login";
    }
}


if ( isset ( $_POST['sub_oldpassword'] ) ) {
    if ( !empty ( $_POST['old_password'] ) ) {
        $requete_profil2 = mysqli_query($conn, " SELECT * FROM `utilisateurs` WHERE `login` = '$_SESSION[login]'");
        $result_profil2 = mysqli_fetch_assoc($requete_profil2);

        if ( password_verify ( $_POST['old_password'], $result_profil2['password'] ) ) {
            $echo = "Password correct";
            $display1 = "none";
            $display2 = "block";
        } else {
            $error = "Ancien password incorrect";
        }
    } else {
        $error = "Veuillez remplir le champ password";
    }
}
        
$error2 = "";
$echo2 = "";    
if ( isset ( $_POST['sub_newpassword'] ) ) {

    if ( !empty ($_POST['password'] && $_POST['password_conf'])){
                
        if ( $_POST['password'] == $_POST['password_conf'] ) {

            $requete_password = mysqli_query ( $conn , "SELECT * FROM `utilisateurs` where `id` = '$_SESSION[id]'");
            $result_password = mysqli_fetch_assoc($requete_password);

            if ( password_verify ( $_POST['password'], $result_password['password'])){
                $error2 = "Veuillez insérer un password différent de votre ancien";
                $display1 = "none";
                $display2 = "block";
                
            } else {
                $hash_password = password_hash( $_POST['password'] , PASSWORD_DEFAULT);
                $requete_update_password = mysqli_query ( $conn , "UPDATE `utilisateurs` SET `password` = '$hash_password' WHERE `id` = '$_SESSION[id]'");
                $echo2 = "password modifié avec succés";
            }

        } else {
            $error2 = "Entrez 2 password identiques";
            $display1 = "none";
            $display2 = "block";
        }
    } else {
        $error2 = "Veuillez remplir les champs password";
        $display1 = "none";
        $display2 = "block";
    }
}

$echo3 = "";

require "../require/requireHeader.php";

?>
    <main class="main_profil">
        <div class="bloc_main_profil">
            <div class="sous_bloc_profil">
            <h3 class="sous_titre_profil">Modifier vos informations</h3>
            <form method="post" action="">
                <label for="login"> Login <br>
                    <input type="text" name="login" placeholder="<?= $_SESSION['login'] ?>">
                    <input class="submit_profil" type="submit" name="sub_login" value="✎">
                </label><br>
                <a class="erreur"><?= $error ?></a>

                <a class="echo"><?= $echo ?></a>
            </form>
            <?php


            ?>
            <form method="post" action="" style="display: <?= $display1 ?>;">
                <label for="password"> Ancien password <br>
                    <input type="password" name="old_password" placeholder="Votre ancien password">
                    <input class="submit_profil" type="submit" name="sub_oldpassword" value="✎">
                </label><br>
                <a class="echo"><?= $echo2 ?></a>
            </form>

            <form method="post" action="" style="display: <?= $display2 ?>;">
                <label for="new_password">Nouveau password <br>
                    <input type="password" name="password" placeholder="Password">
                </label><br>

                <label for="new_password_conf"> Confirmer nouveau password <br>
                    <input type="password" name="password_conf" placeholder="Confirmez votre password">
                    <br>
                </label>
                <a class="erreur"><?= $error2 ?></a>
                <br>
                <input class="submitt_profil" type="submit" name="sub_newpassword" value="Modifier">
            </form>
            </div>
        </div>
        <div class="bloc_main_profil2">
            <h3 class="sous_titre_profil2">Vos commentaires postés</h3>
            <hr>
            <?php
                $req_com = mysqli_query($conn,"SELECT id,commentaire, DATE_FORMAT(date, '%d/%m/%Y') AS 'datefr' , DATE_FORMAT(date, '%H:%i:%s') AS 'heurefr' FROM commentaires WHERE id_utilisateur = '$_SESSION[id]' ORDER BY `date` DESC");
                while($res_com = mysqli_fetch_array($req_com, MYSQLI_ASSOC)){
                    if (isset($_POST['supp_comm']) && $res_com['id'] == $_POST['id']){
                        $id = $_POST['id'];
                        $delete = mysqli_query($conn , "DELETE FROM commentaires WHERE id = '$id'");
                        header('location: profil.php');
                        exit;
                    }
            ?>
            <div class="bloc_profil">
            <form method="post" action="">
                <p class="date_comm_profil">Posté le <?= $res_com['datefr'] ?> à <?= $res_com['heurefr'] ?> </p>
                <p class="comm_profil"> <?= nl2br($res_com['commentaire']) ?> </p>
                <input type="submit" name="supp_comm" value="Supprimer">
                <input type="hidden" name="id" value="<?= $res_com['id'] ?>">
                </form>
            </div>
            
            <?php
                }
            ?>
        </div>
        <div class="bloc_main_profil">
        <h3 class="sous_titre_profil">Publiez un commentaire !</h3>
        <a href="commentaire.php" class="ref_profil">Commentaire</a>
        </div>
    </main>

<?php 
require "../require/requireFooter.php";
?>