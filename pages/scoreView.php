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
			<div class="masthead clearfix">
				<div class="inner">
					<a href="index.php"><img class="nav-logo" src="../img/logo_quiz.png"/></a>
					<?php
					if (isset($_SESSION['Auth']) && !empty($_SESSION['Auth']))
					{?>
						<div class="nav-login">
						<span class="username"><?= $_SESSION['Auth']['plr_pseudo']?></span>
						<a href="adminView.php" class="btn-go">ADMIN</a>
						<a href="?logout=true" class="btn-go" onclick="notif('Déconnecté', 1);">LOGOUT</a>
						</div><?php
					}else{?>
						<form class="nav-login" action="../php/userLoginController.php"  method="post" name="login">
							<input type="text" placeholder="Pseudo" name="pseudo" class="login-text"/>
							<input type="password" placeholder="Mot de passe" name="password" class="login-text"/>
							<input type="submit" class="btn-go" value="Go"/>
						</form>
					<?php }?>
				</div>
			</div>
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
									echo '<span class="glyphicon glyphicon-arrow-right"></span>';
								}
								if($i==0){
									echo '<span class="glyphicon glyphicon-tower"></span>';
								}
								echo $score['pseudo'].' : '.$score['score'];
								if($i==0) {
									echo '<span class="glyphicon glyphicon-tower"></span>';
								}
								if($isActual) {
									echo '<span class="glyphicon glyphicon-arrow-left"></span>';
								}
								echo '</span><br/>';
								$i = $i + 1;
							}
						?>
						<a href="../pages/index.php" class="btn-home btn-leave">Quitter</a><br/>
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