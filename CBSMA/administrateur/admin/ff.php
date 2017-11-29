<?php
include('connecter.php');
$bdd=connecter();
$ss='m';
$req0 = $bdd->prepare('select concat(nom,concat(" ","llll ",prenom)) from professeur where prenom like "'.$ss.'%" ');
$req0->execute(); 

$data=$req0->fetch();
echo $data[0];
?>