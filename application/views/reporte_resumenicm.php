<?php


// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {


    //Page header
    public function Header() {

        $image_file = K_PATH_IMAGES.'logo3.gif';
        if (!$image_file)
        {
            $image = imagecreatefromstring(file_get_contents($image_file));
        }

        //$this->SetY(15);
        $this->Image($image_file, 10, 12, 50, '', 'GIF', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('helvetica', 'B', 9);
        // Title
        $this->SetY(15);
        $this->Cell(0, 0, 'FORMATO DE CUADRO RESUMEN ICM', 0, false, 'C', 0, '', 0, false, 'M', 'M');
        $this->SetFont('helvetica', '', 9);
        $this->Cell(0, 0, 'INVESTIGACIÓN DE CONDICIONES DE MERCADO', 0, false, 'R', 0, '', 0, false, 'M', 'M');
        $this->Ln();
        $this->Ln();
        $this->Cell(0, 0, 'DIVISIÓN DE DISTRIBUCIÓN NOROESTE', 0, false, 'C', 0, '', 0, false, 'M', 'M');
        //$this->Ln();
        //$this->SetFont('helvetica', '', 6);
        //$this->Cell(200);
        //$this->Cell(0, 0, 'Fecha: '.$dia.'/'.ucfirst($mes).'/'.$year, 0, false, 'L', 0, '', 0, false, 'M', 'M');


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
$pdf->SetTitle('RESUMEN ICM');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, 40, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
//$pdf->SetAutoPageBreak(TRUE);


// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

//CONVERTIR LA FECHA DE ELABORACIÓN Y PRESENTACIÓN A TEXTO
setlocale(LC_ALL,"es_ES.utf8","es_ES","esp");
$fechaElaboracion = date('Y-m-d');

$dia = strftime("%#d", strtotime($fechaElaboracion));
$mes = strtoupper(strftime("%B", strtotime($fechaElaboracion)));
$year = strftime("%Y", strtotime($fechaElaboracion));

$familia = $imc_header[0]["descripcion"];

$pdf->AddPage('L');

$tbl_header = <<<EOD
    <table border="1" width="200" cellpadding="3">
        <tr>
            <td>Fecha: {$dia}/{$mes}/{$year}</td>
        </tr>
        <tr>
            <td>Nombre del área: Subgcia de Operación y Mantenimiento</td>
        </tr>
        <tr>
            <td>Nombre de ICM: {$familia}</td>
        </tr>
    </table>
EOD;
$pdf->SetFont('helvetica', '', 6);
$pdf->Cell('210');
$pdf->writeHTML($tbl_header, true, false, false, false, '');

$tbl = <<<EOD
<table border="1" cellspacing="0" cellpadding="3">
    <thead>
        <tr style="background-color:#D3D3D3;">
            <th rowspan="2" align="center" width="120"><b><br/>Fuente<br/>(Nombre)</b></th>
            <th rowspan="2" align="center" width="160"><b><br/>Descripción</b></th>
            <th rowspan="2" align="center" width="60"><b><br/>Cantidad</b></th>
            <th rowspan="2" align="center" width="60"><b><br/>Número de<br/>Partida</b></th>
            <th colspan="4" align="center" width="274"><b>Condiciones Comerciales</b></th>
            <th rowspan="2" align="center" width="100"><b><br/>Condiciones Técnicas</b></th>
            <th rowspan="2" align="center"><b><br/>Precio Unitario</b></th>
            <th rowspan="2" align="center"><b><br/>Precio Total</b></th>
        </tr>
        <tr style="background-color:#D3D3D3;">
            <th align="center" width="50"><b>Plazo de Entrega</b></th>
            <th align="center" width="124"><b>Lugar de Entrega</b></th>
            <th align="center" width="50"><b>Moneda</b></th>
            <th align="center" width="54"><b>Vigencia Cotización</b></th>
        </tr>
    </thead>
    <tbody>
        {$tbody}
    </tbody>
</table>
EOD;

// set core font
$pdf->SetFont('helvetica', '', 7);
$pdf->writeHTML($tbl, true, false, false, false, '');

$pdf->Ln();
$pdf->Ln();
$pdf->Ln();

//Tabla sin bordes donde va el nombre de la persona que autoriza
$emp_aprueba = "";

if($im_aprueba[0]["titulo"] == ""){
    $emp_aprueba = mb_strtoupper($im_aprueba[0]["nombre"], 'utf-8').' '.mb_strtoupper($im_aprueba[0]["apellidoPaterno"], 'utf-8').' '.mb_strtoupper($im_aprueba[0]["apellidoMaterno"], 'utf-8');
} else {
    $emp_aprueba = mb_strtoupper($im_aprueba[0]["titulo"], 'utf-8').'. '.mb_strtoupper($im_aprueba[0]["nombre"], 'utf-8').' '.mb_strtoupper($im_aprueba[0]["apellidoPaterno"], 'utf-8').' '.mb_strtoupper($im_aprueba[0]["apellidoMaterno"], 'utf-8');
}

$tbl_name = <<<EOD
<table border="0" nobr="true">
    <tr align="center">
        <td>AUTORIZÓ</td>
    </tr>
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr align="center">
        <td>{$emp_aprueba}</td>
    </tr>
</table>
EOD;

$pdf->SetFont('helvetica', 'B', 9);
$pdf->writeHTML($tbl_name, true, false, false, false, '');

$pdf->Output('RESUMEN ICM.pdf', 'I');