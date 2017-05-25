<?php
	/**
	*** Fichier de gestion d'une room
	**/
	if(session_id() == null){
		session_start();
	}
	//Connexion à la base de données
	include "../includes/DB.php";

	$gme_id = $_SESSION['Game']['gme_id'];
	$id_theme = $_GET['idTheme'];

	function uniq_rand($min,$max,$tab)
	{
	    do $rand=rand($min,$max); while(in_array($rand,$tab));
	    return $rand;
	}

	$sql = "UPDATE game
			SET gme_state_id=3
			WHERE gme_id='".$gme_id."';";

	$res = $bdd->exec($sql);

	$query = $bdd->query("SELECT plr_pseudo
								FROM game_has_player ghp
								INNER JOIN player p ON p.plr_id = ghp.ghp_player_id
								WHERE ghp_alive = 1
								AND ghp_game_id =".$gme_id);

	$listJoueur = $query->fetchAll();

	$nb_questions_par_joueur = floor(10 / sizeof($listJoueur));

	$query2 = $bdd->query("SELECT * FROM question WHERE qst_theme_id = ".$id_theme);

	$listQuestions = $query2->fetchAll();

	$randQuestions = array();

	for ($i = 0; $i < $nb_questions_par_joueur; $i ++) {
		$randQuestions[] = uniq_rand(0, sizeof($listQuestions)-1, $randQuestions);
		$bdd->exec("INSERT INTO game_has_question VALUES (".$gme_id.", ".$listQuestions[$randQuestions[$i]]['qst_id'].", 0)");
	}

	header('Location: ../pages/gameView.php');
?>
