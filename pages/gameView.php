<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Quizz Battle</title>
	</head>

	<body>
		<?php
			//On vérifie si les session sont déja activées
			if(session_id() == null){
				session_start();
			}



			include "../includes/DB.php"; //Connexion a la base de données
		?>

		<?php 

			$qst_theme_id = 4;
			$sql_question = "SELECT * FROM question WHERE qst_theme_id = ".$qst_theme_id;			
			$res_question = $bdd->query($sql_question)->fetchAll();
			$rand_question = rand(0, sizeof($res_question)-1);
		?>
		<div id="question">
		<?php 
			echo $res_question[$rand_question]['qst_text'];
		?>
		</div>

		<?php

			$sql_answer = "SELECT * FROM answer WHERE ans_question_id = ".$res_question[$rand_question]['qst_id'];
			$res_answer = $bdd->query($sql_answer)->fetchAll();

			function uniq_rand($min,$max,$tab)
			{
    			do $rand=rand($min,$max); while(in_array($rand,$tab));
    			return $rand;
			}

			$rand_answer = array();
			
			for ($i = 0; $i < 4; $i++)
				$rand_answer[] = uniq_rand(0, 3, $rand_answer);
		?>

		<form action="answerView.php">
			<button name='rep1' type='submit'><?php echo $res_answer[$rand_answer[0]]['ans_text']?></button>
			<button name='rep2' type='submit'><?php echo $res_answer[$rand_answer[1]]['ans_text']?></button>
			<button name='rep3' type='submit'><?php echo $res_answer[$rand_answer[2]]['ans_text']?></button>
			<button name='rep4' type='submit'><?php echo $res_answer[$rand_answer[3]]['ans_text']?></button>
		</form>

	</body>

	<script>
	</script>
</html>
