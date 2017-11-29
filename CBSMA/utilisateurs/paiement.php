
<?php 
session_start();
if(!isset($_SESSION['con'])){
header('Location:connexion.php');}
?>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=windows-1252">
<title>PAYBOX</title>
<link href="PAYBOX_fichiers/paybox2.css" rel="stylesheet" type="text/css">
<script src="PAYBOX_fichiers/paiement.js"></script>
<script language="javascript">
<!--
function cvvsok()
{
if ( document.getElementById('CVVX') ) {
if (document.form_pay.CVVX.value.length <3)
{
alert("Cryptogramme visuel : 3  derniers chiffres au dos de la carte")
return false;
}
}
hide("Paiement");
show("Patience");
return Action();
}
function CheckValidate(CardType,CardTypeSelected) {
var formulaire=document.getElementById("idform_pay");
if (CardType == "?") return true;
if ((CardType.toUpperCase() == "VISA" || CardType.toUpperCase() == "EUROCARD_MASTERCARD") && (CardTypeSelected.toUpperCase() == "CB" || CardTypeSelected.toUpperCase() == "E_CARD")) return true;
if (CardType.toUpperCase() == "VISA" && CardTypeSelected.toUpperCase() == "BINVISPREM" ) return true;
if (CardType.toUpperCase() == "EUROCARD_MASTERCARD" && CardTypeSelected.toUpperCase() == "BINFRANCE" ) return true;
if (CardType.toUpperCase() == CardTypeSelected.toUpperCase()) return true;
else 
	{
	alert("Type de carte "+CardTypeSelected);
	formulaire.NUMERO_CARTE.value="";
	formulaire.NUMERO_CARTE.focus();
	return false;
	}
}
//-->
</script>
</head>
<body onload="" bgcolor="white"><a name="TOP"></a>
<div id="Patience" style="position: absolute; visibility: hidden;">
<center><table height="100%" width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td align="CENTER"><h2>Traitement en cours <br> Veuillez patienter ...</h2></td></tr></tbody></table></center>
</div><div id="Paiement" style="position: absolute; visibility: show; width: 100%;">
<table width="100%" border="0">
<tbody><tr align="CENTER">
<td colspan="3">
<table class="pbx_table_logo" border="0">
<tbody><tr align="CENTER">
<td>
</td>
</tr>
</tbody></table>
</td>
</tr>
<tr align="CENTER">
<td rowspan="2" width="20%">
<img src="PAYBOX_fichiers/p_PAGEPAIEMENT_vbvmcs.gif" alt="VBVMCS" class="pbx_img_VBVMCS" align="MIDDLE"><br>
</td>
<td id="idframe_pay" width="*%">
<form action="https://tpeweb.paybox.com/cgi/MYtraitetransaction3d_ip.cgi" method="post" name="form_pay" id="idform_pay" onsubmit="if (form_pay.NUMERO_CARTE) { return(CheckValidate(CheckCardNo(form_pay.NUMERO_CARTE.value),PBX_TYPECARTE.value) &amp;&amp; cvvsok()); } else return true;"><table border="0">
<tbody><tr>
<td colspan="3"><h2>Paiement de<br>
<font class="pbx_montant"> <?php echo $_GET['prix']." EUR" ?><br></font><font class="pbx-no-padding pbx_h4">SAFARCOM - TRONSPORT DE PERSONNE
</font></h2><input name="MONTANT_TOTAL" id="MONTANT_TOTAL" value="10.00" type="hidden">
<input name="MONTANT_RESTANT" id="MONTANT_RESTANT" value="10.00" type="hidden">
<input name="MONT_DECIMAL" id="MONT_DECIMAL" value="0.01" type="hidden">
<input name="DECIMAL" id="DECIMAL" value="2" type="hidden">
<input name="DEVISE" id="DEVISE" value="EUR" type="hidden">
</td></tr><tr>
<td class="pbx-align-right" id="pbx-numero-carte">
Numéro de carte</td>
<td class="pbx-align-left" id="pbx-numero-carte-input">
<input name="NUMERO_CARTE" id="NUMERO_CARTE" size="19" maxlength="19" autocomplete="off" tabindex="1" type="TEXT">
</td>
<td id="pbx-pm-loader" width="25px" nowrap="nowrap">
<span id="load_PM" style="display:none;">&nbsp;<img src="PAYBOX_fichiers/loading_PaiementsMixtes.gif" title="Vérification du solde de votre carte prépayée, veuillez patienter..." border="0"></span></td>
</tr>
<tr>
<td class="pbx-align-right" id="pbx-date">
Date de fin de validité (MM/AA)</td>
<td class="pbx-align-left" id="pbx-date-input">
<span class="notranslate"><select name="MOIS_VALIDITE" id="MOIS_VALIDITE" size="1" tabindex="2">
<option selected="selected">
</option><option value="01"> 01
</option><option value="02"> 02
</option><option value="03"> 03
</option><option value="04"> 04
</option><option value="05"> 05
</option><option value="06"> 06
</option><option value="07"> 07
</option><option value="08"> 08
</option><option value="09"> 09
</option><option value="10"> 10
</option><option value="11"> 11
</option><option value="12"> 12
</option></select>
<select name="AN_VALIDITE" id="AN_VALIDITE" size="1" tabindex="2">
<option selected="selected">
</option><option value="17"> 17
</option><option value="18"> 18
</option><option value="19"> 19
</option><option value="20"> 20
</option><option value="21"> 21
</option><option value="22"> 22
</option><option value="23"> 23
</option><option value="24"> 24
</option><option value="25"> 25
</option><option value="26"> 26
</option><option value="27"> 27
</option><option value="28"> 28
</option><option value="29"> 29
</option><option value="30"> 30
</option><option value="31"> 31
</option><option value="32"> 32
</option></select>
</span></td>
</tr>
<tr><td class="pbx-align-right" id="pbx-cryptogram">
Cryptogramme visuel&nbsp;:<br>3 derniers chiffres au dos de la carte<a href="javascript:void(0)" class="info_cvvx" onclick="window.open('../images/page_paiement/info_cvv_CARTE_FRA.jpg','titre','scrollbars=no,resizable=no,width=420,height=300');">(?)</a><input name="INFO_CVVX" id="INFO_CVVX" value="0" type="hidden"></td><td class="pbx-align-very-left" id="pbx-cryptogram-input"><input name="CVVX" id="CVVX" size="03" maxlength="03" autocomplete="off" tabindex="4" type="text"><br></td>
</tr>
</tbody></table>
<input name="PBX_APPEL" id="PBX_APPEL" value="6A2A11B40747555B32" type="hidden">
<input id="PBX_LANGUE" name="PBX_LANGUE" value="FRA" type="hidden">
<h6>
</h6>
<input name="PBX_SOURCE" value="HTML" type="HIDDEN">
<input name="PBX_VERSION" value="210-WINDOWS" type="HIDDEN">
<input name="PBX_DATA" id="PBX_DATA" value="v401AFR999R85BOOCCPO6DOOFESODFSOCGRO9JRPEYSICPR8EORKFOSIKORJAOR89ORD5OOXFEQO6DOOCXRHDORJAOR8XO9BROGCRO8XRBGORC9ORKFOSC5RO5DSPG6RODBSSACQRCKORBGORB8PRAGRRG9SRFFSS75ROXBAQR66ORE9RNCERRDASRF8SRGXRB5OODEOPE6OO7KPRAFPRKAQQGFPSDDQSACQRC9ORHEOSBCORKEORGFPSJKORBAORE9ORH5OOFEOQA6QODBOSHCORDKOSXEFSO5GOOK0QB6OOCGORDXODISOG8RRGASRD9SR5FOSGCPR69OREFSSK5ROI8RP96ROCDRSFGSRGHSRDGSRGDRS5GOR69PRWEWRBGORK5OOGDOQD6OOGCORIGOSKFOSXAERODKSOKHROE5S7CBR5F9S9K9RZI" type="hidden">
<input name="PBX_ANNULE" id="PBX_ANNULE" value="http://reservation.crous-lille.fr/annul_preresa.do" type="hidden">
<input name="PBX_EFFECTUE" id="PBX_EFFECTUE" value="http://reservation.crous-lille.fr/confirmation.do" type="hidden">
<input name="PBX_REFUSE" id="PBX_REFUSE" value="http://reservation.crous-lille.fr/refus.do" type="hidden">
<input name="PBX_RETOUR" id="PBX_RETOUR" value="montant:M;reference:R;autorisation:A;transaction:T;abonnement:B;paiement:P;carte:C;id_transaction:S;pays:Y;erreur:E;signature:K" type="hidden">
<input name="PBX_TYPECARTE" id="PBX_TYPECARTE" value="CB" type="hidden">
<input name="PBX_TYPEPAIEMENT" id="PBX_TYPEPAIEMENT" value="3DSECURE" type="hidden">
<input name="PBX_ORIGINE" id="PBX_ORIGINE" value="," type="hidden">
<input name="PBX_CHOIX" id="PBX_CHOIX" value="N" type="hidden">
<input name="PBX_REFERER" id="PBX_REFERER" value="MYpagepaiement.cgi" type="hidden">
<table border="0">
<tbody><tr align="CENTER">
<td class="pbx-align-button-right" id="pbx-annuler">
<a href="deconnexion.php" title="Opération annulée."><img src="PAYBOX_fichiers/ibs2_FRA_ANU.gif" alt="Opération annulée." border="0"></a>
</td>
<td class="pbx-align-button-left" id="pbx-valider">
<input src="PAYBOX_fichiers/ibs2_FRA_VAL.gif" name="VALIDER" tabindex="20" type="IMAGE" border="0">
</td>
</tr>
</tbody></table>
</form></td>
<td rowspan="2" width="20%">
<img src="PAYBOX_fichiers/payboxlogo1.png" align="MIDDLE"><br>
<img src="PAYBOX_fichiers/payboxlogo2.gif" align="MIDDLE"><br>
</td>
</tr>
<tr align="CENTER">
<td>
<br><table border="0">
<tbody><tr id="pbx_table_languages" align="CENTER">
<td>
<a href="https://tpeweb.paybox.com/cgi/MYpagepaiement.cgi?PBX_DATA=v401AFR999R85BOOCCPO6DOOFESODFSOCGRO9JRPEYSICPR8EORKFOSIKORJAOR89ORD5OOXFEQO6DOOCXRHDORJAOR8XO9BROGCRO8XRBGORC9ORKFOSC5RO5DSPG6RODBSSACQRCKORBGORB8PRAGRRG9SRFFSS75ROXBAQR66ORE9RNCERRDASRF8SRGXRB5OODEOPE6OO7KPRAFPRKAQQGFPSDDQSACQRC9ORHEOSBCORKEORGFPSJKORBAORE9ORH5OOFEOQA6QODBOSHCORDKOSXEFSO5GOOK0QB6OOCGORDXODISOG8RRGASRD9SR5FOSGCPR69OREFSSK5ROI8RP96ROCDRSFGSRGHSRDGSRGDRS5GOR69PRWEWRBGORK5OOGDOQD6OOGCORIGOSKFOSXAERODKSOKHROE5S7CBR5F9S9K9RZI&amp;PBX_ANNULE=http%3A%2F%2Freservation%2Ecrous-lille%2Efr%2Fannul_preresa%2Edo&amp;PBX_EFFECTUE=http%3A%2F%2Freservation%2Ecrous-lille%2Efr%2Fconfirmation%2Edo&amp;PBX_REFUSE=http%3A%2F%2Freservation%2Ecrous-lille%2Efr%2Frefus%2Edo&amp;PBX_RETOUR=montant%3AM%3Breference%3AR%3Bautorisation%3AA%3Btransaction%3AT%3Babonnement%3AB%3Bpaiement%3AP%3Bcarte%3AC%3Bid_transaction%3AS%3Bpays%3AY%3Berreur%3AE%3Bsignature%3AK&amp;PBX_APPEL=6A2A11B40747555B32&amp;PBX_SOURCE=HTML&amp;PBX_VERSION=210-WINDOWS&amp;PBX_TYPECARTE=CB&amp;PBX_TYPEPAIEMENT=3DSECURE&amp;PBX_ORIGINE=%2C&amp;PBX_CHOIX=N&amp;PBX_REFERER=MYpagepaiement%2Ecgi&amp;PBX_LANGUE=FRA"><img src="PAYBOX_fichiers/b_FRA1.gif" alt="FRA" border="0"></a></td>
<td>
<a href="https://tpeweb.paybox.com/cgi/MYpagepaiement.cgi?PBX_DATA=v401AFR999R85BOOCCPO6DOOFESODFSOCGRO9JRPEYSICPR8EORKFOSIKORJAOR89ORD5OOXFEQO6DOOCXRHDORJAOR8XO9BROGCRO8XRBGORC9ORKFOSC5RO5DSPG6RODBSSACQRCKORBGORB8PRAGRRG9SRFFSS75ROXBAQR66ORE9RNCERRDASRF8SRGXRB5OODEOPE6OO7KPRAFPRKAQQGFPSDDQSACQRC9ORHEOSBCORKEORGFPSJKORBAORE9ORH5OOFEOQA6QODBOSHCORDKOSXEFSO5GOOK0QB6OOCGORDXODISOG8RRGASRD9SR5FOSGCPR69OREFSSK5ROI8RP96ROCDRSFGSRGHSRDGSRGDRS5GOR69PRWEWRBGORK5OOGDOQD6OOGCORIGOSKFOSXAERODKSOKHROE5S7CBR5F9S9K9RZI&amp;PBX_ANNULE=http%3A%2F%2Freservation%2Ecrous-lille%2Efr%2Fannul_preresa%2Edo&amp;PBX_EFFECTUE=http%3A%2F%2Freservation%2Ecrous-lille%2Efr%2Fconfirmation%2Edo&amp;PBX_REFUSE=http%3A%2F%2Freservation%2Ecrous-lille%2Efr%2Frefus%2Edo&amp;PBX_RETOUR=montant%3AM%3Breference%3AR%3Bautorisation%3AA%3Btransaction%3AT%3Babonnement%3AB%3Bpaiement%3AP%3Bcarte%3AC%3Bid_transaction%3AS%3Bpays%3AY%3Berreur%3AE%3Bsignature%3AK&amp;PBX_APPEL=6A2A11B40747555B32&amp;PBX_SOURCE=HTML&amp;PBX_VERSION=210-WINDOWS&amp;PBX_TYPECARTE=CB&amp;PBX_TYPEPAIEMENT=3DSECURE&amp;PBX_ORIGINE=%2C&amp;PBX_CHOIX=N&amp;PBX_REFERER=MYpagepaiement%2Ecgi&amp;PBX_LANGUE=GBR"><img src="PAYBOX_fichiers/b_GBR1.gif" alt="GBR" border="0"></a></td>
<td>
<a href="https://tpeweb.paybox.com/cgi/MYpagepaiement.cgi?PBX_DATA=v401AFR999R85BOOCCPO6DOOFESODFSOCGRO9JRPEYSICPR8EORKFOSIKORJAOR89ORD5OOXFEQO6DOOCXRHDORJAOR8XO9BROGCRO8XRBGORC9ORKFOSC5RO5DSPG6RODBSSACQRCKORBGORB8PRAGRRG9SRFFSS75ROXBAQR66ORE9RNCERRDASRF8SRGXRB5OODEOPE6OO7KPRAFPRKAQQGFPSDDQSACQRC9ORHEOSBCORKEORGFPSJKORBAORE9ORH5OOFEOQA6QODBOSHCORDKOSXEFSO5GOOK0QB6OOCGORDXODISOG8RRGASRD9SR5FOSGCPR69OREFSSK5ROI8RP96ROCDRSFGSRGHSRDGSRGDRS5GOR69PRWEWRBGORK5OOGDOQD6OOGCORIGOSKFOSXAERODKSOKHROE5S7CBR5F9S9K9RZI&amp;PBX_ANNULE=http%3A%2F%2Freservation%2Ecrous-lille%2Efr%2Fannul_preresa%2Edo&amp;PBX_EFFECTUE=http%3A%2F%2Freservation%2Ecrous-lille%2Efr%2Fconfirmation%2Edo&amp;PBX_REFUSE=http%3A%2F%2Freservation%2Ecrous-lille%2Efr%2Frefus%2Edo&amp;PBX_RETOUR=montant%3AM%3Breference%3AR%3Bautorisation%3AA%3Btransaction%3AT%3Babonnement%3AB%3Bpaiement%3AP%3Bcarte%3AC%3Bid_transaction%3AS%3Bpays%3AY%3Berreur%3AE%3Bsignature%3AK&amp;PBX_APPEL=6A2A11B40747555B32&amp;PBX_SOURCE=HTML&amp;PBX_VERSION=210-WINDOWS&amp;PBX_TYPECARTE=CB&amp;PBX_TYPEPAIEMENT=3DSECURE&amp;PBX_ORIGINE=%2C&amp;PBX_CHOIX=N&amp;PBX_REFERER=MYpagepaiement%2Ecgi&amp;PBX_LANGUE=DEU"><img src="PAYBOX_fichiers/b_DEU1.gif" alt="DEU" border="0"></a></td>
<td>
<a href="https://tpeweb.paybox.com/cgi/MYpagepaiement.cgi?PBX_DATA=v401AFR999R85BOOCCPO6DOOFESODFSOCGRO9JRPEYSICPR8EORKFOSIKORJAOR89ORD5OOXFEQO6DOOCXRHDORJAOR8XO9BROGCRO8XRBGORC9ORKFOSC5RO5DSPG6RODBSSACQRCKORBGORB8PRAGRRG9SRFFSS75ROXBAQR66ORE9RNCERRDASRF8SRGXRB5OODEOPE6OO7KPRAFPRKAQQGFPSDDQSACQRC9ORHEOSBCORKEORGFPSJKORBAORE9ORH5OOFEOQA6QODBOSHCORDKOSXEFSO5GOOK0QB6OOCGORDXODISOG8RRGASRD9SR5FOSGCPR69OREFSSK5ROI8RP96ROCDRSFGSRGHSRDGSRGDRS5GOR69PRWEWRBGORK5OOGDOQD6OOGCORIGOSKFOSXAERODKSOKHROE5S7CBR5F9S9K9RZI&amp;PBX_ANNULE=http%3A%2F%2Freservation%2Ecrous-lille%2Efr%2Fannul_preresa%2Edo&amp;PBX_EFFECTUE=http%3A%2F%2Freservation%2Ecrous-lille%2Efr%2Fconfirmation%2Edo&amp;PBX_REFUSE=http%3A%2F%2Freservation%2Ecrous-lille%2Efr%2Frefus%2Edo&amp;PBX_RETOUR=montant%3AM%3Breference%3AR%3Bautorisation%3AA%3Btransaction%3AT%3Babonnement%3AB%3Bpaiement%3AP%3Bcarte%3AC%3Bid_transaction%3AS%3Bpays%3AY%3Berreur%3AE%3Bsignature%3AK&amp;PBX_APPEL=6A2A11B40747555B32&amp;PBX_SOURCE=HTML&amp;PBX_VERSION=210-WINDOWS&amp;PBX_TYPECARTE=CB&amp;PBX_TYPEPAIEMENT=3DSECURE&amp;PBX_ORIGINE=%2C&amp;PBX_CHOIX=N&amp;PBX_REFERER=MYpagepaiement%2Ecgi&amp;PBX_LANGUE=ESP"><img src="PAYBOX_fichiers/b_ESP1.gif" alt="ESP" border="0"></a></td>
<td>
<a href="https://tpeweb.paybox.com/cgi/MYpagepaiement.cgi?PBX_DATA=v401AFR999R85BOOCCPO6DOOFESODFSOCGRO9JRPEYSICPR8EORKFOSIKORJAOR89ORD5OOXFEQO6DOOCXRHDORJAOR8XO9BROGCRO8XRBGORC9ORKFOSC5RO5DSPG6RODBSSACQRCKORBGORB8PRAGRRG9SRFFSS75ROXBAQR66ORE9RNCERRDASRF8SRGXRB5OODEOPE6OO7KPRAFPRKAQQGFPSDDQSACQRC9ORHEOSBCORKEORGFPSJKORBAORE9ORH5OOFEOQA6QODBOSHCORDKOSXEFSO5GOOK0QB6OOCGORDXODISOG8RRGASRD9SR5FOSGCPR69OREFSSK5ROI8RP96ROCDRSFGSRGHSRDGSRGDRS5GOR69PRWEWRBGORK5OOGDOQD6OOGCORIGOSKFOSXAERODKSOKHROE5S7CBR5F9S9K9RZI&amp;PBX_ANNULE=http%3A%2F%2Freservation%2Ecrous-lille%2Efr%2Fannul_preresa%2Edo&amp;PBX_EFFECTUE=http%3A%2F%2Freservation%2Ecrous-lille%2Efr%2Fconfirmation%2Edo&amp;PBX_REFUSE=http%3A%2F%2Freservation%2Ecrous-lille%2Efr%2Frefus%2Edo&amp;PBX_RETOUR=montant%3AM%3Breference%3AR%3Bautorisation%3AA%3Btransaction%3AT%3Babonnement%3AB%3Bpaiement%3AP%3Bcarte%3AC%3Bid_transaction%3AS%3Bpays%3AY%3Berreur%3AE%3Bsignature%3AK&amp;PBX_APPEL=6A2A11B40747555B32&amp;PBX_SOURCE=HTML&amp;PBX_VERSION=210-WINDOWS&amp;PBX_TYPECARTE=CB&amp;PBX_TYPEPAIEMENT=3DSECURE&amp;PBX_ORIGINE=%2C&amp;PBX_CHOIX=N&amp;PBX_REFERER=MYpagepaiement%2Ecgi&amp;PBX_LANGUE=PRT"><img src="PAYBOX_fichiers/b_PRT1.gif" alt="PRT" border="0"></a></td>
</tr>
</tbody></table>
<div id="pbx-footer">
    <ul>
        <li id="pbx-footer-paybox-link">
            <a href="http://www.paybox.com/" target="_blank">Paybox ®</a>        </li>
        <li id="pbx-footer-ssl-security-link">
            <a href="http://www1.paybox.com/nos-produits-et-services/focus-securite/" target="_blank">Infos Sécurité</a>        </li>
    </ul>
