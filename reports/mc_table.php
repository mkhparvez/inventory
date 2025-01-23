<?php
require('../libs/fpdf/fpdf.php');

class PDF_MC_Table extends FPDF
{
	protected $widths;
	protected $aligns;

	function SetWidths($w)
	{
		// Set the array of column widths
		$this->widths = $w;
	}

	function SetAligns($a)
	{
		// Set the array of column alignments
		$this->aligns = $a;
	}

	function Row($data)
{
    // Base line height (height per line of text)
    $lineHeight = 5; 

    // Padding inside the cell
    $padding = 3; // Change this value to adjust top and bottom padding

    // Calculate the height of the row based on the maximum number of lines in any cell
    $nb = 0;
    for ($i = 0; $i < count($data); $i++) {
        $nb = max($nb, $this->NbLines($this->widths[$i], $data[$i]));
    }

    // Calculate total row height: lineHeight * number of lines + padding
    $rowHeight = $lineHeight * $nb + 2 * $padding;

    // Issue a page break if needed
    $this->CheckPageBreak($rowHeight);

    // Draw the cells of the row
    for ($i = 0; $i < count($data); $i++) {
        $w = $this->widths[$i];
        $a = isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';

        // Save the current position
        $x = $this->GetX();
        $y = $this->GetY();

        // Calculate the height of the text in the cell
        $textHeight = $this->NbLines($w, $data[$i]) * $lineHeight;

        // Calculate vertical offset to center the text in the cell
        $verticalOffset = ($rowHeight - $textHeight) / 2;

        // Draw the border
        $this->Rect($x, $y, $w, $rowHeight);

        // Move to the vertical offset position for text centering
        $this->SetXY($x, $y + max(0, $verticalOffset));

        // Print the text inside the cell
        $this->MultiCell($w, $lineHeight, $data[$i], 0, $a);

        // Set the position to the right of the cell
        $this->SetXY($x + $w, $y);
    }

    // Move to the next line with the calculated row height
    $this->Ln($rowHeight);
}




	function CheckPageBreak($h)
	{
		// If the height h would cause an overflow, add a new page immediately
		if($this->GetY()+$h>$this->PageBreakTrigger)
			$this->AddPage($this->CurOrientation);
	}

	function NbLines($w, $txt)
	{
		// Compute the number of lines a MultiCell of width w will take
		if(!isset($this->CurrentFont))
			$this->Error('No font has been set');
		$cw = $this->CurrentFont['cw'];
		if($w==0)
			$w = $this->w-$this->rMargin-$this->x;
		$wmax = ($w-2*$this->cMargin)*1000/$this->FontSize;
		$s = str_replace("\r",'',(string)$txt);
		$nb = strlen($s);
		if($nb>0 && $s[$nb-1]=="\n")
			$nb--;
		$sep = -1;
		$i = 0;
		$j = 0;
		$l = 0;
		$nl = 1;
		while($i<$nb)
		{
			$c = $s[$i];
			if($c=="\n")
			{
				$i++;
				$sep = -1;
				$j = $i;
				$l = 0;
				$nl++;
				continue;
			}
			if($c==' ')
				$sep = $i;
			$l += $cw[$c];
			if($l>$wmax)
			{
				if($sep==-1)
				{
					if($i==$j)
						$i++;
				}
				else
					$i = $sep+1;
				$sep = -1;
				$j = $i;
				$l = 0;
				$nl++;
			}
			else
				$i++;
		}
		return $nl;
	}
}
?>
