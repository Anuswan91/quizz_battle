<?php
	/**
	*** Fichier de gestion d'une room
	**/
	if(session_id() == null){
		session_start();
	}

	//Connexion à la base de données
	include "../includes/DB.php";

	//On vérifie que le joueur est bien assigné à un jeu
	if(isset($_SESSION['Game']['gme_id'])){

		//On récupère ka liste des joueurs et le nombre
		$query = $bdd->query("SELECT plr_pseudo, COUNT(*) as nb_player
								FROM game_has_player ghp
								INNER JOIN player p ON p.plr_id = ghp.ghp_player_id
								WHERE ghp_game_id =".intval($_SESSION['Game']['gme_id']));
	}

	$listJoueur = $query->fetchAll();

	$themes = $bdd->query("SELECT *
						   FROM theme");

	$themes = $themes->fetchAll();

	//die(var_dump($result))

?>