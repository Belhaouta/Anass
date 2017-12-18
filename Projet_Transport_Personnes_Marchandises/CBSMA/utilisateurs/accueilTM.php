
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
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBRoFXPr3VepdQlb-_cR_SYcG2mgo-FXHU&libraries=places"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


    <script type="text/javascript">
        /* Voici la fonction javascript qui change la propri�t� "display"
        pour afficher ou non le div selon que ce soit "none" ou "block". */

        function AfficherMasquer()
        {
            divInfo = document.getElementById('depaero');
            divInfo1 = document.getElementById('depville');
            sub1= document.getElementById('sub1');
            sub = document.getElementById('sub');

            divInfo.style.display = 'none';
            divInfo1.style.display = 'block';
            sub1.style.background = 'none';
            sub1.style.color= 'white';
            sub1.style.border= 'none';
            sub.style.background = 'black';
            sub.style.border= '';
            sub.style.border= '';


            document.getElementById('idlistTM').disabled= true;
            document.getElementById('idlist1TM').disabled= false;





        }
        function AfficherMasquer1()
        {
            divInfo = document.getElementById('depaero');
            divInfo1 = document.getElementById('depville');
            sub = document.getElementById('sub');
            sub1= document.getElementById('sub1');

            divInfo.style.display = 'block';
            divInfo1.style.display = 'none';
            sub.style.background = 'none';
            sub.style.color= 'white';
            sub.style.border= 'none';
            sub1.style.background = 'black';
            sub1.style.border= '';
            document.getElementById('idlistTM').disabled= false;
            document.getElementById('idlist1TM').disabled= true;

        }



        var autocomplete;
        var autocomplete1;

        function initialize() {
            // Creating the autocomplete object
            // Restrict to geographical location types
            autocomplete = new google.maps.places.Autocomplete(
                (document.getElementById('boxTM1')),
                { types: ['geocode'] }
            );

            autocomplete1 = new google.maps.places.Autocomplete(
                (document.getElementById('boxTM1')),
                { types: ['geocode'] }
            );
        }
    </script>

</head>


<body onload="initialize()">



<?php

if(isset($_POST["arrive"])!='' && isset($_POST["nb"])!='' )
{

    $arrive=$_POST["arrive"];


    if($depart!=$arrive)
    {
        header("location:confirmationTM.php?id_client=".$_GET['id']."&arrive=".$_POST['arrive']."&adresse=".$_POST['adresseexact']."&nb_kg=".$_POST['nb']."");
    }
}


?>


<div class="connexion1">
    <?php echo '<a href="accueilTM.php?id='.$_GET["id"].'"><img id="safarcom" src="img/logo.png"/></a>';
    echo '<a href="profilTM.php?id='.$_GET["id"].'">Votre profil</a>';
    echo '<a href="consultreservationTM.php?id='.$_GET["id"].'">Consulter vos r�servations</a>'; ?>
    <a  href="deconnexionTM.php">D�connexion</a>
</div>

<div class="reservationTM">
    <h1> Transport de marchandises </h1>
    <?php
    include 'Connecter.php';
    $auth = mysql_query('SELECT * FROM client where id_client="'.$_GET['id'].'"');
    while($data = mysql_fetch_array($auth)){
        $nom=strtoupper($data["Nom_client"]);
        echo'<h2>Bonjour Monsieur '.$nom.'</h2>';
    }

    ?>



    <div class="reservationTM1">
        <form action="" method="POST">
            <input type="button" id="sub" class="typedepTM" onClick="AfficherMasquer1()" value="Livraison hors France" style="background:none;border:none"/>

            <input type="button" id="sub1" class="typedepTM" onClick="AfficherMasquer()" value="Livraison en France " />


            <div id="depaero" >

                <select name="arrive" id="idlistTM"  >

                    <option value="Casablanca-Maroc">Casablanca-Maroc</option>
                    <option value="Rabat-Maroc">Rabat-Maroc</option>
                    <option value="Marrakech-Maroc">Marrakech-Maroc</option>
                    <option value="Tanger-Maroc">Tanger-Maroc</option>
                    <option value="Agadir-Maroc">Agadir-Maroc</option>
                    <option value="Algerie-Algerie">Algerie-Algerie</option>
                </select>

                <br><br>

            </div>

            <div id="depville" style="display:none">
                <select name="arrive" id="idlist1TM" disabled="true" >

                    <option value="Lille">Lille</option>
                    <option value="Valenciennes">Valenciennes</option>
                    <option value="Bethune">Bethune</option>
                    <option value="Dunkerque">Dunkerque</option>
                    <option value="Calais">Calais</option>
                </select><br><br>

            </div>
            <input type="text" name="adresseexact" id="boxTM1"  placeholder="Adresse" required /><br><br>

            <input id="datepickerTM" name="nb" placeholder="Poids" type="number" max="100" min="1" required /><br><br>
            <input id="button4" type="submit" name="ENVOYER" value="R�server"/>


            <?php
            if(isset($_POST["arrive"])!='' && isset($_POST["nb"])!='')
            {

                $arrive=$_POST["arrive"];


                if($depart==$arrive){echo'<div id="erreur">&nbsp &nbsp &nbsp INFORMATIONS INCORRECTES</div>';}}
            ?>

        </form>
    </div>
</div>
</body>
</html>