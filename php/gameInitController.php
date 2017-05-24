<?php
	/**
	*** Fichier de gestion d'une room
	**/
	if(session_id() == null){
		session_start();
	}
	//Connexion à la base de données
	include "../includes/DB.php";

	$sql = "UPDATE game
			SET gme_state_id=3
			WHERE gme_id='".$_SESSION['Game']['gme_id']."';";

	$res = $bdd->exec($sql);
			die(var_dump($sql));


	//game has question todo