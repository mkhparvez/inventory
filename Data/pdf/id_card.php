<?php
require('../fpdf/fpdf.php');

class EmployeeIDCard extends FPDF {

    // Employee details
    private $employeeName;
    private $employeeID;
    private $department;

    // Constructor
    public function __construct($name, $id, $dept) {
        parent::__construct();
        $this->employeeName = $name;
        $this->employeeID = $id;
        $this->department = $dept;
    }

    // Header
    function Header() {
        // Logo
        $this->Image('logo.png',10,6,30);
        // Arial bold 15
        $this->SetFont('Arial','B',15);
        // Move to the right
        $this->Cell(80);
        // Title
        $this->Cell(30,10,'Employee ID Card',0,0,'C');
        // Line break
        $this->Ln(20);
    }

    // Employee details section
    function EmployeeDetails() {
        $this->SetFont('Arial','B',14);
        $this->Cell(50,10,'Name:',0,0,'L');
        $this->SetFont('Arial','',14);
        $this->Cell(50,10,$this->employeeName,0,1,'L');
        $this->SetFont('Arial','B',14);
        $this->Cell(50,10,'Employee ID:',0,0,'L');
        $this->SetFont('Arial','',14);
        $this->Cell(50,10,$this->employeeID,0,1,'L');
        $this->SetFont('Arial','B',14);
        $this->Cell(50,10,'Department:',0,0,'L');
        $this->SetFont('Arial','',14);
        $this->Cell(50,10,$this->department,0,1,'L');
        $this->Ln(20);
    }

    // Barcode section
    function Barcode() {
        // Include barcode library
        require('../fpdf/barcode.php');
        // Get barcode image
        $barcode = new Barcode();
        $code = $this->employeeID;
        $type = 'C128';
        $barcodeImage = $barcode->draw($code, $type, 'horizontal', 2, 30);
        // Output barcode image
        $this->Image($barcodeImage, 80, 80, 50);
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
