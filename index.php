<?php

session_start();

require "require/require_bdd.php";

$display ="";

require "require/requireHeader_index.php";

?>



    <main>
        <div class="contenu_index">
            <div class="sous_contenu_index">
                <h3 class="titre_contenu_index">Laissez nous une trace de votre imagination ...</h3>    
                <p class="sous_titre_contenu_index">Une fois inscrit sur notre site, vous pourrez nous laisser un commentaire    
                </br> dans le <a class="href_livre" href="php/livre-or.php"> livre d'or</a>.
                </p>
            </div>

            <div class="cont_comm">
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