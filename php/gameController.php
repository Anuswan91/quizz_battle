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

	$qst_theme_id = 4;
	$sql_question = "SELECT * FROM question WHERE qst_theme_id = ".$qst_theme_id;			
	$res_question = $bdd->query($sql_question)->fetchAll();
	$rand_question = rand(0, sizeof($res_question)-1);

	$sql_answer = "SELECT * FROM answer WHERE ans_question_id = ".$res_question[$rand_question]['qst_id'];
	$res_answer = $bdd->query($sql_answer)->fetchAll();

	$rand_answer = array();
	
	for ($i = 0; $i < 4; $i++)
		$rand_answer[] = uniq_rand(0, 3, $rand_answer);
?>