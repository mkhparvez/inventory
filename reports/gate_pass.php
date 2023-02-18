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
         parent::__construct('P', 'mm', 'a4');
         // $this->SetXY(10000, 0);
         $this->SetTopMargin(20);
         // $this->SetLeftMargin(5);
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
        $this->SetFont('helvetica', '', 18);
        $this->Cell(0, 5, 'GATEPASS', 0, 1, 'C');
        // Line break
        $this->Ln(0);
        $this->Cell(0, 10, 'BASHUNDHARA GROUP', 0, 1, 'C');
        $this->Image('logo.png', 35, 10, 30);
        $this->Ln(5);
        $this->SetFont('helvetica', '', 10);

        $this->SetFont('Arial', 'B', 11);
        $this->SetXY(160,35);
        $this->Cell(0, 0, 'Date : ', 0, 1, 'L');

        $this->SetFont('Arial', 'B', 11);
        $this->SetXY(171,35);
        $this->Cell(0, 0, '18.02.2023 ', 0, 1, 'L');

        $this->Ln(4);



        // $this->SetFont('Arial', 'B', 15);
        // $this->Cell(0, 10, 'Bashundhara City Development Ltd.', 0, 1, 'C');
        // // Line break
        // $this->Ln(2);

        // $this->SetFont('Arial', '', 10);
        // $this->Cell(0, 5, 'Panthapath, Dhaka-1215', 0, 1, 'C');
        // // Line break
        // $this->Ln(2);

        // $this->SetFont('Arial', 'BU', 11);
        // $this->Cell(0, 5, 'Inventory of Computer, Printer & Others', 0, 1, 'C');
        // // Line break
        // $this->Ln(6);

        // Set column widths
$column1_width = 30;
$column2_width = 53;
$column3_width = 40;
$column4_width = 20;
$column5_width = 25;



// Output table headers
$this->SetFont('Arial', 'B', 10);
$this->Cell(15, 6, 'SL. NO', 1, 0, 'C');
$this->Cell(50, 6, 'DESCRIPTION', 1, 0, 'C');
$this->Cell($column3_width, 6, 'QUANTITY', 1, 0, 'C');
$this->Cell($column1_width, 6, 'FROM', 1, 0, 'C');
$this->Cell($column1_width, 6, 'TO', 1, 0, 'C');
$this->Cell(26, 6, 'Remarks', 1, 1, 'C');
// $this->Cell($column4_width, 10, 'PF No', 1, 0, 'C');
// // $this->Cell($column4_width, 10, 'Salary Unit', 1, 0, 'C');
// $this->Cell($column4_width, 10, 'Brand', 1, 0, 'C');
// $this->Cell(28, 10, 'Model', 1, 0, 'C');
// $this->Cell(50, 10, 'Serial No.', 1, 0, 'C');
// $this->Cell($column2_width, 10, 'Specification', 1, 0, 'C');
// $this->Cell(22, 10, 'Status', 1, 0, 'C');




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

$result = $pdf->con->query("SELECT * FROM tbl_products ORDER BY `dept` ASC, `user` ASC;");





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
// while ($row = $result->fetch_assoc()) {
//    $sl++;


//     if ($row["product_cat"] == 1) {
//                             $product_cat = 'CPU';
//                             $spec = $row["processor"].", "."RAM-".$row["ram"]."GB".", "."HDD-".$row["hdd"];
//                           }
//                           elseif ($row["product_cat"] == 2) {
//                             $product_cat = 'Laptop';
//                             $spec = $row["processor"].", "."RAM-".$row["ram"]."GB".", "."HDD-".$row["hdd"];
//                           }
//                           elseif ($row["product_cat"] == 3) {
//                             $product_cat = 'Monitor';
//                             $spec = $row["mon_size"].'"';
//                           }
//                           elseif ($row["product_cat"] == 4) {
//                             $product_cat = 'Printer';

//                                   if (empty($row["toner"]) || $row["toner"] === "NULL") {
//                                       $spec =  $row["toner"];
//                                   } else {
//                                       $spec = 'Toner : '. $row["toner"];
//                                   }       

//                           }
//                           elseif ($row["product_cat"] == 5) {
//                             $product_cat = 'Mouse';
//                             $spec = "";
//                           }
//                           elseif ($row["product_cat"] == 6) {
//                             $product_cat = 'Keyboard';
//                             $spec = "";                            
//                           }
//                           elseif ($row["product_cat"] == 7) {
//                             $product_cat = 'UPS';
//                             $spec = $row["va"]."VA";
//                           }
//                           elseif ($row["product_cat"] == 8) {
//                             $product_cat = 'Cash Drawer';
//                             $spec = "N/A";                            
//                           }
//                           elseif ($row["product_cat"] == 9) {
//                             $product_cat = 'POS Terminal';
//                             $spec = $row["processor"].", "."RAM-".$row["ram"]."GB".", "."HDD-".$row["hdd"];
//                           }
//                           else{
//                             $product_cat = 'Not Defiend';
//                             $spec = "";                            
//                           }





//   if ($row['status']==1) {
//                            $status="Useable";
//                          } elseif ($row['status']==2) {
//                            $status="Damaged";
//                          } elseif ($row['status']==3) {
//                            $status="Need to Repair";
//                          }



//  if ($row["user_designation"] == "") {
//         $user_designation = '-';                            
//          }
// else {
//     $user_designation = $row["user_designation"];
// }



