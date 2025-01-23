<?php
// include connection file
// include_once('../libs/fpdf/fpdf.php');
include('multicell.php');

// connect to database
$con = mysqli_connect("localhost", "root", "", "inventory");

// fetch data from database
$sql = "SELECT * FROM `tbl_products` WHERE status='3'";
$res = $con->query($sql);


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

// make new object
$pdf = new PDF_MC_Table();

//set paper size and orientation
$pdf->AddPage('L', 'legal');


// add page, set font
// $pdf->AddPage();
$pdf->SetFont('Arial','',14);

// set alignment
// $pdf->SetAligns(Array('C','L','C','C','C','C'));-
$pdf->SetWidths(Array(12,20,42,26,35,21,28,50,53,60));
$pdf->SetAligns(Array('C','C','C','C','C','C','C','C','C','C'));

// set line height. This is the height of each lines, not rows.
$pdf->SetLineHeight(6);

if ($res->num_rows > 0) {
  $pdf->SetFont('Arial', 'B', 15);
  $pdf->Cell(0, 10, 'Bashundhara City Development Ltd.', 0, 1, 'C');
  $pdf->Ln(2);

  $pdf->SetFont('Arial', '', 10);
  $pdf->Cell(0, 5, 'Panthapath, Dhaka-1215', 0, 1, 'C');
  $pdf->Ln(2);

  $pdf->SetFont('Arial', 'BU', 11);
  $pdf->Cell(0, 5, 'List of Products Need to Repair', 0, 1, 'C');
  $pdf->Ln(6);

  // Set column widths
  $column1_width = 35;
  $column2_width = 53;
  $column3_width = 42;
  $column4_width = 21;
  $column5_width = 25;

  // Output table headers
  $pdf->SetFont('Arial', 'B', 10);
  $pdf->Cell(12, 10, 'Sl.', 1, 0, 'C');
  $pdf->Cell(20, 10, 'INV-ID', 1, 0, 'C');
  $pdf->Cell($column3_width, 10, 'User Name', 1, 0, 'C');
  $pdf->Cell(26, 10, 'Department', 1, 0, 'C');
  $pdf->Cell($column1_width, 10, 'Location', 1, 0, 'C');
  $pdf->Cell($column4_width, 10, 'Brand', 1, 0, 'C');
  $pdf->Cell(28, 10, 'Model', 1, 0, 'C');
  $pdf->Cell(50, 10, 'Serial No.', 1, 0, 'C');
  $pdf->Cell($column2_width, 10, 'Specification', 1, 0, 'C');
  $pdf->Cell(60, 10, 'Remarks', 1, 1, 'C');

  // reset font
  $pdf->SetFont('Arial','',11);

  // Output table data
  $sl = 0;
  while ($row = $res->fetch_assoc()) {
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
$column1_width = 35;
$column2_width = 53;
$column3_width = 42;
$column4_width = 21;
$column5_width = 25;

$pdf->SetFont('Arial', '', 9);
    $pdf->Row(Array(
        $sl,
        $row['inv_id'],
        $row['user'],
        $row['dept'],
        $row['location'],
        $row['brand'],
       $row['model'],
       $row['sl_no'],
       $spec,
        $row['remarks'],
    ),10);



    }
}

$pdf->Output();
?>
