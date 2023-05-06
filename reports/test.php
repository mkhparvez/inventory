<?php 
require_once('../libs/fpdf/fpdf.php');

$con = mysqli_connect("localhost", "root", "", "inventory");
$sql = "SELECT * FROM `tbl_gpass` WHERE gp_id='2/23'";
$res = $con->query($sql);

// customer and invoice details
$info = [
    "customer" => "Ram Kumar",
    "address" => "4th cross,Car Street,",
    "city" => "Salem 636204.",
    "invoice_no" => "1000001",
    "invoice_date" => "30-11-2021",
    "total_amt" => "5200.00",
    "words" => "Rupees Five Thousand Two Hundred Only",
];

// invoice products
$products_info = [];

if ($res->num_rows > 0) {
    while ($row = $res->fetch_assoc()) {
        // add each product info to the array
        $products_info[] = [
            "brand" => $row['brand'],
            "model" => $row['model'],
            "sl_no" => $row['sl_no'],
            "spec" => $row['spec'],
        ];
    }
}

  
  class PDF extends FPDF
  {
    function Header(){

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




      
      // //Display Company Info
      // $this->SetFont('Arial','B',14);
      // $this->Cell(50,10,"ABC COMPUTERS",0,1);
      // $this->SetFont('Arial','',14);
      // $this->Cell(50,7,"West Street,",0,1);
      // $this->Cell(50,7,"Salem 636002.",0,1);
      // $this->Cell(50,7,"PH : 8778731770",0,1);
      
      // //Display INVOICE text
      // $this->SetY(15);
      // $this->SetX(-40);
      // $this->SetFont('Arial','B',18);
      // $this->Cell(50,10,"INVOICE",0,1);
      
      // //Display Horizontal line
      // $this->Line(0,48,210,48);
    }
    
    function body($info,$products_info){
      
      //Billing Details
      $this->SetY(55);
      $this->SetX(10);
      $this->SetFont('Arial','B',12);
      $this->Cell(50,10,"Bill To: ",0,1);
      $this->SetFont('Arial','',12);
      $this->Cell(50,7,$info["customer"],0,1);
      $this->Cell(50,7,$info["address"],0,1);
      $this->Cell(50,7,$info["city"],0,1);
      
      //Display Invoice no
      $this->SetY(55);
      $this->SetX(-60);
      $this->Cell(50,7,"Invoice No : ".$info["invoice_no"]);
      
      //Display Invoice date
      $this->SetY(63);
      $this->SetX(-60);
      $this->Cell(50,7,"Invoice Date : ".$info["invoice_date"]);
      
      //Display Table headings
      $this->SetY(95);
      $this->SetX(10);
      // $this->SetFont('Arial','B',12);
      // $this->Cell(80,9,"DESCRIPTION",1,0);
      // $this->Cell(40,9,"QUANTITY",1,0,"C");
      // $this->Cell(30,9,"FROM",1,0,"C");
      // $this->Cell(40,9,"TO",1,1,"C");
      // $this->Cell(40,9,"Remarks",1,1,"C");
      // $this->SetFont('Arial','',12);


$this->SetFont('Arial', 'B', 10);
$this->Cell(15, 6, 'SL. NO', 1, 0, 'C');
$this->Cell(50, 6, 'DESCRIPTION', 1, 0, 'C');
$this->Cell(40, 6, 'QUANTITY', 1, 0, 'C');
$this->Cell(30, 6, 'FROM', 1, 0, 'C');
$this->Cell(30, 6, 'TO', 1, 0, 'C');
$this->Cell(26, 6, 'Remarks', 1, 1, 'C');
  $sl=0;    
      //Display table product rows
      foreach($products_info as $row){
   $sl++;

        $this->Cell(15,9,$sl,"LR",0);
        // $this->Cell(80,9,$row["brand"]."\n".$row["model"]."\n".$row["sl_no"],"R",0);
// $this->Cell(80, 9, $row["brand"] . "\n" . $row["model"] . "\n" . $row["sl_no"], "R", 0);
$this->Cell(80, 6,"Brand : ". $row["brand"] . "\n" . "Model : ". $row["model"] . "\n" . "SL : ". $row["sl_no"], 1, 'L');

        $this->Cell(40,9,$row["model"],"R",0,"C");
        $this->Cell(30,9,$row["sl_no"],"R",0,"C");
        $this->Cell(30,9,$row["sl_no"],"R",0,"C");
        $this->Cell(26,9,$row["spec"],"R",1,"R");
      }
      //Display table empty rows
      // for($i=0;$i<12-count($products_info);$i++)
      // {
      //   $this->Cell(80,9,"","LR",0);
      //   $this->Cell(40,9,"","R",0,"R");
      //   $this->Cell(30,9,"","R",0,"C");
      //   $this->Cell(40,9,"","R",1,"R");
      // }
      // //Display table total row
      // $this->SetFont('Arial','B',12);
      // $this->Cell(150,9,"TOTAL",1,0,"R");
      // $this->Cell(40,9,$info["total_amt"],1,1,"R");
      
      // //Display amount in words
      // $this->SetY(225);
      // $this->SetX(10);
      // $this->SetFont('Arial','B',12);
      // $this->Cell(0,9,"Amount in Words ",0,1);
      // $this->SetFont('Arial','',12);
      // $this->Cell(0,9,$info["words"],0,1);
      
    }
    function Footer(){
      
      //set footer position
      // $this->SetY(-50);
      // $this->SetFont('Arial','B',12);
      // $this->Cell(0,10,"for ABC COMPUTERS",0,1,"R");
      // $this->Ln(15);
      // $this->SetFont('Arial','',12);
      // $this->Cell(0,10,"Authorized Signature",0,1,"R");
      // $this->SetFont('Arial','',10);


// Set column widths
$column1_width = 30;
$column2_width = 53;
$column3_width = 40;
$column4_width = 20;
$column5_width = 25;



$this->Cell(15, 8, '', 1, 0, 'C');
$this->Cell(50, 8, '', 1, 0, 'L');
$this->Cell($column3_width, 8, 'Total = 01 Pc', 1, 0, 'C');
$this->Cell($column1_width, 8, '', 1, 0, 'C');
$this->Cell($column1_width, 8, '', 1, 0, 'C');
$this->Cell(26, 8, '', 1, 1, 'C');

$this->SetFont('Arial', 'B', 10);
$this->SetXY(20,235);
$this->Cell(0, 0, 'Sign.', 0, 1, 'L');
// $this->Line(15);
$this->Line(20, 240, 70, 240);
$this->SetDrawColor(0 , 0, 0);
$this->SetXY(20,243);
$this->Cell(0, 0, 'Receiver Name :', 0, 1, 'L');


$this->SetFont('Arial', '', 10);
$this->SetXY(20,249);
$this->Cell(0, 0, 'Designation : ', 0, 1, 'L');

$this->SetFont('Arial', '', 10);
$this->SetXY(43,249);
$this->Cell(0, 0, ' ', 0, 1, 'L');

$this->SetFont('Arial', '', 10);
$this->SetXY(20,254);
$this->Cell(0, 0, 'Company Name : ', 0, 1, 'L');

$this->SetFont('Arial', '', 10);
$this->SetXY(49,254);
$this->Cell(0, 0, ' ', 0, 1, 'L');










$this->SetFont('Arial', 'B', 10);
$this->SetXY(140,200);
$this->Cell(0, 0, 'Sign.', 0, 1, 'L');
// $this->Line(15);
$this->Line(140, 203, 190, 203);
$this->SetDrawColor(0 , 0, 0);
$this->SetXY(140,206);
$this->Cell(0, 0, 'Department In-Charge', 0, 1, 'L');


$this->SetFont('Arial', '', 10);
$this->SetXY(140,212);
$this->Cell(0, 0, 'Name : ', 0, 1, 'L');

$this->SetFont('Arial', '', 9);
$this->SetXY(153,212);
$this->Cell(0, 0, 'A.K.M Enamul Haque ', 0, 1, 'L');

$this->SetFont('Arial', '', 10);
$this->SetXY(140,218);
$this->Cell(0, 0, 'Designation : ', 0, 1, 'L');

$this->SetFont('Arial', '', 10);
$this->SetXY(163,218);
$this->Cell(0, 0, 'DGM ', 0, 1, 'L');

$this->SetFont('Arial', '', 10);
$this->SetXY(140,224);
$this->Cell(0, 0, 'Company Name : ', 0, 1, 'L');

$this->SetFont('Arial', '', 10);
$this->SetXY(170,224);
$this->Cell(0, 0, 'BCDL ', 0, 1, 'L');




$this->SetFont('Arial', 'B', 10);
$this->SetXY(140,245);
$this->Cell(0, 0, 'Sign.', 0, 1, 'L');
// $this->Line(15);
$this->Line(140, 248, 190, 248);
$this->SetDrawColor(0 , 0, 0);
$this->SetXY(140,251);
$this->Cell(0, 0, 'Floor In-Charge', 0, 1, 'L');


$this->SetFont('Arial', '', 10);
$this->SetXY(140,257);
$this->Cell(0, 0, 'Name : ', 0, 1, 'L');

$this->SetFont('Arial', '', 9);
$this->SetXY(153,257);
$this->Cell(0, 0, 'Md. Shahidul Islam ', 0, 1, 'L');

$this->SetFont('Arial', '', 10);
$this->SetXY(140,263);
$this->Cell(0, 0, 'Designation : ', 0, 1, 'L');

$this->SetFont('Arial', '', 10);
$this->SetXY(163,263);
$this->Cell(0, 0, 'Dy. Manager ', 0, 1, 'L');

$this->SetFont('Arial', '', 10);
$this->SetXY(140,269);
$this->Cell(0, 0, 'Company Name : ', 0, 1, 'L');

$this->SetFont('Arial', '', 10);
$this->SetXY(170,269);
$this->Cell(0, 0, 'BCDL ', 0, 1, 'L');











      
      //Display Footer Text
$this->SetY(285);
      $this->Cell(0,10,"This is a computer generated invoice",0,1,"C");
      
    }
    
  }
  //Create A4 Page with Portrait 
  $pdf=new PDF("P","mm","A4");
  $pdf->AddPage();
  $pdf->body($info,$products_info);
  $pdf->body($info,$products_info);
  $pdf->Output();
?>