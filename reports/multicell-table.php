<?php
//include pdf_mc_table.php, not fpdf17/fpdf.php
include('multicell.php');

$con = mysqli_connect("localhost", "root", "", "inventory");
$sql = "SELECT * FROM `tbl_gpass` WHERE gp_id='2/23'";
$res = $con->query($sql);

//make new object
$pdf = new PDF_MC_Table();

//add page, set font
$pdf->AddPage();
$pdf->SetFont('Arial','',14);
//set alignment
$pdf->SetAligns(Array('C','C','C','C','C','C'));

//set width for each column (6 columns)
$pdf->SetWidths(Array(20,50,40,30,20,40));

//set alignment
//$pdf->SetAligns(Array('','R','C','','',''));

//set line height. This is the height of each lines, not rows.
$pdf->SetLineHeight(5);

//load json data
// $json = file_get_contents('MOCK_DATA.json');
// $data = json_decode($json,true);

// if ($res->num_rows > 0) {
//     while ($row = $res->fetch_assoc()) {
    	$sl=0;    


//add table heading using standard cells
//set font to bold
$pdf->SetFont('Arial','B',14);
$pdf->Cell(20,5,"ID",1,0);
$pdf->Cell(50,5,"First Name",1,0);
$pdf->Cell(40,5,"Last Name",1,0);
$pdf->Cell(30,5,"Email",1,0);
$pdf->Cell(20,5,"Gender",1,0);
$pdf->Cell(40,5,"Address",1,0);

$pdf->Ln();

//reset font
$pdf->SetFont('Arial','',14);
//loop the data
foreach($res as $item){
   $sl++;
	//write data using Row() method containing array of values.
	$pdf->Row(Array(
		$sl,
		"Brand : ".$item['brand']."\n"."Model : ".$item['model']."\n"."Sl No : ".$item['sl_no']."\n".$item['spec'],
		$item['pre_loc'],
		$item['new_loc'],
		$item['spec'],
		// $item['gender'],
		// $item['address'],
	),10);
	
}


//output the pdf
$pdf->Output();






