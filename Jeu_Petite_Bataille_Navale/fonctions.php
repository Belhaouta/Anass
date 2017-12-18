<?php
	//tableau à 2 dimensions $coord
	$coord=array(
				1 =>array(1,1,1,1,1,1,1,1,1,1), 
				2 =>array(1,1,1,1,1,1,1,1,1,1), 
				3 =>array(1,1,1,1,1,0,1,1,1,1), 
				4 =>array(1,1,1,1,1,0,1,1,1,1), 
				5 =>array(1,1,1,1,1,0,1,1,0,1), 
				6 =>array(1,1,1,1,1,1,1,1,0,1), 
				7 =>array(1,1,1,1,1,1,1,1,1,1), 
				8 =>array(1,1,1,1,1,1,1,1,1,1), 
				9 =>array(1,1,0,0,0,0,1,1,1,1), 
				10 =>array(1,1,1,1,1,1,1,1,1,1)
				); 
				
	//tableau $coord1 		
	$coord1=array(
				'A' =>1,
				'B' =>2,
				'C' =>3,
				'D' =>4,
				'E' =>5,
				'F' =>6,
				'G' =>7,
				'H' =>8,
				'I' =>9,
				'J' =>10,
				);
				
	//Fonction qui prends en pramatres 4 parametres 
	// $chaine --> la lettre 
	// $nbr --> le chiffre
	// Objectif --> Verifier si les coordonnées ($chaine,$nbr) existe sur le tableau
	function Fonction($chaine,$nbr,$coord,$coord1)
	{	
		//Convertir la chaine majuscule
		$chaine=strtoupper($chaine);

		
		if(array_key_exists($nbr,$coord) && array_key_exists($chaine,$coord1))
		{	
			//Parcourir les élements du tableau $coord
			foreach($coord as $key => $value )
			{
				if($key==$nbr)
				{
					//Parcourir les élements du tableau $coord1
					foreach($coord1 as $key1 =>$value1)
					{
						if($chaine==$key1)
						{	
							//Si les coordonnées n'existent pas on va afficher un message <<C'est rappé>>
							if($value[$value1-1]==1)
								echo "<h3>C'est rappé!</h3>";
								
							//Sinon on affiche <<Touché mon Capitaine >>	
							else 
								echo "<h3>Touché mon Capitaine!</h3>";
						}
					}
				}
			}
		}
		
		else {echo "<h3>Hors jeu</h3>";} 
	}

	// Fonction("a",5);
	
	//Fonction qui permets de tracer le tableau pour verifier les résultats  
	function Tracer($coord,$coord1)
	{			
		echo "<table border=1><tr><td width=5%></td>";
		foreach($coord1 as $key1 =>$value1)
		{	
			echo "<td align=center width=5%>".$key1."</td>";
		}
		echo "</tr>";

		foreach($coord as $key => $value )
		{
			echo "<tr><td align=center width=5% >".$key."</td>";
			for($i=0;$i<10;$i++)
			{	
				if($value[$i]==1)
					echo "<td width=5%></td>";
				else
					echo "<td width=5% bgcolor='black'></td>";
			}
			echo "</tr>";
		}
		echo "</table>";
	}

?>