<?php


// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        // Logo
        $image_file = K_PATH_IMAGES.'logo3.gif';
        if (!$image_file)
        {
            $image= imagecreatefromstring(file_get_contents($image_file));
        }
        $this->Image($image_file, 10, 10, 50, '', 'GIF', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('helvetica', 'BI', 9);
        // Title
        $this->Cell(0, 0, 'Dirección de Operación', 0, false, 'R', 0, '', 0, false, 'M', 'M');
		$this->Ln();
		$this->SetFont('helvetica', 'I', 8);
		$this->Cell(0, 0, 'Subdirección de Distribución', 0, false, 'R', 0, '', 0, false, 'M', 'M');
		$this->Ln();
		$this->SetFont('helvetica', 'I', 8);
		$this->Cell(0, 0, 'División de Distribución Noroeste', 0, false, 'R', 0, '', 0, false, 'M', 'M');
		$this->Ln();
        $this->SetFont('helvetica', 'I', 7);
		$this->Cell(0, 0, 'Departamento de Programación y Confiabilidad de Bienes', 0, false, 'R', 0, '', 0, false, 'M', 'M');
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', '', 8);

		// Texto del footer
		$txt = "Solicitud de Cotización";

		// Imprimir el footer
		$this->MultiCell(0, 10, $txt, 0, 'R', 0, 0, '', '', true);

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
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
//$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$pdf->SetAutoPageBreak(FALSE);


// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}
$GLOBALS['pageOrientation'] = 'P';
// add a page
$pdf->AddPage();

$pdf->Cell(50);

// set font
$pdf->SetFont('helvetica', 'B', 10);

$pdf->Ln(5);

$pdf->Cell(0, 0, 'Número de ICM-137-'.sprintf("%'03d", $numero_oficio[0]["numOficio"]).'/'.$numero_oficio[0]["anio"], 0, false, 'R', 0, '', 0, false, 'M', 'M');
$pdf->Ln();


//CONVERTIR LA FECHA DE ELABORACIÓN Y PRESENTACIÓN A TEXTO
setlocale(LC_ALL,"es_ES.utf8","es_ES","esp");
$fechaElaboracion = $po_general[0]["fechaElaboracion"];
//Fecha en formato dd/mm/aaaa
$fechaElaboracion2 = date("d/m/Y", strtotime($fechaElaboracion));
$dia = strftime("%#d", strtotime($fechaElaboracion));
$mes = strftime("%B", strtotime($fechaElaboracion));
$year = strftime("%Y", strtotime($fechaElaboracion));

$fechaLimite = $po_general[0]["fechaLimitePresentacion"];
$diaLimite = strftime("%#d", strtotime($fechaLimite));
$mesLimite = strftime("%B", strtotime($fechaLimite));
$yearLimite = strftime("%Y", strtotime($fechaLimite));


$pdf->SetFont('helvetica', 'I', 11);
$pdf->Cell(0, 0, "Fecha ".$fechaElaboracion2, 0, false, 'R', 0, '', 0, false, 'M', 'M');

$pdf->Ln(7);
$pdf->SetFont('helvetica', 'I', 11);



$pdf->Cell(0, 0, 'ASUNTO: '.$po_general[0]["asunto"], 0, false, 'C', 0, '', 0, false, 'M', 'M');

$telFijo = "";
if($contactos[0]["telefonoFijo"] != $contactos[0]["telefonoMovil"])
{
    $telFijo = " y ".$contactos[0]["telefonoFijo"];
}

$pdf->Ln(10);

//INFORMACIÓN DEL CONTACTO, RAZÓN SOCIAL DE LA EMPRESA Y CORREO ELECTRÓNICO
$pdf->SetFont('helvetica', 'BI', 11);
$pdf->Cell(0, 0, mb_strtoupper($contactos[0]["razonSocial"], 'utf-8'), 0, false, 'L', 0, '', 0, false, 'M', 'M');
$pdf->Ln();
$pdf->Cell(0, 0, $contactos[0]["nombre"], 0, false, 'L', 0, '', 0, false, 'M', 'M');
$pdf->Ln();
$pdf->Cell(0, 0, $contactos[0]["direccion"], 0, false, 'L', 0, '', 0, false, 'M', 'M');
$pdf->Ln();
$pdf->Cell(0, 0, $contactos[0]["municipio"].", ".$contactos[0]["estado"].", CP ".$contactos[0]["codigoPostal"], 0, false, 'L', 0, '', 0, false, 'M', 'M');
$pdf->Ln();
$pdf->Cell(0, 0, 'Tel: '.$contactos[0]["telefonoMovil"].$telFijo, 0, false, 'L', 0, '', 0, false, 'M', 'M');
$pdf->Ln();
$pdf->Cell(0, 0, $contactos[0]["correoElectronico"], 0, false, 'L', 0, '', 0, false, 'M', 'M');
$pdf->Ln();

$actividad = "";

if($po_general[0]["actividad"] == "A"){
    $actividad = "la adquisición de <b>".$po_general[0]["descripcion"]."</b>";
} else if($po_general[0]["actividad"] == "R"){
    $actividad = "el arrendamiento de <b>".$po_general[0]["descripcion"]."</b>";
} else if($po_general[0]["actividad"] == "S"){
    $actividad = "la adquisición de <b>".$im_general[0]["titulo"]."</b>";
}

$string = trim($po_consideracion[0]["fc2"]);

// TEXTO BASE
$html = '<span style="text-align:justify; line-height: 17px;"><br /><i>Comisión Federal de Electricidad, como Empresa Productiva del Estado <b>(División de Distribución Noroeste)</b>,
    requiere para sus actividades '.$actividad.', mismos que se encuentran reguladas
    por las Disposiciones Generales en materia de adquisiciones, arrendamientos, contratación de servicios y ejecución de obras de la Comisión Federal de Electricidad y
    sus empresas productivas subsidiarias (DIG&#39;s) con el objeto de obtener información que permita contratar bajo las mejores condiciones disponibles para el Estado.
    <br /><br />
    En este sentido, su representada ha sido identificada por este ente público, como un posible proveedor de los bienes a contratar.
    <br /><br />
    Por lo anterior y con el objeto de conocer: a).- la existencia de los bienes a contratar en las condiciones que se indican; b).- posibles proveedores a nivel nacional
    o internacional, y c).- el precio estimado de lo requerido, nos permitimos solicitar su valioso apoyo a efecto de proporcionarnos una cotización para los bienes requeridos,
    mismos que se describen en el <b>Anexo "Especificaciones Técnicas".</b>
    <br /><br />
    <b>Para su cotización deberá considerar los siguientes aspectos:</b>
    
    <ol>
        <li>'.trim($po_consideracion[0]["fc1"]).'</li>
        <li>'.trim($po_consideracion[0]["fc2"]).'</li>
        <li>'.trim($po_consideracion[0]["fc3"]).'</li>
        <li>'.trim($po_consideracion[0]["fc4"]).'</li>
        <li>'.trim($po_consideracion[0]["fc5"]).'</li>
        <li>'.trim($po_consideracion[0]["fc6"]).'</li>
        <li>'.trim($po_consideracion[0]["fc7"]).'</li>
        <li>'.trim($po_consideracion[0]["fc8"]).'</li>
        <li>'.trim($po_consideracion[0]["fc9"]).'</li>
        <li>'.trim($po_consideracion[0]["fc10"]).'</li>
        <li>'.trim($po_consideracion[0]["fc11"]).'</li>
        <li>'.trim($po_consideracion[0]["fc12"]).'</li>
        <li>'.trim($po_consideracion[0]["fc13"]).'</li>
        <li>'.trim($po_consideracion[0]["fc14"]).'</li>
        <li>'.trim($po_consideracion[0]["fc15"]).'</li>
    </ol>     
    </i></span>';

// set core font
$pdf->SetFont('helvetica', '', 11);

// output the HTML content
$pdf->writeHTML($html, true, 0, true, true);
$pdf->lastPage();



$pdf->Output('POG.pdf', 'I');



// reset pointer to the last page
$pdf->lastPage();




//============================================================+
// END OF FILE
//============================================================+





?>