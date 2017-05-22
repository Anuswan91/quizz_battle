<?php
include '../includes/DB.php';


$sql = "SELECT * FROM film";
$res = $bdd->query($sql)->fetchAll();

//die(var_dump($res));

?>