<?php
include '../includes/DB.php';

if (!empty($_POST))
{
	$res = checkLoginUser($bdd);
	if ($res == false)
	{
		header("Location: ../index.php?errorConnect=true");
	}else{
		header("Location: ../index.php");
	}


}

function checkLoginUser($bdd)
{
	
	$sql = "SELECT plr_pseudo, plr_password  FROM player WHERE plr_pseudo =  '".$_POST['pseudo']."';";
	$res = $bdd->query($sql)->fetch();
	
	if ($res != false && $_POST['password'] == $res['plr_password'])
	{
		return true;
	}

	return false;
}