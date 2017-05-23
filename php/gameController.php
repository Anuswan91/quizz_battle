<?php
	//On vérifie si les session sont déja activées
	if(session_id() == null){
		session_start();
	}

	function uniq_rand($min,$max,$tab)
	{
	    do $rand=rand($min,$max); while(in_array($rand,$tab));
	    return $rand;
	}

	include "../includes/DB.php"; //Connexion a la base de données

	if (isset($_GET['question_number']))
		$question_number = $_GET['question_number'];

	//$gme_id = $_SESSION['Game']['gme_id'];

	//$sql_question = "SELECT * FROM game_has_question WHERE ghq_game_id = ".$gme_id;
	$sql_question = "SELECT * FROM question";
	$res_question = $bdd->query($sql_question)->fetchAll();

	$res_answers = array();

	for ($i = 0; $i < sizeof($res_question); $i ++) {

		$sql_answer = "SELECT * FROM answer WHERE ans_question_id = ".$res_question[$i]['qst_id'];
		$res_answer = $bdd->query($sql_answer)->fetchAll();
		$res_answers[$i] = $res_answer;
	}

	$rand_answers = array();

	for ($i = 0; $i < sizeof($res_question); $i ++) {

		$rand_answer = array();

		for($j = 0; $j < 4; $j ++)
	    	$rand_answer[] = uniq_rand(0, 3,$rand_answer);

	    $rand_answers[$i] = $rand_answer;
	}
?>