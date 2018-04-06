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

        $image_file = K_PATH_IMAGES.'logo4.gif';
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
        // Position at 15 mm from bottom
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
$pdf->SetAutoPageBreak(TRUE);


// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

//NUMERO DE PÁGINAS QUE SE VAN A GENERAR
$num_pags = count($prov_split);

for($i = 0; $i < $num_pags; $i++){
    // add a page
    $pdf->AddPage('L');

    // set margins
    //$pdf->SetMargins(PDF_MARGIN_LEFT, 100, PDF_MARGIN_RIGHT);
    //$pdf->SetFont('helvetica', '', 7);

    //$pdf->Cell(0, 0, $imc_header[0]["descripcion"], 0, false, 'C', 0, '', 0, false, 'M', 'M');

    $html = '
        <table border="1" cellspacing="0" cellpadding="3">
            <thead>
                <tr style="background-color:#D3D3D3;" nobr="true">
                    <th align="center" valign="middle" width="34"><b> Partida</b></th>
                    <th align="center" valign="middle" width="40"><b> Código</b></th>
                    <th align="center" valign="middle" width="100"><b> Descripción</b></th>
                    <th align="center" valign="middle" width="40"><b> CANT</b></th>
                    <th align="center" valign="middle" width="20"><b> UM</b></th>
                    <th align="center" valign="middle" width="80"><b> Familia</b></th>'.$arr_th[$i].'
                    <th align="center" valign="middle" width="88"><b> PMC</b></th>
                    <th align="center" valign="middle" width="88"><b> IMPORTE</b></th>
                </tr>
            </thead>
            <tbody>';

    $tableRows = count($imc_data);

    for($j = 0; $j < $tableRows; $j++)
    {
        $importe = $imc_data[$j]['pmc'] * $imc_data[$j]['cantidad'];

        $html .= '<tr nobr="true">';
        $html .= '<td align="center" width="34">'.$imc_data[$j]['partida'].'</td>';
        $html .= '<td align="center" width="40">'.$imc_data[$j]['codigo'].'</td>';
        $html .= '<td align="center" width="100">'.$imc_data[$j]['descripcion'].'</td>';
        $html .= '<td align="center" width="40">'.$imc_data[$j]['cantidad'].'</td>';
        $html .= '<td align="center" width="20">'.$imc_data[$j]['clave'].'</td>';
        $html .= '<td align="center" width="80">'.$imc_data[$j]['familia'].'</td>' . $arr_td[$i][$j];
        $html .= '<td align="right" width="88"> $ '.number_format($imc_data[$j]['pmc'], '2', '.', ',').'</td>';
        $html .= '<td align="right" width="88"> $ '.number_format($importe, '2', '.', ',').'</td>';
        $html .= '</tr>';
    }
    $html .= '</tbody>';
    $html .= '</table>';

    // set core font
    $pdf->SetFont('helvetica', '', 6);

    // output the HTML content
    $pdf->writeHTML($html,  true, false, false, false, '');

    if($i == $num_pags - 1){

        if($tableRows > 12){
            $pdf->AddPage('L');

        }
        $pdf->Ln(25);

        $pdf->SetFont('helvetica', 'B', 9);
        $pdf->Cell(50);
        $pdf->Cell(150, 0, 'ELABORÓ', 0, false, 'L', 0, '', 0, false, 'M', 'M');
        $pdf->Cell(0, 0, 'APROBÓ', 0, false, 'L', 0, '', 0, false, 'M', 'M');
        $pdf->Ln(30);
        $pdf->Cell(30);

        $emp_elabora = "";
        $emp_aprueba = "";

        //Nombre del empleado
        if($im_elabora[0]["titulo"] == ""){
            $emp_elabora = mb_strtoupper($im_elabora[0]["nombre"], 'utf-8').' '.mb_strtoupper($im_elabora[0]["apellidoPaterno"], 'utf-8').' '.mb_strtoupper($im_elabora[0]["apellidoMaterno"], 'utf-8');
        } else {
            $emp_elabora = mb_strtoupper($im_elabora[0]["titulo"], 'utf-8').'. '.mb_strtoupper($im_elabora[0]["nombre"], 'utf-8').' '.mb_strtoupper($im_elabora[0]["apellidoPaterno"], 'utf-8').' '.mb_strtoupper($im_elabora[0]["apellidoMaterno"], 'utf-8');
        }

        if($im_aprueba[0]["titulo"] == ""){
            $emp_aprueba = mb_strtoupper($im_aprueba[0]["nombre"], 'utf-8').' '.mb_strtoupper($im_aprueba[0]["apellidoPaterno"], 'utf-8').' '.mb_strtoupper($im_aprueba[0]["apellidoMaterno"], 'utf-8');
        } else {
            $emp_aprueba = mb_strtoupper($im_aprueba[0]["titulo"], 'utf-8').'. '.mb_strtoupper($im_aprueba[0]["nombre"], 'utf-8').' '.mb_strtoupper($im_aprueba[0]["apellidoPaterno"], 'utf-8').' '.mb_strtoupper($im_aprueba[0]["apellidoMaterno"], 'utf-8');
        }
        $pdf->Cell(145, 0, $emp_elabora, 0, false, 'L', 0, '', 0, false, 'M', 'M');
        $pdf->Cell(0, 0, $emp_aprueba, 0, false, 'L', 0, '', 0, false, 'M', 'M');

    }
    /*

    $pdf->Ln(30);

    $pdf->SetFont('helvetica', 'B', 9);
    $pdf->Cell(50);
    $pdf->Cell(150, 0, 'ELABORÓ', 0, false, 'L', 0, '', 0, false, 'M', 'M');
    $pdf->Cell(0, 0, 'APROBÓ', 0, false, 'L', 0, '', 0, false, 'M', 'M');
    $pdf->Ln(20);
    $pdf->Cell(30);

    $emp_elabora = "";
    $emp_aprueba = "";

    //Nombre del empleado
    if($im_elabora[0]["titulo"] == ""){
        $emp_elabora = mb_strtoupper($im_elabora[0]["nombre"], 'utf-8').' '.mb_strtoupper($im_elabora[0]["apellidoPaterno"], 'utf-8').' '.mb_strtoupper($im_elabora[0]["apellidoMaterno"], 'utf-8');
    } else {
        $emp_elabora = mb_strtoupper($im_elabora[0]["titulo"], 'utf-8').'. '.mb_strtoupper($im_elabora[0]["nombre"], 'utf-8').' '.mb_strtoupper($im_elabora[0]["apellidoPaterno"], 'utf-8').' '.mb_strtoupper($im_elabora[0]["apellidoMaterno"], 'utf-8');
    }

    if($im_aprueba[0]["titulo"] == ""){
        $emp_aprueba = mb_strtoupper($im_aprueba[0]["nombre"], 'utf-8').' '.mb_strtoupper($im_aprueba[0]["apellidoPaterno"], 'utf-8').' '.mb_strtoupper($im_aprueba[0]["apellidoMaterno"], 'utf-8');
    } else {
        $emp_aprueba = mb_strtoupper($im_aprueba[0]["titulo"], 'utf-8').'. '.mb_strtoupper($im_aprueba[0]["nombre"], 'utf-8').' '.mb_strtoupper($im_aprueba[0]["apellidoPaterno"], 'utf-8').' '.mb_strtoupper($im_aprueba[0]["apellidoMaterno"], 'utf-8');
    }
    $pdf->Cell(145, 0, $emp_elabora, 0, false, 'L', 0, '', 0, false, 'M', 'M');
    $pdf->Cell(0, 0, $emp_aprueba, 0, false, 'L', 0, '', 0, false, 'M', 'M');

    */




// reset pointer to the last page
    $pdf->lastPage();

}

$pdf->Output('Reporte IMC.pdf', 'I');








//============================================================+
// END OF FILE
//============================================================+





?>