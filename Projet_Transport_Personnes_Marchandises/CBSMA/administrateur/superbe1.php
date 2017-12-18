<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="content-type" content="text/html charset=utf-8" />
    <link rel="stylesheet" href="m.css" type="text/css" />
</head>
<body>
<h1><u><i>Calendrier professionnel<i></u></h1>
<?php
include("connecter.php");

$tabH=array();
$i=0;
$j=0;
$jourc=date("l");
include("verifier.php");
include("dateprochaine.php");
$bdd=connecter();
$reqx = $bdd->prepare('SELECT * FROM `horaire` order by CodeHoraire');
// $req1 = $bdd->prepare('SELECT * FROM Jour ');
$reqx->execute();
echo '<center>';
echo '<table cellspacing="0" border="1" class="fifi tab" >';
while( $resultat = $reqx->fetch()){
    echo '<tr>';
    // $req1->execute();
    // while($resulta = $req1->fetch()){

    $start = new DateTime("now");
    $start->modify('-1 days');
    // 'now' n'est pas n�c�ssaire, c'est la valeur par d�faut
    $end= new DateTime("now+7 day");      // 'on ajoute 30 jours � la date courante pour un affichage qui couvrira depuis aujourd'huy jusqu'� 30 jours plus tard..

    foreach (new DatePeriod($start,new DateInterval('P1D')/*pas de 1 jour*/ , $end)as $dt){




        $tab=array();
        if($i==0 && $j!=0 ){ echo '<td class="short grise styl">';
            echo $dt->format("l-d/m/y");
            echo '</td>' ; }
        if( $j==0){if($i!=0){echo '<td class="grise height styl">'."$resultat[1]".'</td>' ;}
        else{echo '<td class="el ">'."$resultat[1]".'</td>';}
        }
        if($i!=0 && $j!=0){


            $jour=$dt->format("y/m/d");
            $horaire=$resultat[0];

            //debut
            $bdd=connecter();
            $tab=array();
            $req = $bdd->prepare('SELECT count(*)  FROM course WHERE Date_course ="'.$jour.'"  and id_heure="'.$horaire.'" and Status="pro"');
            $req->execute();
            $resultatx = $req->fetch();
            $req->closeCursor();
            if($resultatx[0] == 0) {    $tab[0]=false;  }
            else{
                $req = $bdd->prepare('SELECT * FROM course WHERE Date_course ="'.$jour.'"  and id_heure="'.$horaire.'" and Status="pro"');
                $req->execute();
                echo'<td class="grise sysdate">';
                while( $resultatxx = $req->fetch()){

                    $req0 =$bdd->prepare('SELECT Depart_course,Arrive_course,id_heure FROM course WHERE id_course ="'.$resultatxx[0].'" ');
                    $req1 =$bdd->prepare('SELECT Type_vehicule,id_chauffeur FROM vehicule WHERE id_vehicule ="'.$resultatxx['id_vehicule'].'" ');
                    $req0->execute();
                    $req1->execute();
                    $resulta = $req0->fetch();
                    $resultatxxx = $req1->fetch();
                    $req2 =$bdd->prepare('SELECT Nom_chauffeur,Prenom_chauffeur FROM chauffeur WHERE id_chauffeur ="'.$resultatxxx[1].'" ');

                    $req2->execute();

                    $resultatt = $req2->fetch();
                    $tab[0]=true;
                    $tab[1]=$resulta[0];
                    $tab[2]=$resulta[1];
                    $tab[3]=$resulta[2];
                    $tab[4]=$resultatxxx[0];
                    $tab[5]=$resultatt[0];
                    $tab[6]=$resultatt[1];
                    $tab[7]=$resultatxx[0];
                    $req0->closeCursor();
                    $req1->closeCursor();
                    $req2->closeCursor();







                    //fin

                    // $tab=affich($dt->format("y/m/d"),$resultat[0]);

                    /*if ($dt->format("l")==$jourc){if($tab[0]==true){echo'<td class="grise colcol">'."$tab[1]".'<hr>'."$tab[2]".'</td>' ;}
                                              else{echo'<td class="grise colcol">'.'</td>' ;}}*/

                    echo '<a href="details_course.php?id_course='.$tab[7].'"><table class="tabres" >'.'<tr>'.'<td class="inclu">De: '."$tab[1]"."<br>A: "."$tab[2]".'</td>'.'</tr>'.
                        '<tr>'.'<td class="det">'."$tab[4]".'</td>'.'</tr>'.'<tr>'.'<td class="det">'."$tab[5]".'</td>'.'</tr>'.'</table></a>';
                }echo '</td>';}
            if($tab[0]==false){echo'<td class="grise sysdate">'.'</td>' ;}}
        $j++;
    }
    echo '</tr>' ;
    $i++;
    $j=0;
}
echo '</table>';
echo '</center>';

?>
</body>
</html>

<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript">
    $(function() {
        if ($.browser.msie && $.browser.version.substr(0,1)<7)
        {
            $('li').has('ul').mouseover(function(){
                $(this).children('ul').show();
            }).mouseout(function(){
                $(this).children('ul').hide();
            })
        }
    });
</script>