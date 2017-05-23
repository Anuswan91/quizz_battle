<?php 
include '../php/AdminController.php'; 
include '../includes/header.php';
?>

<!-- Formulaire nouveau thème -->
<form action="../php/adminController.php" method="post">
  <input type="text" placeholder="Thème" name="nt_theme" required>
  <input type="submit" value="Submit">
</form>

<!-- Tableau des thèmes -->
<table class="table">
  <tr>
    <th>Identifiant</th>
    <th>Nom</th>
    <th>Actions</th>
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
	<select name="nq_theme" required>
	<?php
		foreach ($themes as $theme) {
			echo '<option value="'.$theme['thm_id'].'">';
			echo $theme['thm_name'];
			echo '</option>';
		}	
	?>
	</select><br>
	<input type="text" placeholder="Question" name="nq_question" required><br>
	<input type="checkbox" name="nq_correctA">
	<input type="text" placeholder="Réponse A" name="nq_answerA" required><br>
	<input type="checkbox" name="nq_correctB">
	<input type="text" placeholder="Réponse B" name="nq_answerB" required><br>
	<input type="checkbox" name="nq_correctC">
	<input type="text" placeholder="Réponse C" name="nq_answerC" required><br>
	<input type="checkbox" name="nq_correctD">
	<input type="text" placeholder="Réponse D" name="nq_answerD" required><br>
	<input type="submit" value="Submit">
</form>

<!-- Tableau des questions -->
<table class="table">
  <tr>
    <th>Identifiant</th>
    <th>Question</th>
    <th>Thème</th>
    <th>Réponses</th>
    <th>Actions</th>
  </tr>
  <?php
	  foreach ($questions as $key => $question) {
	  	echo '<tr>';
		echo '<td>'.$key.'</td>';
		echo '<td>'.$question['text'].'</td>';
		echo '<td>'.$question['theme'].'</td>';
		echo '<td>';
		echo '<ul>';
		foreach ($question['answers'] as $answer) {
			if ($answer['ans_correct']) {
				echo '<li><b>'.$answer['ans_text'].'</b></li>';
			}
			else {
				echo '<li>'.$answer['ans_text'].'</li>';
			}
		}
		echo '</ul>';
		echo '</td>';
		echo '<td>';
		echo '<a href="../php/adminController.php?d='.$key.'">';
		echo '<span class="glyphicon glyphicon-trash">';
		echo '</a>';
		echo '</td>';
		echo '</tr>';
	}
  ?>
</table>

