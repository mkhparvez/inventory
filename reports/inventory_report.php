<?php
//include connection file

include_once('../libs/fpdf/fpdf.php');

class PDF extends FPDF
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
        $this->Cell(0, 5, 'Inventory of Computer, Printer & Others', 0, 1, 'C');
        // Line break
        $this->Ln(6);

        // Set column widths
$column1_width = 25;
$column2_width = 53;
$column3_width = 40;
$column4_width = 20;
$column5_width = 25;



// Output table headers
$this->SetFont('Arial', 'B', 10);
$this->Cell(12, 10, 'Sl.', 1, 0, 'C');
$this->Cell(20, 10, 'INV-ID', 1, 0, 'C');
$this->Cell($column3_width, 10, 'User Name', 1, 0, 'C');
$this->Cell($column1_width, 10, 'Designation', 1, 0, 'C');
$this->Cell(26, 10, 'Department', 1, 0, 'C');
$this->Cell($column4_width, 10, 'PF No', 1, 0, 'C');
// $this->Cell($column4_width, 10, 'Salary Unit', 1, 0, 'C');
$this->Cell($column4_width, 10, 'Brand', 1, 0, 'C');
$this->Cell(28, 10, 'Model', 1, 0, 'C');
$this->Cell(50, 10, 'Serial No.', 1, 0, 'C');
$this->Cell($column2_width, 10, 'Specification', 1, 0, 'C');
$this->Cell(22, 10, 'Status', 1, 0, 'C');
$this->Cell(28, 10, 'Remarks', 1, 1, 'C');



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

$result = $pdf->con->query("SELECT * FROM tbl_products");





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


    if ($row["product_cat"] == 1) {
                            $product_cat = 'CPU';
                            $spec = $row["processor"].", "."RAM-".$row["ram"]."GB".", "."HDD-".$row["hdd"];
                          }
                          elseif ($row["product_cat"] == 2) {
                            $product_cat = 'Laptop';
                            $spec = $row["processor"].", "."RAM-".$row["ram"]."GB".", "."HDD-".$row["hdd"];
                          }
                          elseif ($row["product_cat"] == 3) {
                            $product_cat = 'Monitor';
                            $spec = $row["mon_size"].'"';
                          }
                          elseif ($row["product_cat"] == 4) {
                            $product_cat = 'Printer';

                                  if (empty($row["toner"]) || $row["toner"] === "NULL") {
                                      $spec =  $row["toner"];
                                  } else {
                                      $spec = 'Toner : '. $row["toner"];
                                  }       

                          }
                          elseif ($row["product_cat"] == 5) {
                            $product_cat = 'Mouse';
                            $spec = "";
                          }
                          elseif ($row["product_cat"] == 6) {
                            $product_cat = 'Keyboard';
                            $spec = "";                            
                          }
                          elseif ($row["product_cat"] == 7) {
                            $product_cat = 'UPS';
                            $spec = $row["va"]."VA";
                          }
                          elseif ($row["product_cat"] == 8) {
                            $product_cat = 'Cash Drawer';
                            $spec = "N/A";                            
                          }
                          elseif ($row["product_cat"] == 9) {
                            $product_cat = 'POS Terminal';
                            $spec = $row["processor"].", "."RAM-".$row["ram"]."GB".", "."HDD-".$row["hdd"];
                          }
                          else{
                            $product_cat = 'Not Defiend';
                            $spec = "";                            
                          }





  if ($row['status']==1) {
                           $status="Useable";
                         } elseif ($row['status']==2) {
                           $status="Damaged";
                         } elseif ($row['status']==3) {
                           $status="Need to Repair";
                         }



 if ($row["user_designation"] == "") {
        $user_designation = '-';                            
         }
else {
    $user_designation = $row["user_designation"];
}



// Set column widths
$column1_width = 25;
$column2_width = 53;
$column3_width = 40;
$column4_width = 20;
$column5_width = 25;

$pdf->SetFont('Arial', '', 8.5);


    $pdf->Cell(12, 10, $sl, 1, 0, 'C');
    $pdf->Cell(20, 10, $row['inv_id'], 1, 0, 'C');
    $pdf->Cell($column3_width, 10, $row['user'], 1, 0, 'L');
    $pdf->Cell($column1_width, 10, $user_designation, 1, 0, 'C');
    $pdf->Cell(26, 10, $row['dept'], 1, 0, 'C');
    $pdf->Cell($column4_width, 10, $row['PF'], 1, 0, 'C');
    // $pdf->Cell($column4_width, 10, 'BCDL', 1, 0, 'C');
    $pdf->Cell($column4_width, 10, $row['brand'], 1, 0, 'C');
    $pdf->Cell(28, 10, $row['model'], 1, 0, 'C');
    $pdf->Cell(50, 10, $row['sl_no'], 1, 0, 'C');
    $pdf->Cell($column2_width, 10, $spec, 1, 0, 'C');
    $pdf->Cell(22, 10, $status, 1, 0, 'C');
    $pdf->Cell(28, 10, $row['remarks'], 1, 1, 'C');

    }

$pdf->Output();
?>
