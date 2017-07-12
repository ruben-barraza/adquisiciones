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


// TEXTO BASE
$html = '<span style="text-align:justify; line-height: 16px;"><br />Comisión Federal de Electricidad, como entidad del Gobierno Federal, requiere para sus actividades de suministro,
arrendamiento y/o prestación de servicios, mismas que se encuentran reguladas por la Ley de Adquisiciones, Arrendamientos y Servicios del Sector Público (LAASSP)
y su Reglamento, obtener información para contratar bajo las mejores condiciones disponibles para el Estado.
<br /><br />
En este sentido y en términos de lo previsto en el artículo 2 fracción X de la LAASSP, su representada ha sido identificada por este ente público, como un 
posible prestador de servicio y/o proveedor.
<br /><br /><br />
Por lo antes mencionado y con el objeto de conocer:
<br />
a).- la existencia bienes, arrendamientos o servicios a requerir en las condiciones que se indican;
<br />
b).- posibles proveedores a nivel nacional o internacional, y
<br />
c).- el precio estimado de lo requerido.
<br /><br /><br />
Nos permitimos solicitar su valioso apoyo a efecto de proporcionarnos una cotización de los bienes descritos en el documento anexo.
<br /><br />
Dicha cotización se requiere que la remita en documento de la empresa, debidamente firmada por persona facultada, a la siguiente dirección: <b>DIRECCION</b> y que sea dirigida a 
nombre de <b>TITULO + NOMBRE DE EMPLEADO + CATEGORÍA + DEPARTAMENTO</b>
<br /><br /><br />
Mucho agradeceré que en su respuesta se incluya: Lugar y fecha de cotización y vigencia de la misma.
<br /><br /><br />
Para el case de dudas, comentarios y/o aclaraciones, remitirlas a los correo: <b>EMAIL EMPLEADO 1</b> y <b>EMAIL EMPLEADO 2</b>
<br /><br /><br />
La fecha límite para presentar la cotización es el: <b>FECHA Y HORA LÍMITE</b>.
<br /><br /><br />
Favor de enviar acuse de recibo de esta solicitud al correo electrónico a: <b>EMAIL EMPLEADO 1</b> y <b>EMAIL EMPLEADO 2</b>
</span>';

// set core font
$pdf->SetFont('helvetica', '', 10);

// output the HTML content
$pdf->writeHTML($html, true, 0, true, true);

// reset pointer to the last page
$pdf->lastPage();

// print a block of text using Write()
//$pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);

// ---------------------------------------------------------
//SEGUNDA PÁGINA DEL PO GENERAL
// add a page
$pdf->AddPage();
$pdf->Ln(10);

$html = '<span style="text-align:justify; line-height: 16px;"><b><u>NOTA</b></u>: Vencido el plazo de la recepción de cotizaciones, (nombre de la dependencia o entidad) con 
fundamento en lo previsto en el artículo 26 de la LAASSP, se definirá el procedimiento a seguir para la contratación, el cual puede ser: LICITACIÓN PÚBLICA, INVITACIÓN A 
CUANDO MENOS TRES PERSONAS y/o ADJUDICACIÓN DIRECTA, mismo que se informará a las personas que presentaron su cotización.
<br /><br />
Este documento no genera obligación alguna para la dependencia o entidad.
</span>';

// set core font
$pdf->SetFont('helvetica', '', 10);

// output the HTML content
$pdf->writeHTML($html, true, 0, true, true);

$pdf->Ln(30);
$pdf->Cell(0, 0, 'Atentamente', 0, false, 'L', 0, '', 0, false, 'M', 'M');
$pdf->Ln(30);
$pdf->SetFont('helvetica', 'B', 10);
$pdf->Cell(0, 0, 'NOMBRE DE EMPLEADO', 0, false, 'L', 0, '', 0, false, 'M', 'M');
$pdf->Ln();
$pdf->Cell(0, 0, 'CATGORÍA + DEPARTAMENTO', 0, false, 'L', 0, '', 0, false, 'M', 'M');
$pdf->Ln(10);
$html = '<span style="text-align:justify; line-height: 16px;">C.c.p.- Expediente <br />CEAF/rrb</span>';
$pdf->SetFont('helvetica', '', 10);
$pdf->writeHTML($html, true, 0, true, true);
$pdf->Ln(110);
$html = '<span style="text-align:justify; line-height: 16px;">(Para efectos de control interno, en el caso de no recibir respuesta o manifestar un inconveniente o imposibilidad, 
se procederá a hacer la anotación respectiva en nuestros registros, circunstancias que deberán ser consideradas al momento de definir el tipo de procedimiento de contratación)</span>';
$pdf->writeHTML($html, true, 0, true, true);
$pdf->lastPage();
// ---------------------------------------------------------
//TERCERA PÁGINA: PO CONSIDERACIONES
$pdf->AddPage();
$pdf->Ln(10);
$pdf->SetFont('helvetica', 'B', 10);
$pdf->Cell(0, 0, 'PARA FORMULAR SU COTIZACIÓN, SE DEBERÁ CONSIDERAR LOS SIGUIENTES ASPECTOS:', 0, false, 'L', 0, '', 0, false, 'M', 'M');
$pdf->Ln(10);
$pdf->Cell(0, 0, 'Datos que en su caso, se deben proporcionar para que el destinatario de la solicitud conteste: ', 0, false, 'L', 0, '', 0, false, 'M', 'M');

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_003.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+

?>

