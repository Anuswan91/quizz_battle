<?php
	//On vérifie si les session sont déja activées
	/*if(session_id() == null){
		session_start();
	}*/

	include "../includes/DB.php"; //Connexion a la base de données

	//$gme_id = $_SESSION['Game']['gme_id'];

	// EXEMPLE
	$gme_id = 2;

	//$plr_id = $_SESSION['Auth']['plr_id'];
	$plr_id = 4;

	function uniq_rand($min,$max,$tab)
	{
	    do $rand=rand($min,$max); while(in_array($rand,$tab));
	    return $rand;
	}

	$rand_answers = array();

	function rand_answers()
	{
		$rand_answers = array();
		for($i=0;$i<4;$i++)
    		$rand_answers[] = uniq_rand(0, 4,$rand_answers);
	}
?>