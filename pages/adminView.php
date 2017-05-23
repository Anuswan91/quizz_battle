<?php 
include '../php/AdminController.php'; 
include '../includes/header.php';
?>

<!-- Formulaire nouveau thème -->
<form action="../php/adminController.php" method="post">
  <input type="text" placeholder="Thème" name="theme">
  <input type="submit" value="Submit">
</form>

<!-- Tableau des thèmes -->
<table class="table">
  <tr>
    <th>Identifiant</th>
    <th>Nom</th>
  </tr>
  <?php
  	foreach ($themes as $theme) {
		echo '<tr>';
		echo '<td>'.$theme['thm_id'].'</td>';
		echo '<td>'.$theme['thm_name'].'</td>';
		echo '</tr>';
	}
  ?>
</table>

<!-- Formulaire nouvelle question -->
<form action="../php/adminController.php" method="post">
  <input type="text" placeholder="Question" name="question"><br>
  <input type="radio" name="correctA">
  <input type="text" placeholder="Réponse A" name="answerA"><br>
  <input type="radio" name="correctB">
  <input type="text" placeholder="Réponse B" name="answerB"><br>
  <input type="radio" name="correctC">
  <input type="text" placeholder="Réponse C" name="answerC"><br>
  <input type="radio" name="correctD">
  <input type="text" placeholder="Réponse D" name="answerD"><br>
  <input type="submit" value="Submit">
</form>

<!-- Tableau des questions -->
<table class="table">
  <tr>
    <th>Identifiant</th>
    <th>Question</th>
    <th>Thème</th>
  </tr>
  <?php
	  foreach ($questions as $question) {
	  	echo '<tr>';
		echo '<td>'.$question['qst_id'].'</td>';
		echo '<td>'.$question['qst_text'].'</td>';
		echo '<td>'.$question['thm_name'].'</td>';
		echo '</tr>';
	}
  ?>
</table>
