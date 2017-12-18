<html>

	<head>
		<title>Petite Bataille Navale</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	
	<body>
	
		<center>
		<h1>Jeu Petite Bataille Navale</h1>
		
		<form action="" method="POST">
			<input type="number" max="10" min="1" id="id" name="nbr" placeholder="Entrer un nombre entre 1 et 10" required/>
			<input type="text" id= "id" name="lettre" placeholder="Entrer une lettre de A à J" required/>
			<input  id="button" type="submit" name="ENVOYER" value="AFFICHER"/>
		</form>
<?php
	//Tester si les deux  champs sont pas vides
	if(isset($_POST["nbr"])!='' && isset($_POST["lettre"])!='')
	{
		//Importer le fichier fonction.php
		include("fonctions.php");
		
		//Appeler les deux fonctions
		Fonction($_POST["lettre"],$_POST["nbr"],$coord,$coord1);
		Tracer($coord,$coord1);
	}
?>
	</center>
	</body>
</html>