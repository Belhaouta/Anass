
<?php
require('fpdf.php');
include('connecter.php');
$auth = mysql_query('SELECT * FROM reservation join course on reservation.id_course=course.id_course
                                               join horaire on id_heure=CodeHoraire where id_reservation="'.$_GET['id'].'"');

								while($data = mysql_fetch_array($auth)){
								$depart=$data["Depart_course"];
								$arrive=$data["Arrive_course"];
								$prix=$data["Prix"];
								$Datecourse=$data["Date_course"];
								$prix=$data["Prix"];
								$nbplace=$data["Nb_place"];
								$heure=$data["tranche2"];
								
								}
class PDF extends FPDF
{
// En-tête
function Header()
{

$auth = mysql_query('SELECT * FROM reservation join client on reservation.id_client=client.id_client where id_reservation="'.$_GET['id'].'"');

								while($data = mysql_fetch_array($auth)){
								$nom=strtoupper($data["Nom_client"]);
								$prenom=strtoupper($data["Prenom_client"]);
								$email=$data["Email_client"];
								$tel=$data["Tel_client"];
								$datereservation=$data["Date_reservation"];
								}
    // Logo
    $this->Image('logo.png',10,6,55);
	$this->Ln(20);
    // Police Arial gras 15
	$this->SetFont('Helvetica','',11);
	$this->Cell(40,7,'1 Rue de la tour');
	$this->Cell(70);$this->SetTextColor(118,111,100);
	$this->Cell(40,7,'Roubaix le '.$datereservation,0,1);
	$this->SetTextColor(0,0,0);
	$this->Cell(40,7,'59100 Roubaix');$this->Cell(70);$this->SetFont('Arial','B',15);$this->Cell(40,7,$nom." ".$prenom,0,1);
	$this->SetFont('Helvetica','',11);
	$this->Cell(40,7,'Safarcom@hotmail.fr');$this->Cell(70);$this->SetFont('Arial','B',15);$this->Cell(40,7,$email,0,1);
	$this->SetFont('Helvetica','',11);
	$this->Cell(40,7,'(+33) 6 61 78 59 59');$this->Cell(70);$this->SetFont('Arial','B',15);$this->Cell(40,7,'(+33) '.$tel,0,1);
	$this->Ln(20);
    $this->SetFont('Arial','B',35);
    // Décalage à droite
    $this->Cell(30);
    // Titre
    $this->Cell(40,10,'Facture de réservation',0,1);
		$this->Cell(47);
	$this->SetFont('Arial','',25);
    $this->Cell(40,10,'(Transport de personnes)',0,1);
    // Saut de ligne
    $this->Ln(20);
	
}

// Pied de page
function Footer()
{
    // Positionnement à 1,5 cm du bas
    $this->SetY(-15);
    // Police Arial italique 8
    $this->SetFont('Arial','I',8);
    // Numéro de page
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Instanciation de la classe dérivée
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',14);
$pdf->Cell(40,10,'Facture n° '.$_GET['id'],0,1);
$pdf->Ln(10);
$pdf->SetFont('Helvetica','B',14);
$pdf->SetTextColor(118,111,100);

    $pdf->Cell(40,10,'Départ de course');
	$pdf->Cell(10);
    $pdf->Cell(40,10,'Arrivé de course');
	$pdf->Cell(10);
    $pdf->Cell(40,10,'Date de course');
	$pdf->Cell(10);
	$pdf->Cell(40,10,'Nb de place',0,1);
	
	
	$pdf->SetFont('Helvetica','',11);
$pdf->SetTextColor(0,0,0);
    $pdf->Cell(40,10,$depart);
	$pdf->Cell(10);
    $pdf->Cell(40,10,$arrive);
	$pdf->Cell(10);
    $pdf->Cell(40,10,$Datecourse);
	$pdf->Cell(10);
	$pdf->Cell(40,10,$nbplace,0,1);
	$pdf->SetFont('Helvetica','B',16);
	$pdf->Ln(10);
	$pdf->Cell(55);
	$pdf->Cell(40,10,'Montant total payé: '.$prix.' EUR');
$pdf->Output();

?>

