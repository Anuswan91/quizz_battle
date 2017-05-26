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
			<?php include '../includes/nav_home.php';?>
			<div class="inner cover">
				<div class="row home-container">
					<div class="col-sm-12"><span id="theme"></span><h1 id="question"></h1></div>
				</div>
				<div id="ans-container">
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
				set_score();
			}
		});
	}

	function highlight_button(data, idAnswer) {
		if (data['correct']) {
			$('#'+data['answer']).removeClass('qst-disabled')
			$('#'+data['answer']).addClass('qst-selected-ok')
		}
		else{
			$('#'+data['answer']).removeClass('qst-disabled')
			$('#'+data['answer']).addClass('qst-disabled-ok')
			$('#'+idAnswer).removeClass('qst-disabled')
			$('#'+idAnswer).addClass('qst-selected-nok')
		}
	}

	function disable_button() {
		$('.col-question').addClass('qst-disabled');
		$('.col-question').prop('onclick', null).off('click');;
	}

	function increment_focus() {
		idGame = <?php echo $gme_id; ?>;
		$.ajax({
			url: '../php/gameAjax.php?if&idGame='+idGame+'&idQuestion='+idQuestion,
			async: false,
			dataType: 'JSON',
			success: function(data) {

			}
		});
	}

	function set_score() {
		idGame = <?php echo $gme_id; ?>;
		idPlayer = <?php echo $plr_id; ?>;

		$.ajax({
			url: '../php/gameAjax.php?gs&idGame='+idGame+'&idAnswer='+idAnswer+'&idQuestion='+idQuestion,
			async: false,
			dataType: 'JSON',
			success: function(data) {
				cpt = 1
				$.each(data, function(index, value) {
					$('#score'+cpt).text(value['score'])
					if (index == idPlayer) {
						$('#name'+cpt).text('Me')
						$('#name'+cpt).css('font-weight', 'bold')
					}
					// Pour afficher le nom de tous les joueurs 
					//$('#name'+cpt).text(value['pseudo'])
					cpt++
				});
				for(i = cpt; i <= 5; i++) {
					$('#score'+i).remove()
					$('#name'+i).remove()
				}
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
    		var randomnumber = Math.ceil((Math.random()*4)-1)
    		if(arr.indexOf(randomnumber) > -1) continue;
    		arr[arr.length] = randomnumber;
		}

		idAnswer = 0;
		$.ajax({
			url: '../php/gameAjax.php?gfq&idGame=' + idGame,
			dataType: 'JSON',
			success: function (data) {
				console.log(data)
				if (data.length === 0) {
					$('#question').text('End');
					$('#ans-container').remove();
					$('#theme').remove();

					// redirection vers les scores
					window.location.replace('scoreView.php?idGame='+idGame);

				}
				else {
					$('#theme').text(data[0]['thm_name']);
					$('#theme').css('background-color',data[0]['thm_color']);
					console.log(data[0]['thm_color']);
					$('#question').text(data[0]['qst_text']);
					idQuestion = data[0]['qst_id'];

					$('#0').text(data[arr[0]]['ans_text'])
					$('#0').attr('id', data[arr[0]]['ans_id'])

					$('#1').text(data[arr[1]]['ans_text'])
					$('#1').attr('id', data[arr[1]]['ans_id'])

					$('#2').text(data[arr[2]]['ans_text'])
					$('#2').attr('id', data[arr[2]]['ans_id'])

					$('#3').text(data[arr[3]]['ans_text'])
					$('#3').attr('id', data[arr[3]]['ans_id'])
				}
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
			set_score();
		}
	},100);

	set_score();
	next_question();
	</script>
</body>
</html>
