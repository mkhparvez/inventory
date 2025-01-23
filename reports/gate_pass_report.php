<?php
require('mc_table.php');

class PDF extends PDF_MC_Table
{
    public $con = "";

    function __construct()
    {
        // parent::__construct();
        // parent::__construct('L', 'legal');
         parent::__construct('L', 'mm', 'Legal');
         // $this->SetXY(10000, 0);
         $this->SetTopMargin(5);
         $this->SetLeftMargin(5);
        $this->con = new mysqli("localhost", "root", "", "inventory");
    }

    // Page header
    function Header()
    {
        // Logo
        // $this->Image('logo.png', 10, -1, 70);
        // $this->SetFont('Arial', 'B', 13);
        // // Move to the right
        // $this->Cell(80);
        // // Title
        // $this->Cell(80, 10, 'Employee List', 1, 0, 'C');
        // // Line break
        // $this->Ln(20);
         // Centered text
         // $this->SetTopMargin(0);
         // $this->SetXY(0, 0);
        $this->SetFont('Arial', 'B', 15);
        $this->Cell(0, 10, 'Bashundhara City Development Ltd.', 0, 1, 'C');
        // Line break
        $this->Ln(2);

        $this->SetFont('Arial', '', 10);
        $this->Cell(0, 5, 'Panthapath, Dhaka-1215', 0, 1, 'C');
        // Line break
        $this->Ln(2);

        $this->SetFont('Arial', 'BU', 11);
        $this->Cell(0, 5, 'Gatepass History', 0, 1, 'C');
        // Line break
        $this->Ln(6);

        // Set column widths
$column1_width = 35;
$column2_width = 53;
$column3_width = 28;
$column4_width = 21;
$column5_width = 25;



// Output table headers
$this->SetFont('Arial', 'B', 9.5);
$this->Cell(10, 10, 'Sl.', 1, 0, 'C');
$this->Cell(20, 10, 'GP. No.', 1, 0, 'C');
$this->Cell(20, 10, 'INV-ID', 1, 0, 'C');
$this->Cell($column5_width, 10, 'Brand', 1, 0, 'C');
$this->Cell($column3_width, 10, 'Model', 1, 0, 'C');
$this->Cell(40, 10, 'SL No.', 1, 0, 'C');
// $this->Cell($column4_width, 10, 'PF No', 1, 0, 'C');
// $this->Cell($column4_width, 10, 'Salary Unit', 1, 0, 'C');
$this->Cell(65, 10, 'Specification', 1, 0, 'C');
$this->Cell(32, 10, 'Pre-Location', 1, 0, 'C');
// $this->Cell($column4_width, 10, 'Tranfer Date', 1, 0, 'C');
$this->Cell(32, 10, 'New-Location', 1, 0, 'C');
$this->Cell($column5_width, 10, 'Tranfer Date', 1, 0, 'C');
// $this->Cell(50, 10, 'Serial No.', 1, 0, 'C');
// $this->Cell(22, 10, 'Status', 1, 0, 'C');
$this->Cell(50, 10, 'Remarks', 1, 1, 'C');



    }

    // Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
// $pdf->SetFont('Arial', 'B', 12);
$sl=0;

$result = $pdf->con->query("SELECT * FROM `tbl_gpass`
ORDER BY gp_id ASC;");





// Output table headers
// $pdf->SetFont('Arial', 'B', 12);
// $pdf->Cell(20, 10, 'ID', 1, 0, 'C');
// $pdf->Cell($column3_width, 10, 'User Name', 1, 0, 'C');
// $pdf->Cell($column1_width, 10, 'Designation', 1, 0, 'C');
// $pdf->Cell(29, 10, 'Department', 1, 0, 'C');
// $pdf->Cell($column4_width, 10, 'PF No', 1, 0, 'C');
// // $pdf->Cell($column4_width, 10, 'Salary Unit', 1, 0, 'C');
// $pdf->Cell($column4_width, 10, 'Brand', 1, 0, 'C');
// $pdf->Cell($column4_width, 10, 'Model', 1, 0, 'C');
// $pdf->Cell(55, 10, 'Serial No.', 1, 0, 'C');
// $pdf->Cell($column2_width, 10, 'Specification', 1, 0, 'C');
// $pdf->Cell($column4_width, 10, 'Status', 1, 0, 'C');
// $pdf->Cell($column4_width, 10, 'Remarks', 1, 1, 'C');

// Output table data
while ($row = $result->fetch_assoc()) {
   $sl++;








    $pdf->SetFont('Arial', '', 8);

    // Add row to the PDF
    $pdf->SetWidths([10, 20, 20, 25, 28, 40, 65, 32, 32, 25, 50]);
    $pdf->SetAligns(['C', 'C', 'L', 'C', 'C', 'C', 'C', 'C', 'C', 'C', 'C']);
    $pdf->Row([
        $sl,
        $row['gp_id'],
        $row['inv_id'],
        $row['brand'],
        $row['model'],
        $row['sl_no'],
        $row['spec'],
        $row['pre_loc'],
        $row['new_loc'],
        $row['pdate'],
        $row['remarks']
    ]);
}

$pdf->Output();
?>
