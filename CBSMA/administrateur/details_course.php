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



<div class="detailscourse">
<h1><u>Détails du course</u></h1>

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
			
	 	
		$auth = mysql_query('SELECT * FROM course join horaire on id_heure=CodeHoraire WHERE id_course="'.$_GET["id_course"].'"');
					  while($data = mysql_fetch_array($auth)){
		echo "<h2>De: ".$data['Depart_course']."</h2>"; 
		echo "<h2>A: ".$data['Arrive_course']."</h2>";							
		echo "<h4>".$data['Date_course']."</h4>";							
		echo "<h4>".$data['tranche2']."h</h4>";							
						}
							$auth2 = mysql_query('SELECT sum(Prix) as PrixTot FROM reservation WHERE id_course="'.$_GET["id_course"].'"');
					  while($data2 = mysql_fetch_array($auth2)){
		echo "<h3>Prix total: ".$data2['PrixTot']." &euro;</h3>";
		}
									
$auth1 = mysql_query('SELECT Nom_client,sum(Nb_place) as NB FROM reservation join client on reservation.id_client=client.id_client WHERE id_course="'.$_GET["id_course"].'" group by client.Nom_client');
					  while($data1 = mysql_fetch_array($auth1)){							
								
echo '<div class="personne">'.$data1["Nom_client"].'<br>Place:'.$data1["NB"].'</div>';					
							}
							mysql_close();

?>
</div>



</body>
</html>55