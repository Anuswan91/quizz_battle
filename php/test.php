<?php
	$array[4] = array('pseudo' => 'toto', 'score' => 3);	
	$array[14] = array('pseudo' => 'lolo', 'score' => 5);	


	$score = array();

	foreach( $array as $key => $row) {
		$score[$key]  = $row['score'];
	}

	array_multisort($score, SORT_DESC, $array);

	var_dump($array);

?>