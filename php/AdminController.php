<?php

/**
	*** Fichier de gestion des questions
	**/
	if(session_id() == null){
		session_start();
	}

	//Connexion à la base de données
	include "../includes/DB.php";

	//Selection des thèmes
	$query = $bdd->query("SELECT thm_id, thm_name
						  FROM theme");

	$themes = $query->fetchAll();

	//Selection des question
	die(var_dump($themes));

?>