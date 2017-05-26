<?php
	include "../includes/DB.php";

	// Fonction qui retourne la liste des joueurs d'une partie
	function getPlayerByGame($idGame) {
		include "../includes/DB.php";

		$query = $bdd->query("	SELECT ghp_game_id, plr_id, plr_pseudo
								FROM game_has_player
								INNER JOIN player ON ghp_player_id = plr_id
								WHERE ghp_game_id = '".$idGame."'
									AND ghp_alive = 1");
		
		return $query->fetchAll();
	}

	// Fonction pour récupérer le nombre de joueurs d'une partie
	function getScoreByGame($idGame) {
		include "../includes/DB.php";
		
		$array = array();
		
		foreach (getPlayerByGame($idGame) as $player) {
			$query = $bdd->query("	SELECT pha_player_id, SUM(ans_correct) score 
									FROM player_has_answer
									INNER JOIN answer ON pha_answer_id = ans_id
									WHERE pha_game_id = '".$idGame."'
										AND pha_player_id = '".$player['plr_id']."'");

			$res = $query->fetch();

			if ($res['score'] == NULL) {
				$res['score'] = 0;
			}

			$array[$player['plr_id']] = array('pseudo' => $player['plr_pseudo'], 'score' => $res['score'], 'plr_id' => $player['plr_id']);
		}

		sort($res['score'], SORT_DESC);
		
		return $array;
	}

	$scores = array();

	if (isset($_GET) && isset($_GET['idGame'])) {
		$idGame = $_GET['idGame'];
		$scores = getScoreByGame($idGame);
	}
?>