// Set column widths
$column1_width = 30;
$column2_width = 53;
$column3_width = 40;
$column4_width = 20;
$column5_width = 25;







$pdf->SetFont('Arial', '', 8.5);
$pdf->Cell(15, 60, 'SL. NO', 1, 0, 'C');
$pdf->Cell(50, 60, 'DESCRIPTION', 1, 0, 'T');
$pdf->Cell($column3_width, 60, 'QUANTITY', 1, 0, 'C');
$pdf->Cell($column1_width, 60, 'FROM', 1, 0, 'C');
$pdf->Cell($column1_width, 60, 'TO', 1, 0, 'C');
$pdf->Cell(26, 60, 'Remarks', 1, 1, 'C');


$pdf->Cell(15, 8, '', 1, 0, 'C');
$pdf->Cell(50, 8, '', 1, 0, 'L');
$pdf->Cell($column3_width, 8, 'Total = 01 Pc', 1, 0, 'C');
$pdf->Cell($column1_width, 8, '', 1, 0, 'C');
$pdf->Cell($column1_width, 8, '', 1, 0, 'C');
$pdf->Cell(26, 8, '', 1, 1, 'C');

$pdf->SetFont('Arial', 'B', 10);
$pdf->SetXY(20,137);
$pdf->Cell(0, 0, 'Sign.', 0, 1, 'L');
// $pdf->Line(15);
$pdf->Line(20, 140, 70, 140);
$pdf->SetDrawColor(0 , 0, 0);
$pdf->SetXY(20,143);
$pdf->Cell(0, 0, 'Receiver Name :', 0, 1, 'L');


$pdf->SetFont('Arial', '', 10);
$pdf->SetXY(20,149);
$pdf->Cell(0, 0, 'Designation : ', 0, 1, 'L');

$pdf->SetFont('Arial', '', 10);
$pdf->SetXY(43,149);
$pdf->Cell(0, 0, ' ', 0, 1, 'L');

$pdf->SetFont('Arial', '', 10);
$pdf->SetXY(20,154);
$pdf->Cell(0, 0, 'Company Name : ', 0, 1, 'L');

$pdf->SetFont('Arial', '', 10);
$pdf->SetXY(49,154);
$pdf->Cell(0, 0, ' ', 0, 1, 'L');










$pdf->SetFont('Arial', 'B', 10);
$pdf->SetXY(140,137);
$pdf->Cell(0, 0, 'Sign.', 0, 1, 'L');
// $pdf->Line(15);
$pdf->Line(140, 140, 190, 140);
$pdf->SetDrawColor(0 , 0, 0);
$pdf->SetXY(140,143);
$pdf->Cell(0, 0, 'Department In-Charge', 0, 1, 'L');


$pdf->SetFont('Arial', '', 10);
$pdf->SetXY(140,149);
$pdf->Cell(0, 0, 'Name : ', 0, 1, 'L');

$pdf->SetFont('Arial', '', 9);
$pdf->SetXY(153,149);
$pdf->Cell(0, 0, 'A.K.M Enamul Haque ', 0, 1, 'L');

$pdf->SetFont('Arial', '', 10);
$pdf->SetXY(140,154);
$pdf->Cell(0, 0, 'Designation : ', 0, 1, 'L');

$pdf->SetFont('Arial', '', 10);
$pdf->SetXY(163,154);
$pdf->Cell(0, 0, 'DGM ', 0, 1, 'L');

$pdf->SetFont('Arial', '', 10);
$pdf->SetXY(140,159);
$pdf->Cell(0, 0, 'Company Name : ', 0, 1, 'L');

$pdf->SetFont('Arial', '', 10);
$pdf->SetXY(170,159);
$pdf->Cell(0, 0, 'BCDL ', 0, 1, 'L');




$pdf->SetFont('Arial', 'B', 10);
$pdf->SetXY(140,190);
$pdf->Cell(0, 0, 'Sign.', 0, 1, 'L');
// $pdf->Line(15);
$pdf->Line(140, 193, 190, 193);
$pdf->SetDrawColor(0 , 0, 0);
$pdf->SetXY(140,196);
$pdf->Cell(0, 0, 'Floor In-Charge', 0, 1, 'L');


$pdf->SetFont('Arial', '', 10);
$pdf->SetXY(140,202);
$pdf->Cell(0, 0, 'Name : ', 0, 1, 'L');

$pdf->SetFont('Arial', '', 9);
$pdf->SetXY(153,202);
$pdf->Cell(0, 0, 'Md. Shahidul Islam ', 0, 1, 'L');

$pdf->SetFont('Arial', '', 10);
$pdf->SetXY(140,207);
$pdf->Cell(0, 0, 'Designation : ', 0, 1, 'L');

$pdf->SetFont('Arial', '', 10);
$pdf->SetXY(163,207);
$pdf->Cell(0, 0, 'Dy. Manager ', 0, 1, 'L');

$pdf->SetFont('Arial', '', 10);
$pdf->SetXY(140,212);
$pdf->Cell(0, 0, 'Company Name : ', 0, 1, 'L');

$pdf->SetFont('Arial', '', 10);
$pdf->SetXY(170,212);
$pdf->Cell(0, 0, 'BCDL ', 0, 1, 'L');



    // }

$pdf->Output();
?>
