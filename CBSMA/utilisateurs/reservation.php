
<?php 
session_start();
if(!isset($_SESSION['con'])){
header('Location:connexion.php');}
?>
<html><head>
<!--<meta http-equiv="content-type" content="text/html; charset=UTF-8">-->
	<title>SAFARCOM - Transport de personnes </title>
	<link rel="stylesheet" type="text/css" href="style.css"> 
	<link rel="shortcut icon" href="http://safarcom.fr/logo.ico">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBRoFXPr3VepdQlb-_cR_SYcG2mgo-FXHU&libraries=places"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>
  
  <script type="text/javascript">
/* Voici la fonction javascript qui change la propriété "display"
pour afficher ou non le div selon que ce soit "none" ou "block". */
 
function AfficherMasquer()
{
divInfo = document.getElementById('depaero');
divInfo1 = document.getElementById('depville');
sub1= document.getElementById('sub1');
sub = document.getElementById('sub');

divInfo.style.display = 'none';
divInfo1.style.display = 'block';
sub1.style.background = 'none';
sub1.style.color= 'white';
sub1.style.border= 'none';
sub.style.background = 'black';
sub.style.border= '';
sub.style.border= '';
document.getElementById('box').disabled= false;
document.getElementById('box1').disabled= false;
document.getElementById('idlist').disabled= true;
document.getElementById('idlist1').disabled= true;




}
function AfficherMasquer1()
{
divInfo = document.getElementById('depaero');
divInfo1 = document.getElementById('depville');
sub = document.getElementById('sub');
sub1= document.getElementById('sub1');

divInfo.style.display = 'block';
divInfo1.style.display = 'none';
sub.style.background = 'none';
sub.style.color= 'white';
sub.style.border= 'none';
sub1.style.background = 'black';
sub1.style.border= '';
document.getElementById('idlist').disabled= false;
document.getElementById('idlist1').disabled= false;
 document.getElementById('box').disabled= true;
document.getElementById('box1').disabled= true;
}



var autocomplete;
var autocomplete1;

function initialize() {
    // Creating the autocomplete object
    // Restrict to geographical location types
    autocomplete = new google.maps.places.Autocomplete(
        (document.getElementById('box')),
           { types: ['geocode'] }
    );
	
	 autocomplete1 = new google.maps.places.Autocomplete(
        (document.getElementById('box1')),
           { types: ['geocode'] }
    );
}
</script>
  
	</head>
	
	
<body onload="initialize()">



<?php

if(isset($_POST["depart"])!='' && isset($_POST["arrive"])!='' && isset($_POST["date"])!='' && isset($_POST["nb"])!='' && isset($_POST["heure_course"])!='')
							{
						$depart=$_POST["depart"];
						$arrive=$_POST["arrive"];
						
						
						if($depart!=$arrive)
						{
                          header("location:confirmation.php?id_client=".$_GET['id']."&date_course=".$_POST['date']."&heure_course=".$_POST['heure_course']."&depart=".$_POST['depart']."&arrive=".$_POST['arrive']."&nb_place=".$_POST['nb']."");					
						  }
							}

								
?>


<div class="connexion1">
<?php echo '<a href="reservation.php?id='.$_GET["id"].'"><img id="safarcom" src="logo.png"/></a>';
 echo '<a href="profil.php?id='.$_GET["id"].'">Votre profil</a>'; 
echo '<a href="consultreservation.php?id='.$_GET["id"].'">Consulter vos réservations</a>'; ?>
<a  href="deconnexion.php">Déconnexion</a>
</div>

<div class="reservation">
<?php
 include 'Connecter.php'; 
$auth = mysql_query('SELECT * FROM client where id_client="'.$_GET['id'].'"');
								while($data = mysql_fetch_array($auth)){
$nom=strtoupper($data["Nom_client"]);
 echo'<h2>Bonjour Monsieur '.$nom.'</h2>';
}

?>

<h1> Commencer votre réservation dès maintenant </h1>

<div class="reservation1">
<form action="" method="POST">
<input type="button" id="sub" class="typedep" onClick="AfficherMasquer1()" value="Déplacement vers l'aeroport" style="background:none;border:none"/>

<input type="button" id="sub1" class="typedep" onClick="AfficherMasquer()" value="Déplacement dans la ville" />


<div id="depaero" >
<label>De:</label>
<select name="depart" id="idlist"  >

   <option value="Roubaix(Euroteleport)">Roubaix(Euroteleport)</option>
   <option value="Lille(Gare Lille Europe)">Lille(Gare Lille Europe)</option>
   <option value="Aeoroport Charleleroi">Aeoroport Charleleroi</option>
   <option value="Aeoroport Orly">Aeoroport Orly</option>
   <option value="Aeoroport Charles de Gaulle">Aeoroport Charles de Gaulle</option>
   <option value="Aeoroport Lille">Aeoroport Lille</option>
</select>

<label>A: </label>
<select name="arrive" id="idlist1" >

   <option value="Roubaix(Euroteleport)">Roubaix(Euroteleport)</option>
   <option value="Lille(Gare Lille Europe)">Lille(Gare Lille Europe)</option>
   <option value="Aeoroport Charleleroi">Aeoroport Charleleroi</option>
   <option value="Aeoroport Orly">Aeoroport Orly</option>
   <option value="Aeoroport Charles de Gaulle">Aeoroport Charles de Gaulle</option>
   <option value="Aeoroport Lille">Aeoroport Lille</option>
</select><br><br>

</div>

<div id="depville" style="display:none">
 <label>De: </label><input type="text" name="depart" id="box" disabled="true" placeholder="Lieu de depart"  required />
 <label>A: </label><input type="text" name="arrive" id="box1"  disabled="true" placeholder="Lieu d'arrivé" required /><br><br>
 </div>


<label> Date de départ</label><input type="text" name="date" id="datepicker" placeholder="dd/mm/yy" required />
<label>Heure du course </label>
<?php 
$autheure = mysql_query('SELECT * FROM horaire where CodeHoraire !=0');
echo '<select name="heure_course" id="datepicker" required>';
								while($dataheure = mysql_fetch_array($autheure)){
echo'<option>'.$dataheure["tranche2"].'</option>';
}
echo '</select>';
mysql_close();	
?>
<label>Nombre de place</label>
<input id="datepicker" name="nb" type="number" max="14" min="1" required /><br><br>
<input id="button4" type="submit" name="ENVOYER" value="Réserver"/>


<?php
if(isset($_POST["depart"])!='' && isset($_POST["arrive"])!='' && isset($_POST["date"])!='' && isset($_POST["nb"])!='' && isset($_POST["heure_course"])!='')
							{
						$depart=$_POST["depart"];
						$arrive=$_POST["arrive"];
						
						
						if($depart==$arrive){echo'<div id="erreur">&nbsp &nbsp &nbsp INFORMATIONS INCORRECTES</div>';}}
?>

</form>
</div>
</div>  
</body>
</html>