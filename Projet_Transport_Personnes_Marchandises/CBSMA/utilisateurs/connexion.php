<html><head>
    <!--<meta http-equiv="content-type" content="text/html; charset=UTF-8">-->
    <title>SAFARCOM - Transport de personnes </title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta http-equiv="Content-Type" content="text/html;charset=utf8" />
    <link rel="shortcut icon" href="http://safarcom.fr/logo.ico">

</head>


<body style="background-image:url(img/route.jpg); 
 background-repeat: no-repeat; 
 background-position: center center;
 background-attachment: fixed; 
 background-size: cover;">

<div class="connexion">
    <a href="accueil.php"><img src="img/logo.png"/></a>
</div>

<div class="auth">
    <h1> Authentification</h1>
    <hr id="ligne">
    <h2> Connexion</h2>
    <form action="" method="POST">
        <input  id="boite1" type="text" name="email" placeholder="Email" required />
        <input  id="boite1" type="password" name="pass" placeholder="Password" required />
        <input id="button1" type="submit" name="ENVOYER" value="Connexion"/><br>

        <?php


        $_SESSION['utilisateur'] = '';

        include 'Connecter.php';
        $echec = 'true';
        if(isset($_POST["email"])!='' && isset($_POST["pass"])!='')
        {





            $auth = mysql_query('SELECT * FROM client');
            while($data = mysql_fetch_array($auth)){
                if( $data['Email_client']==$_POST['email'] && (password_verify($_POST['pass'], $data['Password_client']))){
                    session_start ();
                    $_SESSION['id-user'] = $data['id_client'];
                    $_SESSION['utilisateur'] = $data['Email_client'];
                    $_SESSION['Password'] = $data['Password_client'];
                    $_SESSION['con'] = 'true';
                    if($_GET["type"]=="TP"){
                        echo "<script type='text/javascript'>window.location='reservation.php?id=".$data['id_client']."';</script>";}
                    if($_GET["type"]=="TM"){
                        echo "<script type='text/javascript'>window.location='accueilTM.php?id=".$data['id_client']."';</script>";}
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
    <?php if($_GET["type"]=="TP"){ echo '<a href="passwordforget.php?type=TP">Mot de passe oubli�</a>';}
    else{echo '<a href="passwordforget.php?type=TM">Mot de passe oubli�</a>';}
    ?>
    <hr id="ligne">
    Vous n'avez pas de compte ? <?php if($_GET["type"]=="TP"){ echo '<a href="inscription.php?type=TP">';}
    else{ echo '<a href="inscription.php?type=TM">';}
    ?>S'inscrire</a>
    <br><br>
</div>



</body>
</html>