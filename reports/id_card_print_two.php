<?php
require('code128.php');

// Function to truncate a string to fit within a specified width
function truncateString($pdf, $string, $maxWidth) {
    $words = explode(' ', $string);
    $truncated = '';

    foreach ($words as $word) {
        // Check the width of the current truncated string plus the new word
        $testString = trim($truncated . ' ' . $word);
        if ($pdf->GetStringWidth($testString) <= $maxWidth) {
            $truncated = $testString; // Update the truncated string
        } else {
            break; // Stop adding words if it exceeds the max width
        }
    }

    return trim($truncated); // Return the truncated string
}




if (isset($_POST['both']) || isset($_POST['front']) || isset($_POST['back'])) {
    $pfNumbers = $_POST['pf_no'];
    $pfArray = array_map('trim', explode(',', $pfNumbers)); // Convert comma-separated values into an array

    // Connect to the database
    $con = new mysqli("localhost", "root", "", "inventory");

    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    // Create the PDF document outside the loop
    $pdf = new PDF_Code128();

    // Array to store missing PF numbers
    $missingPFNumbers = array();

    foreach ($pfArray as $pf_no) {
        // Fetch data for each PF number
        $pf_no = $con->real_escape_string($pf_no);
        $query = "SELECT * FROM tbl_idcard WHERE pf_no='$pf_no'";
        $result = $con->query($query);

        if ($result->num_rows > 0) {
            $data = $result->fetch_assoc();

            // Check if paths are valid
            $profileImagePath = '../ID_Card/EmpPic/' . basename($data['image_path']);
            $signPath = '../ID_Card/EmpSign/' . basename($data['sign_path']);
            $auth_sign_path = '../ID_Card/Authority/' . basename($data['auth_sign_path']); // New path for authority signature


            if (!file_exists($profileImagePath) || !file_exists($signPath)) {
                echo '<div class="alert alert-danger"><strong>Error: </strong>Image or Signature file missing for PF No ' . $pf_no . '.</div>';
                continue;
            }

            // Add a new page for the front side
            if (isset($_POST['front']) || isset($_POST['both'])) {
                $pdf->AddPage();
                $pdf->SetFont('Arial', 'B', 16);
                $pdf->Image('bg.png', 0, 0, $pdf->GetPageWidth(), $pdf->GetPageHeight());
                $pdf->Image('Bashundhara_Group.png', 6, 3.9, 42.5, 0);

                if (file_exists($profileImagePath)) {
                    $pdf->Image($profileImagePath, ($pdf->GetPageWidth() - 21.33) / 2, 15.5, 21.33, 23.52);
                    $pdf->Rect(($pdf->GetPageWidth() - 21.33) / 2, 15.5, 21.33, 23.52);
                }

                $pdf->Image('bcdl.png', 30, 48, 0, 18.5);

                // Add text content
            $pdf->Ln(38);
            $pdf->SetFont('Arial', 'B', 7.5);
            // $pdf->Cell(0, 4, 'Name               :   ' . $data['name'], 0, 1);

            // With this line to use the truncation function
            $maxNameWidth = $pdf->GetPageWidth() - 22; // Adjust width as needed
            // $truncatedName = truncateString($pdf, $data['name'], $maxNameWidth);

            // Split the name into two lines if necessary
            $truncatedName = truncateString($pdf, $data['name'], $maxNameWidth);
            $remainingName = trim(substr($data['name'], strlen($truncatedName)));

            // Add the first part of the name
            $pdf->Cell(0, 4, 'Name             :  ' . $truncatedName, 0, 1);

            // If there is a remaining part, add it as the next line
            if (!empty($remainingName)) {
                $pdf->Cell(19, 4, '', 0, 0); // Add an empty cell for indentation
                $pdf->Cell(0, 4, $remainingName, 0, 1);
            }







            // $pdf->Cell(0, 4, 'Name             :  ' . $truncatedName, 0, 1);
             $pdf->SetFont('Arial', 'B', 6.9);
            $pdf->Cell(0, 4, 'Designation    :   ' . $data['designation'], 0, 1);
            $pdf->Cell(0, 4, 'Department     :   ' . $data['department'], 0, 1);
            $pdf->Cell(0, 4, 'Unit                  :   ' . $data['unit'], 0, 1);
            $pdf->Cell(0, 4, 'Blood Group   :   ' . $data['blood_group'], 0, 1);
            $pdf->Ln(9.5);
            $pdf->SetFont('Arial', '', 6.5);
            $pdf->Cell(49, 3, date("d-M-y"), 0, 0, 'C');
            $pdf->Ln(4.5);
            $pdf->Line(2, 77, 22 - 4, 77);
            $pdf->Line(21, 77, 36 - 4, 77);
            $pdf->Line(36, 77, 56.5 - 4, 77);
            $pdf->SetFont('Arial', '', 6);
            $pdf->Cell(16, 2.5, 'Signature of', 0, 0, 'C');
            $pdf->Cell(19, 2.5, 'Date', 0, 0, 'C');
            $pdf->Cell(16, 2.5, 'Signature of', 0, 1, 'C');
            $pdf->Cell(18, 2.5, 'Issuing Authority', 0, 0, 'C');
            $pdf->Cell(19, 2.5, '', 0, 0, 'C');
            $pdf->Cell(13, 2.5, 'Card Holder', 0, 0, 'C');

if (file_exists($auth_sign_path) && file_exists($signPath)) {
    // Define the first box position and size for authority signature
    $box1X = 3;        // X position of the first box in mm
    $box1Y = 65.5;     // Y position of the first box in mm
    $box1Width = 15;   // Width of the first box in mm
    $box1Height = 11;  // Height of the first box in mm

    // Get the original dimensions of the authority signature image
    list($originalWidth, $originalHeight) = getimagesize($auth_sign_path);

    // Calculate the aspect ratio of the authority signature image
    $aspectRatio = $originalWidth / $originalHeight;

    // Determine the dimensions of the image to fit the first box while maintaining the aspect ratio
    if ($box1Width / $box1Height > $aspectRatio) {
        $fitWidth = $box1Height * $aspectRatio;
        $fitHeight = $box1Height;
    } else {
        $fitWidth = $box1Width;
        $fitHeight = $box1Width / $aspectRatio;
    }

    // Center the authority signature image inside the first box
    $imageX1 = $box1X + ($box1Width - $fitWidth) / 2;
    $imageY1 = $box1Y + ($box1Height - $fitHeight) / 2;

    // Place the authority signature image in the first box
    $pdf->Image($auth_sign_path, $imageX1, $imageY1, $fitWidth, $fitHeight);

    // Define the second box position and size for employee signature
    $box2X = 36.5;     // X position of the second box in mm
    $box2Y = 66.3;     // Y position of the second box in mm
    $box2Width = 15;   // Width of the second box in mm
    $box2Height = 10.5;  // Height of the second box in mm

    // Get the original dimensions of the employee signature image
    list($originalWidth, $originalHeight) = getimagesize($signPath);

    // Calculate the aspect ratio of the employee signature image
    $aspectRatio = $originalWidth / $originalHeight;

    // Determine the dimensions of the image to fit the second box while maintaining the aspect ratio
    if ($box2Width / $box2Height > $aspectRatio) {
        $fitWidth = $box2Height * $aspectRatio;
        $fitHeight = $box2Height;
    } else {
        $fitWidth = $box2Width;
        $fitHeight = $box2Width / $aspectRatio;
    }

    // Center the employee signature image inside the second box
    $imageX2 = $box2X + ($box2Width - $fitWidth) / 2;
    $imageY2 = $box2Y + ($box2Height - $fitHeight) / 2;

    // Place the employee signature image in the second box
    $pdf->Image($signPath, $imageX2, $imageY2, $fitWidth, $fitHeight);
}

}

            // Add a new page for the back side
            if (isset($_POST['back']) || isset($_POST['both'])) {
            $pdf->AddPage();
            $pdf->SetFont('Arial', 'B', 7.1);
            $pdf->Cell(0, 10, 'Bashundhara City Development Ltd.', 0, 1, 'C');
            $pdf->Line(2, 11, 55 - 2, 11);
            $pdf->Line(2, 11.5, 55 - 2, 11.5);
            $pdf->SetFont('Arial', '', 7);
            $pdf->Cell(0, 5, 'A Concern of', 0, 1, 'C');
            $pdf->SetFont('Arial', 'B', 10);
            $pdf->Cell(0, 5, 'Bashundhara Group', 0, 1, 'C');
            $pdf->SetFont('Arial', '', 6);
            $pdf->MultiCell(0, 3, '3 No. Tejturi Bazar West, Panthapath, Tejgaon, Dhaka-1215, Bangladesh', 0, 'C');
            $pdf->Ln(0.6);
            $pdf->SetFont('Arial', '', 7.7);
            $pdf->Cell(0, 3.5, 'Phone : 880-2-58156260', 0, 1, 'C');
            $pdf->Cell(0, 3.5, '880-2-222248711', 0, 1, 'C');
            $pdf->Cell(0, 3.5, 'Email : hrdept@bga-bd.com', 0, 1, 'C');
            $pdf->Line(2, 40.1, 55 - 2, 40.1);
            $pdf->Line(2, 40.8, 55 - 2, 40.8);
            $pdf->Ln(3);
            $pdf->SetFont('Arial', '', 5.3);
            $pdf->Cell(0, 3, chr(149) . ' This Card is needed to access into the office', 0, 1, 'L');
            $pdf->Cell(0, 3, chr(149) . ' This Card is not transferable/exchangeable', 0, 1, 'L');
            $pdf->MultiCell(0, 3, chr(149) . ' If lost, please report immediately to HR & Admin division', 0, 1);
            $pdf->MultiCell(0, 3, chr(149) . ' Deposit it to HR & admin division at transfer/separation from job', 0, 1);
            $pdf->SetFont('Arial', '', 9);
            $pdf->Image('lost2.png', 2.0, 58, -290);
            $text = 'If found, Please contact above mentioned address';
            $pdf->SetFont('Arial', '', 11);

            // Barcode and data
            $code = $data['pf_no'];

            // Calculate the width of the barcode
            $barcodeWidth = 30; // Width of the barcode in mm
            $barcodeX = ($pdf->GetPageWidth() - $barcodeWidth) / 2; // Centered X position for the barcode

            // Add the barcode
            $pdf->Code128($barcodeX, 68.5, $code, $barcodeWidth, 10);

            // Calculate the width of the barcode data
            $pdf->SetFont('Times', '', 10);
            $spacedCode = implode(' ', str_split($code));
            $dataWidth = $pdf->GetStringWidth($spacedCode);

            // Center the data horizontally
            $dataX = ($pdf->GetPageWidth() - $dataWidth) / 2;

            // Set position and add the barcode data
            $pdf->SetXY($dataX, 81);
            $pdf->Write(0, $spacedCode);
            }

        } else {
            $missingPFNumbers[] = $pf_no;
        }
    }

  // Display message for missing PF numbers if any
    if (!empty($missingPFNumbers)) {
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 11);
        $pdf->Ln(5);
        $pdf->Cell(0, 10, 'Missing PF Numbers', 0, 1, 'C');
        $pdf->Ln(10);
        $pdf->SetFont('Arial', '', 8);

        foreach ($missingPFNumbers as $missingPF) {
            $pdf->Cell(0, 10,'PF No : ' . $missingPF . ' Not Found.', 0, 1);
        }
    }

    // Output the generated PDF
    $pdf->Output();

    $con->close();
}
?>
