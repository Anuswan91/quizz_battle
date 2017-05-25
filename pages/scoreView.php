 <?php
 	include '../php/scoreController.php';
 	include '../includes/header.php';
?>
 	<table>
	  <tr>
	    <th>Id</th>
	    <th>Pseudo</th> 
	    <th>Score</th>
	  </tr>
	  <?php
	  	foreach ($scores as $key => $score) {
	  		echo '<tr>';
	  		echo '<td>'.$key.'</td>';
	  		echo '<td>'.$score['pseudo'].'</td>';
	  		echo '<td>'.$score['score'].'</td>';
	  		echo '</tr>';
	  	}
	  ?>
	</table>