<?php
// Include required files and classes
// Include required files and classes
require('mc_table.php');



class PDF extends PDF_MC_Table {
    public $gp_id;
    public $formatted_date;
    public $receiver_name;
    public $receiver_designation;
    public $receiver_company;
    public $con;

    function __construct($gp_id, $formatted_date, $receiver_name, $receiver_designation, $receiver_company) {
        parent::__construct('P', 'mm', 'A4');
        $this->SetTopMargin(15);
        $this->SetLeftMargin(10);
        $this->SetAutoPageBreak(true, 130);  // Leave space for the footer
        $this->con = new mysqli("localhost", "root", "", "inventory");

        // Store necessary data
        $this->gp_id = $gp_id;
        $this->formatted_date = $formatted_date;
        $this->receiver_name = $receiver_name;
        $this->receiver_designation = $receiver_designation;
        $this->receiver_company = $receiver_company;
    }



    function AcceptPageBreak() {
        // Set a custom height check before page breaks
        return $this->GetY() + 40 < $this->PageBreakTrigger;
    }


    // Page header
    function Header() {
        $this->SetFont('helvetica', '', 18);
        $this->Cell(0, 5, 'GATEPASS', 0, 1, 'C');
        $this->Ln(0);
        $this->Cell(0, 10, 'BASHUNDHARA GROUP', 0, 1, 'C');
        $this->Image('logo.png', 37, 5, 28);
        $this->Ln(5);

        $this->SetFont('Arial', 'B', 11);
        $this->SetXY(9, 45);
        $this->Cell(0, 0, 'Gate Pass No : ', 0, 1, 'L');
        $this->SetXY(39, 45);
        $this->Cell(0, 0, $this->gp_id, 0, 1, 'L');

        $this->SetXY(160, 45);
        $this->Cell(0, 0, 'Date : ', 0, 1, 'L');
        $this->SetXY(171, 45);
        $this->Cell(0, 0, $this->formatted_date, 0, 1, 'L');

        $this->Ln(4);

        // Set column headers
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(15, 10, 'SL. NO', 1, 0, 'C');
        $this->Cell(55, 10, 'DESCRIPTION', 1, 0, 'C');
        $this->Cell(30, 10, 'QUANTITY', 1, 0, 'C');
        $this->Cell(30, 10, 'FROM', 1, 0, 'C');
        $this->Cell(35, 10, 'TO', 1, 0, 'C');
        $this->Cell(26, 10, 'Remarks', 1, 1, 'C');
    }

