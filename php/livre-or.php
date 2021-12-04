<?php

session_start();

require "../require/require_bdd.php";


$requete_affichage_comm1 = mysqli_query ( $conn , "SELECT login,commentaire, DATE_FORMAT(date, '%d/%m/%Y') AS 'datefr' , DATE_FORMAT(date, '%H:%i:%s') AS 'heurefr' FROM `commentaires` INNER JOIN `utilisateurs` ON commentaires.id_utilisateur = utilisateurs.id ORDER BY `date` DESC");
$result_affichage = mysqli_fetch_all($requete_affichage_comm1, MYSQLI_ASSOC);

$requete_notes = mysqli_query($conn, "SELECT AVG(note) FROM notes ");
$result_notes = mysqli_fetch_all($requete_notes);
require "../require/requireHeader.php";

?>
    <main>
        <div class="main_livreor">
            <div class="form_livreor">
                <form name="form_desc" method="post" action="">
                    <p class="sub_livre_or"> Filtrez les commentaires : </p>
                    <input type="submit" name="desc" value="Nouveaux">
                    <input type="submit" name="asc" value="Anciens">
                </form>
                <div class="sous_livreor">
                    <p class="notes_livreor">La note des utilisateurs</p>
                    <progress class="progress" max="10" value="<?= $result_notes[0][0] ?>"><?= $result_notes[0][0] ?></progress>
                    <br>
                    <a class="note_users"> <?= round($result_notes[0][0],1) ?> </a>
                </div>
            </div>
            <div class="comm_livreor">
                <h3 class="titre_livreor">Les commentaires des utilisateurs</h3>
                <?php

                if (isset($_POST['desc'])){
                    foreach($result_affichage as $result){
                ?>
                        <div class="comm_livre">
                            <p class="login_comm">Posté par : <a class="log_com_a"><?= $result['login']?></a></p>
                            <i class="date_comm">Le <?= $result['datefr']?> à <?= $result['heurefr'] ?></i>
                            <p class="comm"><?= nl2br($result['commentaire']) ?></p>
                        </div>
                <?php
                    } 
                }
                elseif (isset ($_POST['asc'])){
                    $requete_affichage_asc = mysqli_query($conn , "SELECT login,commentaire, DATE_FORMAT(date, '%d/%m/%Y') AS 'datefr' , DATE_FORMAT(date, '%H:%i:%s') AS 'heurefr' FROM `commentaires` INNER JOIN `utilisateurs` ON commentaires.id_utilisateur = utilisateurs.id ORDER BY `date` ASC");
                    $result_affichage_asc = mysqli_fetch_all($requete_affichage_asc, MYSQLI_ASSOC);
                    foreach($result_affichage_asc as $res){
                ?>
                        <div class="comm_livre">
                            <p class="login_comm">Posté par : <a class="log_com_a"><?= $res['login'] ?></a></p>
                            <i class="date_comm">Le <?= $res['datefr']?> à <?= $res['heurefr'] ?></i>
                            <p class="comm"><?= nl2br($res['commentaire']) ?></p>
                        </div>

                <?php
                }
                } else {
                    foreach($result_affichage as $result){
                        ?>
                                <div class="comm_livre">
                                    <p class="login_comm">Posté par : <a class="log_com_a"><?= $result['login']?></a></p>
                                    <i class="date_comm">Le <?= $result['datefr']?> à <?= $result['heurefr'] ?></i>
                                    <p class="comm"><?= nl2br($result['commentaire']) ?></p>
                                </div>
                        <?php
                    } 
                }
                ?>
            </div>
        </div>
    </main>
<?php
require "../require/requireFooter.php";
?>