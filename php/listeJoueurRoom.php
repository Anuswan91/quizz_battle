<?php
    /**
     * Appel Ajax qui permet d'afficher dynamiquement la liste de joueurs dans une room
     * Fichier appelé via une methode Ajax dans "pages/RoomView.php"
     */
    //On vérifie si les session sont déja activées
    if(session_id() == null){
        session_start();
    }

    include "../includes/DB.php";
    header("Content-Type: text/plain");

	//Requête pour récupérer les informations des profils des joueurs d'une room
	//On vérifie que le joueur est bien assigné à un jeu
    if(isset($_SESSION['Game']['gme_id'])){
        $query = $bdd->query("SELECT plr_pseudo
                                FROM game_has_player ghp
                                INNER JOIN player p ON p.plr_id = ghp.ghp_player_id
                                WHERE ghp_alive = 1
                                AND ghp_game_id =".intval($_SESSION['Game']['gme_id']));

        $listJoueur = $query->fetchAll();
        ?>


<h1>Joueurs (<?php echo $query->rowCount();?>):</h1>
<div class="list-group">
    <?php
    foreach ($listJoueur as $key => $value) {
        ?>
        <a class="list-group-item"><?php echo $value['plr_pseudo']; ?></a>
        <?php
    }
    $query->closeCursor();
    }
    ?>
</div>