    // Page footer
    // Page footer
function Footer() {
    // Position at 1.5 cm from bottom
    $this->SetY(-100);

    // Receiver section
        $this->SetXY(20, $this->GetY() - 20);
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(0, 0, 'Sign.', 0, 1, 'L');
        $this->Line(20, $this->GetY() + 3, 70, $this->GetY() + 3);
        $this->SetDrawColor(0, 0, 0);
        $this->SetXY(20, $this->GetY() + 9);
 

       $this->SetFont('Arial', 'B', 10); // Set bold font for the label
        $this->Cell(28, 0, 'Receiver Name:  ', 0, 0, 'L'); // Use a smaller width for the label
        $this->SetFont('Arial', '', 10); // Set regular font for the value
        $this->Cell(0, 0, $this->receiver_name, 0, 1, 'L');
        $this->SetFont('Arial', '', 10);
        $this->SetXY(20, $this->GetY() + 7);
        // $this->Cell(0, 0, 'Designation: ' . $this->receiver_designation, 0, 1, 'L');
        $this->SetFont('Arial', 'B', 10); // Set bold font for the label
        $this->Cell(24, 0, 'Designation:   ', 0, 0, 'L'); // Use a smaller width for the label
        $this->SetFont('Arial', '', 10); // Set regular font for the value
        $this->Cell(0, 0, $this->receiver_designation, 0, 1, 'L');

        $this->SetXY(20, $this->GetY() + 7);
        $this->SetFont('Arial', 'B', 10); // Set bold font for the label
        $this->Cell(29, 0, 'Company Name: ', 0, 0, 'L'); // Use a smaller width for the label
        $this->SetFont('Arial', '', 10); // Set regular font for the value
        $this->Cell(0, 0, $this->receiver_company, 0, 1, 'L');



    // Signature for Department In-Charge
    $this->SetXY(140, $this->GetY() - 20);
    $this->SetFont('Arial', 'B', 10);
    $this->Cell(0, 0, 'Sign.', 0, 1, 'L');
    $this->Line(140, $this->GetY() + 3, 190, $this->GetY() + 3);
    $this->SetDrawColor(0, 0, 0);
    $this->SetXY(140, $this->GetY() + 8);
    $this->Cell(0, 0, 'Department In-Charge', 0, 1, 'L');

   
    $this->SetXY(140, $this->GetY() + 5);
    $this->SetFont('Arial', 'B', 10); // Set bold font for the label
    $this->Cell(14, 0, 'Name: ', 0, 0, 'L'); // Use a smaller width for the label
    $this->SetXY(153, $this->GetY());
    $this->SetFont('Arial', '', 10); // Set regular font for the value
    $this->Cell(0, 0, 'Md. Tanvir Islam', 0, 1, 'L'); // Add the value, starting right after the label

    $this->SetXY(140, $this->GetY() + 5);
    $this->SetFont('Arial', 'B', 10); // Set bold font for the label
    $this->Cell(23, 0, 'Designation: ', 0, 0, 'L'); // Use a smaller width for the label
    $this->SetFont('Arial', '', 10); // Set regular font for the value
    $this->Cell(0, 0, 'Dy. Manager', 0, 1, 'L'); // Add the value, starting right after the label

    $this->SetXY(140, $this->GetY() + 5);
    $this->SetFont('Arial', 'B', 10); // Set bold font for the label
    $this->Cell(29, 0, 'Company Name:  ', 0, 0, 'L'); // Use a smaller width for the label
    $this->SetFont('Arial', '', 10); // Set regular font for the value
    $this->Cell(0, 0, 'BCDL', 0, 1, 'L'); // Add the value, starting right after the label


     $this->Ln(10);

    // Signature for Floor In-Charge
    $this->SetXY(140, $this->GetY() + 10);
    $this->SetFont('Arial', 'B', 10);
    $this->Cell(0, 0, 'Sign.', 0, 1, 'L');
    $this->Line(140, $this->GetY() + 3, 190, $this->GetY() + 3);
    $this->SetDrawColor(0, 0, 0);
    // $this->SetXY(140, $this->GetY() + 8);
    // $this->Cell(0, 0, 'Floor In-Charge', 0, 1, 'L');


    $this->SetFont('Arial', '', 10);
    $this->SetXY(140, $this->GetY() + 7);
    $this->SetFont('Arial', 'B', 10); // Set bold font for the label
    $this->Cell(13, 0, 'Name: ', 0, 0, 'L'); // Use a smaller width for the label
    $this->SetFont('Arial', '', 10); // Set regular font for the value
    $this->Cell(0, 0, 'Md. Shahidul Islam', 0, 1, 'L'); // Add the value, starting right after the label


    $this->SetXY(140, $this->GetY() + 5);
    $this->SetFont('Arial', 'B', 10); // Set bold font for the label
    $this->Cell(23, 0, 'Designation: ', 0, 0, 'L'); // Use a smaller width for the label
    $this->SetFont('Arial', '', 10); // Set regular font for the value
    $this->Cell(0, 0, 'Dy. Manager', 0, 1, 'L'); // Add the value, starting right after the label


    $this->SetXY(140, $this->GetY() + 5);
    $this->SetFont('Arial', 'B', 10); // Set bold font for the label
    $this->Cell(29, 0, 'Company Name:  ', 0, 0, 'L'); // Use a smaller width for the label
    $this->SetFont('Arial', '', 10); // Set regular font for the value
    $this->Cell(0, 0, 'BCDL', 0, 1, 'L'); // Add the value, starting right after the label
    
    // Page number
    $this->SetY(-15);
    $this->SetFont('Arial', 'I', 8);
    $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
}

}

// Retrieve gate pass data
$gp_id = $_GET['id'];
$con = new mysqli("localhost", "root", "", "inventory");
$sql = "SELECT * FROM `tbl_gpass` WHERE gp_id='$gp_id'";
$res = $con->query($sql);

