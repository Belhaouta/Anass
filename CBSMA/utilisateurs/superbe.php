<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="content-type" content="text/html charset=utf-8" />
<title>by soufiane</title>
<link rel="stylesheet" href="m.css" type="text/css" />
</head>
<body>

<?php
    
echo '<H1 class="mili"> <FONT face="arial" color="#5882FA" >Amphi 2</FONT></H1>';
$tabH=array();
$i=0;
$j=0;
$jourc=date("l");                       
include("verifier.php");
include("dateprochaine.php");
                            $bdd=connecter();
 $req0 = $bdd->prepare('SELECT * FROM `horaire` order by 1 asc ');
 $req1 = $bdd->prepare('SELECT * FROM Jour ');
      $req0->execute();
	  echo '<center>';
	  echo '<table cellspacing="0" border="1" class="fifi tab" >';
	  while( $resultat = $req0->fetch()){
	  echo '<tr>';
	  $req1->execute();
	  while($resulta = $req1->fetch()){
	  $tab=array();
	  if($i==0 && $j!=0 ){ echo '<td class="short grise styl">'."$resulta[1]".'</td>' ; }
	  if( $j==0){if($i!=0){echo '<td class="grise height styl">'."$resultat[1]".'</td>' ;}
	             else{echo '<td class="el ">'."$resultat[1]".'</td>';}}
	  if($i!=0 && $j!=0){$tab=verifierdisp($resulta[1],$resultat[0]);
	  if ($resulta[2]==$jourc){if($tab[0]==true){echo'<td class="grise colcol">'."$tab[1]".'<hr>'."$tab[2]".'</td>' ;}
	                            else{echo'<td class="grise colcol">'.'</td>' ;}}
	                        else{ if($tab[0]==true){echo'<td class="grise sysdate">'.
							'<table class="tabres" >'.'<tr>'.'<td class="inclu">'."$tab[2]"."&nbsp"."$tab[1]".'</td>'.'</tr>'.
							'<tr>'.'<td class="det">'."$tab[3]".'</td>'.'</tr>'.'<tr>'.'<td class="det">'."$tab[4]".'</td>'.'</tr>'.'</table>'
							.'</td>' ;}
	                            else{echo'<td class="grise sysdate">'.'</td>' ;}} }
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