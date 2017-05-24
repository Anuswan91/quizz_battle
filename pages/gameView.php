<?php
include '../includes/header.php';
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
						<div id="time-bar" class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40"
							 aria-valuemin="0" aria-valuemax="100" style="width:40%">
						</div>
					</div>
				</div>
			</div>
			<div class="inner cover">
				<div class="row home-container">
					<div class="col-sm-12" id="z"><h1>Quelle groupe est passé à Point gamma pour l'édition 2017 ?</h1></div>
				</div>
				<div id="ans-container">
					<div class="row home-container">
						<div class="col-sm-6"><div class="col-question btn-home qst-disabled-ok" id="0" onclick="notif('En attente des autres joueurs ...', 3);">Salut</div></div>
						<div class="col-sm-6"><div class="col-question btn-home qst-disabled" id="1" onclick="notif('En attente des autres joueurs ...', 3);">C'est</div></div>
					</div>
					<div class="row home-container">
						<div class="col-sm-6"><div class="col-question btn-home qst-selected-nok" id="2" onclick="notif('En attente des autres joueurs ...', 3);">Cool</div></div>
						<div class="col-sm-6"><div class="col-question btn-home qst-selected-ok" id="3" onclick="notif('En attente des autres joueurs ...', 3);">Lol</div></div>
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
	var time = 10;
	var timePercent = time * 100 / 10;

	var $divTime = $('#time-bar');
	if ($divTime){
		$divTime.attr('aria-valuenow', timePercent);
		$divTime.css('width', timePercent + '%');
	}

	interval = setInterval(function(){
		time-=1/10;
		timePercent = time * 100 / 10;
		if ($divTime){
			$divTime.attr('aria-valuenow', timePercent);
			$divTime.css('width', timePercent + '%');
		}
		if(time <= 0){
			time = 10;
		}
	},100);

</script>
</body>
</html>