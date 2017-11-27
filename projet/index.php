<html>
	<head>
		<title>test</title>
		<link rel="stylesheet" type="text/css" href="style.css"> 
	</head>
	<body>
		<center><h1>GENERER UN QCM</h1></center>
	</body>
</html>

<?php

//Generer QCM
include('Qcm.class.php');
include('Question.class.php');
include('Reponse.class.php');

$qcm = new Qcm();
 
$question1 = new Question('Et paf, ça fait ...');
$question1->ajouterReponse(new Reponse('Des mielpops'));
$question1->ajouterReponse(new Reponse('Des chocapics', Reponse::BONNE_REPONSE));
$question1->ajouterReponse(new Reponse('Des actimels'));
$question1->setExplications('Et oui, la célèbre citation est « Et paf, ça fait des chocapics ! »');
$qcm->ajouterQuestion($question1);
 
 
$question2 = new Question('POO signifie');
$question2->ajouterReponse(new Reponse('Php Orienté Objet'));
$question2->ajouterReponse(new Reponse('ProgrammatiOn Orientée'));
$question2->ajouterReponse(new Reponse('Programmation Orientée Objet', Reponse::BONNE_REPONSE));
$question2->setExplications('Sans commentaires si vous avez eu faux :-°');
$qcm->ajouterQuestion($question2);
 /*
$qcm->setAppreciation(array('0-10' => 'Pas top du tout ...',
                            '10-20' => 'Très bien ...'));*/
$qcm->generer();

?>