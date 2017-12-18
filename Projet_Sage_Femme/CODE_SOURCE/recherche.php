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
		
		<div class="a2x">
		
			<h1>Chercher des Sages femmes </h1>
			
			<h2>Veuillez selectionner votre ville</h2>
			
			<form method="POST" action="" >
			
				<input  id="recherche" type="text" name="reche" required />
				
				<input id="entr" type="image" src="img/Capture.png"/>
				
			</form>
			
		</div>
		
<?php

/*               **************************************************
				 *                                                *
				 *    RECHERCHE ADDRESSES DES CABINETS PAR VILLE  *
				 *                                                *
				 **************************************************
				 
*/


//Connexion à la base de données

//L'utilisateur root

$userbd    = 'root';

//Pas de mot de passe

$mdpbd     = '';

$connection = new PDO('mysql:host=localhost;dbname=projet;charset=utf8', $userbd, $mdpbd);

//Si on clique sur le button Rechercher --> on execute le code dedans	
	
if(isset($_POST['reche']))
{
    // Les nombre de cabinets dans la ville 
	
	$requete='SELECT count(*) as x from cabinets where ville like "'.$_POST['reche'].'"' ;
					
	foreach($connection->query($requete) as $row) 
	{
		//strtoupper: Convertir la chaine de caractère 	en majuscule		
		
		$ville=strtoupper($_POST['reche']);
								
		echo "<div class='villesec'>" ;   
		
		echo "<h4>".$row['x']." Cabinets trouvés dans ".$ville."</h4>";  
		
	}
	//Les addresses des cabinets par ville
	
    $requete1='SELECT * from cabinets where ville like "'.$_POST['reche'].'"' ;	
							
	foreach($connection->query($requete1) as $row1) 
	{
							
		echo "<img id='iamgv' src='img/image6.png' /><div class='ville'><h4><a href='recherche1.php?id=".$row1['id_cab']."'> Cabinet</a></h4>
				
		<p>".$row1['addr1']." ".$row1['addr2']." ".$row1['code_postal']."</p></div>";	
		
	}
	echo "</div>";
}
							

?>
	</body>
	
</html>