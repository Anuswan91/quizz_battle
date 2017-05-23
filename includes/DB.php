<?php
    /**
     * Ce fichier sert à se connecter a la base de donnée
     */

try {
	//Pour se connecter en local au PUIO
    //$bdd = new PDO('mysql:host=tp-sgbd;dbname=vblum_a;charset=utf8', 'vblum_a', 'vblum_a');
    //Pour se connecter en local ailleurs
    //$bdd = new PDO('mysql:host=localhost;dbname=risk;charset=utf8', 'root', 'root');
    $bdd = new PDO('mysql:host=localhost;dbname=quizz_battle;charset=utf8', 'root', '');
    $bdd = new PDO('mysql:host=eu-cdbr-west-01.cleardb.com;dbname=heroku_9732ace84ff668b;charset=utf8', 'bf583c4b055e2d', '8d9c7be6');

    // Developpement
    //$bdd = new PDO('mysql:host=eu-cdbr-west-01.cleardb.com;dbname=heroku_9732ace84ff668b;charset=utf8', 'bf583c4b055e2d', '8d9c7be6');


} catch (Exception $e) {

    die('Erreur : ' . $e->getMessage());
}
?>
