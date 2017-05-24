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

	function getScore($idGame, $idAnswer) {
		include "../includes/DB.php";

		$cpt = 0;
		while ($cpt < 5 && !isEverybodyAnswerFocusedQuestion($idGame) ) {
			sleep(1);
			$cpt++;
		}
		
		$question = getQuestionByAnswer($idAnswer);
		
		incrementFocus($idGame, $question['qst_id']);

		return getScoreByGame($idGame);
	}

	// Fonction pour récupérer une question avec l'id d'une réponse
	function getQuestionByAnswer($idAnswer) {
		include "../includes/DB.php";

		$query = $bdd->query("	SELECT qst_id, qst_text, qst_theme_id
								FROM answer
								INNER JOIN question on ans_question_id = qst_id
									WHERE ans_id = '".$idAnswer."'");
		return $query->fetch();
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

	// Fonction pour récupérer le nombre de joueurs d'une partie
	function getScoreByGame($idGame) {
		include "../includes/DB.php";

		$query = $bdd->query("	SELECT pha_player_id, plr_pseudo, sum(ans_correct) score 
								FROM `player_has_answer` 
								INNER JOIN answer ON pha_answer_id = ans_id
								INNER JOIN player ON pha_player_id = plr_id
								WHERE pha_game_id = '".$idGame."'
								GROUP BY pha_player_id");
		return $query->fetchAll();
	}

	// Fonction pour le focus d'une question
	function incrementFocus($idGame, $idQuestion) {
		include "../includes/DB.php";

		$query = $bdd->query("	SELECT ghq_question_id, ghq_focus 
								FROM game_has_question
								WHERE ghq_game_id = '".$idGame."'");
		
		$search = false;
		$questionNewFocus = NULL;
		$questionOldFocus = $idQuestion;
		foreach ($query->fetchAll() as $el) {
			if ($search) {
				$search = false;
				$questionNewFocus = $el['ghq_question_id'];
			}
			if ($el['ghq_question_id'] == $questionOldFocus) {
				$search = true;
			}
		}
		
		$query = $bdd->query("	UPDATE game_has_question SET `ghq_focus` = '0' 
								WHERE `ghq_game_id` = '".$idGame."' 
									AND `ghq_question_id` = '".$questionOldFocus."'");
		if ($search && $questionNewFocus == NULL) {
			//fin du game
		}
		else {
			//Update new focus
			$query = $bdd->query("	UPDATE game_has_question SET `ghq_focus` = '1' 
									WHERE `ghq_game_id` = '".$idGame."' 
										AND `ghq_question_id` = '".$questionNewFocus."'");
		}
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

	// Fonction qui renvoie un booleen pour savoir si tous les joueurs alive ont répondu à la focused question
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

	// Get focus
	if (isset($_GET['gfq']) && isset($_GET['idGame'])) {
		$idGame = $_GET['idGame'];
		$data = getFocusedQuestion($idGame);
	}
	//send answer
	elseif (isset($_GET['sa']) && isset($_GET['idGame']) && isset($_GET['idPlayer']) && isset($_GET['idAnswer'])) {
		$idGame = $_GET['idGame'];
		$idPlayer = $_GET['idPlayer'];
		$idAnswer = $_GET['idAnswer'];

		sendAnswer($idGame, $idPlayer, $idAnswer);
	}
	//get score
	elseif (isset($_GET['gs']) && isset($_GET['idGame']) && isset($_GET['idAnswer'])) {
		$idGame = $_GET['idGame'];
		$idAnswer = $_GET['idAnswer'];
		
		$data = getScore($idGame, $idAnswer);
	}
	
	echo json_encode( $data );
?>