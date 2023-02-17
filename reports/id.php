<?php
require('../libs/fpdf/fpdf.php');

class IDCardPDF extends FPDF {

    function __construct() {
        parent::__construct('P', 'mm', 'cr80');
         $this->SetTopMargin(0);
         $this->SetLeftMargin(0);
    }

    function Header() {
        $logo = 'Bashundhara_Group.png';
        // $this->SetFont('Arial', 'B', 12);
        // $this->Cell(10);
        // $this->Ln(10);
        $this->Image($logo, 3, 3, 47);

        // $this->Cell(10, 0, 'My Organization', 0, 0, 'C');
        $this->Ln(10);
    }

    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }

    function generateIDCard($name, $photo, $idNumber) {
        // Add a new page
        $this->AddPage();
        
        // Output the photo
        $this->Image($photo, 15, 15, 20);

        // Output the name
        $this->SetFont('Arial', 'B', 12);
        $this->SetXY(35, 10);
        $this->Cell(40, 10, 'Name:');
        $this->SetFont('Arial', '', 12);
        $this->Cell(60, 10, $name);

        // Output the ID number
        $this->SetFont('Arial', 'B', 12);
        $this->SetXY(35, 20);
        $this->Cell(40, 10, 'ID Number:');
        $this->SetFont('Arial', '', 12);
        $this->Cell(60, 10, $idNumber);
    }
}

$pdf = new IDCardPDF();

// Generate an example ID card
$pdf->generateIDCard('John Doe', 'photo.jpg', '12345');

$pdf->Output();
?>
