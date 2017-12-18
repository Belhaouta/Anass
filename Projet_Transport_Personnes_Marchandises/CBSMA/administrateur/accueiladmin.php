<?php
session_start();
if(!isset($_SESSION['con'])){
    header('Location:administrateur.php');}
?>
<html><head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>SAFARCOM - Transport de personnes </title>
    <link rel="stylesheet" type="text/css" href="style1.css">
    <link rel="shortcut icon" href="http://safarcom.fr/logo.ico">

</head>


<body style="background-image:url(roads.jpg); 
 background-repeat: no-repeat; 
 background-position: center center;
 background-attachment: fixed; 
 background-size: cover;">


<h1>Espace Administratif</h1>

<div class="admin">
    <div class="rub"><h4><a href="superbe1.php">Courses Prof�ssionnels</a></h4></div>
    <div class="rub"><h4><a href="superbe.php">Courses Simples</a></h4></div>
    <div class="rub"><h4><a href="ajoutervehicule.php">Ajouter des Vehicules</a></h4></div>
    <div class="rub"><h4><a href="ajouterchauffeur.php">Ajouter des chauffeurs</a></h4></div>
    <div class="rub"><h4><a href="listeclient.php">Listes des clients</a></h4></div>
    <div class="rub"><h4><a href="reservmarchandises.php">Livraison de marchandises</a></h4></div>
    <div class="rub"><h4><?php echo '<a href="changepassword.php?id='.$_GET["id"].'">';?>Changer le mot de passe</a></h4></div>
    <div class="rub"><h4><a href="deconnexion.php">D�connexion</a></h4></div>
</div>
</body>
</html>