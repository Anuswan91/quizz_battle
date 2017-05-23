<?php
	include "../includes/DB.php";

	function getFocusedQuestion($idGame) {

	}

	function sendAnswer($idGame, $idPlayer, $idAnswer) {

	}

	function getScore($idGame) {

	}

	$data = array();

	if (isset($_GET['gfq']) && isset($_GET['idGame'])) {
		$idGame = $_GET['idGame'];
		getFocusedQuestion($idGame);
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
		
		getScore($idGame);
	}

	//sleep(3);

	
	
	echo json_encode( $data );
?>