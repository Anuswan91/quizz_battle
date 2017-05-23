<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Quizz Battle</title>
	</head>

	<body>
		<?php
			include "../php/gameController.php"; //Connexion a la base de données
		?>

		<div id="question">
		<?php 
			echo $res_question[$rand_question]['qst_text'];
		?>
		</div>

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
