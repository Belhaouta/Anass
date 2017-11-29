<html><head>
<!--<meta http-equiv="content-type" content="text/html; charset=UTF-8">-->
	<title>SAFARCOM - Transport de personnes </title>
	<link rel="stylesheet" type="text/css" href="style.css"> 
	<link rel="shortcut icon" href="http://safarcom.fr/logo.ico">

	</head>
	
	
<body style="background-image:url(route.jpg); 
 background-repeat: no-repeat; 
 background-position: center center;
 background-attachment: fixed; 
 background-size: cover;">

<div class="connexion">
<a href="accueil.php"><img src="logo.png"/></a>
</div>

<div class="auth">
<h1> Authentification</h1>
<hr id="ligne">

<h2> veuillez entrer votre email:</h2>
<form action="" method="POST">
<input  id="boite1" type="text" name="email" placeholder="Email" required />
<input id="button1" type="submit" name="ENVOYER" value="Envoyer"/><br>

	<?php
							
							
							
							
							include 'Connecter.php'; 
							
	 						if(isset($_POST["email"])!='')
							{
								$echec=0;
								$auth1 = mysql_query('SELECT * FROM client');
								while($data1 = mysql_fetch_array($auth1)){
									if( $data1['Email_client']==$_POST['email']){


$destinataire = $_POST["email"];
// Pour les champs $expediteur / $copie / $destinataire, séparer par une virgule s'il y a plusieurs adresses
$expediteur = 'safarcom@hotmail.fr';
$copie = '';
$copie_cachee = '';
$objet = 'Test'; // Objet du message
$headers  = 'MIME-Version: 1.0' . "\n"; // Version MIME
$headers .= 'Content-type: text/html; charset=ISO-8859-1'."\n"; // l'en-tete Content-type pour le format HTML
$headers .= 'Reply-To: '.$expediteur."\n"; // Mail de reponse
$headers .= 'From: "Nom_de_expediteur"<'.$expediteur.'>'."\n"; // Expediteur
$headers .= 'Delivered-to: '.$destinataire."\n"; // Destinataire
$headers .= 'Cc: '.$copie."\n"; // Copie Cc
$headers .= 'Bcc: '.$copie_cachee."\n\n"; // Copie cachée Bcc        
$message = '<div style="width: 100%; text-align: center; font-weight: bold">Un Bonjour de Developpez.com !</div>';
if (mail($destinataire, $objet, $message, $headers)) // Envoi du message
{
    echo'<font align="left" color="#4545e6" >&nbsp &nbsp &nbsp VOTRE MOT DE PASSE VOUS SERA DIRECTEMENT ENVOYE PAR MAIL</font>';
									$echec=1;
									
}
else // Non envoyé
{
echo'<font align="left" color="red" >&nbsp &nbsp &nbsp VOTRE MESSAGE N A PAS PU ETRE ENVOYE </font>';}
  break;
}

									
									
									
						    	}
								
						  if($echec==0){
						  
					  echo'<font align="left" color="red" >&nbsp &nbsp &nbsp ADRESSE INVALID</font>';}
							
							}
							mysql_close();
						?>
</form>
<hr id="ligne">
Vous n'avez pas de compte ? <?php if($_GET["type"]=="TP"){echo '<a href="inscription.php?type=TP">';}
else{echo '<a href="inscription.php?type=TM">';}?>
S'inscrire</a>
<br><br>
</div>



</body>

</html>