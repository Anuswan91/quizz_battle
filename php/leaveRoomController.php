<?php
//Fichier permettant de quitter une room

    //On vérifie si les session sont déja activées
    if(session_id() == null){
        session_start();
    }

    include "../includes/DB.php";

     if(isset($_SESSION['Game']['gme_id']) && isset($_SESSION['Auth']['plr_id']) && isset($_SESSION['Auth']['plr_pseudo'])){

     	//On enleve le joueur de la room
     	$bdd->exec("UPDATE game_has_player SET ghp_alive =  0 WHERE ghp_game_id =". intval($_SESSION['Game']['gme_id']) . " AND ghp_player_id = ".intval($_SESSION['Auth']['plr_id']).";");

     	//On décrémente le nombre de joueurs dans une room
     	$bdd->exec("UPDATE game SET gme_nb_player = gme_nb_player - 1 WHERE gme_id =". intval($_SESSION['Game']['gme_id']) . ";");

     	//On regarde si c'est le dernier joueur de la room
     	$nb_plr = $bdd->query("SELECT gme_nb_player
     						   FROM game
     						   WHERE gme_id =". intval($_SESSION['Game']['gme_id']));
     	$nb_plr = $nb_plr->fetch();

     	//Si c'est le dernier joueur, on supprime la room
     	if($nb_plr['gme_nb_player'] <= 0){
     		$bdd->exec("UPDATE game SET gme_state_id = 2 WHERE gme_id =". intval($_SESSION['Game']['gme_id']) . ";");
     	}

     	//On supprime la variable de session pour la room_id
     	unset($_SESSION['Game']['gme_id']);

     	//On vérifie si le joueur est un guest
     	$guest = $bdd->query("SELECT plr_guest FROM player WHERE plr_id=".$_SESSION['Auth']['plr_id']);
     	$guest = $guest->fetch();

     	//Si le joueur est un guest on supprimer ses identifiants
     	if($guest['plr_guest'] == 1){
     		unset($_SESSION['Auth']['plr_id']);
     		unset($_SESSION['Auth']['plr_pseudo']);
     	}
     }

     header('Location: ../pages/index.php');
?>