
<?php
session_start();
if(!isset($_SESSION['con'])){
    header('Location:connexion.php?type=TM');}
?>
<html><head>
    <!--<meta http-equiv="content-type" content="text/html; charset=UTF-8">-->
    <title>SAFARCOM - Transport de personnes </title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta http-equiv="Content-Type" content="text/html;charset=utf8" />
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
    <?php echo '<a href="accueilTM.php?id='.$_GET["id_client"].'"><img id="safarcom" src="img/logo.png"/></a>';
    echo '<a href="profilTM.php?id='.$_GET["id_client"].'">Votre profil</a>';
    echo '<a href="consultreservationTM.php?id='.$_GET["id_client"].'">Consulter vos r�servations</a>'; ?>
    <a  href="deconnexionTM.php">Deconexion</a>
</div>

<div class="reservationTM">
    <?php
    include 'Connecter.php';
    $auth = mysql_query('SELECT * FROM client where id_client="'.$_GET['id_client'].'"');
    while($data = mysql_fetch_array($auth)){
        $nom=strtoupper($data["Nom_client"]);
        echo'<h2>'.$nom.'</h2>';
    }
    ?>
    <h1> Confirmer votre r�servation</h1>
    <form action="" method="POST">
        <div class="reservation2confTM">
            <h3>Votre panier</h3>
            <hr id="ligne">

            <?php
            include('exemple.php');
            if($_GET['arrive']=='Casablanca-Maroc'){$Prix=$_GET['nb_kg']*1.30;}
            else{if($_GET['arrive']=='Rabat-Maroc'){$Prix=$_GET['nb_kg']*1.25;}
            else{if($_GET['arrive']=='Agadir-Maroc'){$Prix=$_GET['nb_kg']*1.50;}
            else{if($_GET['arrive']=='Marrakech-Maroc'){$Prix=$_GET['nb_kg']*1.45;}
            else{if($_GET['arrive']=='Tanger-Maroc'){$Prix=$_GET['nb_kg'];}
            else {if($_GET['arrive']=='Algerie-Algerie'){$Prix=$_GET['nb_kg']*1.55;}
            else{


                $Prix=PrixTM($_GET['arrive'],$_GET['nb_kg']);}}}}}}
            $Prix=round($Prix);
            echo "<h6>Roubaix-France ------> ".$_GET['arrive']."</h6>";
            echo "<h6>".$_GET['nb_kg']." KG</h6>";
            echo "<h5>Prix: ".$Prix." &euro;</h5>";


            ?>
            <input id="button5"  class="button5" type="submit" name="CONFIRMER" value="Confirmer" />
            <input id="button6" class="button5" type="submit" name="ANNULER" value="Annuler" />
    </form>
</div>
<?php




if(isset($_POST['CONFIRMER'])){


    $auth11 = mysql_query('SELECT * FROM client where id_client="'.$_GET["id_client"].'"');
    while($data11 = mysql_fetch_array($auth11)){

        if($data11['Categ']=="entreprise"){
            $arrive=$_GET["arrive"];
            $date1=date("y-m-d");

            $authc = mysql_query('INSERT INTO reservation1 VALUES (NULL,"'.$_GET["id_client"].'","'.$arrive.'","'.$_GET["nb_kg"].'","'.$_GET["adresse"].'","'.$Prix.'","'.$date1.'")');



            echo "<script>
							      document.getElementById('button5').style.visibility = 'hidden';
							      document.getElementById('button6').style.visibility = 'hidden';
								  </script>";


            echo'<div id="valideTM">&nbsp &nbsp &nbsp VOTRE RESERVATION A ETE BIEN EFFECTUEE</div>';



        }

        else{
            echo "<script type='text/javascript'>window.location='paiement.php?id_client=".$_GET['id_client']."&arrive=".$_GET['arrive']."&adresse=".$_GET['adresse']."&nb_kg=".$_GET['nb_kg']."&prix=".$Prix."';</script>";}
    }

}
if(isset($_POST['ANNULER'])){
    echo "<script type='text/javascript'>window.location='accueilTM.php?id=".$_GET['id_client']."';</script>";

}
mysql_close();
?>

</div>
</body>
</html>