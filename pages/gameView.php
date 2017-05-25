<?php
include '../includes/header.php';
include '../php/gameController.php';
include '../php/Notif.php';
?>
<link href="../css/styleGame.css" rel="stylesheet">
<body>
<div class="site-wrapper">
	<div class="site-wrapper-inner">
		<div class="cover-container">
			<div class="masthead clearfix">
				<div class="inner">
					<a href="index.php"><img class="nav-logo" src="../img/logo_quiz.png"/></a>
					<div class="nav-login progress">
						<div id="time-bar" class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100"
							 aria-valuemin="0" aria-valuemax="100" style="width:100%">
						</div>
					</div>
				</div>
			</div>
			<div class="inner cover">
				<div class="row home-container">
					<div class="col-sm-12" id="question"><h1>Quelle groupe est passé à Point gamma pour l'édition 2017 ?</h1></div>
				</div>
				<div id="ans-container">
					<div class="row home-container">
						<div class="col-sm-6"><div class="col-question btn-home" id="0" onclick="answer();">Salut</div></div>
						<div class="col-sm-6"><div class="col-question btn-home" id="1" onclick="answer();">C'est</div></div>
					</div>
					<div class="row home-container">
						<div class="col-sm-6"><div class="col-question btn-home" id="2" onclick="answer();">Cool</div></div>
						<div class="col-sm-6"><div class="col-question btn-home" id="3" onclick="answer();">Lol</div></div>
					</div>
				</div>
			</div>
			<div class="score-container">
				<table class="score">
					<tr>
						<td class="score-indiv" id="score1">1
						</td>
						<td class="score-indiv" id="score2">2
						</td>
						<td class="score-indiv" id="score3">3
						</td>
						<td class="score-indiv" id="score4">4
						</td>
						<td class="score-indiv" id="score5">5
						</td>
					</tr>
					<tr>
						<td class="score-name" id="name1">Me
						</td>
						<td class="score-name" id="name2">J1
						</td>
						<td class="score-name" id="name3">J2
						</td>
						<td class="score-name" id="name4">J3
						</td>
						<td class="score-name" id="name5">J4
						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>
<?php
include '../includes/footer.php';
?>
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
				disable_button()
				highlight_button(data, idAnswer)
				console.log(data)
				// TODO changer les class pour la réponse
				//document.getElementById(idAnswer).disabled = true
			}
		});
	}

	function highlight_button(data, idAnswer) {
		//alert('de')
		//document.getElementById('1').innerHTML = 'disabled';
		if (data['correct']) {
			$('#'+data['answer']).removeClass('qst-disabled')
			$('#'+data['answer']).addClass('qst-selected-ok')
		}
		else{
			$('#'+data['answer']).removeClass('qst-disabled')
			$('#'+data['answer']).addClass('qst-disabled-ok')
			console.log(idAnswer)
			$('#'+idAnswer).removeClass('qst-disabled')
			$('#'+idAnswer).addClass('qst-selected-nok')
		}
		//$('.col-question').addClass('qst-disabled');
		//TODO remove onclick
		//$('.col-question').removeClass('qst-disabled');
	}

	function disable_button() {
		//alert('de')
		//document.getElementById('1').innerHTML = 'disabled';
		$('.col-question').addClass('qst-disabled');
		//TODO remove onclick
		//$('.col-question').removeClass('qst-disabled');
	}

	function clock() {
		interval2 = setInterval(function(){
			time--
			//set_score();
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
		time = 10;
		timePercent = time * 100 / 10;
		document.getElementById('ans-container').innerHTML = ('<div class="row home-container"><div class="col-sm-6"><div class="col-question btn-home" id="0" onclick="answer();"></div></div><div class="col-sm-6"><div class="col-question btn-home" id="1" onclick="answer();"></div></div></div><div class="row home-container"><div class="col-sm-6"><div class="col-question btn-home" id="2" onclick="answer();"></div></div><div class="col-sm-6"><div class="col-question btn-home" id="3" onclick="answer();"></div></div></div>');
		idGame = <?php echo $gme_id; ?>;
		
		var arr = []
		while(arr.length < 4){
    		var randomnumber = Math.ceil(Math.random()*3)
    		if(arr.indexOf(randomnumber) > -1) continue;
    		arr[arr.length] = randomnumber;
		}

		idAnswer = 0;
		$.ajax({
			url: '../php/gameAjax.php?gfq&idGame=' + idGame,
			dataType: 'JSON',
			success: function (data) {
				if (data.length > 0) {
					document.getElementById('question').innerHTML = '<h1>' + data[0]['qst_text'] + '</h1>';
					idQuestion = data[0]['qst_id'];

					document.getElementById('0').innerHTML = data[arr[0]]['ans_text']
					document.getElementById('0').id = data[arr[0]]['ans_id']

					document.getElementById('1').innerHTML = data[arr[1]]['ans_text']
					document.getElementById('1').id = data[arr[1]]['ans_id']

					document.getElementById('2').innerHTML = data[arr[2]]['ans_text']
					document.getElementById('2').id = data[arr[2]]['ans_id']

					document.getElementById('3').innerHTML = data[arr[3]]['ans_text']
					document.getElementById('3').id = data[arr[3]]['ans_id']
				}
				else {
					document.getElementById('question').innerHTML = '<h1>FIN DE LA PARTIE</h1>';
				}
				//$('3').attr('id', data[3]['ans_id'])

				//console.log($(data[3]['ans_id']))
			}
		});
	};

	var time = 10;
	var timePercent = time * 100 / 10;

	var $divTime = $('#time-bar');
	if ($divTime){
		$divTime.attr('aria-valuenow', timePercent);
		$divTime.css('width', timePercent + '%');
	}

	interval = setInterval(function(){
		if(time==10-(1/10)){
			$divTime.css('transition','');
		}
		time-=1/10;
		timePercent = time * 100 / 10;
		if(time%2 == 0){
			//set_score();
		}
		if ($divTime){
			$divTime.attr('aria-valuenow', timePercent);
			$divTime.css('width', timePercent + '%');
		}
		if(time <= -1){
			$divTime.css('transition','none');
			increment_focus();
			next_question();
		}
	},100);

		next_question();
	</script>
</body>
</html>
