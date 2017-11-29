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
<h1> Inscription</h1>
<hr id="ligne">
<h3> Bienvenue sur Safarcom. Créez votre compte passager et réserver votre première course en quelques minutes.</h3>
<form action="" method="POST">
<input  id="boite1" type="text" name="nom" placeholder="Nom" required />
<input  id="boite1" type="text" name="prenom" placeholder="Prénom" required />
<input  id="boite1" type="text" name="email" placeholder="Email" required />
<input  id="boite1" type="password" name="pass" placeholder="Password" required />
<input  id="boite1" type="text" name="tele" placeholder="Téléphone" required />
<input  id="boite1" type="text" name="adresse" placeholder="Adresse" required />
<div class="demo">
   <div class="element">
      <input type="radio" id="bouton_1" name="bouton" value="particulier" >
      <label for="bouton_1">Particulier</label>
   </div>
   <div class="element">
      <input type="radio" id="bouton_2"  value="entreprise" name="bouton">
      <label for="bouton_2">Entreprise</label>
   </div>
</div>

<input id="button2" type="submit" name="ENVOYER" value="Créer un compte"/>

<?php
	include 'Connecter.php'; 

							
	 						if(isset($_POST["nom"])!='' && isset($_POST["prenom"])!='' && isset($_POST["email"])!='' && isset($_POST["pass"])!='' && isset($_POST["tele"])!='' && isset($_POST["adresse"])!=''  )
							{
								
									$passs=password_hash($_POST["pass"],PASSWORD_DEFAULT);
							
										
						
							    $echec=0;
								$auth1 = mysql_query('SELECT * FROM client');
								while($data1 = mysql_fetch_array($auth1)){
									if( $data1['Email_client']==$_POST['email']){  	
									echo'<font align="left" color="red" >&nbsp &nbsp &nbsp CE COMPTE EXISTE DEJA!</font>';
									$echec=1;
						    	}}   
								
						  if($echec==0){
						  $auth = mysql_query('INSERT INTO client VALUES (NULL, "'.$_POST["nom"].'","'.$_POST["prenom"].'","'.$_POST["email"].'","'.$_POST["tele"].'","'.$_POST["bouton"].'","'.$_POST["adresse"].'","'.$passs.'")');
					  echo'<font align="left" color="#4545e6" >&nbsp &nbsp &nbsp VOTRE COMPTE A ETE BIEN CREE</font>';}
							
							}
							mysql_close();
		?>		
</form>
<hr id="ligne">
Vous avez déjà un compte ? <?php if($_GET["type"]=="TP"){echo '<a href="connexion.php?type=TP">';}
else{echo '<a href="connexion.php?type=TM">';}?>
Se connecter</a>
<br><br>
</div>

</body>

</html>