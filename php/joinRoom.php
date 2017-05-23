<?php 

	//Activation des variables de session
	if(session_id() == null){
		session_start();
	}

	$_SESSION['Auth']['plr_pseudo'] = NULL;
	$_SESSION['Auth']['plr_id'] = NULL;

	//Connexion à la base de données
	include "../includes/DB.php";

	//Génération du login, pseudo du joueur ou sinon guest + month day year hour i and second
	//$psdPlr = isset($_SESSION['pseudo']) ? $_SESSION['pseudo'] : "guest" . date("_mdyhis");
	if(isset($_SESSION['Auth']['plr_pseudo']) && isset($_SESSION['Auth']['plr_pseudo'])) {
		echo "la";
		$plrPsd = $_SESSION['Auth']['plr_pseudo'];
		$plrId = $_SESSION['Auth']['plr_id'];

	} else {
		echo "l";
		$plrPsd = "guest" . date("_mdyhis");
		
		$error = $bdd->exec("INSERT INTO player (plr_guest, plr_pseudo,plr_password) VALUES(0, '". $plrPsd ."', '');") ;

		if($error == 0){
			print_r($bdd->errorInfo());
		}

		$plrId = $bdd->lastInsertId();
		$_SESSION['Auth']['plr_pseudo'] = $plrPsd;
		$_SESSION['Auth']['plr_id'] = $plrId;
	}

	//Nous récupérons une room courante => game à l'état initialisation
	$room = $bdd->query("SELECT gme_id
						 FROM game
						 WHERE gme_state_id = 1
						 AND gme_nb_player <= 5
                         LIMIT 1");

	//Si il n'y a pas de room actuellement libre, on la créer
	if($room->rowCount() == 0){

		//Création de la room
		$error = $bdd->exec("INSERT INTO game(gme_date, gme_nb_player, gme_state_id) VALUES (CURDATE(), 1 , 1); ");

		if($error == 0){
			print_r("File joinRoom.php insert game : " . $bdd->errorInfo());
		}

		$roomId = $bdd->lastInsertId();
	} 
	else
		$roomId = $room->fetch();


	//Ajout du joueur à la room
	$bdd->exec("INSERT INTO game_has_player(ghp_alive, ghp_game_id, ghp_player_id) VALUES(1, ". intval($roomId) .", ". $plrId ." );");

	if($error == 0){
			print_r("File joinRoom.php insert game_has_player : " . $bdd->errorInfo());
	}

	header('Location: ../pages/roomView.php');