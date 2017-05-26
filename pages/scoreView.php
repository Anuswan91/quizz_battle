<?php
	include '../includes/header.php';
	include '../php/Notif.php';
	include '../php/scoreController.php';
?>
<link href="../css/styleScore.css" rel="stylesheet">
<body>
<div class="site-wrapper">
	<div class="site-wrapper-inner">
		<div class="cover-container">
			<?php include '../includes/nav_home.php';?>
			<div class="inner cover">
				<div class="row home-container">
					<div class="col-sm-12">
						<h1>Score</h1><br/>
						<?php
							$i=0;
							foreach ($scores as $key => $score){
								$isActual = false;
								if ($_SESSION['Auth']['plr_id'] == $score['plr_id']){
									$isActual = true;
								}
								echo '<span class="player ';
								if($i==0){
									echo 'win';
								}
								echo '">';
								if($isActual) {
									echo '<span class="glyphicon glyphicon-arrow-right"></span> ';
								}
								if($i==0){
									echo ' <span class="glyphicon glyphicon-tower"></span> ';
								}
								echo $score['pseudo'].' : '.$score['score'];
								if($i==0) {
									echo ' <span class="glyphicon glyphicon-tower"></span> ';
								}
								if($isActual) {
									echo ' <span class="glyphicon glyphicon-arrow-left"></span>';
								}
								echo '</span><br/><br/>';
								$i = $i + 1;
							}
						?>
						<a href="../php/gameEndController.php" class="btn-home btn-leave">Quitter</a><br/>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
include '../includes/footer.php';
?>
</body>
</html>