<?php
//============================================================+
// File name   : example_003.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 003 for TCPDF class
//               Custom Header and Footer
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+




// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        // Logo
        $image_file = K_PATH_IMAGES.'logo.jpg';
        $this->Image($image_file, 10, 10, 50, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('helvetica', 'BI', 10);
        // Title
        $this->Cell(0, 0, 'Dirección de Operación', 0, false, 'R', 0, '', 0, false, 'M', 'M');
		$this->Ln();
		$this->SetFont('helvetica', 'I', 9);
		$this->Cell(0, 0, 'Subdirección de Distribución', 0, false, 'R', 0, '', 0, false, 'M', 'M');
		$this->Ln();
		$this->SetFont('helvetica', 'I', 8);
		$this->Cell(0, 0, 'División de Distribución Noroeste', 0, false, 'R', 0, '', 0, false, 'M', 'M');
		$this->Ln();
		$this->Cell(0, 0, 'Departamento de Programación y Confiabilidad de Bienes', 0, false, 'R', 0, '', 0, false, 'M', 'M');
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);

		// Texto del footer
		$txt = "Benito Juárez y San Luis Potosí C.P. 83000 Col. Centro, Hermosillo, Sonora\nTel. 662-259-11-71";

		// Imprimir el footer
		$this->MultiCell(0, 10, $txt, 0, 'C', 0, 0, '', '', true);

    }
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetTitle('Petición Oferta');
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
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// add a page
$pdf->AddPage();
$pdf->Cell(50);

// set font
$pdf->SetFont('helvetica', 'B', 10);

$pdf->Ln(13);
$pdf->Cell(110);

$pdf->Cell(0, 0, 'Oficio No.', 0, false, 'L', 0, '', 0, false, 'M', 'M');
$pdf->Ln();

$pdf->SetFont('helvetica', '', 10);
$pdf->Cell(110);
$pdf->Cell(0, 0, 'Hermosillo, Sonora', 0, false, 'L', 0, '', 0, false, 'M', 'M');
$pdf->Ln();

$pdf->SetFont('helvetica', 'B', 10);
$pdf->Cell(110);
$pdf->Cell(14, 0, 'Asunto: ', 0, false, 'L', 0, '', 0, false, 'M', 'M');
$pdf->SetFont('helvetica', '', 10);
$pdf->Cell(0, 0, 'Petición de Ofertas de Bienes', 0, false, 'L', 0, '', 0, false, 'M', 'M');
$pdf->Ln(7);

//INFORMACIÓN DEL CONTACTO, RAZÓN SOCIAL DE LA EMPRESA Y CORREO ELECTRÓNICO
$pdf->SetFont('helvetica', 'B', 10);
$pdf->Cell(0, 0, 'NOMBRE DEL CONTACTO', 0, false, 'L', 0, '', 0, false, 'M', 'M');
$pdf->Ln();
$pdf->Cell(0, 0, 'RAZÓN SOCIAL DE LA EMPRESA', 0, false, 'L', 0, '', 0, false, 'M', 'M');
$pdf->Ln();
$pdf->Cell(0, 0, 'Correo electrónico: ', 0, false, 'L', 0, '', 0, false, 'M', 'M');
$pdf->Ln();


// set some text to print
$txt = <<<EOD
Oficio No.

Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.
EOD;

// print a block of text using Write()
//$pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_003.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+

?>

