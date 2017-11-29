      <html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>
            
       <?php         
	
function getXmlCoordsFromAdress($address)
{
// $address=iconv($charset, 'ASCII//TRANSLIT//IGNORE', $address);
$address = strtr($address, 'áàâäãåçéèêëíìîïñóòôöõúùûüýÿ', 'aaaaaaceeeeiiiinooooouuuuyy');
$coords=array();
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
$cor=getXmlCoordsFromAdress("Cité Scientifique, Villeneuve-d'Ascq, France");

echo $cor["lat"]."  ".$cor["lon"];