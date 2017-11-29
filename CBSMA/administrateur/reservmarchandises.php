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



<div class="client1">
<h1>Livraison de marchandises</h1>

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
	$auth = mysql_query('SELECT * FROM reservation1 join client on reservation1.id_client=client.id_client ');
	while($data = mysql_fetch_array($auth)){
	 echo '<div id="marchandises">';
	 
	 echo '<h2>'.strtoupper($data["Nom_client"]).'  '.ucfirst($data["Prenom_client"]).'</h2>';
	 echo '<h3>Roubaix ---> '.$data["Lieu_arrive"].'</h3>';	 
	 echo '<h4> ('.$data["Adresse"].')</h3>';	 
	 echo '<h4>'.$data["Poids"].' KG</h4>';
	 echo '<h4>'.strtoupper($data["Prix"]).' EUR</h4>';
	 echo '</div>';
										
				}						
										
							
mysql_close();

?>
<br><br></div>



</body>
</html>