<?php
include '../includes/DB.php';

if (!empty($_POST))
{
	$res = checkRegisterUser($bdd);
	if ($res == false)
	{
		registerUser($bdd);
	}else{
		header("Location: ../pages/userRegisterView.php?error=true");
	}
	
	
}

function checkRegisterUser($bdd){
	
	$sql = "SELECT plr_id FROM player WHERE plr_pseudo =  '".$_POST['login']."';";
	$res = $bdd->query($sql)->fetch();
	return $res;
}

function registerUser($bdd){

	$plr_pseudo = $_POST['login'];
	$plr_password = $_POST['password'];
	$plr_guest = 0;
	$plr_date_crea = date("Y-m-d H:i:s");
	$plr_status_id = 1;
	
	$req = "INSERT INTO player (plr_pseudo, plr_password, plr_guest, plr_date_crea, plr_status_id)
			VALUES ('".$plr_pseudo."', '".$plr_password."', '".$plr_guest."', '".$plr_date_crea."','".$plr_status_id."');";
	$res = $bdd->exec($req);

	
	if($res)
	{
		$_SESSION['Auth'];
	}

	
	die();
	if(count($data)>0)
	{
		$_SESSION['Auth']['plr_pseudo'] = $plr_pseudo;
		$_SESSION['Auth']['plr_status_id'] = $plr_status_id;
		header("Location: ../pages/index.php");
		return true;
	}else{
		header("Location: ../pages/userRegisterView.php");
	}
	return false;
}
	