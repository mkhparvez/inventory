<?php
require('mc_table.php');

class PDF extends PDF_MC_Table
{
    public $con = "";

    function __construct()
    {
        parent::__construct('L', 'mm', 'Legal');
        $this->SetTopMargin(5);
        $this->SetLeftMargin(5);
        $this->con = new mysqli("localhost", "root", "", "inventory");
    }

    function Header()
    {
        $this->SetFont('Arial', 'B', 15);
        $this->Cell(0, 10, 'Bashundhara City Development Ltd.', 0, 1, 'C');
        $this->Ln(2);

        $this->SetFont('Arial', '', 10);
        $this->Cell(0, 5, 'Panthapath, Dhaka-1215', 0, 1, 'C');
        $this->Ln(2);

        $this->SetFont('Arial', 'BU', 11);
        $this->Cell(0, 5, 'Inventory of Computer, Printer & Others', 0, 1, 'C');
        $this->Ln(6);

        $this->SetFont('Arial', 'B', 10);
        $this->Cell(10, 10, 'Sl.', 1, 0, 'C');
        $this->Cell(20, 10, 'INV-ID', 1, 0, 'C');
        $this->Cell(40, 10, 'User Name', 1, 0, 'C');
        $this->Cell(25, 10, 'Designation', 1, 0, 'C');
        $this->Cell(26, 10, 'Department', 1, 0, 'C');
        $this->Cell(20, 10, 'PF No', 1, 0, 'C');
        $this->Cell(20, 10, 'Brand', 1, 0, 'C');
        $this->Cell(30, 10, 'Model', 1, 0, 'C');
        $this->Cell(50, 10, 'Serial No.', 1, 0, 'C');
        $this->Cell(53, 10, 'Specification', 1, 0, 'C');
        $this->Cell(22, 10, 'Status', 1, 0, 'C');
        $this->Cell(28, 10, 'Remarks', 1, 1, 'C');
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$sl = 0;
$result = $pdf->con->query("SELECT * FROM tbl_products WHERE status IN ('1','2','3') ORDER BY dept ASC, user ASC;");

while ($row = $result->fetch_assoc()) {
    $sl++;

    // Prepare specification based on product category
    if ($row["product_cat"] == 1 || $row["product_cat"] == 2) {
        $spec = $row["processor"].", RAM-".$row["ram"]."GB, HDD-".$row["hdd"];
    } elseif ($row["product_cat"] == 3) {
        $spec = $row["mon_size"].'"';
    } elseif ($row["product_cat"] == 4) {
        $spec = empty($row["toner"]) ? 'POS Printer' : 'Toner : '. $row["toner"];
    } elseif ($row["product_cat"] == 7) {
        $spec = $row["va"]."VA";
    } elseif ($row["product_cat"] == 8) {
        $spec = "N/A";
    } else {
        $spec = '';
    }

    // Determine the status
    $status = ($row['status'] == 1) ? 'Useable' : (($row['status'] == 2) ? 'Damaged' : 'Need to Repair');
    $user_designation = empty($row["user_designation"]) ? '-' : $row["user_designation"];

    $pdf->SetFont('Arial', '', 8);

    // Add row to the PDF
    $pdf->SetWidths([10, 20, 40, 25, 26, 20, 20, 30, 50, 53, 22, 28]);
    $pdf->SetAligns(['C', 'C', 'L', 'C', 'C', 'C', 'C', 'C', 'C', 'C', 'C', 'C']);
    $pdf->Row([
        $sl,
        $row['inv_id'],
        $row['user'],
        $user_designation,
        $row['dept'],
        $row['PF'],
        $row['brand'],
        $row['model'],
        $row['sl_no'],
        $spec,
        $status,
        $row['remarks']
    ]);
}

$pdf->Output();
?>
