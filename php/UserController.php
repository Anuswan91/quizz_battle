<?php
include '../includes/DB.php';


$sql = "SELECT * FROM player";
$res = $bdd->query($sql)->fetchAll();

?>