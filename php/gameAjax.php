<?php
	include "../includes/DB.php";

	function getFocusedQuestion($idGame) {
		include "../includes/DB.php";
		$query = $bdd->query("	SELECT qst_id, qst_text, thm_name, ans_id, ans_text, ans_correct
								FROM game_has_question g
								INNER JOIN question q ON ghq_question_id = qst_id
								INNER JOIN answer a ON ghq_question_id = ans_question_id
								INNER JOIN theme t ON thm_id = qst_theme_id
								WHERE ghq_game_id = '".$idGame."' 
									AND ghq_focus = 1");
		$res = $query->fetchAll();

		return $res;
	}

	function sendAnswer($idGame, $idPlayer, $idAnswer) {
		include "../includes/DB.php";

		$query = $bdd->query("INSERT INTO player_has_answer (`pha_game_id`, `pha_player_id`, `pha_answer_id`) 
								VALUES ('".$idGame."', '".$idPlayer."', '".$idAnswer."')");
	}

	function getScore($idGame) {
		include "../includes/DB.php";

		$query = $bdd->query("	SELECT pha_player_id, ans_id, ans_correct, qst_id
								FROM player_has_answer
								INNER JOIN answer ON pha_answer_id = ans_id
								INNER JOIN question ON ans_question_id = qst_id
								INNER JOIN game_has_question ON pha_game_id = ghq_game_id
									WHERE ghq_focus = 1
									AND pha_game_id = '".$idGame."'");
		$res = $query->fetchAll();

		//TODO while tout le monde n'a pas répondu ou sleep
		//On requête

		//on incrémente le focus
		//return le score pour chaque joueur de la partie
	}

	// Fonction pour récupérer le nombre de joueurs d'une partie
	function getNbPlayers($idGame) {
		include "../includes/DB.php";

		$query = $bdd->query("	SELECT count(*) nb
								FROM game_has_player 
								WHERE ghp_alive = 1 
									AND ghp_game_id = '".$idGame."'");
		return $query->fetchAll();
	}

	// Fonction pour récupérer le nombre de personne ayant répondu à la focused question
	function getNbAnswersOnFocusedQuestion($idGame) {
		include "../includes/DB.php";
		
		$query = $bdd->query("	SELECT count(*) nb 
								FROM player_has_answer
								INNER JOIN answer ON ans_id = pha_answer_id
								INNER JOIN question ON qst_id = ans_question_id
								INNER JOIN game_has_question ON ghq_game_id = pha_game_id
								WHERE ghq_focus = 1
									AND pha_game_id = '".$idGame."'");
		return $query->fetchAll();
	}

	function isEverybodyAnswerFocusedQuestion($idGame) {
		include "../includes/DB.php";
		
		$query = $bdd->query("	SELECT * 
								FROM (		SELECT count(*) nb 
											FROM game_has_player 
											WHERE ghp_alive = 1 
												AND ghp_game_id = '".$idGame."'
										) AS tmp1 
								INNER JOIN (SELECT count(*) nb 
											FROM player_has_answer 
											INNER JOIN answer ON ans_id = pha_answer_id 
											INNER JOIN question ON qst_id = ans_question_id 
											INNER JOIN game_has_question ON ghq_game_id = pha_game_id 
											WHERE ghq_focus = 1 
												AND pha_game_id = '".$idGame."'
										) AS tmp2 
								ON tmp1.nb = tmp2.nb");
		return (bool) $query->fetchAll();
	}

	$data = array();

	if (isset($_GET['gfq']) && isset($_GET['idGame'])) {
		$idGame = $_GET['idGame'];
		$data = getFocusedQuestion($idGame);
	}
	//sendAn
	elseif (isset($_GET['sa']) && isset($_GET['idGame']) && isset($_GET['idPlayer']) && isset($_GET['idAnswer'])) {
		$idGame = $_GET['idGame'];
		$idPlayer = $_GET['idPlayer'];
		$idAnswer = $_GET['idAnswer'];

		sendAnswer($idGame, $idPlayer, $idAnswer);
	}
	//get score
	elseif (isset($_GET['gs']) && isset($_GET['idGame'])) {
		$idGame = $_GET['idGame'];
		
		$data = getScore($idGame);
	}

	//sleep(3);

	
	
	echo json_encode( $data );
?>