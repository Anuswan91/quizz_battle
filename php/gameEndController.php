<?php
	include "../includes/DB.php";
	
	if(isset($_SESSION['Game']) && isset($_SESSION['Auth'])){
		if($_SESSION['Game']['gme_id'] !== NULL && $_SESSION['Auth']['plr_id'] !== NULL && $_SESSION['Auth']['plr_pseudo'] !== NULL){

			//Changement du statut de la partie
			$error = $bdd->exec("UPDATE game SET gme_state_id = 4 WHERE gme_id =". intval($_SESSION['Game']['gme_id']));

			//Dans le cas d'un bug
			if($error == 0){
				print_r("File gameEndController.php insert game : " . $bdd->errorInfo());
			}

			//On désactive le joueur de la partie
			$error = $bdd->exec("UPDATE game_has_player SET ghp_alive = 0 WHERE ghp_game_id =". intval($_SESSION['Game']['gme_id']) . " AND ghp_player_id =". intval($_SESSION['Auth']['plr_id']));

			if($error == 0){
				print_r("File gameEndController.php insert game_has_player : " . $bdd->errorInfo());
			}

			unset($_SESSION['Game']['gme_id']);

			//On vérifie si le joueur est un guest
			$query = $bdd->query("SELECT plr_guest
								  FROM player
								  WHERE plr_id=". $_SESSION['Auth']['plr_id']);

			$query = $query->fectch();
			if($query['plr_guest'] == 1){
				unset($_SESSION['Auth']['plr_id']);
				unset($_SESSION['Auth']['plr_pseudo']);
			}

			header('Location: ../pages/index.php');
		}
	}
?>