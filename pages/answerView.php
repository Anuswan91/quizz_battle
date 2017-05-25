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

			$ans_question_id = 0;
			$sql = "SELECT ans_correct FROM answer WHERE ans_id = ".$ans_question_id;
			$res = $bdd->query($sql)->fetchAll();

		?>

		<p>YEAH !</p>

	</body>

	<script>
	</script>
</html>
