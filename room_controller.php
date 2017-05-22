<?php
	/**
	*** Fichier de gestion d'une room
	**/
	if(session_id() == null){
		session_start();
	}

	//Connexion à la base de données
	//include "connexion.php";

	$hote = 'localhost'; // Adresse du serveur 
	$login = 'root'; // Login 
	$pass = ''; // Mot de passe 
	$base = 'quizz_battle2'; // Base de données à utiliser 

	$link = mysql_connect($hote, $login, $pass); 
	mysql_select_db($base, $link);

	$query = "SELECT * FROM player";
	$result = mysql_query($query, $link) or die($query . " - " . mysql_error());

	$nbResults = mysql_num_rows($result);
	echo $nbResults;
	echo "<br /><br />";

	//header('Location: room_view.php');

?>