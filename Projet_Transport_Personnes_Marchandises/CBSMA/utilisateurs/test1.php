
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

<div class="reservation">
    <?php
    include 'Connecter.php';

    ?>
    <h1> Confirmer votre r�servation</h1>
    <form action="" method="POST">
        <div class="reservation2">
            <h3>Votre panier</h3>
            <hr id="ligne">

            <?php
            include('exemple.php');
            /*
            $coords=getXmlCoordsFromAdress($_GET['depart']);
            $coords1=getXmlCoordsFromAdress($_GET['arrive']);
            $lat1=floatval($coords['lat']);
            $lon1=floatval($coords['lon']);
            $lat2=floatval($coords1['lat']);
            $lon2=floatval($coords1['lon']);

            $km = distanceCalculation($lat1,$lon1,$lat2,$lon2);
            */
            // echo "<h4>".$_GET['date_course'].", ".$_GET['heure_course']."h</h4>";
            echo "<h6>".$_GET['depart']." ------> ".$_GET['arrive']."</h6>";
            // if($_GET['nb_place']>1){echo "<h6>".$_GET['nb_place']." places</h6>";}
            // else{echo "<h6>".$_GET['nb_place']." place</h6>";}
            // echo "<h6>Distance: ".$km." km</h6><br>";
            // echo "<h5>Prix: ".Prix($km,$_GET['nb_place'])." EUR</h5>";


            ?>
            <input id="button5" type="submit" name="CONFIRMER" value="Confirmer" />
            <input id="button5" type="submit" name="ANNULER" value="Annuler" />
    </form>
</div>
<?php


/*

if(isset($_POST['CONFIRMER'])){
$auth11 = mysql_query('SELECT * FROM client where id_client="'.$_GET["id_client"].'"');
while($data11 = mysql_fetch_array($auth11)){

if($data11['Categ']=="entreprise"){
                        $depart=$_GET["depart"];
						$arrive=$_GET["arrive"];
						
						$date=$_GET["date_course"];
						$date= date("Y-m-d", strtotime($date) );
                        $date1=date("y-m-d");			
$auth3 = mysql_query('SELECT * FROM course');
						$num_rows = mysql_num_rows($auth3);

                        
						if($num_rows<=0){
						$auth4 = mysql_query('INSERT INTO course VALUES (NULL,NULL,"'.$depart.'","'.$arrive.'","'.$date.'","'.$_GET["heure_course"].'","N")');}
						else{
							
								$auth1 = mysql_query('SELECT * FROM course where Depart_course="'.$depart.'" and Arrive_course="'.$arrive.'" and Date_course="'.$date.'" and Heure="'.$_GET["heure_course"].'"');
								$num_rows1 = mysql_num_rows($auth1);
								if($num_rows1<=0){$auth = mysql_query('INSERT INTO course VALUES (NULL,NULL,"'.$depart.'","'.$arrive.'","'.$date.'","'.$_GET["heure_course"].'","N")');}}
								$auth5 = mysql_query('SELECT * FROM course where Depart_course="'.$depart.'" and Arrive_course="'.$arrive.'" and Date_course="'.$date.'" and Heure="'.$_GET["heure_course"].'"');
								while($data1 = mysql_fetch_array($auth5)){
								$auth2 = mysql_query('INSERT INTO reservation VALUES (NULL,"'.$_GET["id_client"].'","'.$data1["id_course"].'","'.$date1.'","'.$_GET["nb_place"].'")');
								
								
								}
												
								
								echo'<br><br><div id="valide"  >&nbsp &nbsp &nbsp VOTRE RESERVATION A ETE BIEN EFFECTUEE</div>';
								
								
							
							}
							
else{
echo "<script type='text/javascript'>window.location='paiement.php?id_client=".$_GET['id_client']."&date_course=".$_GET['date_course']."&heure_course=".$_GET['heure_course']."&depart=".$_GET['depart']."&arrive=".$_GET['arrive']."&nb_place=".$_GET['nb_place']."&prix=".Prix($km,$_GET['nb_place'])."';</script>";}
 }

}
if(isset($_POST['ANNULER'])){	
echo "<script type='text/javascript'>window.location='reservation.php?id=".$_GET['id_client']."';</script>";

                             }	
*/
mysql_close();
?>

</div>
</body>
</html>