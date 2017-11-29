<html><head>
<!--<meta http-equiv="content-type" content="text/html; charset=UTF-8">-->
	<title>SAFARCOM - Transport de personnes </title>
	<link rel="stylesheet" type="text/css" href="style.css"> 
	<link rel="shortcut icon" href="http://safarcom.fr/logo.ico">

	</head>
	
	
<body>

<a href="#"> <img class="CBSMA_img" src="Safarcom.png"> </a>

<div id="menu">

	<ul>
	
	   <li class="active"><a href="Accueil.php"><span>Accueil</span></a></li>
	   <li> <a href="Apropos.php"><span>À propos de nous</span></a></li>
  <li class="liste1"><?php $type="TP"; echo '<a href="connexion.php?type='.$type.'"><span>Transport de personnes</span></a>';?>	   
	   </li>
	   <li class="liste1"><?php $type="TM"; echo '<a href="connexion.php?type='.$type.'"><span>Transport de marchandises</span></a>';?>
	   </li>
	   <li> <a href="comission.php"><span>Commission de transport</span></a></li>
	   
	   <li class="last"> <a href="contact.php"><span>Contact</span></a></li>
	   
	</ul>
	
</div>

<div class="photo1">
<h1>Contactez nous</h1>

</div>

<div class="content1">
<h2>Nous sommes à votre disposition:</h2>
<h3>Téléphone : 06.61.78.59.59</h3>
<h3>Email : Safarcom@hotmail.fr</h3>
<h3>Ou via la messagerie ci-dessous</h3>
<form action=""  method="POST"> 
<input type="text" class="active1"  name="nom" placeholder="Nom" required />
<input type="text" id="boite" name="objet" placeholder="Objet"  required />
<input type="text" id="boite" name="email" placeholder="Email" required />
<textarea type="text" id="boite" name="message" placeholder="Message" required></textarea>
<input type="submit" name="ENVOYER" value="Envoyer"/>
</form>
<?php

if(isset($_POST["nom"])!='' && isset($_POST["objet"])!='' && isset($_POST["email"])!='' && isset($_POST["message"])!='')
							{
$destinataire ='safarcom@hotmail.fr';
$nom=$_POST["nom"];
// Pour les champs $expediteur / $copie / $destinataire, séparer par une virgule s'il y a plusieurs adresses
$expediteur = $_POST["email"];
$copie = '';
$copie_cachee = '';
$objet = $_POST["objet"]; // Objet du message
$headers  = 'MIME-Version: 1.0' . "\n"; // Version MIME
$headers .= 'Content-type: text/html; charset=ISO-8859-1'."\n"; // l'en-tete Content-type pour le format HTML
$headers .= 'Reply-To: '.$expediteur."\n"; // Mail de reponse
$headers .= 'From: "'.$nom.'"<'.$expediteur.'>'."\n"; // Expediteur
$headers .= 'Delivered-to: '.$destinataire."\n"; // Destinataire
$headers .= 'Cc: '.$copie."\n"; // Copie Cc
$headers .= 'Bcc: '.$copie_cachee."\n\n"; // Copie cachée Bcc        
$message = '<div style="width: 100%; text-align: center; font-weight: bold">'.$_POST["message"].'</div>';
if (mail($destinataire, $objet, $message, $headers)) // Envoi du message
{
    echo'<font align="center" color="blue" style="font-weight:700;" >&nbsp &nbsp &nbsp VOTRE MESSAGE A ETE ENVOYE</font>';
									$echec=1;
									
}
else // Non envoyé
{
echo'<font align="left" color="red" >&nbsp &nbsp &nbsp VOTRE MESSAGE N A PAS PU ETRE ENVOYE </font>';}
}
?>





</div>
<div class="maps"> 
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2527.694073700748!2d3.16988441574003!3d50.688503379508916!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c328edfe62f2bb%3A0x5e20c5423e5c6b45!2s1+Rue+de+la+Tour%2C+59100+Roubaix!5e0!3m2!1sfr!2sfr!4v1494596767469" 
width="1000" height="900"  frameborder="0" style="border:0" allowfullscreen></iframe>
</div>

<div class="partie">
<h5 > CONTACTEZ-NOUS:</h5>
<div class="sous-titre">
Tel: 0661785959
<br>
Email: Safarcom.fr
</div>

<h5 > SAFARCOM TRANSPORTS DE PERSONNES </h5>
<div class="sous-titre">
Copyright © 2017 - TOUS DROITS RÉSERVÉS / Webmaster:#
</div>
<!--
<li> Conditions g&eacute;n&eacute;rales</li>
<li> Mentions l&eacute;gales </li>
<li> Politique de confidentialit&eacute; </li>
-->


</div>


</body></html>