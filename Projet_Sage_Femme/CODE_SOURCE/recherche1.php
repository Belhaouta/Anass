<!DOCTYPE HTML>
<html>

	<head>
	
		<title>Sage femme</title>
		
		<link rel="stylesheet" href="style.css" type="text/css" />	
		
	</head>
	
	<body vlink="black" alink="white">
	
		<div class='ax'>
		
			<img  id="im" src="img/logo.png"/>
			
			<a href="index.php">Acceuil</a>
			
			<a href="recherche.php">Chercher une sage femme</a>
			
			<a href="stat.php">Etude Statistique</a>
			
			<hr id="li1"/>
		   
			<hr id="li2"/>
		   
		    <hr id="li3"/>
		  
		</div>
		
		<div class="a2x1">
		
			<h1>Chercher des Sages femmes </h1>
			
			<h2>Informations sur le Cabinet</h2>
			
		</div>
		
		<h2>Descriptif du Cabinet</h2>
		
		<div class='femme'>
		
			<h3> Les sages femmes </h3>
			
			<hr id="lign"/>
			
<?php

/*               ********************************************************************************
				 *                                                                              *
				 *    RECHERCHE DES SAGE FEMMES ET LES ACTIVITES EXISTANTS DANS CHAQUE CABINET  *
				 *                                                                              *
				 ********************************************************************************
				 
*/

//Connexion à la base de données

//L'utilisateur root

$userbd    = 'root';

// Pas de mot de passe

$mdpbd     = '';

$connection = new PDO('mysql:host=localhost;dbname=projet;', $userbd, $mdpbd);

/*               ********************************************************************************
				 *                                                                              *
				 *               Identifier les sages femmes du Cabinet selectionné             *
				 *                                                                              *
				 ********************************************************************************
				 
*/

$requete='SELECT nom,prenom from sagefemme 
                                       join relation on id_fem = id
                                       join cabinets on idcab=id_cab
									   WHERE id_cab="'.$_GET['id'].'"'  or die(mysql_error());

foreach($connection->query($requete) as $row) 
{

	echo "<div class='femmex'><h4>".$row['nom']." ".$row['prenom']."</h4></div>";
		
}
									  
echo "</div>";


/*               ********************************************************************************
				 *                                                                              *
				 *                      Identifier les activités du Cabinet                     *
				 *                                                                              *
				 ********************************************************************************
				 
*/
   
$requete1='SELECT * from activites where id_cab= "'.$_GET['id'].'"' or die(mysql_error()) ;	
		
echo "<div class='activx'><h3> Les Diffèrents Activités </h3>
		
<hr id='lign1'/>";	
		
foreach($connection->query($requete1) as $row1) 
{

		if($row1['COL2'] == 1)
		{
				
				echo "<div class='activ'><h4>Préparation à la naissance</h4></div>";
						
		}
									  
		if($row1['COL3'] == 1)
		{
				
				echo "<div class='activ'><h4>Consultations pré-natales</h4></div>";
						
		}
									  
		if($row1['COL4'] == 1)
		{
				
			    echo "<div class='activ'><h4>Échographie obstétricale</h4></div>";
				
		}
									  
		if($row1['COL5'] == 1)
		{
				
				echo "<div class='activ'><h4>Surveillance de grossesse pathologique à domicile</h4></div>";
						
		}
									  
		if($row1['COL6'] == 1)
		{
				
				echo "<div class='activ'><h4>Consultations post-natales</h4></div>";
						
		}
									  
		if($row1['COL7'] == 1)
		{
				
			echo "<div class='activ'><h4>Suites de couches à domicile</h4></div>";
						
		}
									  
		if($row1['COL8'] == 1)
		{
				
				echo "<div class='activ'><h4>Soutien à l'allaitement</h4></div>";
						
		}
									  
		if($row1['COL9'] == 1)
		{
				
				echo "<div class='activ'><h4>acupuncture</h4></div>";
						
		}
									  
		if($row1['COL10'] == 1)
		{
				
				echo "<div class='activ'><h4>suivi gynécologique</h4></div>";
						
		}
									   
		if($row1['COL11'] == 1)
		{
		
				echo "<div class='activ'><h4>Rééducation</h4></div>";
		}
							
}

echo "</div>";
								


?>
	</body>
	
</html>