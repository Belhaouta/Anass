
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
<?php echo '<a href="reservation.php?id='.$_GET["id"].'"><img id="safarcom" src="logo.png"/></a>';
 echo '<a href="profil.php?id='.$_GET["id"].'">Votre profil</a>'; 
echo '<a href="consultreservation.php?id='.$_GET["id"].'">Consulter vos réservations</a>'; ?>
<a  href="deconnexion.php">Deconexion</a>
</div>

<div class="reservationn1">
<h1> Bienvenue Sur Votre Profil</h1>
<div class="reservation5">
<h3>Changement de mot de passe</h3> 
<hr id="ligne">
<form action="" method="POST">


 <input type="password" name="anc" id="text" placeholder="Entrer votre ancien mot de passe"  required /><br><br>
 <input type="password" name="nv" id="text" placeholder="Entrer votre nouveau mot de passe" required /><br><br>
 <input type="password" name="conf" id="text" placeholder="Confirmer votre mot de passe" required /><br><br>
<input id="button9" type="submit" name="MODIFIER" value="Changer" />

<?php
include 'Connecter.php'; 
if(isset($_POST['MODIFIER'])){
$echec=0;
if(isset($_POST["anc"])!='' && isset($_POST["nv"])!='' && isset($_POST["conf"])!=''){

$auth1 = mysql_query('SELECT * FROM client where id_client="'.$_GET['id'].'"');
								while($data = mysql_fetch_array($auth1)){
if(($data["Password_client"]==$_POST["anc"]) && ($_POST["nv"]==$_POST["conf"])){
$auth2=mysql_query('UPDATE client SET Password_client ="'.$_POST["nv"].'" WHERE id_client="'.$_GET["id"].'"');
echo'<div id="valide"  >&nbsp &nbsp &nbsp VOTRE MOT DE PASSE A ETE BIEN CHANGE</div>';

										break;

}
else{$echec=1;}

}

if($echec==1){ echo'<div id="erreur">&nbsp &nbsp &nbsp INFORMATIONS INCORRECTES</div>';}
}
}

mysql_close();
?>

</div>


</form>

</div>
</body>
</html>