</div>
<br>Si votre banque adhère au programme de sécurisation des paiements 
Verified by Visa ou SecureCode Mastercard après avoir cliqué sur « 
VALIDER », vous verrez alors un nouvel écran s'afficher, invitant à vous
 authentifier avec un code différent de votre « code confidentiel carte 
».</td>
</tr>
</tbody></table>
</div>

</body></html>
<?php
/*
 $depart=$_GET["depart"];
						$arrive=$_GET["arrive"];
						
						$date=$_GET["date_course"];
						$date= date("Y-m-d", strtotime($date) );
                        $date1=date("y-m-d");			
$auth3 = mysql_query('SELECT * FROM course');
						$num_rows = mysql_num_rows($auth3);

                        
						if($num_rows<=0){
						$auth4 = mysql_query('INSERT INTO course VALUES (NULL,NULL,"'.$depart.'","'.$arrive.'","'.$date.'","'.$_GET["heure_course"].'","N")');}
						else{
							
								$auth1 = mysql_query('SELECT * FROM course where Depart_course="'.$depart.'" and Arrive_course="'.$arrive.'" and Date_course="'.$date.'" and Heure="'.$_GET["heure_course"].'"');
								$num_rows1 = mysql_num_rows($auth1);
								if($num_rows1<=0){$auth = mysql_query('INSERT INTO course VALUES (NULL,NULL,"'.$depart.'","'.$arrive.'","'.$date.'","'.$_GET["heure_course"].'","N")');}}
								$auth5 = mysql_query('SELECT * FROM course where Depart_course="'.$depart.'" and Arrive_course="'.$arrive.'" and Date_course="'.$date.'" and Heure="'.$_GET["heure_course"].'"');
								while($data1 = mysql_fetch_array($auth5)){
								$auth2 = mysql_query('INSERT INTO reservation VALUES (NULL,"'.$_GET["id_client"].'","'.$data1["id_course"].'","'.$date1.'","'.$_GET["nb_place"].'","'.$_GET["prix"].'")');
								
								
								}
												
								
								echo'<br><br><div id="valide"  >&nbsp &nbsp &nbsp VOTRE RESERVATION A ETE BIEN EFFECTUEE</div>';
								*/
								
?>
</body>
</html>
