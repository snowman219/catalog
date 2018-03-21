<?php
	
	require('../vendor/setasign/fpdf/fpdf.php');		
	
	class requestPDF extends FPDF
	{
		var $widths;
		var $aligns;

		function SetWidths($w)
		{
			//Set the array of column widths
			$this->widths=$w;
		}

		function SetAligns($a)
		{
			//Set the array of column alignments
			$this->aligns=$a;
		}

		function Row($data)
		{
			//Calculate the height of the row
			$nb=0;
			for($i=0;$i<count($data);$i++)
				$nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
			$h=5*$nb;
			//Issue a page break first if needed
			$this->CheckPageBreak($h);
			//Draw the cells of the row
			for($i=0;$i<count($data);$i++)
			{
				$w=$this->widths[$i];
				$a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'C';
				//Save the current position
				$x=$this->GetX();
				$y=$this->GetY();
				//Draw the border
				//$this->Rect($x,$y,$w,$h);
				//Print the text
				$this->MultiCell($w,5,$data[$i],0,$a);
				//Put the position to the right of the cell
				$this->SetXY($x+$w,$y);
			}
			//Go to the next line
			$this->Ln($h);
		}

		function CheckPageBreak($h)
		{
			//If the height h would cause an overflow, add a new page immediately
			if($this->GetY()+$h>$this->PageBreakTrigger)
				$this->AddPage($this->CurOrientation);
		}

		function NbLines($w,$txt)
		{
			//Computes the number of lines a MultiCell of width w will take
			$cw=&$this->CurrentFont['cw'];
			if($w==0)
				$w=$this->w-$this->rMargin-$this->x;
			$wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
			$s=str_replace("\r",'',$txt);
			$nb=strlen($s);
			if($nb>0 and $s[$nb-1]=="\n")
				$nb--;
			$sep=-1;
			$i=0;
			$j=0;
			$l=0;
			$nl=1;
			while($i<$nb)
			{
				$c=$s[$i];
				if($c=="\n")
				{
					$i++;
					$sep=-1;
					$j=$i;
					$l=0;
					$nl++;
					continue;
				}
				if($c==' ')
					$sep=$i;
				$l+=$cw[$c];
				if($l>$wmax)
				{
					if($sep==-1)
					{
						if($i==$j)
							$i++;
					}
					else
						$i=$sep+1;
					$sep=-1;
					$j=$i;
					$l=0;
					$nl++;
				}
				else
					$i++;
			}
			return $nl;
		}
	}	

	$pdf=new requestPDF();
	$pdf->AddPage();
	
	// Header
	$pdf->SetFont('Arial', 'B', 18);
	$pdf->Cell(190, 5, 'AddonNetworks Quote Request', 0, 0, 'C');
	$pdf->Ln();
	$pdf->SetFont('Times', '', 12);
	$pdf->Cell(190, 10, $quoteNumber, 0, 0, 'C');
	$pdf->Ln(10);
	
	// Body 
	$pdf->SetFont('Times', 'B', 13);
	$pdf->Cell(276, 5, 'Requested Ship To Address:', 0, 0, 'L');
	$pdf->Ln();
		
	$pdf->SetFont('Times', '', 12);
	$pdf->Cell(276, 10, $company, 0, 0, 'L');
	$pdf->Ln(8);
	
	$pdf->SetFont('Times', '', 12);
	$pdf->Cell(276, 10, $address1, 0, 0, 'L');
	$pdf->Ln(8);
	
	if ( $address2 != '' ){
		$pdf->SetFont('Times', '', 12);
		$pdf->Cell(276, 10, $address2, 0, 0, 'L');
		$pdf->Ln(8);
	}
	
	if ( $address3 != '' ){
		$pdf->SetFont('Times', '', 12);
		$pdf->Cell(276, 10, $address3, 0, 0, 'L');
		$pdf->Ln();
	}	
	
	$pdf->SetFont('Times', 'B', 13);
	$pdf->Cell(276, 5, 'Phone:', 0, 0, 'L');
	$pdf->Ln();
	
	$pdf->SetFont('Times', '', 12);
	$pdf->Cell(276, 10, $phone, 0, 0, 'L');
	$pdf->Ln();
	
	$pdf->SetFont('Times', 'B', 13);
	$pdf->Cell(276, 5, 'Email:', 0, 0, 'L');
	$pdf->Ln();
	
	$pdf->SetFont('Times', '', 12);
	$pdf->Cell(276, 10, $customerEmail, 0, 0, 'L');
	$pdf->Ln();
	
	$pdf->SetFont('Times', 'B', 13);
	$pdf->Cell(276, 5, 'Purchase Order Number:', 0, 0, 'L');
	$pdf->Ln();
	
	$pdf->SetFont('Times', '', 12);
	$pdf->Cell(276, 10, $ponumber, 0, 0, 'L');
	$pdf->Ln();
	
	$pdf->SetFont('Times', 'B', 13);
	$pdf->Cell(276, 5, 'Comments:', 0, 0, 'L');
	$pdf->Ln();
	
	$pdf->SetFont('Times', '', 12);
	$pdf->Cell(276, 10, $comments, 0, 0, 'L');
	$pdf->Ln();	
	
	// Table header
	$pdf->SetFont('Times', 'B', 13);
	$pdf->Cell(50, 10, 'Item', 0, 0, 'L');
	$pdf->Cell(20, 10, 'SKU', 0, 0, 'C');
	$pdf->Cell(60, 10, 'Description', 0, 0, 'C');
	$pdf->Cell(20, 10, 'Quantity', 0, 0, 'C');
	$pdf->Cell(20, 10, 'Price', 0, 0, 'C');
	$pdf->Cell(20, 10, 'Ext.Price', 0, 0, 'C');
	$pdf->Ln();	
	
	// Table body
	$pdf->SetFont('Times', '', 12);
	$pdf->SetWidths(array(50, 20, 60, 20, 20, 20));	
		
	for ( $i = 0; $i < $cartCounts; $i ++ ){
		$extPrice = $cartArray[$i * 5 + 3] * $cartArray[$i * 5 + 4];	
		
		$pdf->Row(array($cartArray[$i * 5], $cartArray[$i * 5 + 1], $cartArray[$i * 5 + 2], $cartArray[$i * 5 + 3], $cartArray[$i * 5 + 4], $extPrice));
	}
	
	// Table footer	
	$pdf->SetFont('Times', 'B', 13);
	$pdf->Cell(50, 10, '', 0, 0, 'L');
	$pdf->Cell(20, 10, '', 0, 0, 'C');
	$pdf->Cell(60, 10, '', 0, 0, 'C');
	$pdf->Cell(20, 10, 'Total', 0, 0, 'C');
	$pdf->Cell(20, 10, '', 0, 0, 'C');
	$pdf->Cell(20, 10, $totalPrice, 0, 0, 'C');	
	$pdf->Output("F",'AddOnRequest'.$quoteNumber.'.pdf');
	
?>