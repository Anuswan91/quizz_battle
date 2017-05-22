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

		<form action="answerView.php">
			<button name='rep1' type='submit'>Reponse 1</button>
			<button name='rep2' type='submit'>Reponse 2</button>
			<button name='rep3' type='submit'>Reponse 3</button>
			<button name='rep4' type='submit'>Reponse 4</button>
		</form>

	</body>

	<script>
	</script>
</html>
