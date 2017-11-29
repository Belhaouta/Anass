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
<a href="administrateur.php"><img src="logo.png"/></a>

</div>

<div class="auth">

<h1> Espace Administratif</h1>
<hr id="ligne">
<h2> Authentification</h2>

<h2> Connexion</h2>
<form action="" method="POST">
<input  id="boite1" type="text" name="email" placeholder="Email" required />
<input  id="boite1" type="password" name="pass" placeholder="Password" required />
<input id="button1" type="submit" name="ENVOYER" value="Connexion"/><br>

	<?php
							
							
							$_SESSION['utilisateur'] = '';
							
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
							$echec = 'true';
	 						if(isset($_POST["email"])!='' && isset($_POST["pass"])!='')
							{
							
							
								$auth = mysql_query('SELECT * FROM administrateur');
								while($data = mysql_fetch_array($auth)){
								
									if( ($data['Email_admin']==$_POST['email']) && (password_verify($_POST['pass'], $data['Password_admin']))){  
									session_start ();
										$_SESSION['id-user'] = $data['id_admin'];
										$_SESSION['utilisateur'] = $data['Email_admin'];
										$_SESSION['Password'] = $data['Password_admin'];
										$_SESSION['con'] = 'true';
					         	echo "<script type='text/javascript'>window.location='accueiladmin.php?id=".$data['id_admin']."';</script>";
										break;
									}	
									else
										$echec = 'false';
								}
								if($echec=='false')
										echo'<span id="erreur">Login ou Mot de passe INCORRECTE</span>';
							}
								mysql_close();
						?>
</form>

<br><br>
</div>



</body>
</html>