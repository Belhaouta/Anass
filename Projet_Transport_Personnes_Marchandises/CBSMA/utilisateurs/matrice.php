<html>
<head>
    <meta http-equiv="content-type" content="text/html charset=utf-8" />
    <title>reponses</title>
    <link rel="stylesheet" href="m.css" type="text/css" />
    <script src="jquery-1.11.2.min.js"></script>
</head>
<body>
<ul id="menu">
    <li><a href="#">Home</a></li>
    <li>
        <a href="#">Param�trage</a>
        <ul>
            <li><a href="#">Mati�res</a></li>
            <li><a href="#">TD</a></li>
            <li><a href="#">Cours</a></li>
            <li><a href="#">Ds</a></li>
        </ul>
    </li>
    <li>
        <a href="#">other reservation</a>
        <ul>
            <li><a href="#">Nouveau Reservation</a></li>
            <li><a href="#">Annuler une reservation</a></li>
            <li><a href="#">Mes reservations</a></li>
            <li><a href="#">Demande</a></li>
        </ul>
    </li>
    <li><a href="#">About</a></li>
    <li><a href="#">Contact</a></li>
</ul>
<H1 > <FONT class="m" >Liste des forums</FONT></H1>
<H2><font class="resp">Mohammed Ouzzif</font></H2>

<?php
if (!isset($_GET['id_sujet_a_lire'])) {
    echo 'Sujet non d�fini.';
}
else {
    ?>
    <table class="kk" width="500" border="1" >


        <?php
        try {
            $bdd = new PDO('mysql:host=localhost;dbname=abscence', 'root', '');
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
        $mois['01']='Janvier'; $mois['02']='F�vrier';
        $mois['03']='Mars'; $mois['04']='Avril';
        $mois['05']='Mai'; $mois['06']='Juin';
        $mois['07']='Juillet'; $mois['08']='Aout';
        $mois['09']='Septembre'; $mois['10']='Octobre';
        $mois['11']='Novembre'; $mois['12']='D�cembre';

        $req = $bdd->prepare('SELECT * FROM forum_sujets
	where NumeroSujet="'.$_GET['id_sujet_a_lire'].'" ');
        $req->execute();
        $data = $req->fetch();
        $req = $bdd->prepare("SELECT * FROM Professeur where NumeroProfesseur=$data[1]");
        $req->execute();
        $data1 = $req->fetch();
        sscanf($data[4], "%4s-%2s-%2s %2s:%2s:%2s", $annee, $m, $jour, $heure, $minute, $seconde);
        echo '<h1>$data[2]</h1>';
        echo '<tr><td>'.$data1[1].' '.$data1[2].'</td>'   ; //optiimise hadak tableau ta3 les mois
        echo '<td>'.'le '. $jour.' '.$mois[$m].' '.$annee.' a '.$heure.':'.$minute.':'.$seconde .'par<br>'.$data[3].'</td></tr>' ;
        $req = $bdd->prepare('SELECT * FROM forum_reponses where NumeroSujet="'.$_GET['id_sujet_a_lire'].'" order by 3 ');
        $req->execute();

        while ($data = $req->fetch()) {



            $req2= $bdd->prepare("SELECT * FROM Professeur where NumeroProfesseur=$data[1]");
            $req2->execute();
            $data1 = $req2->fetch();
            sscanf($data[3], "%4s-%2s-%2s %2s:%2s:%2s", $annee, $m, $jour, $heure, $minute, $seconde);

            echo '<tr><td>'.$data1[1].' '.$data1[2].'</td>'   ; //optiimise hadak tableau ta3 les mois
            echo '<td>'.'le '. $jour.' '.$mois[$m].' '.$annee.' a '.$heure.':'.$minute.':'.$seconde .'<br>'.$data[2].'</td></tr>' ;




        }
        echo ' <form action="verifierreponses.php" method="post" class="fo"><div>
        <label for="message">Message :</label>
        <textarea id="message" name="message"></textarea>
    </div>
    
    <div class="button">
        <button type="submit" class=".fd" >Envoyer votre message</button>
    </div></from>';

        ?>


    </table>
    <br /><br />
    <!-- on ins�re un lien qui nous permettra de rajouter des r�ponses � ce sujet -->
    <a href="./insert_reponse.php?numero_du_sujet=<?php echo $_GET['id_sujet_a_lire']; ?>">R�pondre</a>
    <?php
}
?>
<br /><br />
<!-- on ins�re un lien qui nous permettra de retourner � l'accueil du forum -->
<a href="./index.php">Retour � l'accueil</a>
<script type="text/javascript">
    $(document).ready(function() {
        $('button').click(function(){

            "<?php session_start();$_SESSION['sujet']=$_GET['id_sujet_a_lire']; ?>" ;


        } );
    });
</script>

</body>
</html>