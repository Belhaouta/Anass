<?php
function getXmlCoordsFromAdress($address)
{
$coords=array();

$address = strtr($address, 'áàâäãåçéèêëíìîïñóòôöõúùûüýÿ', 'aaaaaaceeeeiiiinooooouuuuyy');
$base_url="http://maps.googleapis.com/maps/api/geocode/xml?";
// ajouter &region=FR si ambiguité (lieu de la requete pris par défaut)
$request_url = $base_url . "address=" .urlencode($address).'&sensor=false';
$xml = simplexml_load_file($request_url) or die("url not loading");
//print_r($xml);
$coords['lat']=$coords['lon']=0;
$coords['status'] = $xml->status ;
if($coords['status']=='OK')
{
 $coords['lat'] = $xml->result->geometry->location->lat ;
 $coords['lon'] = $xml->result->geometry->location->lng ;
}

return $coords;
}





/*
Description : Calcul de la distance entre 2 points en fonction de leur latitude/longitude
Auteur : Rajesh Singh (2014)
Site web : AssemblySys.com
 
Si vous trouvez ce code utile, vous pouvez montrer votre
appréciation à Rajesh en lui offrant un café ;)
PayPal: rajesh.singh@assemblysys.com
 
Du moment que cette notice (y compris le nom et détails sur l'auteur) est
inclue et N'EST PAS ALTÉRÉE, ce code est distribué selon la GNU General
Public License version 3 : http://www.gnu.org/licenses/gpl-3.0.fr.html
*/

function distanceCalculation($point1_lat, $point1_long, $point2_lat, $point2_long, $unit = 'km', $decimals = 2) {
	// Calcul de la distance en degrés
	$degrees = rad2deg(acos((sin(deg2rad($point1_lat))*sin(deg2rad($point2_lat))) + (cos(deg2rad($point1_lat))*cos(deg2rad($point2_lat))*cos(deg2rad($point1_long-$point2_long)))));
 
	// Conversion de la distance en degrés à l'unité choisie (kilomètres, milles ou milles nautiques)
	switch($unit) {
		case 'km':
			$distance = $degrees * 111.13384; // 1 degré = 111,13384 km, sur base du diamètre moyen de la Terre (12735 km)
			break;
		case 'mi':
			$distance = $degrees * 69.05482; // 1 degré = 69,05482 milles, sur base du diamètre moyen de la Terre (7913,1 milles)
			break;
		case 'nmi':
			$distance =  $degrees * 59.97662; // 1 degré = 59.97662 milles nautiques, sur base du diamètre moyen de la Terre (6,876.3 milles nautiques)
	}
	return round($distance, $decimals);
}




 // Calculer la distance en kilomètres (par défaut)
//$mi = distanceCalculation($point1['lat'], $point1['long'], $point2['lat'], $point2['long'], 'mi'); // Calculer la distance en milles
// $nmi = distanceCalculation($point1['lat'], $point1['long'], $point2['lat'], $point2['long'], 'nmi'); // Calculer la distance en milles nautiques


function Prix($dis,$nbplace)
{
$prix=$dis*$nbplace;
return($prix);
}


function PrixTM($arrive,$nbKG)
{
switch($arrive){
case 'Lille':return $prix=0.80*$nbKG;
break;
case 'Bethune':return $prix=0.90*$nbKG;
break;
case 'Calais':return $prix=$nbKG;
break;
case 'Valenciennes':return $prix=0.95*$nbKG;
break;
case 'Dunkerque':return $prix=0.98*$bKG;
break;
default:return $prix=0;}


}
?>




