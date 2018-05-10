<?php

global $familia, $solped;
$familia = $imc_header[0]["descripcion"];
$solped = $imc_header[0]["SOLPED"];

// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        global $familia, $solped;

        //CONVERTIR LA FECHA DE ELABORACIÓN Y PRESENTACIÓN A TEXTO
        setlocale(LC_ALL,"es_ES.utf8","es_ES","esp");
        $fechaElaboracion = date('Y-m-d');

        $dia = strftime("%#d", strtotime($fechaElaboracion));
        $mes = strftime("%B", strtotime($fechaElaboracion));
        $year = strftime("%Y", strtotime($fechaElaboracion));

        $image_file = K_PATH_IMAGES.'logo3.gif';
        if (!$image_file)
        {
            $image= imagecreatefromstring(file_get_contents($image_file));
        }
        //$this->SetY(15);
        $this->Image($image_file, 10, 12, 50, '', 'GIF', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('helvetica', 'B', 9);
        // Title
        $this->SetY(15);
        $this->Cell(0, 0, 'INVESTIGACIÓN DE CONDICIONES DE MERCADO', 0, false, 'C', 0, '', 0, false, 'M', 'M');
        $this->SetFont('helvetica', 'B', 8);
        $this->Cell(0, 0, 'División de Distribución Noroeste', 0, false, 'R', 0, '', 0, false, 'M', 'M');
        $this->Ln();
        $this->Cell(0, 0, 'Subgerencia de Distribución', 0, false, 'R', 0, '', 0, false, 'M', 'M');
        $this->Ln();
        $this->Cell(0, 0, $familia, 0, false, 'C', 0, '', 0, false, 'M', 'M');
        $this->Ln();
        $this->Ln();
        $this->SetFont('helvetica', '', 7);
        $this->Cell(0, 0, 'PETICIÓN DE OFERTAS DE BIENES', 0, false, 'C', 0, '', 0, false, 'M', 'M');
        $this->Ln(12);
        $this->SetFont('helvetica', 'B', 7);
        $this->Cell(0, 0, 'SOLPED: '.$solped, 0, false, 'L', 0, '', 0, false, 'M', 'M');
        $this->Cell(0, 0, 'Hermosillo, Sonora a '.$dia.' de '.ucfirst($mes).' del '.$year, 0, false, 'R', 0, '', 0, false, 'M', 'M');

    }

    // Page footer
    public function Footer() {
        // Position autorizacion 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Página '.$this->getAliasNumPage().' de '.$this->getAliasNbPages(), 0, false, 'R', 0, '', 0, false, 'T', 'M');
    }


}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetTitle('Petición Oferta');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, 45, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
//$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}



$pdf->Output('Reporte IMC.pdf', 'I');








//============================================================+
// END OF FILE
//============================================================+





?>