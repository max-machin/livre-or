<?php

require "../require/require_bdd.php";

$error = "";

if ( isset ( $_POST['submit'])){

    if ( !empty ( $_POST['login']) && !empty ( $_POST['password']) && !empty ( $_POST['conf_password'])){

        if ( $_POST['password'] === $_POST['conf_password'] ){
            $requete_log = mysqli_query($conn, "SELECT COUNT(*) FROM `utilisateurs` WHERE `login` = '". htmlspecialchars($_POST['login']) ."' ");
            $result_log = mysqli_fetch_array($requete_log);

            if( $result_log['COUNT(*)'] == 1){
                $error = "Le login est déjà utilisé";
            }
           
            else{
                $hash_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $requete = mysqli_query($conn, "INSERT INTO `utilisateurs`(`login`, `password`) VALUES ('". htmlspecialchars($_POST['login']) ."', '$hash_password')");
                header('location: connexion.php');
            }

        }else{

            $error = "Veuillez renseigner deux mot de passe indentiques";
        }
    }else{
        $error = "Veuillez remplir tous les champs";
    }
}

require "../require/requireHeader.php";

?>

    <main>
        <div class="contenu_inscription">

            <form action="" method="post">

                <label for="login"> Login<br>
                <input type="text" name="login" placeholder="login">
                </label><br>

                <label for="password"> password <br>
                <input type="password" name="password" placeholder="password">
                </label><br>

                <label for="conf_password"> confirm password <br>
                <input type="password" name="conf_password" placeholder="confirm your password">
                </label><br>
                <a class="erreur"><?= $error ?></a>
                <br>
                <input class="submit_inscr" type="submit" name="submit" value="S'inscrire">
            </form>

        </div>

    </main>
<?php 
require "../require/requireFooter.php";
?>