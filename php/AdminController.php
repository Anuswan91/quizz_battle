<?php

	/**
	*** Fichier de gestion des questions
	**/

	//Connexion à la base de données
	include "../includes/DB.php";

	if ($_POST) {
		if ($_POST['theme']) {
			// Ajout d'un nouveau thème
			$theme = $_POST['theme'];
			$query = $bdd->query("INSERT INTO theme (`thm_id`, `thm_name`) 
											VALUES (NULL, '".$theme."')");
			header('Location: ../pages/adminView.php');
		}
	}

	if(session_id() == null){
		session_start();
	}	

	//Selection des thèmes
	$query = $bdd->query("SELECT thm_id, thm_name
						  FROM theme");
	$themes = $query->fetchAll();

	//Selection des question
	$query = $bdd->query("	SELECT qst_id, qst_text, thm_name 
							FROM question
							INNER JOIN theme ON thm_id = qst_theme_id");
	$questions = $query->fetchAll();


?>