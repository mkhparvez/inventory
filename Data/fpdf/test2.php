<?php
require('fpdf.php');

class MyPDF extends FPDF {
    
    function WrapText($text, $maxWidth) {
        $text = trim($text);
        if (!$text) {
            return '';
        }
        $fontSize = $this->FontSizePt;
        $fontFamily = $this->FontFamily;
        $fontStyle = $this->FontStyle;
        $lineWidths = [];
        $line = '';
        $words = explode(' ', $text);
        foreach ($words as $word) {
            $lineWithWord = $line . ' ' . $word;
            $lineWidth = $this->GetStringWidth($lineWithWord);
            if ($lineWidth > $maxWidth) {
                $lineWidths[] = $this->GetStringWidth($line);
                $line = $word;
            } else {
                $line = $lineWithWord;
            }
        }
        $lineWidths[] = $this->GetStringWidth($line);
        $maxLineWidth = max($lineWidths);
        $totalHeight = count($lineWidths) * $fontSize;
        $remainingHeight = $totalHeight;
        foreach ($lineWidths as $lineWidth) {
            $h = $fontSize;
            if ($remainingHeight < $fontSize) {
                $h = $remainingHeight;
            }
            $y = $this->GetY();
            $this->MultiCell($maxLineWidth, $h, trim($line), 0, 'L', false);
            $remainingHeight -= $h;
            $this->SetXY($this->GetX(), $y + $h);
            $line = '';
        }
    }

}

$pdf = new MyPDF();
$pdf->AddPage();

$pdf->SetFont('Arial', '', 12);

$text = "This is a long text that needs to be wrapped in a cell. It should wrap automatically when the text reaches the maximum width of the cell.";

$pdf->Cell(50, 10, 'Wrapped Text:', 1, 0, 'L');
$pdf->WrapText($text, 50);

$pdf->Output();
?>
