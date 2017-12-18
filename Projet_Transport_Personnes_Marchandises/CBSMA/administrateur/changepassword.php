
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



<div class="client1">
    <h1>Changer le mot de passe</h1>


    <form action="" method="POST">


        <input type="password" name="anc" id="text" placeholder="Entrer votre ancien mot de passe"  required /><br><br>
        <input type="password" name="nv" id="text" placeholder="Entrer votre nouveau mot de passe" required /><br><br>
        <input type="password" name="conf" id="text" placeholder="Confirmer votre mot de passe" required /><br><br>
        <input id="button" type="submit" name="MODIFIER" value="Changer" />

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
        if(isset($_POST['MODIFIER'])){
            $echec=0;
            if(isset($_POST["anc"])!='' && isset($_POST["nv"])!='' && isset($_POST["conf"])!=''){

                $auth1 = mysql_query('SELECT * FROM administrateur where id_admin="'.$_GET["id"].'"');
                while($data = mysql_fetch_array($auth1)){
                    if(($data["Password_admin"]==$_POST["anc"]) && ($_POST["nv"]==$_POST["conf"])){
                        $auth2=mysql_query('UPDATE administrateur SET Password_admin ="'.$_POST["nv"].'" WHERE id_admin="'.$_GET["id"].'"');
                        echo'<div id="valide"  >VOTRE MOT DE PASSE A ETE BIEN CHANGE</div>';

                        break;

                    }
                    else{$echec=1;}

                }

                if($echec==1){ echo'<div id="erreur">INFORMATIONS INCORRECTES</div>';}
            }
        }

        mysql_close();
        ?>
        <br><br></div>



</body>
</html>