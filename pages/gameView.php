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

		<div id="question"></div>

		<div id="time"></div>

		<div id="ans-container">
			<button id = '0' name='0' type='submit' onclick="answer()"></button>
			<button id = '1' name='1' type='submit' onclick="answer()"></button>
			<button id = '2' name='2' type='submit' onclick="answer()"></button>
			<button id = '3' name='3' type='submit' onclick="answer()"></button>
		</div>
	</body>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>

	<script type="text/javascript">

		idAnswer = 0;
		idQuestion = 0;

		function answer() {
			idAnswer = answer.caller.arguments[0].target.id
			
			idGame = <?php echo $gme_id; ?>;
			idPlayer = <?php echo $plr_id; ?>;

			$.ajax({
  				url: '../php/gameAjax.php?sa&idGame='+idGame+'&idPlayer='+idPlayer+'&idAnswer='+idAnswer,
  				dataType: 'JSON',
  				success: function(data) {
  					console.log(data)
  					// TODO recevoir bool pour réponse
  					//document.getElementById(idAnswer).disabled = true
  				}
			});
		}

		function clock() {
			var div = document.getElementById("time");
			defaultTime = 10
			time = defaultTime
		    div.innerHTML = time + "s";
		    
		    interval = setInterval(function(){
		        time--
		        set_score();
		        div.innerHTML = time + " sec";
		        if(time <= 0){
		            increment_focus()      
		            next_question()
		            time = defaultTime
		        }

		    },1000);
		}

		function increment_focus() {
			idGame = <?php echo $gme_id; ?>;
			//console.log("test incrementation")
			$.ajax({
  				url: '../php/gameAjax.php?if&idGame='+idGame+'&idQuestion='+idQuestion,
  				async: false,
  				dataType: 'JSON',
  				success: function(data) {
  					//console.log("success incrementation")
  					//document.getElementById(idAnswer).disabled = true
  				}
			});
			
		}

		function set_score() {
			idGame = <?php echo $gme_id; ?>;
			//console.log("test incrementation")
			$.ajax({
  				url: '../php/gameAjax.php?gs&idGame='+idGame+'&idAnswer='+idAnswer+'&idQuestion='+idQuestion,
  				async: false,
  				dataType: 'JSON',
  				success: function(data) {
  					//console.log(data)
  					// TODO write in div
  					//document.getElementById(idAnswer).disabled = true
  				}
			});
			
		}

		function next_question() {
			document.getElementById('ans-container').innerHTML = ('<button id = "0" name="0" type="submit" onclick="answer()"></button>			<button id = "1" name="1" type="submit" onclick="answer()"></button>			<button id = "2" name="2" type="submit" onclick="answer()"></button>			<button id = "3" name="3" type="submit" onclick="answer()"></button>');
			idGame = <?php echo $gme_id; ?>;
			idAnswer = 0;
			$.ajax({
  				url: '../php/gameAjax.php?gfq&idGame='+idGame,
  				dataType: 'JSON',
  				success: function(data) {
  					if (data.length > 0) {
	  					document.getElementById('question').innerHTML = data[0]['qst_text']
	  					idQuestion = data[0]['qst_id']
						// TODO random
						document.getElementById('0').innerHTML = data[0]['ans_text']
						document.getElementById('0').id = data[0]['ans_id']

						document.getElementById('1').innerHTML = data[1]['ans_text']
						document.getElementById('1').id = data[1]['ans_id']

						document.getElementById('2').innerHTML = data[2]['ans_text']
						document.getElementById('2').id = data[2]['ans_id']

						document.getElementById('3').innerHTML = data[3]['ans_text']
						document.getElementById('3').id = data[3]['ans_id']
					}
					else {		
						document.getElementById('question').innerHTML = 'Finish'
					}
					//$('3').attr('id', data[3]['ans_id'])

					//console.log($(data[3]['ans_id']))
  				}
			});
		}

		next_question();
		clock();
	</script>
</html>
