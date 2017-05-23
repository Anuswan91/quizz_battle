<?php include '../php/RoomController.php'; ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Battle Quizz Room</title>
	</head>
	<body>
		<div id="header">
			<h1>
				Débutera dans :
			</h1>
			<h2>Nombre de joueur :
				<?php
					echo $listJoueur['0']['nb_player'];
				 ?> 
			</h2>
			<ul>
				<?php
				 foreach ($listJoueur as $key => $value) {
				 	echo '<li>' . $value['plr_pseudo'] . '</li>';
				 }
				?>
			</ul>
				<select>
					<?php
						foreach ($themes as $key => $value) {	
							echo "<option value='".$value['thm_id']."''>".$value['thm_name']."</option>";
						}
					?>
				</select>
				<br>
			<a href="#">Quitter</a>
		</div>
	</body>
</html>