

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
    <?php echo '<a href="reservation.php?id='.$_GET["id"].'"><img id="safarcom" src="img/logo.png"/></a>';
    echo '<a href="profil.php?id='.$_GET["id"].'">Votre profil</a>';
    echo '<a href="consultreservation.php?id='.$_GET["id"].'">Consulter vos r�servations</a>'; ?>
    <a  href="deconnexion.php">D�connexion</a>
</div>

<div class="reservationn2">

    <h1> Consulter vos r�servations</h1>


    <?php

    include 'Connecter.php';

    include('exemple.php');
    $auth = mysql_query('SELECT * FROM reservation join course on reservation.id_course=course.id_course
                                               join horaire on id_heure=CodeHoraire where id_client="'.$_GET['id'].'"');
    $i=1;
    while($data = mysql_fetch_array($auth)){
        echo '<div class="reservation2">
<h3>R�servation n�'.$i.'</h3> 
<hr id="ligne">';
        echo "<h4>".$data['Date_course'].", ".$data['tranche2']."h</h4>";
        echo "<h6>".$data['Depart_course']." ------> ".$data['Arrive_course']."</h6>";
        if($data['Nb_place']>1){echo "<h6>".$data['Nb_place']." places</h6>";}
        else{echo "<h6>".$data['Nb_place']." place</h6>";}
        $coords=getXmlCoordsFromAdress($data['Depart_course']);
        $coords1=getXmlCoordsFromAdress($data['Arrive_course']);
        $lat1=floatval($coords['lat']);
        $lon1=floatval($coords['lon']);
        $lat2=floatval($coords1['lat']);
        $lon2=floatval($coords1['lon']);

        $km = distanceCalculation($lat1,$lon1,$lat2,$lon2);
        echo "<h6>Distance: ".$km." km</h6>";
        echo "<h5>Prix: ".$data["Prix"]." &euro;</h5><br>";
        echo "<a href ='pdf.php?id=".$data["id_reservation"]."'><img src='img/pdf.png' width='40' heigth='40'/></a>";
        echo '</div>';
        $i++;
    }
    mysql_close();
    ?>


    <br>
</div>
</body>
</html>