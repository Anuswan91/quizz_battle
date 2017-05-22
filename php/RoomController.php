<?php
	/**
	*** Fichier de gestion d'une room
	**/
	if(session_id() == null){
		session_start();
	}

	//Connexion à la base de données
	include "../includes/DB.php";

	$query = $bdd->query("SELECT plr_pseudo, COUNT(*) as nb_player
						  FROM player");

	$result = $query->fetchAll();
	die(var_dump($result))

?>