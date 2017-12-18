
<?php
require('fpdf.php');
include('connecter.php');
$auth = mysql_query('SELECT * FROM reservation1 where id_reservation="'.$_GET['id'].'"');

while($data = mysql_fetch_array($auth)){

    $arrive=$data["Lieu_arrive"];
    $prix=$data["Prix"];
    $nbkg=$data["Poids"];
    $adresse=$data["Adresse"];


}
class PDF extends FPDF
{
// En-t�te
    function Header()
    {

        $auth = mysql_query('SELECT * FROM reservation1 join client on reservation1.id_client=client.id_client where id_reservation="'.$_GET['id'].'"');

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
        // D�calage � droite
        $this->Cell(30);
        // Titre
        $this->Cell(40,10,'Facture de r�servation',0,1);
        $this->Cell(40);
        $this->SetFont('Arial','',25);
        $this->Cell(40,10,'(Transport de marchandises)',0,1);
        // Saut de ligne
        $this->Ln(20);

    }

// Pied de page
    function Footer()
    {
        // Positionnement � 1,5 cm du bas
        $this->SetY(-15);
        // Police Arial italique 8
        $this->SetFont('Arial','I',8);
        // Num�ro de page
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
}

// Instanciation de la classe d�riv�e
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',14);
$pdf->Cell(40,10,'Facture n� '.$_GET['id'],0,1);
$pdf->Ln(10);
$pdf->SetFont('Helvetica','B',14);
$pdf->SetTextColor(118,111,100);

$pdf->Cell(40,10,'D�part');
$pdf->Cell(10);
$pdf->Cell(40,10,'Destination');
$pdf->Cell(10);
$pdf->Cell(40,10,'Adresse');
$pdf->Cell(17);
$pdf->Cell(40,10,'Poids',0,1);


$pdf->SetFont('Helvetica','',11);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(40,10,"Roubaix");
$pdf->Cell(11);
$pdf->Cell(40,10,$arrive);
$pdf->Cell(9);
$pdf->Cell(40,10,$adresse);
$pdf->Cell(19);
$pdf->Cell(40,10,$nbkg." kg",0,1);
$pdf->SetFont('Helvetica','B',16);
$pdf->Ln(10);
$pdf->Cell(55);
$pdf->Cell(40,10,'Montant total pay�: '.$prix.' EUR');
$pdf->Output();

?>

