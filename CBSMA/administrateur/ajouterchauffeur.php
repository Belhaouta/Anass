<?php 
session_start();
if(!isset($_SESSION['con'])){
header('Location:administrateur.php');}
?>

<html><head>
<!--<meta http-equiv="content-type" content="text/html; charset=UTF-8">-->
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



<div class="chauffeur">
<h1>Ajouter des chauffeurs</h1>
<form action="" method="POST">


 <input type="text" name="nom" id="text" placeholder="Nom de chauffeur"  required />
 <input type="text" name="prenom" id="text" placeholder="Prénom de chauffeur" required />
 <input type="text" name="email" id="text" placeholder="Email de chauffeur" required />
 <input type="text" name="tel" id="text" placeholder="Tél de chauffeur" required />
 <input type="text" name="licence" id="text" placeholder="Licence de chauffeur" required />
 <input id="button" type="submit" name="AJOUTER" value="Ajouter" />
</form> 
<?php
	define('DB_HOST', 'localhost');  
	define('DB_USER', 'root');
	define('DB_PASSWORD','');
	define('DB_NAME', 'safarcom');

	$dblink = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);

	if($dblink) {
    	$selectdatabase = mysql_select_db(DB_NAME);
    if(!$selectdatabase) {
        echo 'erreur lors de la selection de la bdd';
        exit;
    }
	} else {
    	echo 'erreur de connexion a la bdd';
    	exit;
	} 
			
	 						if(isset($_POST["nom"])!='' && isset($_POST["prenom"])!='' && isset($_POST["email"])!='' && isset($_POST["tel"])!='' && isset($_POST["licence"])!='')
							{
								
										$auth = mysql_query('INSERT INTO chauffeur VALUES (NULL, "'.$_POST["nom"].'","'.$_POST["prenom"].'","'.$_POST["tel"].'","'.$_POST["licence"].'","'.$_POST["email"].'")');
					  echo'<div id="valide"  >LE CHAUFFEUR A ETE BIEN AJOUTE</div>';
										
						}
							
									
							
								
						
							
							mysql_close();

?>
</div>



</body>
</html>