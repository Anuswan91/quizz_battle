<?php
include '../includes/DB.php';

if (!empty($_POST))
{
	$res = checkLoginUser($bdd);
	if ($res == false)
	{
		header("Location: ../index.php?errorConnect=true");
	}else{
		header("Location: ../pages/index.php");
	}


}

function checkLoginUser($bdd)
{
	
	$sql = "SELECT *  FROM player WHERE plr_pseudo =  '".$_POST['pseudo']."';";
	$res = $bdd->query($sql)->fetch();
	
	if ($res != false && $_POST['password'] == $res['plr_password'] && $res['plr_password']==0)
	{
		$_SESSION['Auth']['plr_id'] = $res['plr_id'];
		$_SESSION['Auth']['plr_pseudo'] = $res['plr_pseudo'];
		$_SESSION['Auth']['plr_status_id'] = $res['plr_status_id'];
		return true;
	}

	return false;
}