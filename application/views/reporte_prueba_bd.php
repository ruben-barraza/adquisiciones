<?php


/*


// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        // Logo
        $image_file = K_PATH_IMAGES.'logo2.gif';
        if (!$image_file)
        {
            $image= imagecreatefromstring(file_get_contents($image_file));
        }
        $this->Image($image_file, 10, 10, 50, '', 'GIF', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('helvetica', 'BI', 9);
        // Title
        $this->Cell(0, 0, 'Subgerencia de Ingeniería de Distribución', 0, false, 'R', 0, '', 0, false, 'M', 'M');
		$this->Ln();
		$this->SetFont('helvetica', 'BI', 9);
		$this->Cell(0, 0, 'Departamento de Programación y', 0, false, 'R', 0, '', 0, false, 'M', 'M');
		$this->Ln();
		$this->SetFont('helvetica', 'BI', 9);
		$this->Cell(0, 0, 'Confiabilidad de Bienes', 0, false, 'R', 0, '', 0, false, 'M', 'M');
		$this->Ln();
        $this->SetFont('helvetica', 'I', 8);
		$this->Cell(0, 0, 'Oficinas Divisionales', 0, false, 'R', 0, '', 0, false, 'M', 'M');
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


















//Clase para Landscape
class MYPDF_L extends TCPDF {
    //Page header
    public function Header() {
        // Logo
        $image_file = K_PATH_IMAGES.'logo2.gif';
        if (!$image_file)
        {
            $image= imagecreatefromstring(file_get_contents($image_file));
        }
        //$this->SetY(15);
        $this->Image($image_file, 10, 12, 50, '', 'GIF', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('helvetica', 'B', 10);
        // Title
        $this->SetY(15);
        $this->Cell(0, 0, 'INVESTIGACIÓN DE MERCADO', 0, false, 'C', 0, '', 0, false, 'M', 'M');
        $this->SetFont('helvetica', 'B', 9);
        $this->Cell(0, 0, 'División de Distribución Noroeste', 0, false, 'R', 0, '', 0, false, 'M', 'M');
		$this->Ln();
		$this->Cell(0, 0, 'Subgerencia de Distribución', 0, false, 'R', 0, '', 0, false, 'M', 'M');
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
    }
}


$tmp = ini_get('upload_tmp_dir');
//$archivos = array();

// ---------------------------------------------------------
//El siguiente ciclo for creará las copias necesarias para los contactos
// a quienes se les enviará la POG.


// create new PDF document
$pdf = new MYPDF_L(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);



// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetTitle('IM '.$po_general[0]["clave"]);
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

//CONVERTIR LA FECHA DE ELABORACIÓN Y PRESENTACIÓN A TEXTO
    setlocale(LC_ALL,"es_ES.utf8","es_ES","esp");
    $fechaElaboracion = $po_general[0]["fechaElaboracion"];
    $dia = strftime("%#d", strtotime($fechaElaboracion));
    $mes = strftime("%B", strtotime($fechaElaboracion));
    $year = strftime("%Y", strtotime($fechaElaboracion));

// add a page
$pdf->AddPage('L');

// set font
$pdf->SetFont('helvetica', 'B', 9);
$pdf->Cell(0, 0, $im_general[0]["titulo"], 0, false, 'C', 0, '', 0, false, 'M', 'M');
$pdf->Ln();
$pdf->SetFont('helvetica', 'B', 8);
$pdf->Cell(0, 0, "PETICIÓN DE OFERTAS DE BIENES", 0, false, 'C', 0, '', 0, false, 'M', 'M');
$pdf->Ln();
$pdf->SetFont('helvetica', '', 8);
$pdf->Cell(0, 0, $po_general[0]["municipio"].', '.$po_general[0]["estado"].', '.$dia.' de '.ucfirst($mes).' del '.$year, 0, false, 'R', 0, '', 0, false, 'M', 'M');


$pdf->Ln(10);

//Número de renglones que tendrá la tabla IM CONCEPTO
$tableRows = count($im_concepto);

$html = '
    <table border="1" cellspacing="0" cellpadding="2">
        <thead>
            <tr style="background-color:#D3D3D3;">
                <th align="center" valign="middle" width="45"><b>Partida</b></th>
                <th align="center" valign="middle" width="60"><b>Código</b></th>
                <th align="center" valign="middle"><b>Descripción</b></th>
                <th align="center" valign="middle" width="350"><b>Descripción detallada</b></th>
                <th align="center" valign="middle"><b>Especificación</b></th>
                <th align="center" valign="middle" width="70"><b>Plazo de entrega (días)</b></th>
                <th align="center" valign="middle" width="30"><b>Cant</b></th>
                <th align="center" valign="middle" width="30"><b>UM</b></th>
                <th align="center" valign="middle"><b>Lugar de entrega</b></th>
                <th align="center" valign="middle"><b>Dirección</b></th>
            </tr>
        </thead>
        <tbody>';
            for($i = 0; $i < $tableRows; $i++)
            {
                $html .= '<tr>';
                $html .= '<td align="center" width="45">'.$im_concepto[$i]["partida"].'</td>';
                $html .= '<td align="center" width="60">'.$im_concepto[$i]["codigo"].'</td>';
                $html .= '<td align="center">'.mb_strtoupper($im_concepto[$i]["descripcion"], 'utf-8').'</td>';
                $html .= '<td align="center" width="350">'.mb_strtoupper($im_concepto[$i]["descripcionDetallada"], 'utf-8').'</td>';
                $html .= '<td align="center">'.mb_strtoupper($im_concepto[$i]["especificacion"], 'utf-8').'</td>';
                $html .= '<td align="center" width="70">'.$im_concepto[$i]["plazoEntrega"].'</td>';
                $html .= '<td align="center" width="30">'.$im_concepto[$i]["cantidad"].'</td>';
                $html .= '<td align="center" width="30">'.mb_strtoupper($im_concepto[$i]["clave"], 'utf-8').'</td>';
                $html .= '<td align="center">'.mb_strtoupper($im_concepto[$i]["lugarEntrega"], 'utf-8').'</td>';
                $html .= '<td align="center">'.$im_concepto[$i]["direccionEntrega"].'</td>';
                $html .= '</tr>';
            }
$html .= '</tbody>';
$html .= '</table>';

// set core font
$pdf->SetFont('helvetica', '', 7);

// output the HTML content
$pdf->writeHTML($html,  true, false, false, false, '');

$pdf->Ln(5);

$pdf->SetFont('helvetica', 'B', 9);
$pdf->Cell(50);
$pdf->Cell(150, 0, 'ELABORÓ', 0, false, 'L', 0, '', 0, false, 'M', 'M');
$pdf->Cell(0, 0, 'APROBÓ', 0, false, 'L', 0, '', 0, false, 'M', 'M');
$pdf->Ln(20);
$pdf->Cell(30);
$pdf->Cell(150, 0, $im_elabora[0]["titulo"].'. '.$im_elabora[0]["nombre"].' '.$im_elabora[0]["apellidoPaterno"].' '.$im_elabora[0]["apellidoMaterno"], 0, false, 'L', 0, '', 0, false, 'M', 'M');
$pdf->Cell(150, 0, $im_aprueba[0]["titulo"].'. '.$im_aprueba[0]["nombre"].' '.$im_aprueba[0]["apellidoPaterno"].' '.$im_aprueba[0]["apellidoMaterno"], 0, false, 'L', 0, '', 0, false, 'M', 'M');




$pdf->Output($tmp.'/POG.pdf', 'I');
//array_push($archivos, $tmp.'/POG - '.$i.'.pdf');



// reset pointer to the last page
$pdf->lastPage();




//============================================================+
// END OF FILE
//============================================================+

*/



$rows = count($imConcepto);
var_dump($imConcepto);

echo "Número de provedoores : ".$rows;




?>