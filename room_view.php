<?php include 'room_controller.php'; ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Battle Quizz Room</title>
	</head>
	<body>
		<div id="header">
			<h1>Nom de la partie : 
				<?php

					echo $result['0']['nb_player'];
				 ?> 
			</h1>
			<h2>Nombre de joueur :</h2>
			<ul>
				<?php
				 foreach ($result as $key => $value) {
				 	echo '<li>' . $value['plr_pseudo'] . '</li>';
				 }
				?>
			</ul>
		</div>
	</body>
</html>