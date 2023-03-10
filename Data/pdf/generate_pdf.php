<?php
//include connection file
include_once("connection.php");
include_once('../fpdf/fpdf.php');

class PDF extends FPDF
{
    public $con = "";

    function __construct()
    {
        parent::__construct();
        $this->con = new mysqli("localhost", "root", "", "test1");
    }

    // Page header
    function Header()
    {
        // Logo
        $this->Image('logo.png', 10, -1, 70);
        $this->SetFont('Arial', 'B', 13);
        // Move to the right
        $this->Cell(80);
        // Title
        $this->Cell(80, 10, 'Employee List', 1, 0, 'C');
        // Line break
        $this->Ln(20);
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
$pdf->SetFont('Arial', 'B', 12);

$result = $pdf->con->query("SELECT * FROM employee");

// $display_heading = array('id' => 'ID', 'employee_name' => 'Name', 'employee_age' => 'Age', 'employee_salary' => 'Salary');

// foreach ($display_heading as $heading) {
//     $pdf->Cell(40, 12, $heading, 1);
// }

while($row = $result->fetch_assoc()){ 

    var_dump($row);


// Set column widths
$column1_width = 30;
$column2_width = 60;
$column3_width = 40;

// Output table headers
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell($column1_width, 10, 'ID', 1, 0, 'C');
$pdf->Cell($column2_width, 10, 'Name', 1, 0, 'C');
$pdf->Cell($column3_width, 10, 'Age', 1, 1, 'C');

// Output table data
$pdf->SetFont('Arial', '', 10);
foreach ($row as $row) {
    $pdf->Cell($column1_width, 10, $row['id'], 1, 0, 'C');
    $pdf->Cell($column2_width, 10, $row['name'], 1, 0, 'L');
    $pdf->Cell($column3_width, 10, $row['age'], 1, 1, 'C');
}
}

// while ($row = $result->fetch_assoc()) {
//     $pdf->Ln();
//     foreach ($row as $column)
//         $pdf->Cell(40, 12, $column, 1);
// }

$pdf->Output();
?>
