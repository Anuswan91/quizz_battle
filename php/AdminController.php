<?php

	/**
	*** Fichier de gestion des questions
	**/

	//Connexion à la base de données
	include "../includes/DB.php";

	if ($_POST) {
		if (isset($_POST['nt_theme'])) {
			// Ajout d'un nouveau thème
			$theme = $_POST['nt_theme'];
			$query = $bdd->query("INSERT INTO theme (`thm_id`, `thm_name`) 
											VALUES (NULL, '".$theme."')");
			header('Location: ../pages/adminView.php');
		}
		elseif (isset($_POST['nq_question'])) {
			var_dump($_POST);
			// Ajout d'un nouveau thème
			$question = $_POST['nq_question'];
			$theme = $_POST['nq_theme'];
			$answerA = $_POST['nq_answerA'];
			$answerB = $_POST['nq_answerB'];
			$answerC = $_POST['nq_answerC'];
			$answerD = $_POST['nq_answerD'];
			 
			$correct = array('correctA', 'correctB', 'correctC', 'correctD');
			foreach($correct as $el) {
				if (isset($_POST['nq_'.$el])) {
					var_dump($el);
				}
			}

			//TODO insérer question
			$query = $bdd->query("INSERT INTO question (`qst_id`, `qst_text`, `qst_theme_id`) 
										VALUES (NULL, '".$question."', '".$theme."')");
			var_dump($bdd->lastInsertId());
			//TODO insérer chaque réponse avec celle qui est bonne

			//header('Location: ../pages/adminView.php');
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
	$allQuestions = $query->fetchAll();
	$questions = array();
	foreach ($allQuestions as $question) {
		var_dump($question);
		$query = $bdd->query("	SELECT * 
								FROM answer
								WHERE ans_question_id = ".$question['qst_id']);
		$answers = $query->fetchAll();
	}	var_dump($answers);
	/*$query = $bdd->query("	SELECT qst_id, qst_text, thm_name, ans_id, ans_text, ans_correct 
							FROM question
							INNER JOIN theme ON thm_id = qst_theme_id
							INNER JOIN answer ON qst_id = ans_question_id");
	$allQuestions = $query->fetchAll();
	$questions = array();
	$answers = array();
	$lastIdQuestion = 0;
	foreach ($allQuestions as $question) {
		var_dump($question);
		//$lastIdQuestion = $question['qst_id'];
		
		if ($question['qst_id'] != $lastIdQuestion) {
			$questions[$lastIdQuestion] = array('qst_text' => $question['qst_text'], 'answers' => $answers);
			$answers = array();
			$lastIdQuestion = $question['qst_id'];
		}
		else{
			array_push($answers, array($question['ans_id'], $question['ans_text'], $question['ans_correct']));
		}
		
	}
	var_dump($answers);*/


?>