<?php
//============================================================+
// GENERACION DE PDFS DE PETICIÓN OFERTA E 
// INVESTIGACIÓN DE MERCADO
// Last Update : 2017-07-21
// Author: Rubén Barraza
//============================================================+




// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        if($GLOBALS['pageOrientation'] == "L")
        {
            $image_file = K_PATH_IMAGES.'logo2.gif';
            if (!$image_file)
            {
                $image= imagecreatefromstring(file_get_contents($image_file));
            }
            $this->Image($image_file, 10, 10, 50, '', 'GIF', '', 'T', false, 300, '', false, false, 0, false, false, false);
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
        else
        {
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
            $this->Ln(3);
        }
        /*
        switch($this->page)
		{
			case 1: 
			case 2: 
            case 3:
                // Logo
                $image_file = K_PATH_IMAGES.'logo2.gif';
                if (!$image_file)
                {
                    $image= imagecreatefromstring(file_get_contents($image_file));
                }
                $this->Image($image_file, 10, 10, 50, '', 'GIF', '', 'T', false, 300, '', false, false, 0, false, false, false);
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
                break;
            case 4:
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
                break;
		}
        */
    }

    // Page footer
    public function Footer() {
        if($GLOBALS['pageOrientation'] == "L")
        {
            // Position at 15 mm from bottom
            $this->SetY(-15);
            // Set font
            $this->SetFont('helvetica', 'I', 8);

            // Texto del footer
            $txt = "Benito Juárez y San Luis Potosí C.P. 83000 Col. Centro, Hermosillo, Sonora\nTel. 662-259-11-71";

            // Imprimir el footer
            $this->MultiCell(0, 10, $txt, 0, 'C', 0, 0, '', '', true);
        }
        else
        {
            // Position at 15 mm from bottom
            $this->SetY(-15);
            // Set font
            $this->SetFont('helvetica', 'I', 8);
        }

        /*
        switch($this->page)
		{
			case 1: 
			case 2: 
            case 3:
                // Position at 15 mm from bottom
                $this->SetY(-15);
                // Set font
                $this->SetFont('helvetica', 'I', 8);

                // Texto del footer
                $txt = "Benito Juárez y San Luis Potosí C.P. 83000 Col. Centro, Hermosillo, Sonora\nTel. 662-259-11-71";

                // Imprimir el footer
                $this->MultiCell(0, 10, $txt, 0, 'C', 0, 0, '', '', true);
                break;
            case 4:
                // Position at 15 mm from bottom
                $this->SetY(-15);
                // Set font
                $this->SetFont('helvetica', 'I', 8);
                break;
		}
        */
    }
}




// ---------------------------------------------------------
//El siguiente ciclo for creará las copias necesarias para los contactos
// a quienes se les enviará la POG.

$num_contactos = sizeof($contactos);
$tmp = ini_get('upload_tmp_dir');
$archivos = array();
$nombresArchivos = array();

$pageOrientation;

