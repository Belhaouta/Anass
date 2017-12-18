<?php
session_start();
if(!isset($_SESSION['con'])){
    header('Location:administrateur.php');}
?>
<html><head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>SAFARCOM - Transport de personnes </title>
    <link rel="stylesheet" type="text/css" href="style1.css">
    <link rel="shortcut icon" href="http://safarcom.fr/logo.ico">

</head>


<body style="background-image:url(roads.jpg); 
 background-repeat: no-repeat; 
 background-position: center center;
 background-attachment: fixed; 
 background-size: cover;">


<h1>Espace Administratif</h1>



<div class="vehicule">
    <h1>Ajouter des v�hicules</h1>
    <form action="" method="POST">


        <input type="text" name="marque" id="text1" placeholder="Marque de vehicule"  required />
        <input type="text" name="type" id="text1" placeholder="Type de vehicule" required />
        <input type="text" name="num" id="text1" placeholder="Numero de Matriculation" required />
        <input type="text" name="nbmax" id="text1" placeholder="Nombre maximun de places" required />
        <input id="button" type="submit" name="AJOUTER" value="Ajouter" />
    </form>
    <?php
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

    if(isset($_POST["marque"])!='' && isset($_POST["type"])!='' && isset($_POST["num"])!='' && isset($_POST["nbmax"])!='')
    {

        $auth = mysql_query('INSERT INTO vehicule VALUES (NULL,NULL,"'.$_POST["marque"].'","'.$_POST["type"].'","'.$_POST["num"].'","'.$_POST["nbmax"].'")');
        echo'<div id="valide"  >LA VEHICULE A ETE BIEN AJOUTEE</div>';

    }






    mysql_close();

    ?>
</div>



</body>
</html>55