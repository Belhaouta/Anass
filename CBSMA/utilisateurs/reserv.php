
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
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>
	</head>
	
	
<body>

<div class="connexion1">
<a href="reservation.php"><img id="safarcom" src="logo.png"/></a>
<a href="#">Votre profil </a>
<a href="#">Consulter vos réservations</a>
<a  href="deconnexion.php">Deconexion</a>
</div>

<div class="reservation">
<?php
include 'Connecter.php'; 
$auth = mysql_query('SELECT * FROM client where id_client="'.$_GET['id'].'"');
								while($data = mysql_fetch_array($auth)){
$nom=strtoupper($data["Nom_client"]);
 echo'<h2>Bonjour Monsieur <font color="#c18508" >'.$nom.'</font></h2>';
}
 ?>
<h1> Commencer votre réservation dès maintenant </h1>

<div class="reservation1">
<form action="" method="POST">
<label>De:</label>
<select name="depart" id="idlist"  required>

   <option value="Roubaix(Euroteleport)">Roubaix(Euroteleport)</option>
   <option value="Lille(Gare Lille Europe)">Lille(Gare Lille Europe)</option>
   <option value="Aeoroport Charleleroi">Aeoroport Charleleroi</option>
   <option value="Aeoroport Orly">Aeoroport Orly</option>
   <option value="Aeoroport Charles de Gaulle">Aeoroport Charles de Gaulle</option>
   <option value="Aeoroport Lille">Aeoroport Lille</option>
</select>

<label>A: </label>
<select name="arrive" id="idlist" required>

   <option value="Roubaix(Euroteleport)">Roubaix(Euroteleport)</option>
   <option value="Lille(Gare Lille Europe)">Lille(Gare Lille Europe)</option>
   <option value="Aeoroport Charleleroi">Aeoroport Charleleroi</option>
   <option value="Aeoroport Orly">Aeoroport Orly</option>
   <option value="Aeoroport Charles de Gaulle">Aeoroport Charles de Gaulle</option>
   <option value="Aeoroport Lille">Aeoroport Lille</option>
</select>
<br><br>
<label> Date de départ</label><input type="text" name="date" id="datepicker" placeholder="dd/mm/yy" required />
<label>Heure du course </label>
<select name="heure_course" id="datepicker" required>

   <option value="8">8h</option>
   <option value="9">9h</option>
   <option value="10">10h</option>
   <option value="11">11h</option>
   <option value="12">12h</option>
   <option value="13">13h</option>
   <option value="14">14h</option>
   <option value="15">15h</option>
   <option value="16">16h</option>
   <option value="17">17h</option>
   <option value="18">18h</option>
   <option value="19">19h</option>
   <option value="20">20h</option>
   <option value="21">21h</option>
   <option value="22">22h</option>
</select>

<label>Nombre de place</label>
<input id="datepicker" name="nb" type="number" max="14" min="1" required /><br><br>
<input id="button4" type="submit" name="ENVOYER" value="Réserver"/>


<?php
 
if(isset($_POST["depart"])!='' && isset($_POST["arrive"])!='' && isset($_POST["date"])!='' && isset($_POST["nb"])!='' && isset($_POST["heure_course"])!='')
							{
						$depart=$_POST["depart"];
						$arrive=$_POST["arrive"];
						$date=$_POST["date"];
						$date= date("Y-m-d", strtotime($date) );
						$date1=date("Y-m-d");
						
						if($depart==$arrive){echo'<div id="erreur">&nbsp &nbsp &nbsp INFORMATIONS INCORRECTES</div>';}
						else{
						$auth3 = mysql_query('SELECT * FROM course');
						$num_rows = mysql_num_rows($auth3);

                        
						if($num_rows<=0){
						$auth4 = mysql_query('INSERT INTO course VALUES (NULL,NULL,"'.$_POST["depart"].'","'.$_POST["arrive"].'","'.$date.'","'.$_POST["heure_course"].'","N")');}
						else{
							
								$auth1 = mysql_query('SELECT * FROM course where Depart_course="'.$depart.'" and Arrive_course="'.$arrive.'" and Date_course="'.$date.'" and Heure="'.$_POST["heure_course"].'"');
								$num_rows1 = mysql_num_rows($auth1);
								if($num_rows1<=0){$auth = mysql_query('INSERT INTO course VALUES (NULL,NULL,"'.$_POST["depart"].'","'.$_POST["arrive"].'","'.$date.'","'.$_POST["heure_course"].'","N")');}}
								$auth5 = mysql_query('SELECT * FROM course where Depart_course="'.$depart.'" and Arrive_course="'.$arrive.'" and Date_course="'.$date.'" and Heure="'.$_POST["heure_course"].'"');
								while($data1 = mysql_fetch_array($auth5)){
								echo "<script type='text/javascript'>window.location='confirmation.php?id_client=".$_GET['id']."&id_course=".$data1['id_course']."&nb_place=".$_POST['nb']."';</script>";
								
								}
							
							}
							}
								mysql_close();
?>
</form>
</div>
</div>
</body>
</html>


echo "<script type='text/javascript'>window.location='confirmation.php?id_client=".$_GET['id']."&id_course=".$data1['id_course']."&nb_place=".$_POST['nb']."';</script>";