if ($res->num_rows > 0) {
    $row = $res->fetch_assoc();
    $date = $row['pdate'];
    $formatted_date = date('d-M-Y', strtotime($date));

    // Instantiate the PDF with gate pass details
    $pdf = new PDF($gp_id, $formatted_date, $row['r_name'], $row['r_desig'], $row['company']);
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Arial', '', 10);

    // Set up data rows
    $pdf->SetWidths(Array(15, 55, 30, 30, 35, 26));
    $pdf->SetAligns(Array('C', 'L', 'C', 'L', 'L', 'C'));

    $sl = 0;
    foreach ($res as $item) {
        $sl++;
        $pdf->Row(Array(
            "" . $sl,
            "Brand : " . $item['brand'] . "\nModel : " . $item['model'] . "\nSN : " . $item['sl_no'] . "\n" . $item['spec'],
            "01-Pc",
             $item['pre_loc']."\n" . $item['dept']." Dept.",
             $item['r_name']."\n".$item['r_desig']. "\n" . $item['new_dept']." Dept.". "\n" . $item['company'] ,
            $item['remarks']
        ), 10);
    }

    // Display total quantity
    $total_quantity = $res->num_rows;
    $unit = $total_quantity == 1 ? "Pc" : "Pcs";
    $pdf->Cell(15, 8, '', 1, 0, 'C');
    $pdf->Cell(55, 8, '', 1, 0, 'L');
    $pdf->Cell(30, 8, 'Total = ' . sprintf("%02d", $total_quantity) . " " . $unit, 1, 0, 'C');
    $pdf->Cell(30, 8, '', 1, 0, 'C');
    $pdf->Cell(35, 8, '', 1, 0, 'C');
    $pdf->Cell(26, 8, '', 1, 1, 'C');


//     $pdf->SetFont('Arial', 'B', 10);
// $pdf->SetXY(20,215);
// $pdf->Cell(0, 0, 'Sign.', 0, 1, 'L');
// // $pdf->Line(15);
// $pdf->Line(20, 218, 70, 218);
// $pdf->SetDrawColor(0 , 0, 0);
// $pdf->SetXY(20,223);
// $pdf->Cell(0, 0, 'Receiver Name :', 0, 1, 'L');

// $pdf->SetFont('Arial', '', 10);
// $pdf->SetXY(49,223);
// $pdf->Cell(0, 0, $row['r_name'], 0, 1, 'L');


// $pdf->SetFont('Arial', '', 10);
// $pdf->SetXY(20,229);
// $pdf->Cell(0, 0, 'Designation : '.$row['r_desig'], 0, 1, 'L');

// $pdf->SetFont('Arial', '', 10);
// $pdf->SetXY(43,229);
// $pdf->Cell(0, 0, ' ', 0, 1, 'L');

// $pdf->SetFont('Arial', '', 10);
// $pdf->SetXY(20,234);
// $pdf->Cell(0, 0, 'Company Name : '.$row['company'], 0, 1, 'L');

// $pdf->SetFont('Arial', '', 10);
// $pdf->SetXY(49,234);
// $pdf->Cell(0, 0, ' ', 0, 1, 'L');










// $pdf->SetFont('Arial', 'B', 10);
// $pdf->SetXY(140,180);
// $pdf->Cell(0, 0, 'Sign.', 0, 1, 'L');
// // $pdf->Line(15);
// $pdf->Line(140, 183, 190, 183);
// $pdf->SetDrawColor(0 , 0, 0);
// $pdf->SetXY(140,186);
// $pdf->Cell(0, 0, 'Department In-Charge', 0, 1, 'L');


// $pdf->SetFont('Arial', '', 10);
// $pdf->SetXY(140,192);
// $pdf->Cell(0, 0, 'Name : ', 0, 1, 'L');

// $pdf->SetFont('Arial', '', 9);
// $pdf->SetXY(153,192);
// $pdf->Cell(0, 0, 'A.K.M Enamul Haque ', 0, 1, 'L');

// $pdf->SetFont('Arial', '', 10);
// $pdf->SetXY(140,198);
// $pdf->Cell(0, 0, 'Designation : ', 0, 1, 'L');

// $pdf->SetFont('Arial', '', 10);
// $pdf->SetXY(163,198);
// $pdf->Cell(0, 0, 'DGM ', 0, 1, 'L');

// $pdf->SetFont('Arial', '', 10);
// $pdf->SetXY(140,204);
// $pdf->Cell(0, 0, 'Company Name : ', 0, 1, 'L');

// $pdf->SetFont('Arial', '', 10);
// $pdf->SetXY(170,204);
// $pdf->Cell(0, 0, 'BCDL ', 0, 1, 'L');




// $pdf->SetFont('Arial', 'B', 10);
// $pdf->SetXY(140,225);
// $pdf->Cell(0, 0, 'Sign.', 0, 1, 'L');
// // $pdf->Line(15);
// $pdf->Line(140, 228, 190, 228);
// $pdf->SetDrawColor(0 , 0, 0);
// $pdf->SetXY(140,231);
// $pdf->Cell(0, 0, 'Floor In-Charge', 0, 1, 'L');


// $pdf->SetFont('Arial', '', 10);
// $pdf->SetXY(140,237);
// $pdf->Cell(0, 0, 'Name : ', 0, 1, 'L');

// $pdf->SetFont('Arial', '', 10);
// $pdf->SetXY(153,237);
// $pdf->Cell(0, 0, 'Md. Shahidul Islam ', 0, 1, 'L');

// $pdf->SetFont('Arial', '', 10);
// $pdf->SetXY(140,243);
// $pdf->Cell(0, 0, 'Designation : ', 0, 1, 'L');

// $pdf->SetFont('Arial', '', 10);
// $pdf->SetXY(163,243);
// $pdf->Cell(0, 0, 'Dy. Manager ', 0, 1, 'L');

// $pdf->SetFont('Arial', '', 10);
// $pdf->SetXY(140,249);
// $pdf->Cell(0, 0, 'Company Name : ', 0, 1, 'L');

// $pdf->SetFont('Arial', '', 10);
// $pdf->SetXY(170,249);
// $pdf->Cell(0, 0, 'BCDL ', 0, 1, 'L');









}

// Output the PDF
$pdf->Output();

?>
