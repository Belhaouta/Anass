<?php
require('facturePDF.php');

// #1 initialise les informations de base
//
// adresse de l'entreprise qui émet la facture
$adresse = "SAFARCOM\n1 rue de la tour \n59100 Roubaix\n\nSafarcom@hotmail.fr\n(+33) 6 61 78 59 59";
// adresse du client
$adresseClient = "Robert Meinard\n3 place de Clichy\n88154 Nancy le port";
// initialise l'objet facturePDF
$pdf = new facturePDF($adresse, $adresseClient, "SAFARCOM - 1 rue de la tour - 59100 Roubaix - Safarcom@hotmail.fr - (+33) 6 61 78 59 59\nLa réservation des courses demeurent la propriété exclusive de notre entreprise jusqu'au paiement complet de la présente facture.");
// défini le logo
$pdf->setLogo('logo.png');
// entete des produits
$pdf->productHeaderAddRow('Départ', 75, 'L');
$pdf->productHeaderAddRow('Arrivé', 40, 'C');
$pdf->productHeaderAddRow('Date course', 25, 'C');
$pdf->productHeaderAddRow('Prix', 15, 'C');

// entete des totaux
$pdf->totalHeaderAddRow(40, 'L');
$pdf->totalHeaderAddRow(30, 'R');
// element personnalisé
$pdf->elementAdd('', 'traitEnteteProduit', 'content');
$pdf->elementAdd('', 'traitBas', 'footer');

// #2 Créer une facture
//
// numéro de facture, date, texte avant le numéro de page
$pdf->initFacture("Facture n° ".mt_rand(1, 99999)."-".mt_rand(1, 99999), "Roubaix le 21/03/2014", "Page ");
// produit
$pdf->productAdd(array('Attrape mouche collant', 'C22M9', '10.00', '7', '70.00'));




// #3 Importe le gabarit
//
require('gabarit1.php');

// #4 Finalisation
// construit le PDF
$pdf->buildPDF();
// télécharge le fichier
$pdf->Output('Facture.pdf', $_GET['download'] ? 'D':'I');
?>