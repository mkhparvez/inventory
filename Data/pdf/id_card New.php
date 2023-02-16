<?php
require('../fpdf/fpdf.php');

class EmployeeIDCard extends FPDF {

    // Employee details
    private $employeeName;
    private $employeeID;
    private $department;

    // Constructor
    public function __construct($name, $id, $dept) {
        parent::__construct('P', 'in', array(3.375, 2.125));
        $this->employeeName = $name;
        $this->employeeID = $id;
        $this->department = $dept;
    }

    // Header
    function Header() {
        // Logo
        $this->Image('logo.png', 0.125, 0.125, 1.125);
        // Arial bold 15
        $this->SetFont('Arial','B',11);
        // Move to the right
        $this->Cell(1.125);
        // Title
        $this->Cell(1.125,0.375,'Employee ID Card',0,0,'C');
        // Line break
        $this->Ln(0.5);
    }

    // Employee details section
    function EmployeeDetails() {
        $this->SetFont('Arial','B',9);
        $this->Cell(0.5,0.25,'Name:',0,0,'L');
        $this->SetFont('Arial','',9);
        $this->Cell(1.75,0.25,$this->employeeName,0,1,'L');
        $this->SetFont('Arial','B',9);
        $this->Cell(0.5,0.25,'Employee ID:',0,0,'L');
        $this->SetFont('Arial','',9);
        $this->Cell(1.75,0.25,$this->employeeID,0,1,'L');
        $this->SetFont('Arial','B',9);
        $this->Cell(0.5,0.25,'Department:',0,0,'L');
        $this->SetFont('Arial','',9);
        $this->Cell(1.75,0.25,$this->department,0,1,'L');
        $this->Ln(0.25);
    }

    // Barcode section
    function Barcode() {
        // Include barcode library
        require('../fpdf/barcode.php');
        // Get barcode image
        $barcode = new Barcode();
        $code = $this->employeeID;
        $type = 'C128';
        $barcodeImage = $barcode->draw($code, $type, 'horizontal', 0.8, 16);
        // Output barcode image
        $this->Image($barcodeImage, 0.875, 1.5, 2.625);
    }

    // Output the card
    function OutputCard() {
        $this->AddPage();
        $this->EmployeeDetails();
        $this->Barcode();
        $this->Output();
    }
}

// Create a new employee ID card object and generate the card
$card = new EmployeeIDCard('John Smith', 'EMP12345', 'Human Resources');
$card->OutputCard();
?>
