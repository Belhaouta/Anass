<html>
<head>
    <!--<meta http-equiv="content-type" content="text/html; charset=UTF-8">-->
    <title>SAFARCOM - Transport de personnes </title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta http-equiv="Content-Type" content="text/html;charset=utf8" />
    <link rel="shortcut icon" href="http://safarcom.fr/logo.ico">

</head>


<body>

<a href="#"> <img class="CBSMA_img" src="img/Safarcom.png"> </a>
<div id="menu">

    <ul>

        <li class="active"><a href="Accueil.php"><span>Accueil</span></a></li>

        <li> <a href="Apropos.php"><span>� propos de nous</span></a></li>

        <li class="liste1"><?php $type="TP"; echo '<a href="connexion.php?type='.$type.'"><span>Transport de personnes</span></a>';?>
        </li>
        <li class="liste1"><?php $type="TM"; echo '<a href="connexion.php?type='.$type.'"><span>Transport de marchandises</span></a>';?>
        </li>
        <li> <a href="comission.php"><span>Commission de transport</span></a></li>

        <li class="last"> <a href="contact.php"><span>Contact</span></a></li>

    </ul>

</div>
<div class="photo">
    <div id="start">
        <?php $type="TP"; echo '<a href="connexion.php?type='.$type.'">';?>R�server votre course </a>
    </div>
    <div id="start">
        <?php $type="TM"; echo '<a href="connexion.php?type='.$type.'">';?>Livrer vos marchandises </a>
    </div>
</div>

<div class="content">
    <h2>Qui sommes nous?</h2>
    <p>

        La soci�t� Safarcom est une soci�t� de transport de personnes. Celle-ci
        acquiert son exp�rience sur des anciennes ann�es d'activit� qui a �t�
        reprise au sein de cette nouvelle entit� CBSMA, ayant comme vocation de
        proposer le transport inter-urbain, dans la ville, ou d'assurer la
        liaison entre d'autres villes, notamment les villes comportant de grands
        a�roports ou de grandes gares. Nous avons comme vocation d'assurer, en
        fonction de la demande, les navettes (a�roports), un transport ad�quat �
        la demande. Sarfarcom agit aussi dans le domaien detransfertde bagages
        notamment dans les pays du Maghreb comme le Maroc et l'Alg�rie.

    </p>
</div>
<div class="partie">
    <h5 > CONTACTEZ-NOUS:</h5>
    <div class="sous-titre">
        Tel: 0661785959
        <br>
        Email: Safarcom.fr
    </div>

    <h5 > SAFARCOM TRANSPORTS DE PERSONNES </h5>
    <div class="sous-titre">
        Copyright � 2017 - TOUS DROITS R�SERV�S / Webmaster:#
    </div>
    <!--
    <li> Conditions g&eacute;n&eacute;rales</li>
    <li> Mentions l&eacute;gales </li>
    <li> Politique de confidentialit&eacute; </li>
    -->


</div>
</body>
</html>