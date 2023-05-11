<?php
//include pdf_mc_table.php, not fpdf17/fpdf.php
include('multicell.php');
$gp_id = $_GET['id'];

$con = mysqli_connect("localhost", "root", "", "inventory");
$sql = "SELECT * FROM `tbl_gpass` WHERE gp_id='$gp_id'";
$res = $con->query($sql);

//make new object
$pdf = new PDF_MC_Table();

//add page, set font
$pdf->AddPage();
$pdf->SetFont('Arial','',14);
//set alignment
// $pdf->SetAligns(Array('C','C','C','C','C','C'));

//set width for each column (6 columns)
$pdf->SetWidths(Array(15,60,30,30,30,26));

//set alignment
$pdf->SetAligns(Array('C','L','C','C','C','C'));

//set line height. This is the height of each lines, not rows.
$pdf->SetLineHeight(5);

//load json data
// $json = file_get_contents('MOCK_DATA.json');
// $data = json_decode($json,true);

if ($res->num_rows > 0) {
    $row = $res->fetch_assoc();
    	$sl=0;  

   $date = $row['pdate'];
$formatted_date = date('d-M-Y', strtotime($date));



       $pdf->SetFont('helvetica', '', 18);
        $pdf->Cell(0, 5, 'GATEPASS', 0, 1, 'C');
        // Line break
        $pdf->Ln(0);
        $pdf->Cell(0, 10, 'BASHUNDHARA GROUP', 0, 1, 'C');
        $pdf->Image('logo.png', 37, 2, 28);
        $pdf->Ln(5);
        $pdf->SetFont('helvetica', '', 10);

        $pdf->SetFont('Arial', 'B', 11);
        $pdf->SetXY(9,35);
        $pdf->Cell(0, 0, 'Gate Pass No : ', 0, 1, 'L');

        $pdf->SetFont('Arial', 'B', 11);
        $pdf->SetXY(39,35);
        $pdf->Cell(0, 0, $gp_id, 0, 1, 'L');


        $pdf->SetFont('Arial', 'B', 11);
        $pdf->SetXY(160,35);
        $pdf->Cell(0, 0, 'Date : ', 0, 1, 'L');

        $pdf->SetFont('Arial', 'B', 11);
        $pdf->SetXY(171,35);
        $pdf->Cell(0, 0, $formatted_date, 0, 1, 'L');

        $pdf->Ln(4);




  


//add table heading using standard cells
//set font to bold
// $pdf->SetFont('Arial','B',14);
// $pdf->Cell(20,5,"ID",1,0);
// $pdf->Cell(50,5,"First Name",1,0);
// $pdf->Cell(40,5,"Last Name",1,0);
// $pdf->Cell(30,5,"Email",1,0);
// $pdf->Cell(20,5,"Gender",1,0);
// $pdf->Cell(40,5,"Address",1,0);

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(15, 6, 'SL. NO', 1, 0, 'C');
$pdf->Cell(60, 6, 'DESCRIPTION', 1, 0, 'C');
$pdf->Cell(30, 6, 'QUANTITY', 1, 0, 'C');
$pdf->Cell(30, 6, 'FROM', 1, 0, 'C');
$pdf->Cell(30, 6, 'TO', 1, 0, 'C');
$pdf->Cell(26, 6, 'Remarks', 1, 1, 'C');

// $pdf->Ln();

//reset font
$pdf->SetFont('Arial','',11);

//initialize total quantity variable
$total_quantity = 0;

//loop the data
foreach($res as $item){
   $sl++;
	//write data using Row() method containing array of values.
	$pdf->Row(Array(
		"\n".$sl,
		// "Brand : ".$item['brand']."\n"."Model : ".$item['model']."\n"."Sl No : ".$item['sl_no']."\n".$item['spec'],
		"Brand : ".$item['brand']."\n"."Model : ".$item['model']."\n"."SN : ".$item['sl_no']."\n".$item['spec'],
		"\n"."01-Pc",
		"\n".$item['pre_loc'],
		"\n".$item['new_loc'],
		"\n".$item['remarks'],
		// $item['gender'],
		// $item['address'],
	),10);

	$total_quantity++;
	
}



if ($total_quantity<="1") {
	$unit= "Pc";
} else {
	$unit= "Pcs";
}



// Set column widths
$column1_width = 30;
$column2_width = 53;
$column3_width = 40;
$column4_width = 20;
$column5_width = 25;



$pdf->Cell(15, 8, '', 1, 0, 'C');
$pdf->Cell(60, 8, '', 1, 0, 'L');
// $pdf->Cell($column1_width, 8, 'Total ='.$total_quantity.'Pc', 1, 0, 'C');
$pdf->Cell($column1_width, 8, 'Total = '. sprintf("%02d", $total_quantity)." ".$unit, 1, 0, 'C');
// $pdf->Cell($column1_width, 8, 'Total = '.$total_quantity.' Pc', 1, 0, 'C');
$pdf->Cell($column1_width, 8, '', 1, 0, 'C');
$pdf->Cell($column1_width, 8, '', 1, 0, 'C');
$pdf->Cell(26, 8, '', 1, 1, 'C');

$pdf->SetFont('Arial', 'B', 10);
$pdf->SetXY(20,215);
$pdf->Cell(0, 0, 'Sign.', 0, 1, 'L');
// $pdf->Line(15);
$pdf->Line(20, 218, 70, 218);
$pdf->SetDrawColor(0 , 0, 0);
$pdf->SetXY(20,223);
$pdf->Cell(0, 0, 'Receiver Name :', 0, 1, 'L');

$pdf->SetFont('Arial', '', 10);
$pdf->SetXY(49,223);
$pdf->Cell(0, 0, $row['r_name'], 0, 1, 'L');


$pdf->SetFont('Arial', '', 10);
$pdf->SetXY(20,229);
$pdf->Cell(0, 0, 'Designation : '.$row['r_desig'], 0, 1, 'L');

$pdf->SetFont('Arial', '', 10);
$pdf->SetXY(43,229);
$pdf->Cell(0, 0, ' ', 0, 1, 'L');

$pdf->SetFont('Arial', '', 10);
$pdf->SetXY(20,234);
$pdf->Cell(0, 0, 'Company Name : '.$row['company'], 0, 1, 'L');

$pdf->SetFont('Arial', '', 10);
$pdf->SetXY(49,234);
$pdf->Cell(0, 0, ' ', 0, 1, 'L');










$pdf->SetFont('Arial', 'B', 10);
$pdf->SetXY(140,180);
$pdf->Cell(0, 0, 'Sign.', 0, 1, 'L');
// $pdf->Line(15);
$pdf->Line(140, 183, 190, 183);
$pdf->SetDrawColor(0 , 0, 0);
$pdf->SetXY(140,186);
$pdf->Cell(0, 0, 'Department In-Charge', 0, 1, 'L');


$pdf->SetFont('Arial', '', 10);
$pdf->SetXY(140,192);
$pdf->Cell(0, 0, 'Name : ', 0, 1, 'L');

$pdf->SetFont('Arial', '', 9);
$pdf->SetXY(153,192);
$pdf->Cell(0, 0, 'A.K.M Enamul Haque ', 0, 1, 'L');

$pdf->SetFont('Arial', '', 10);
$pdf->SetXY(140,198);
$pdf->Cell(0, 0, 'Designation : ', 0, 1, 'L');

$pdf->SetFont('Arial', '', 10);
$pdf->SetXY(163,198);
$pdf->Cell(0, 0, 'DGM ', 0, 1, 'L');

$pdf->SetFont('Arial', '', 10);
$pdf->SetXY(140,204);
$pdf->Cell(0, 0, 'Company Name : ', 0, 1, 'L');

$pdf->SetFont('Arial', '', 10);
$pdf->SetXY(170,204);
$pdf->Cell(0, 0, 'BCDL ', 0, 1, 'L');




$pdf->SetFont('Arial', 'B', 10);
$pdf->SetXY(140,225);
$pdf->Cell(0, 0, 'Sign.', 0, 1, 'L');
// $pdf->Line(15);
$pdf->Line(140, 228, 190, 228);
$pdf->SetDrawColor(0 , 0, 0);
$pdf->SetXY(140,231);
$pdf->Cell(0, 0, 'Floor In-Charge', 0, 1, 'L');


$pdf->SetFont('Arial', '', 10);
$pdf->SetXY(140,237);
$pdf->Cell(0, 0, 'Name : ', 0, 1, 'L');

$pdf->SetFont('Arial', '', 10);
$pdf->SetXY(153,237);
$pdf->Cell(0, 0, 'Md. Shahidul Islam ', 0, 1, 'L');

$pdf->SetFont('Arial', '', 10);
$pdf->SetXY(140,243);
$pdf->Cell(0, 0, 'Designation : ', 0, 1, 'L');

$pdf->SetFont('Arial', '', 10);
$pdf->SetXY(163,243);
$pdf->Cell(0, 0, 'Dy. Manager ', 0, 1, 'L');

$pdf->SetFont('Arial', '', 10);
$pdf->SetXY(140,249);
$pdf->Cell(0, 0, 'Company Name : ', 0, 1, 'L');

$pdf->SetFont('Arial', '', 10);
$pdf->SetXY(170,249);
$pdf->Cell(0, 0, 'BCDL ', 0, 1, 'L');



    }











      
      //Display Footer Text
// $pdf->SetY(266);
//       $pdf->Cell(0,10,"This is a computer generated invoice",0,1,"C");
      



//output the pdf
$pdf->Output();






