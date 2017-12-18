<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="content-type" content="text/html charset=utf-8" />
    <title>by soufiane</title>
    <link rel="stylesheet" href="m.css" type="text/css" />
</head>
<body>
<ul id="menu">
    <li><a href="#">Home</a></li>
    <li>
        <a href="#">Paramétrage</a>
        <ul>
            <li><a href="#">Matières</a></li>
            <li><a href="#">TD</a></li>
            <li><a href="#">Cours</a></li>
            <li><a href="#">Ds</a></li>
        </ul>
    </li>
    <li>
        <a href="#">other reservation</a>
        <ul>
            <li><a href="#">Nouveau Reservation</a></li>
            <li><a href="#">Supprimer une reservation</a></li>
            <li><a href="#">Mes reservations</a></li>
            <li><a href="#">Demande</a></li>
        </ul>
    </li>
    <li><a href="#">About</a></li>
    <li><a href="#">Contact</a></li>
</ul>
<H1 > <FONT class="m" >Nouvelle Reservation</FONT></H1>
<H2><font class="resp">Mohammed Ouzzif</font></H2>
<hr class="f">
<?php
include("connecter.php");
$bdd=connecter();
echo '<form class="form" method="post"  action="verifierinserer.php">' ;
echo '<label class="lab">Salle</label>' ;
echo '<select name="salle" class="posres">' ;
$req0 = $bdd->prepare('SELECT * FROM Salle ');
$req0->execute();

while( $resultat = $req0->fetch()){
    if($resultat[2]==-1){if($resultat[0]==1){
        echo ' <optgroup label="'.$resultat[1].'">';}
    else{echo '</optgroup> <optgroup label="'.$resultat[1].'">';}}
    else{ echo '<option class="style1" value=$resultat[0] >'."$resultat[1]".'</option>';} }echo ' </optgroup>';
echo '</select>'   ;


echo '</br></br>';
echo ' <label class="lab">Jour</label>' ;
echo '<select name="jour" class="posres">' ;
$req0 = $bdd->prepare('SELECT * FROM Jour');
$req0->execute();


while( $resultat = $req0->fetch()){
    echo "<option class='style1' value='$resultat[1]'>".$resultat[1];}
echo '</select>'   ;
echo '</br></br>';
echo ' <label name="Cours" class="lab">Cours</label>' ;
$req0 = $bdd->prepare('SELECT * FROM Cours where CodeCours in(select CodeCours from CoursSalle where NumeroProfesseur="2")');
$req0->execute();
echo '<select name="Cours" class="posres">' ;


while( $resultat = $req0->fetch()){
    echo "<option class='style1' value='$resultat[0]'>".$resultat[1];}
echo '</select>'   ;
echo '</br></br>';
echo ' <label class="lab"  >TrancheHoraire</label>' ;
echo '<select name="tranche" class="posres">' ;
$req0 = $bdd->prepare('SELECT * FROM `horaire` order by 1 asc ');
$req0->execute();

while( $resultat = $req0->fetch()){
    echo "<option class='style1' value='$resultat[0]'>".$resultat[1];}
echo '</select>';

echo'</br></br>';
echo '<p class="lab">';
echo 'Veuillez indiquez le type de seance ?<br />' ;
echo '<input type="radio" name="age"/>CM</br>
        <input type="radio" name="age"/> <label>TD</label><br />
        <input type="radio" name="age"/> <label>TP</label><br />
        <input type="radio" name="age" /> <label>DS</label>
        </p>';
echo '<input type="submit" value="ok">';
echo '</form>';
?>
</body>
</html>