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

		<button id = '0' name='0' type='submit' onclick="answer()"></button>
		<button id = '1' name='1' type='submit' onclick="answer()"></button>
		<button id = '2' name='2' type='submit' onclick="answer()"></button>
		<button id = '3' name='3' type='submit' onclick="answer()"></button>
	</body>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>

	<script type="text/javascript">

		question_number = 0;

		function answer() {

			switch (answer.caller.arguments[0].target.name) {
				case "0":
					var answer_status = '<?php echo $res_answer[$rand_answer[0]]['ans_correct']; ?>';
					break;
				case "1":
					var answer_status = '<?php echo $res_answer[$rand_answer[1]]['ans_correct']; ?>';
					break;
				case "2":
					var answer_status = '<?php echo $res_answer[$rand_answer[2]]['ans_correct']; ?>';
					break;
				case "3":
					var answer_status = '<?php echo $res_answer[$rand_answer[3]]['ans_correct']; ?>';
					break;
			}
			
			if (answer_status == 1) {
				alert("GG !");
			}

			else {
				alert("Mauvais...");
			}

			next_question();
		}  

		function next_question() {

			var question_number = 0;

			/*$.ajax({
  				url: '../php/gameController.php',
  				data: 'question_number='+ question_number
			});
			*/

			
			document.getElementById('question').innerHTML = '<?php echo $res_question[$question_number]['qst_text'];?>';
			document.getElementById('0').innerHTML = '<?php echo $res_answers[$question_number][0]['ans_text']?>';
			document.getElementById('1').innerHTML = '<?php echo $res_answers[$question_number][1]['ans_text']?>';
			document.getElementById('2').innerHTML = '<?php echo $res_answers[$question_number][2]['ans_text']?>';
			document.getElementById('3').innerHTML = '<?php echo $res_answers[$question_number][3]['ans_text']?>';
			

			question_number ++;
		}

		next_question();
	</script>
</html>
