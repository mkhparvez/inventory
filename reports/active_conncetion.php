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
         parent::__construct('L', 'mm', 'A4');
         // $this->SetXY(10000, 0);
         $this->SetTopMargin(5);
         $this->SetLeftMargin(5);
        $this->con = new mysqli("localhost", "root", "", "inventory");

    }


        function numberFormat($number, $decimals=0)
    {

        // $number = 555;
        // $decimals=0;
        // $number = 555.000;
        // $number = 555.123456;

        if (strpos($number,'.')!=null)
        {
            $decimalNumbers = substr($number, strpos($number,'.'));
            $decimalNumbers = substr($decimalNumbers, 1, $decimals);
        }
        else
        {
            $decimalNumbers = 0;
            for ($i = 2; $i <=$decimals ; $i++)
            {
                $decimalNumbers = $decimalNumbers.'0';
            }
        }
        // return $decimalNumbers;



        $number = (int) $number;
        // reverse
        $number = strrev($number);

        $n = '';
        $stringlength = strlen($number);

        for ($i = 0; $i < $stringlength; $i++)
        {
            if ($i%2==0 && $i!=$stringlength-1 && $i>1)
            {
                $n = $n.$number[$i].',';
            }
            else
            {
                $n = $n.$number[$i];
            }
        }

        $number = $n;
        // reverse
        $number = strrev($number);

        ($decimals!=0)? $number=$number.'.'.$decimalNumbers : $number ;

        return $number;
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

        // $month = date('F');
        // $month = date('F', strtotime('last month'));
        $month = date('F\'y', strtotime('last month'));
        $this->SetFont('Arial', 'BU', 11);
        $this->Cell(0, 5, 'Internet Bill Month of ' . $month, 0, 1, 'C');
        // Line break
        $this->Ln(6);


        // Set column widths
$column1_width = 25;
$column2_width = 53;
$column3_width = 42;
$column4_width = 20;
$column5_width = 25;
$column6_width = 12;



// Output table headers
$this->SetFont('Arial', 'B', 9);
$this->Cell(10, 6, 'Sl.', 1, 0, 'C');
$this->Cell($column3_width, 6, 'Shop Name', 1, 0, 'C');
$this->Cell($column6_width, 6, 'Level', 1, 0, 'C');
$this->Cell($column6_width, 6, 'Block', 1, 0, 'C');
$this->Cell(30, 6, 'Shop Number', 1, 0, 'C');
$this->Cell($column4_width, 6, 'Shop ID', 1, 0, 'C');
// $this->Cell($column4_width, 10, 'Salary Unit', 1, 0, 'C');
// $this->Cell($column4_width, 10, 'POP', 1, 0, 'C');
$this->Cell($column4_width, 6, 'Bandwidth', 1, 0, 'C');
// $this->Cell(50, 10, 'IP_Address', 1, 0, 'C');
// $this->Cell($column2_width, 10, 'Subnet', 1, 0, 'C');
$this->Cell(22, 6, 'Conn. Type', 1, 0, 'C');
$this->Cell(22, 6, 'Conn. Date', 1, 0, 'C');
$this->Cell($column5_width, 6, 'Bill Per Month', 1, 0, 'C');
// $this->Cell(28, 10, 'ONU MAC', 1, 1, 'C');
// $this->Cell(28, 10, 'ONU Serial', 1, 1, 'C');
// $this->Cell(28, 10, 'TJB', 1, 1, 'C');
// $this->Cell(28, 10, 'OLT_Port', 1, 1, 'C');
$this->Cell(75, 6, 'Remarks', 1, 1, 'C');



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

$result = $pdf->con->query("SELECT * FROM `shop` WHERE `status`='1';");
$total = $pdf->con->query("SELECT SUM(`Bill_Month`) AS Bill_Month FROM shop;");



// Output table data
while ($row = $result->fetch_assoc()) {
   $sl++;



// Set column widths
$column1_width = 25;
$column2_width = 53;
$column3_width = 42;
$column4_width = 20;
$column5_width = 25;
$column6_width = 12;

// 10+45+20+20+30+20+25+35+35


$pdf->SetFont('Arial', '', 8);


    $pdf->Cell(10, 5, $sl, 1, 0, 'C');
    $pdf->Cell($column3_width, 5, $row['Shop_Name'], 1, 0, 'C');
    $pdf->Cell($column6_width, 5, $row['Level'], 1, 0, 'C');
    $pdf->Cell($column6_width, 5, $row['Block'], 1, 0, 'C');
    $pdf->Cell(30, 5, $row['Shop_Number'], 1, 0, 'C');
    $pdf->Cell($column4_width, 5, $row['Shop_ID'], 1, 0, 'C');
    // $pdf->Cell($column4_width, 10, 'BCDL', 1, 0, 'C');
    // $pdf->Cell($column6_width, 10, $row['POP'], 1, 0, 'C');
    $pdf->Cell($column4_width, 5, $row['Bandwidth'], 1, 0, 'C');
    // $pdf->Cell(45, 10, $row['IP_Address'], 1, 0, 'C');
    // $pdf->Cell($column4_width, 10, $row['Subnet'], 1, 0, 'C');
    // $pdf->Cell(22, 10, $row['Gateway'], 1, 0, 'C');
    $pdf->Cell(22, 5, $row['Connection_Type'], 1, 0, 'C');
    $pdf->Cell(22, 5, $row['Connection_Date'], 1, 0, 'C');
    $pdf->Cell($column5_width, 5, $row['Bill_Month'], 1, 0, 'C');
    $pdf->Cell(75, 5, $row['Remarks'], 1, 1, 'C');



    }

    $pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(190, 5, 'Total Bill ', 1, 0, 'R');
$total_amt = $total->fetch_assoc();
$total= $pdf->numberFormat($total_amt['Bill_Month']);
$pdf->Cell(25, 5, $total.' TK', 1, 0, 'C');
$pdf->Cell(75, 5, '', 1, 1, 'C');








$pdf->Output();
?>
