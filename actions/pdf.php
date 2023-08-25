<?php 
require_once('../includes/bdd.php');
//require_once('../librery/makefont/makefont.php');
//MakeFont('PlayfairDisplay-Regular.ttf','cp1252');
require_once('../includes/RequestPdf.php');

require_once('../librery/fpdf.php');



$pdf = new FPDF();
$pdf->AddPage();

// addFont
$fontName = "PlayfairDisplay-Regular";
$pdf->AddFont($fontName,'','PlayfairDisplay-Regular.php', true);
$pdf->SetFont($fontName,'',16,);


$pdf->Cell(0,10,"Votre devis de : " . $rappel['nom'],1,1,'B');
$pdf->Cell(95,10,"Nom ",1,0);
$pdf->Cell(95,10,"Prix",1,1);



foreach ($resultat as $key => $variable){ 
    
    $pdf->Cell(95,10,$resultat[$key]['type'],1,0);
    $pdf->Cell(95,10,$resultat[$key]['prix'] . "€",1,1);

}

$pdf->Cell(95,10,"Total",1,0);
$pdf->Cell(95,10,$global['total'].'€',1,1);


$pdf->Output();


?>
