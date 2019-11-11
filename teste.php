<?php
//============================================================+
// File name   : example_006.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 006 for TCPDF class
//               WriteHTML and RTL support
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: WriteHTML and RTL support
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
require_once('_include/class/phppdf/tcpdf_include.php');

// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

	//Page header
	public function Header() {
		// Logo
		//$image_file = 'http://localhost/phppdf/images/demhab.png';
		//$this->Image($image_file, 30, 5, 150, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
		// set color for background


$this->SetFont('helvetica', '', 6);
/*
// set cell margins
$this->setCellMargins(1, 1, 1, 1);

// set color for background
$this->SetFillColor(255, 255, 255);
// Vertical alignment
//$this->MultiCell(65, 20, '[VERTICAL ALIGNMENT - TOP] ', 1, 'J', 1, 0, '', '', true, 0, false, true, 20, 'M');
//$this->MultiCell(50, 20, "$txtcentro", 1, 'L', 1, 0, '', '', true, 0, false, true, 20, 'M');
//$this->MultiCell(65, 10, '[VERTICAL ALIGNMENT - BOTTOM] ', 1, 'J', 1, 1, '', '', true, 0, false, true, 10, 'M');
*/
		// set some text for example
$txtcentro = '
<style>
.textocentro{
	text-align: center;
}
.textomeio{
    vertical-align: middle;
}
span.maior{
	font
}

.textobemnomeio
{
    text-align:center; 
    vertical-align:middle;
}
</style>
<table border="1">
<tr><td></td><td>Rua Guilherme Schimitz, 104<br>
Parque Olinda - CEP 94065-200 - Gravataí/RS<br>
Fone: (51) 3600-7783<br>
adm.demhab@gravatai.rs.gov.br<br>
www.gravatai.rs.gov.br
</td><td class="textobemnomeio">DEMHAB<BR>Departamento Municipal de Habitação</td></tr></table>
';
$this->writeHTML($txtcentro, true, false, true, false, '');

	}

	// Page footer
	public function Footer() {
		// Position at 15 mm from bottom
		$this->SetY(-10);
		// Set font
		$this->SetFont('helvetica', 'I', 6);
		// Page number
		$this->Cell(0, 5, 'Gerado automaticamente pelo Portal DEMHAB', 0, 1, 'C', 0, '', 0, false, 'T', 'M');
		$this->SetFont('helvetica', '', 6);
		$this->Cell(0, 0, 'Código de identificação: A4I1O0Q - '.$_GET["id"], 0, false, 'C', 0, '', 0, false, 'T', 'M');

	}
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Portal DEMHAB');
$pdf->SetTitle('REQUERIMENTO');
//$pdf->SetSubject('TCPDF Tutorial');
//$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists('/lang/bra.php')) {
	require_once('/lang/bra.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', '', 11);

// add a page
$pdf->AddPage();

// create some HTML content
$id = isset($_GET["id"]) ? $_GET["id"] : "0000";
$teste = file_get_contents($id .".txt");
//$teste = htmlentities($teste);

$html = "
<br>
$teste
";

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');


$js = 'print(true);';
$js = 'window.print();';


// set javascript
if($_SERVER['SERVER_NAME'] == "www.demhab") {
    $pdf->IncludeJS($js);
}



// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_006.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
