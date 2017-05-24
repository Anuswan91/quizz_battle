<?php include '../php/RoomController.php'; ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Battle Quizz Room</title>
	</head>
	<body>
		<div>
			<h1>
				Débutera dans : <div id="time"></div>
			</h1>
		</div>
		<div id="player">
			<h2>Nombre de joueur :
				<?php
					echo $query->rowCount();
				 ?> 
			</h2>
			<ul id="player_list">
				<?php
				 foreach ($listJoueur as $key => $value) {
				 	echo '<li>' . $value['plr_pseudo'] . '</li>';
				 }
				?>
			</ul>
		</div>
		<div id="body">
			<select>
				<?php
					foreach ($themes as $key => $value) {	
						echo "<option value='".$value['thm_id']."''>".$value['thm_name']."</option>";
					}
				?>
			</select>
			<br>
			<a href="../php/leaveRoomController.php">Quitter</a>
		</div>
		<script type="text/javascript">
			var time = <?php echo $time['time']; ?> ;

			time = 45 - time;

			var div = document.getElementById("time");
			div.innerHTML = time + "s";

			interval = setInterval(function(){
				time--
				div.innerHTML = time + "s";
				if(time <= 0){
					clearInterval(interval);
					clearInterval(joueurs);
					window.location = window.location.origin + "/quizz_battle/pages/gameView.php";
				}
			},1000);

			//Objet AJax
			function getXMLHttpRequest() {
			    var xhr = null;
			     
			    if (window.XMLHttpRequest || window.ActiveXObject) {
			        if (window.ActiveXObject) {
			            try {
			                xhr = new ActiveXObject("Msxml2.XMLHTTP");
			            } catch(e) {
			                xhr = new ActiveXObject("Microsoft.XMLHTTP");
			            }
			        } else {
			            xhr = new XMLHttpRequest();
			        }
			    } else {
			        alert("Votre navigateur ne supporte pas l'objet XMLHTTPRequest...");
			        return null;
			    }
			    return xhr;
			}


			var joueurs = setInterval('requestListeJoueur(affichageListeJoueur)',1500);
			//Affiche la liste des joueurs
			function requestListeJoueur(callback) {
			    var xhr = getXMLHttpRequest();

			    xhr.onreadystatechange = function() {
			        if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
			            callback(xhr.responseText);
			        }
			    };
			    //var msg = encodeURIComponent(document.getElementById("barre-msg").value);
			    xhr.open("GET", "../php/listeJoueurRoom.php", true);
			    xhr.send(null);
			}

			//Permet d'afficher la liste des joueur dynamiquement
			function affichageListeJoueur(data){
			    if(data.length > 0){
			    	console.log(data);
			        document.getElementById('player').innerHTML = data;
			    }
			}
		</script>
	</body>
</html>