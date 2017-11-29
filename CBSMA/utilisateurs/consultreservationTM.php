
<?php 
session_start();
if(!isset($_SESSION['con'])){
header('Location:connexion.php?type=TM');}
?>
<html><head>
<!--<meta http-equiv="content-type" content="text/html; charset=UTF-8">-->
	<title>SAFARCOM - Transport de personnes </title>
	<link rel="stylesheet" type="text/css" href="style.css"> 
	<link rel="shortcut icon" href="http://safarcom.fr/logo.ico">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  
  
  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>
	</head>
	
	
<body>

<div class="connexion1">
<?php echo '<a href="accueilTM.php?id='.$_GET["id"].'"><img id="safarcom" src="logo.png"/></a>';
 echo '<a href="profilTM.php?id='.$_GET["id"].'">Votre profil</a>';
echo '<a href="consultreservationTM.php?id='.$_GET["id"].'">Consulter vos réservations</a>'; ?>
<a  href="deconnexionTM.php">Déconnexion</a>
</div>

<div class="reservationn2">

<h1> Consulter vos réservations</h1>


<?php

include 'Connecter.php'; 

include('exemple.php');
$auth = mysql_query('SELECT * FROM reservation1 where id_client="'.$_GET['id'].'"');
$i=1;
								while($data = mysql_fetch_array($auth)){
echo '<div class="reservation2TM">
<h3>Réservation n°'.$i.'</h3> 
<hr id="ligne">';
							echo "<h6>Roubaix-France ------> ".$data['Lieu_arrive']."</h6>";
								echo "<h6>".$data['Poids']." KG</h6>";
								echo "<h5>Prix: ".$data["Prix"]." &euro;</h5><br>";
								echo "<a href ='pdfTM.php?id=".$data["id_reservation"]."'><img src='pdf.png' width='40' heigth='40'/></a>";
echo '</div>';		
$i++;
								}
								mysql_close();
?>


<br>
</div>
</body>
</html>