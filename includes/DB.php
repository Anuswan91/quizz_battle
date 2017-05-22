<?php
    /**
     * Ce fichier sert à se connecter a la base de donnée
     */

try {
	//Pour se connecter en local au PUIO
    // Developpement
    $bdd = new PDO('mysql:host=eu-cdbr-west-01.cleardb.com;dbname=heroku_9732ace84ff668b;charset=utf8', 'bf583c4b055e2d', '8d9c7be6');


} catch (Exception $e) {

    die('Erreur : ' . $e->getMessage());
}
?>
