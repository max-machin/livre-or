<?php

session_start();

//On fait appel à la base de données
require "../require/require_bdd.php";

$error = "";

//Si le formulaire est soumis
if ( isset( $_POST['submit'] ) ) {
    //Si le login ainsi que le password sont bien remplis
    if ( !empty ( $_POST['login'] && $_POST['password'] ) ) {

        $login = htmlspecialchars($_POST['login']);

        //On effectue requête pour récupérer nos éléments de comparaison en base de données
        $requete_conn = mysqli_query ( $conn, "SELECT * FROM `utilisateurs` WHERE `login` = '". htmlspecialchars($_POST['login']). "' ");
        $result_log = mysqli_fetch_assoc ( $requete_conn);

        //Si le login entré dans le formulaire correspond à celui connu en base de données alors on procéde à la vérification suivante
        if  ($login == $result_log['login'] ) {

            //On déhache le password afin de pouvoir le comparer à celui rentrer dans le form, si ce dernier est correct alors on connecte l'utilisateur
            if ( password_verify ( $_POST['password'], $result_log['password'] ) ) {
                
                //On définie nos variables de session qui recupérent les valeurs de notre formulaire ainsi que de l'id concerné pour l'affichage
                $_SESSION['id'] = $result_log['id'];
                $_SESSION['login'] = $result_log['login'];
                $_SESSION['password'] = htmlspecialchars ( $_POST['password'] );

                //Puis on redirige l'utilisateur vers la page d'index en mode connecté
                header('location: ../index.php');
            }
            //Sinon si le mot de passse est incorrect on affiche le message d'erreur concerné
            else {
                $error = "Password incorrect";
            }
        }
        //Si le login est incorrect on affiche le message d'erreur
        else {
            $error = "Login incorrect";
        }
    }
    //Et si le formulaire n'est pas convenablement rempli , on affiche également le message d'erreur ci dessous
    else {
        $error = "Veuillez remplir tous les champs";
    }
}

require "../require/requireHeader.php";

?>

    <main>
        <div class="bloc_main_connexion">
            <form method="post" action="">
                <label for="login"> Login <br>
                    <input type="text" name="login" placeholder="login">
                </label><br>

                <label for="password"> Password <br>
                    <input type="password" name="password" placeholder="password">
                </label><br>

                <a class="erreur"><?= $error ?></a><br>
                <input class="submit_conn" type="submit" name="submit" value="Connexion">
            </form>
        </div>
    </main>

<?php 
require "../require/requireFooter.php";
?>