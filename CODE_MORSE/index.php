<html>
	<head>
		<title>CODE MORSE</title>
		<link rel="stylesheet" href="style.css" type="text/css" />
	</head>

	<body>
		<br>
		<h1>
			<center>CODE MORSE</center>
		</h1>
		<center>
			<form method="post" action="mini-projet.php"> 
				<input type="text" name="nom" class="text1" placeholder="ENTRER VOTRE TEXTE" required/ ><br><br>
				<input type="submit" name="aff"  class="aff" value="CODER" /><br><br>
				<input type="submit" name="aff1" class="aff" value="DECODER" /><br><br> 
			</form>
		</center>

<?php

//Construction d'un tableau @tab1 qui contient les éléments qu'on doit codés. 
$tab1 = array("0","1","2","3","4","5","6","7","8","9",
"a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z",
" ",".",",","?","'","!","/","(",")","&",":",";","=","+","-","_","\"","$","@","€");

//Construction d'un tableau @tab2 qui contient le code morse des éléments de @tab1.
$tab2 = array("----",".----","..---","...--","....-",".....","-....","--...","---..","----.",".-",
"-...","-.-.","-..",".","..-..","--.","....","..",".---","-.-",".-..","--","-.","---",".--.","--.-",
".-.","...","-","..-","...-",".--","-..-","-.--","--..","|",
".-.-.-","--..--","..--..",".----.","-.-.-----.","-..-.","-.--.","-.--.-",".-...","---...","-.-.-.",
"-...-",".-.-.","-....-","..--.-",".-..-.","...-..-",".--.-.","...-.-.---");



//CODAGE
if(isset($_POST["aff"])) //Si on apuit sur le button @aff
{
   $text = $_POST["nom"];
   
   $textlow = strtolower($text);  //La foncton strtolower permet de transmettre le texte en miniscule
   
   echo "<center><div class='a'>";
	
      for($i=0;$i<strlen($textlow);$i++)  //Parcourir les éléments du texte entré
	  {
	      for($j=0;$j<count($tab1);$j++)  //Parcourir les éléments du @tab1
		  {
	          if($textlow[$i] == $tab1[$j])
			  {
                 echo $tab2[$j]." ";
		      }
          }
	  }
   echo "</div></center>";
}

//DECODAGE
if(isset($_POST["aff1"]))  //Si on apuit sur le button @aff1
{
   $text1 = $_POST["nom"];
   
   $text1low = strtolower($text1); //La foncton strtolower permet de transmettre le texte en miniscule
   
   $codage="";  //Initialiser la variable @codage par une chaine vide
   
   $chaine = explode(" ",$text1low); //Decouper la variabe @text1low en morceaux une fois trouver un espace pour faciliter la comparaison
   
     for($i=0;$i<count($chaine);$i++)  //Parcourir les éléments du @chaine
	{
		for ($j=0;$j<count($tab2);$j++) //Parcourir les éléments du @tab2
		{
           if ($tab2[$j]==$chaine[$i]) 
		   {
			   $codage .= $tab1[$j];   // Stocker a chaque fois le code convenable dans la variable @codage.
			     
		   }
        }
	}
   echo "<center><div class='a'>".$codage."<br></div></center>"; //Afficher le contenu de @codage
}
		 	
?>
	</body>
</html>
