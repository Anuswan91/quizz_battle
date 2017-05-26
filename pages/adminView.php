<?php 
include '../php/adminController.php'; 
include '../includes/header.php';
?>
<link href="../css/styleAdmin.css" rel="stylesheet">
<body>
<div class="site-wrapper">
	<div class="site-wrapper-inner">
		<div class="cover-container">
			<?php include '../includes/nav_home.php';?>
			<div class="inner cover">
				<div class="row home-container">
					<div class="col-sm-6">
						<h1>Nouveau thème:</h1></br>
						<form action="../php/adminController.php" method="post">
							<input type="text" placeholder="Thème" name="nt_theme" class="login-text" required>
							<input type="color" value="#FFFFFF" name="nt_color" class="theme-color-picker login-text" required>
							<input type="submit" class="btn-go" value="Go">
						</form></br></br>
						<h1>Liste des thèmes existants: </h1></br>
						<div class="themes">
							<?php
							foreach ($themes as $theme) {
								?>
								<div class="themes-display" style="background-color: <?php echo $theme['thm_color']; ?>; opacity:0.7;">
									<span class="glyphicon glyphicon-trash icon-trash" id="<?php echo $theme['thm_id']; ?>" onclick="window.location.href = '../php/adminController.php?dt= <?php echo $theme['thm_id']; ?>';" ></span>
									<span ><?php echo $theme['thm_name']; ?></span>
								</div>
							<?php }?>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="row">
							<div class="col-sm-12">
								<h1>Nouvelle question:</h1></br>
								<form action="../php/adminController.php" method="post" class="new-question">
									Théme:
									<select name="nq_theme" required  class="login-text">
										<?php
										foreach ($themes as $theme) {
											echo '<option value="'.$theme['thm_id'].'">';
											echo $theme['thm_name'];
											echo '</option>';
										}
										?>
									</select><br/>
									Question: <textarea placeholder="Question" name="nq_question" class="login-text" required></textarea><br/>
									Réponse A: <input type="text" placeholder="Réponse A" name="nq_answerA"  class="login-text" required/>
									<input type="checkbox" name="nq_correctA"><br/>
									Réponse B: <input type="text" placeholder="Réponse B" name="nq_answerB" class="login-text"  required/>
									<input type="checkbox" name="nq_correctB"><br/>
									Réponse C: <input type="text" placeholder="Réponse C" name="nq_answerC" class="login-text"  required/>
									<input type="checkbox" name="nq_correctC"><br/>
									Réponse D: <input type="text" placeholder="Réponse D" name="nq_answerD" class="login-text"  required/>
									<input type="checkbox" name="nq_correctD"><br/>
									<input type="submit" value="Envoyer" class="btn-home"/>
								</form>
							</div>
						</div>
						</br><h1>Liste questions:</h1></br>
						<div class="table-qst">
							<div class="row title-ans">
								<div class="col-sm-5">
									Question
								</div>
								<div class="col-sm-2">
									Théme
								</div>
								<div class="col-sm-4">
									Réponse
								</div>
								<div class="col-sm-1">
								</div>
							</div>
							<?php
							foreach ($questions as $key => $question) { ?>
								<div class="row qst-unit">
									<div class="col-sm-5">
										<span class="qst-txt"><?php echo $question['text']; ?></span>
									</div>
									<div class="col-sm-2">
										<code><?php echo $question['theme']; ?></code>
									</div>
									<div class="col-sm-4">
										<?php foreach ($question['answers'] as $answer) {
											if ($answer['ans_correct']) {
												?>
												<span
													class="glyphicon glyphicon-ok"> <?php echo $answer['ans_text']; ?></span>
												<br/>
												<?php
											} else {
												?>
												<span
													class="glyphicon glyphicon-remove"> <?php echo $answer['ans_text']; ?></span>
												<br/>
												<?php
											}
										}
										?>
									</div>
									<div class="col-sm-1">
										<span class="glyphicon glyphicon-trash icon-trash" onclick="window.location.href = '../php/adminController.php?dq=<?php echo $key; ?>';"></span>
									</div>
								</div>
								<?php
							}
							?>
						</div>
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

