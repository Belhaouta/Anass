<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<title>Layout CSS by PUShAUNE</title>
<link rel="stylesheet" href="m.css" type="text/css" />
</head>
<body>
<?php
     include("connecter.php");
     $bdd=connecter();
     $req0 = $bdd->prepare('SELECT * FROM Professeur ');
     $req0->execute();
echo '<ul id="my"><li>';
   echo  '<li class="size">Professeur :</br></br></li>';
       echo '<li><select class="style0 liste" >';
	     echo '<option class="style0"value="france">'.'selectionner..'.'</option>';
	        	  while( $resultat = $req0->fetch()){
           echo '<option class="style1" value=$resultat[0] >'."$resultat[1]".'</option>';}
           
echo '</select>'.'</li>'.'</ul>'.'<ul id="my">'.' <li class="size">'.'Salle :'.'</br>'.'</br>'.'</li>'.'<li>'.'<select class="style0 liste box">' ; 
echo '<option class="style0"value="france">'.'selectionner..'.'</option>';
$req0 = $bdd->prepare('SELECT * FROM Salle ');
     $req0->execute();
      	          while( $resultat = $req0->fetch()){
           echo '<option class="style1" value=$resultat[0] >'."$resultat[1]".'</option>';}
                  echo '</select>'.'</li>'.'</ul>' ;
				  
				  
				  $req0 = $bdd->prepare('SELECT * FROM Cours ');
     $req0->execute();
echo '<ul id="my"><li>';
   echo  '<li class="size">Matiere :</br></br></li>';
       echo '<li><select class="style0 liste" >';
	     echo '<option class="style0"value="france">'.'selectionner..'.'</option>';
	        	  while( $resultat = $req0->fetch()){
           echo '<option class="style1" value=$resultat[0] >'."$resultat[1]".'</option>';}
           
echo '</select>'.'</li>'.'</ul>';
   ?>
   </body>
</form>