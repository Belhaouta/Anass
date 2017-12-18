<?php
function getXmlCoordsFromAdress($address)
{
    $coords=array();

    $address = strtr($address, '���������������������������', 'aaaaaaceeeeiiiinooooouuuuyy');
    $base_url="http://maps.googleapis.com/maps/api/geocode/xml?";
// ajouter &region=FR si ambiguit� (lieu de la requete pris par d�faut)
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
appr�ciation � Rajesh en lui offrant un caf� ;)
PayPal: rajesh.singh@assemblysys.com
 
Du moment que cette notice (y compris le nom et d�tails sur l'auteur) est
inclue et N'EST PAS ALT�R�E, ce code est distribu� selon la GNU General
Public License version 3 : http://www.gnu.org/licenses/gpl-3.0.fr.html
*/

function distanceCalculation($point1_lat, $point1_long, $point2_lat, $point2_long, $unit = 'km', $decimals = 2) {
    // Calcul de la distance en degr�s
    $degrees = rad2deg(acos((sin(deg2rad($point1_lat))*sin(deg2rad($point2_lat))) + (cos(deg2rad($point1_lat))*cos(deg2rad($point2_lat))*cos(deg2rad($point1_long-$point2_long)))));

    // Conversion de la distance en degr�s � l'unit� choisie (kilom�tres, milles ou milles nautiques)
    switch($unit) {
        case 'km':
            $distance = $degrees * 111.13384; // 1 degr� = 111,13384 km, sur base du diam�tre moyen de la Terre (12735 km)
            break;
        case 'mi':
            $distance = $degrees * 69.05482; // 1 degr� = 69,05482 milles, sur base du diam�tre moyen de la Terre (7913,1 milles)
            break;
        case 'nmi':
            $distance =  $degrees * 59.97662; // 1 degr� = 59.97662 milles nautiques, sur base du diam�tre moyen de la Terre (6,876.3 milles nautiques)
    }
    return round($distance, $decimals);
}




// Calculer la distance en kilom�tres (par d�faut)
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




