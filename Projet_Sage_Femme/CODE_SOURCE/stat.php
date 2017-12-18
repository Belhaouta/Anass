<!DOCTYPE HTML>
<html>

	<head>
	
		<title>Sage femme</title>
		
		<link rel="stylesheet" href="style.css" type="text/css" />	
		
		
<!--             ********************************************************************************
				 *                                                                              *
				 *            Limiter Le nombre des villes selectionnées à 8 villes             *
				 *                  (pour mieux visualiser les statistique )                    *
				 *                                                                              *
				 ********************************************************************************
				 
-->

        <script>
			var idxArray = [];
			function initVar()
			{	
				var i, e;
				e = document.getElementById("idListe");
				for (i=0; i<e.length; i++){
					idxArray.push(false);
				}
				e.selectedIndex = -1;
			}
			function selection(obj)
			{
				var i, n, lastIndex;
				n = 0;
				lastIndex = -1;
				for (i=0; i<obj.length; i++)
				{
					if (obj[i].selected != idxArray[i])
						lastIndex = i;
					if (obj[i].selected)
					{	
						idxArray[i]=true;
						n++;
					}
					else
						idxArray[i]=false;
				}
				if (n>8)
				{
					obj[lastIndex].selected = false;
					idxArray[lastIndex] = false;
				}
			}
		</script>
		
	</head>
	
	<body vlink="black" alink="white">
	
	<div class='axy'>
	
		<img  id="im" src="img/logo.png"/>  
		
	    <a href="index.php">Acceuil</a>
		
        <a href="recherche.php">Chercher une sage femme</a>
		
        <a href="stat.php">Etude Statistique</a>
		
		<hr id="li1"/>
		
		<hr id="li2"/>
		
		<hr id="li3"/> 
		
	</div>
	
	<div class="a2x2">
	
		<h1>Etude Statistique </h1>
		
		<h2>Le nombre de Cabinets en fonction de villes</h2>
		
		<form method="POST" action="stat1.php" onload="initVar()">
		
		
		<?php

		/*       ********************************************************************************
				 *                                                                              *
				 *                      La liste des villes à selectionner                      *
				 *                                                                              *
				 ********************************************************************************
				 
        */
		//Connexion à la base de données

		//L'utilisateur root
		
        $userbd    = 'root';
		
		//Pas de mot de passe
		
        $mdpbd     = '';

        $connection = new PDO('mysql:host=localhost;dbname=projet', $userbd, $mdpbd);	
		
		$requete='SELECT distinct ville from cabinets' ;		
		
		echo "<select id='idListe' name ='donnee[]' multiple='multiple' onchange='selection(this)' required >"	;	
		
		foreach($connection->query($requete) as $row1) 
		
		{
		
				echo "<option>".$row1['ville']."</option>";
		
		}
		
		echo "</select><br>";

		echo '
		<input id="entr1" name="sub" type="submit"  value="Hist" />
		
		<input id="entr2" name="sub1" type="submit"  value="Courbe" />
		
		<input id="entr3" name="sub2" type="submit" value="Camembert"/>
		
		</form>
		
		</div>';
		
		?>

	</body>
	
</html>