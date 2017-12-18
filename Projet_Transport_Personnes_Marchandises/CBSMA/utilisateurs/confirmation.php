
<?php
session_start();
if(!isset($_SESSION['con'])){
    header('Location:connexion.php');}
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
    <?php echo '<a href="reservation.php?id='.$_GET["id_client"].'"><img id="safarcom" src="img/logo.png"/></a>';
    echo '<a href="profil.php?id='.$_GET["id_client"].'">Votre profil</a>';
    echo '<a href="consultreservation.php?id='.$_GET["id_client"].'">Consulter vos r�servations</a>'; ?>
    <a  href="deconnexion.php">Deconexion</a>
</div>

<div class="reservation">
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
        <div class="reservation2conf">
            <h3>Votre panier</h3>
            <hr id="ligne">

            <?php
            include('exemple.php');
            $coords=getXmlCoordsFromAdress($_GET['depart']);
            $coords1=getXmlCoordsFromAdress($_GET['arrive']);
            $lat1=floatval($coords['lat']);
            $lon1=floatval($coords['lon']);
            $lat2=floatval($coords1['lat']);
            $lon2=floatval($coords1['lon']);

            $km = distanceCalculation($lat1,$lon1,$lat2,$lon2);
            $Prix=round(Prix($km,$_GET['nb_place']));
            echo "<h4>".$_GET['date_course'].", ".$_GET['heure_course']."h</h4>";
            echo "<h6>".$_GET['depart']." ------> ".$_GET['arrive']."</h6>";
            if($_GET['nb_place']>1){echo "<h6>".$_GET['nb_place']." places</h6>";}
            else{echo "<h6>".$_GET['nb_place']." place</h6>";}
            echo "<h6>Distance: ".$km." km</h6><br>";
            echo "<h5>Prix: ".$Prix." &euro;</h5>";


            ?>
            <input id="button5"  class="button5" type="submit" name="CONFIRMER" value="Confirmer" />
            <input id="button6" class="button5" type="submit" name="ANNULER" value="Annuler" />
    </form>
</div>
<?php




if(isset($_POST['CONFIRMER'])){

    $autheure=mysql_query('SELECT CodeHoraire FROM horaire where tranche2="'.$_GET["heure_course"].'"');
    while($dataheure = mysql_fetch_array($autheure)){
        $heure_course=$dataheure["CodeHoraire"];
    }

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
                $auth4 = mysql_query('INSERT INTO course VALUES (NULL,NULL,"'.$depart.'","'.$arrive.'","'.$date.'","pro","'.$heure_course.'")');}
            else{

                $auth1 = mysql_query('SELECT * FROM course where Depart_course="'.$depart.'" and Arrive_course="'.$arrive.'" and Date_course="'.$date.'" and id_heure="'.$heure_course.'"');
                $num_rows1 = mysql_num_rows($auth1);
                if($num_rows1<=0){$auth = mysql_query('INSERT INTO course VALUES (NULL,NULL,"'.$depart.'","'.$arrive.'","'.$date.'","N","'.$heure_course.'")');}}
            $auth5 = mysql_query('SELECT * FROM course where Depart_course="'.$depart.'" and Arrive_course="'.$arrive.'" and Date_course="'.$date.'" and id_heure="'.$heure_course.'"');
            while($data1 = mysql_fetch_array($auth5)){
                $auth2 = mysql_query('INSERT INTO reservation VALUES (NULL,"'.$_GET["id_client"].'","'.$data1["id_course"].'","'.$date1.'","'.$_GET["nb_place"].'","'.$Prix.'")');


            }
            echo "<script>
							      document.getElementById('button5').style.visibility = 'hidden';
							      document.getElementById('button6').style.visibility = 'hidden';
								  </script>";

            //SCRIPTTTTTTTTTTTTTT
            $auth12 = mysql_query('SELECT reservation.id_course,sum(Nb_place) as somme,course.Date_course FROM reservation join course
                                                 								  on reservation.id_course=course.id_course group by reservation.id_course');

            while($data12 = mysql_fetch_array($auth12)){
                if($data12["Date_course"]==$date){
                    $modif=mysql_query('UPDATE course SET id_vehicule =(SELECT id_vehicule FROM vehicule where Nbmax_place >= "'.$data12["somme"].'") WHERE id_course="'.$data12["id_course"].'"');

                }
            }
            //FINNNNNNNNNNNNNNNN

            echo'<div id="valide"  >&nbsp &nbsp &nbsp VOTRE RESERVATION A ETE BIEN EFFECTUEE</div>';



        }

        else{
            echo "<script type='text/javascript'>window.location='paiement.php?id_client=".$_GET['id_client']."&date_course=".$_GET['date_course']."&heure_course=".$_GET['heure_course']."&depart=".$_GET['depart']."&arrive=".$_GET['arrive']."&nb_place=".$_GET['nb_place']."&prix=".Prix($km,$_GET['nb_place'])."';</script>";}
    }

}
if(isset($_POST['ANNULER'])){
    echo "<script type='text/javascript'>window.location='reservation.php?id=".$_GET['id_client']."';</script>";

}
mysql_close();
?>

</div>
</body>
</html>