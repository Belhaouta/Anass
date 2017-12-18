<?php


function connecter() {

    try {
        $bdd = new PDO('mysql:host=localhost;dbname=safarcom', 'root', '');   //dir fonction hya katconnectik m3a la base;
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    return $bdd;}

?>