for ($i = 0; $i < $num_contactos; $i++) {

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

    $pageOrientation = "P";
    // add a page
    $pdf->AddPage();
    
    $pdf->Cell(50);

    // set font
    $pdf->SetFont('helvetica', 'B', 10);

    $pdf->Ln(13);
    $pdf->Cell(100);

    $pdf->Cell(0, 0, 'Oficio No. 137-'.$numero_oficio[$i]["numOficio"].'/'.$numero_oficio[$i]["anio"], 0, false, 'L', 0, '', 0, false, 'M', 'M');
    $pdf->Ln();


    //CONVERTIR LA FECHA DE ELABORACIÓN Y PRESENTACIÓN A TEXTO
    setlocale(LC_ALL,"es_ES.utf8","es_ES","esp");
    $fechaElaboracion = $po_general[0]["fechaElaboracion"];
    $dia = strftime("%#d", strtotime($fechaElaboracion));
    $mes = strftime("%B", strtotime($fechaElaboracion));
    $year = strftime("%Y", strtotime($fechaElaboracion));

    $fechaLimite = $po_general[0]["fechaLimitePresentacion"];
    $diaLimite = strftime("%#d", strtotime($fechaLimite));
    $mesLimite = strftime("%B", strtotime($fechaLimite));
    $yearLimite = strftime("%Y", strtotime($fechaLimite));


    $pdf->SetFont('helvetica', '', 10);
    $pdf->Cell(100);
    $pdf->Cell(0, 0, $po_general[0]["municipio"].', '.$po_general[0]["estado"].', '.$dia.' de '.ucfirst($mes).' del '.$year, 0, false, 'L', 0, '', 0, false, 'M', 'M');
    $pdf->Ln();

    $pdf->SetFont('helvetica', 'B', 10);
    $pdf->Cell(100);
    $pdf->Cell(14, 0, 'Asunto: ', 0, false, 'L', 0, '', 0, false, 'M', 'M');
    $pdf->SetFont('helvetica', '', 10);
    $pdf->Cell(0, 0, $po_general[0]["asunto"], 0, false, 'L', 0, '', 0, false, 'M', 'M');
    $pdf->Ln(7);


    //INFORMACIÓN DEL CONTACTO, RAZÓN SOCIAL DE LA EMPRESA Y CORREO ELECTRÓNICO
    $pdf->SetFont('helvetica', 'B', 10);
    $pdf->Cell(0, 0, mb_strtoupper($contactos[$i]["nombre"], 'utf-8'), 0, false, 'L', 0, '', 0, false, 'M', 'M');
    $pdf->Ln();
    $pdf->Cell(0, 0, mb_strtoupper($contactos[$i]["razonSocial"], 'utf-8'), 0, false, 'L', 0, '', 0, false, 'M', 'M');
    $pdf->Ln();
    $pdf->Cell(0, 0, 'Correo electrónico: '.mb_strtoupper($contactos[$i]["correoElectronico"], 'utf-8'), 0, false, 'L', 0, '', 0, false, 'M', 'M');
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
    Dicha cotización se requiere que la remita en documento de la empresa, debidamente firmada por persona facultada, a la siguiente dirección: '.$po_general[0]["domicilio"].' en '.$po_general[0]["estado"].', '.$po_general[0]["municipio"].' y que sea dirigida a 
    nombre de '.$pog_responsable[0]["titulo"].'. '.$pog_responsable[0]["nombre"].' '.$pog_responsable[0]["apellidoPaterno"].' '.$pog_responsable[0]["apellidoMaterno"].', '.$pog_responsable[0]["categoria"].' del '.$pog_responsable[0]["departamento"].'.
    <br /><br /><br />
    Mucho agradeceré que en su respuesta se incluya: Lugar y fecha de cotización y vigencia de la misma.
    <br /><br /><br />
    Para el case de dudas, comentarios y/o aclaraciones, remitirlas a los correo: <b>'.$pog_responsable[0]["correoElectronico"].'</b> y <b>'.$pog_formula[0]["correoElectronico"].'</b>
    <br /><br /><br />
    La fecha límite para presentar la cotización es el: <b>'.$diaLimite.' de '.$mesLimite.' de '.$yearLimite.' a las '.$po_general[0]["horaLimitePresentacion"].' Hrs.'.'</b>
    <br /><br /><br />
    Favor de enviar acuse de recibo de esta solicitud al correo electrónico a: <b>'.$pog_responsable[0]["correoElectronico"].'</b> y <b>'.$pog_formula[0]["correoElectronico"].'</b>
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
    $pageOrientation = "P";
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
    
    $pdf->Cell(0, 0, $pog_responsable[0]["titulo"].'. '.$pog_responsable[0]["nombre"].' '.$pog_responsable[0]["apellidoPaterno"].' '.$pog_responsable[0]["apellidoMaterno"], 0, false, 'L', 0, '', 0, false, 'M', 'M');
    $pdf->Ln();
    $pdf->Cell(0, 0, $pog_responsable[0]["categoria"].' del '.$pog_responsable[0]["departamento"], 0, false, 'L', 0, '', 0, false, 'M', 'M');
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
    $pageOrientation = "P";
    $pdf->AddPage();
    $pdf->Ln(10);
    $pdf->SetFont('helvetica', 'B', 10);
    $pdf->Cell(0, 0, 'PARA FORMULAR SU COTIZACIÓN, SE DEBERÁ CONSIDERAR LOS SIGUIENTES ASPECTOS:', 0, false, 'L', 0, '', 0, false, 'M', 'M');
    $pdf->Ln(10);
    $pdf->Cell(0, 0, 'Datos que en su caso, se deben proporcionar para que el destinatario de la solicitud conteste: ', 0, false, 'L', 0, '', 0, false, 'M', 'M');
    $pdf->Ln(3);


    $htmlData = '
    <span style="text-align:justify; line-height: 21px;">
    <ul>
        <li>'.$po_consideracion[0]["fc1"].'</li>
        <li>'.$po_consideracion[0]["fc2"].'</li>
        <li>'.$po_consideracion[0]["fc3"].'</li>
        <li>'.$po_consideracion[0]["fc4"].'</li>
        <li>'.$po_consideracion[0]["fc5"].'</li>
        <li>'.$po_consideracion[0]["fc6"].'</li>
        <li>'.$po_consideracion[0]["fc7"].'</li>
        <li>'.$po_consideracion[0]["fc8"].'</li>
        <li>'.$po_consideracion[0]["fc9"].'</li>
        <li>'.$po_consideracion[0]["fc10"].'</li>
        <li>'.$po_consideracion[0]["fc11"].'</li>
        <li>'.$po_consideracion[0]["fc12"].'</li>
        <li>'.$po_consideracion[0]["fc13"].'</li>
        <li>'.$po_consideracion[0]["fc14"].'</li>
        <li>'.$po_consideracion[0]["fc15"].'</li>
        <li>'.$po_consideracion[0]["fc16"].'</li>
        <li>'.$po_consideracion[0]["fc17"].'</li>
        <li>'.$po_consideracion[0]["fc18"].'</li>
    <ul></span>';


    $pdf->SetFont('Helvetica', '', 10);
    $pdf->writeHTML($htmlData, true, 0, true, true); 

    // add a page
    $pageOrientation = "L";
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
                for($j = 0; $j < $tableRows; $j++)
                {
                    $html .= '<tr>';
                    $html .= '<td align="center" width="45">'.$im_concepto[$j]["partida"].'</td>';
                    $html .= '<td align="center" width="60">'.$im_concepto[$j]["codigo"].'</td>';
                    $html .= '<td align="center">'.mb_strtoupper($im_concepto[$j]["descripcion"], 'utf-8').'</td>';
                    $html .= '<td align="center" width="350">'.mb_strtoupper($im_concepto[$j]["descripcionDetallada"], 'utf-8').'</td>';
                    $html .= '<td align="center">'.mb_strtoupper($im_concepto[$j]["especificacion"], 'utf-8').'</td>';
                    $html .= '<td align="center" width="70">'.$im_concepto[$j]["plazoEntrega"].'</td>';
                    $html .= '<td align="center" width="30">'.$im_concepto[$j]["cantidad"].'</td>';
                    $html .= '<td align="center" width="30">'.mb_strtoupper($im_concepto[$j]["clave"], 'utf-8').'</td>';
                    $html .= '<td align="center">'.mb_strtoupper($im_concepto[$j]["lugarEntrega"], 'utf-8').'</td>';
                    $html .= '<td align="center">'.$im_concepto[$j]["direccionEntrega"].'</td>';
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
    $pdf->Cell(150, 0, mb_strtoupper($im_elabora[0]["titulo"], 'utf-8').'. '.mb_strtoupper($im_elabora[0]["nombre"], 'utf-8').' '.mb_strtoupper($im_elabora[0]["apellidoPaterno"], 'utf-8').' '.mb_strtoupper($im_elabora[0]["apellidoMaterno"], 'utf-8'), 0, false, 'L', 0, '', 0, false, 'M', 'M');
    $pdf->Cell(150, 0, mb_strtoupper($im_aprueba[0]["titulo"], 'utf-8').'. '.mb_strtoupper($im_aprueba[0]["nombre"], 'utf-8').' '.mb_strtoupper($im_aprueba[0]["apellidoPaterno"], 'utf-8').' '.mb_strtoupper($im_aprueba[0]["apellidoMaterno"], 'utf-8'), 0, false, 'L', 0, '', 0, false, 'M', 'M');

    
    $pdf->Output($tmp.'/Oficio Pet Of 137-'.$numero_oficio[$i]["numOficio"].'-'.$numero_oficio[$i]["anio"].' - '.$po_general[0]["clave"].'.pdf', 'F');
    array_push($nombresArchivos, 'Oficio Pet Of 137-'.$numero_oficio[$i]["numOficio"].'-'.$numero_oficio[$i]["anio"].' - '.$po_general[0]["clave"].'.pdf');
    array_push($archivos, $tmp.'/Oficio Pet Of 137-'.$numero_oficio[$i]["numOficio"].'-'.$numero_oficio[$i]["anio"].' - '.$po_general[0]["clave"].'.pdf');
    
}

$zipName = 'PO '.$po_general[0]["asunto"].' - '.$po_general[0]["fechaElaboracion"];
$result = create_zip($archivos, $nombresArchivos, $zipName, $tmp.'/my-pdf.zip');

//============================================================+
// END OF FILE
//============================================================+

/* creates a compressed zip file */
function create_zip($files = array(), $fileNames = array(), $zipName = '', $destination = '', $overwrite = false) {
	//if the zip file already exists and overwrite is false, return false
	if(file_exists($destination) && !$overwrite) { return false; }
	//vars
	$valid_files = array();
	//if files were passed in...
	if(is_array($files)) {
		//cycle through each file
		foreach($files as $file) {
			//make sure the file exists
			if(file_exists($file)) {
				$valid_files[] = $file;
			}
		}
	}
	//if we have good files...
	if(count($valid_files)) {
		//create the archive
		$zip = new ZipArchive();
		if($zip->open($destination, $overwrite ? ZIPARCHIVE::OVERWRITE : ZIPARCHIVE::CREATE) !== true) {
			return false;
		}
		//add the files
        $cont = 0;
		foreach($valid_files as $file) {
			$zip->addFile($file, $fileNames[$cont]);
            $cont++;
		}
		
		//close the zip -- done!
		$zip->close();

        header("Content-type:application/zip");
        header('Content-Disposition: attachment; filename='.$zipName.'.zip');
        readfile($destination);

        $tmp = ini_get('upload_tmp_dir');

        //Limpiar el folder tmp
        $files = glob($tmp.'/*'); // get all file names
        foreach($files as $file){ // iterate files
            if(is_file($file))
                unlink($file); // delete file
        }

		//check to make sure the file exists
		return file_exists($destination);
	}
	else
	{
		return false;
	}
}


?>

