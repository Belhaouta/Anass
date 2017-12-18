
<?php
session_start();
if(!isset($_SESSION['con'])){
    header('Location:connexion.php');}
?>
<html><head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
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
    <?php echo '<a href="reservation.php?id='.$_GET["id"].'"><img id="safarcom" src="img/logo.png"/></a>';
    echo '<a href="profil.php?id='.$_GET["id"].'">Votre profil</a>';
    echo '<a href="consultreservation.php?id='.$_GET["id"].'">Consulter vos r�servations</a>'; ?>
    <a  href="deconnexion.php">D�connexion</a>
</div>
<?php
echo '<div class="reservationn">
<h1> Bienvenue Sur Votre Profil</h1>
<div class="reservation3">
<h3>G�n�ralit�</h3> 
<hr id="ligne">
<form action="" method="POST">';
include 'Connecter.php';
$auth = mysql_query('SELECT * FROM client where id_client="'.$_GET["id"].'"');
while($data = mysql_fetch_array($auth)){


    echo "<h5><label>Nom: </label>".$data["Nom_client"]."</h5>";
    echo "<h5><label>Prenom: </label>".$data["Prenom_client"]."</h5>";
    echo "<h5><label>Adresse: </label>".$data["Adresse_client"]."</h5>";
    echo '<input id="button8" type="submit" name="CHANGER" value="Changer votre mot de passe" />';
    echo '</form></div>

<div class="reservation4">
<h3>Contact</h3> 
<form action="" method="POST">
<hr id="ligne">';

    echo '<h5><label>T�l�phone: </label></h5><input type="text" name="tele" id="text"  placeholder="'.$data["Tel_client"].'" required /><br>';
    echo '<h5><label>Email personnel: </label></h5><input type="text" name="email" id="text"  placeholder="'.$data["Email_client"].'" required /><br>';
}

echo '<input id="button7" type="submit" name="MODIFIER" value="Modifier" /><div>';
?>
</form>

<?php
if(isset($_POST['MODIFIER'])){

    if(isset($_POST["tele"])!='' && isset($_POST["email"])!=''){

        $auth2=mysql_query('UPDATE client SET Tel_client ="'.$_POST["tele"].'" , Email_client ="'.$_POST["email"].'" WHERE id_client="'.$_GET["id"].'"');


    }
}
if(isset($_POST['CHANGER'])){
    echo "<script type='text/javascript'>window.location='changermotpasse.php?id=".$_GET['id']."';</script>";
}

mysql_close();
?>


</div>
</body>
</html>