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
        if($GLOBALS['pageOrientation'] == 'P')
        {
            $image_file = K_PATH_IMAGES.'logo4.gif';
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
        else if($GLOBALS['pageOrientation'] == 'L')
        {
            $image_file = K_PATH_IMAGES.'logo4.gif';
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
    }

    // Page footer
    public function Footer() {
        if($GLOBALS['pageOrientation'] == 'P')
        {
            // Position at 15 mm from bottom
            $this->SetY(-15);
            // Set font
            $this->SetFont('helvetica', '', 8);
        
            // Texto del footer
            $txt = "Solicitud de Cotización";
            // Imprimir el footer
            $this->MultiCell(0, 10, $txt, 0, 'R', 0, 0, '', '', true);
        }
        else if($GLOBALS['pageOrientation'] == 'L')
        {
            // Position at 15 mm from bottom
            $this->SetY(-15);
            // Set font
            $this->SetFont('helvetica', 'I', 8);
        }
    }
}


// ---------------------------------------------------------
//El siguiente ciclo for creará las copias necesarias para los contactos
// a quienes se les enviará la POG.

$num_contactos = sizeof($contactos);
$tmp = ini_get('upload_tmp_dir');
$archivos = array();
$nombresArchivos = array();


for ($i = 0; $i < $num_contactos; $i++) {

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
    $pdf->SetAutoPageBreak(TRUE, 0);

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
    
    $pdf->Cell(0, 0, 'Número de ICM-137-'.sprintf("%'03d", $numero_oficio[$i]["numOficio"]).'/'.$numero_oficio[$i]["anio"], 0, false, 'R', 0, '', 0, false, 'M', 'M');
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
    if($contactos[$i]["telefonoFijo"] != $contactos[$i]["telefonoMovil"])
    {
        $telFijo = " y ".$contactos[$i]["telefonoFijo"];
    }
    
    $pdf->Ln(10);

    //INFORMACIÓN DEL CONTACTO, RAZÓN SOCIAL DE LA EMPRESA Y CORREO ELECTRÓNICO
    $pdf->SetFont('helvetica', 'BI', 11);
    $pdf->Cell(0, 0, mb_strtoupper($contactos[$i]["razonSocial"], 'utf-8'), 0, false, 'L', 0, '', 0, false, 'M', 'M');
    $pdf->Ln();
    $pdf->Cell(0, 0, $contactos[$i]["nombre"], 0, false, 'L', 0, '', 0, false, 'M', 'M');
    $pdf->Ln();
    $pdf->Cell(0, 0, $contactos[$i]["direccion"], 0, false, 'L', 0, '', 0, false, 'M', 'M');
    $pdf->Ln();
    $pdf->Cell(0, 0, $contactos[$i]["municipio"].", ".$contactos[$i]["estado"].", CP ".$contactos[$i]["codigoPostal"], 0, false, 'L', 0, '', 0, false, 'M', 'M');
    $pdf->Ln();
    $pdf->Cell(0, 0, 'Tel: '.$contactos[$i]["telefonoMovil"].$telFijo, 0, false, 'L', 0, '', 0, false, 'M', 'M');
    $pdf->Ln();
    $pdf->Cell(0, 0, $contactos[$i]["correoElectronico"], 0, false, 'L', 0, '', 0, false, 'M', 'M');
    $pdf->Ln();

    $actividad = "";

    if($po_general[0]["actividad"] == "A"){
        $actividad = "la adquisición de <b>".$po_general[0]["descripcion"]."</b>";
    } else if($po_general[0]["actividad"] == "R"){
        $actividad = "el arrendamiento de <b>".$po_general[0]["descripcion"]."</b>";
    } else if($po_general[0]["actividad"] == "S"){
        $actividad = "la adquisición de <b>".$im_general[0]["titulo"]."</b>";
    }


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
    </ol>     
    </i></span>';

    // set core font
    $pdf->SetFont('helvetica', '', 11);
    
    // output the HTML content
    $pdf->writeHTML($html, true, 0, true, true);
    $pdf->lastPage();

    // ---------------------------------------------------------
    //SEGUNDA PÁGINA DEL PO GENERAL
    // add a page
    $GLOBALS['pageOrientation'] = 'P';
    $pdf->AddPage();


    $emp_responsable = "";
    //Nombre del empleado
    if($pog_responsable[0]["titulo"] == ""){
        $emp_responsable = "a <b>".$pog_responsable[0]["nombre"].' '.$pog_responsable[0]["apellidoPaterno"].' '.$pog_responsable[0]["apellidoMaterno"]."</b>";
    } else {
        $emp_responsable = "al <b>".$pog_responsable[0]["titulo"].'. '.$pog_responsable[0]["nombre"].' '.$pog_responsable[0]["apellidoPaterno"].' '.$pog_responsable[0]["apellidoMaterno"]."</b>";
    }

    $ccp_array = array();
    for($k = 1; $k <= 3; $k++){
        if($po_general[0]["ccp".$k] != ""){
            array_push($ccp_array, $po_general[0]["ccp".$k]);
        }
    }

    $string_correos = "";
    $ccp_array_length = count($ccp_array);


    if (empty($ccp_array)){
        $string_correos = $pog_responsable[0]["correoElectronico"]." y ".$pog_formula[0]["correoElectronico"];
    } else {
        $string_correos = $pog_responsable[0]["correoElectronico"].", ".$pog_formula[0]["correoElectronico"];
        $k = 1;
        foreach($ccp_array as $correo){
            if($k == $ccp_array_length){
                $string_correos .= " y ".$correo;
            } else {
                $string_correos .= ", ".$correo;
            }
            $k++;
        }
    }


    $html = '<span style="text-align:justify; line-height: 17px;"><br /><i>
    <b>Su cotización deberá contener la siguiente información: </b>
    
    <ol>
        <li>Oferta Económica en pesos mexicanos sin IVA conforme al "Esquema de Cotización".</li>
        <li>Oferta técnica y comercial, deben ser presentados en idioma español, indicar si cumple con lo solicitado.
        Si en alguna ofrece algo similar o superior o si cuenta con alguna inovación tecnológica.</li>
        <li>Cuestionario de Evaluación.</li>
    </ol>
    Dicha cotización deberá ser enviada en hojas membretadas de la empresa y firma autógrafa del representante legal en atencion '.$emp_responsable.' '.
    $pog_responsable[0]["categoria"].' del Departamento de '.$pog_responsable[0]["departamento"].'</b> a más tardar el día <b>'.$diaLimite.' de '.$mesLimite.' de '.$yearLimite.'</b>, indicando lugar, fecha y vigencia de la misma, la cual no deberá ser menor de 90 días, a la siguiente dirección: <b>'.
    $po_general[0]["domicilio"].' en '.$po_general[0]["municipio"].', '.$po_general[0]["estado"].'</b> y por correo electrónico a las direcciones <b>'.$string_correos.'</b> comentarios y/o aclaraciones comunicarse al 
    teléfono <b>(662)259 11 00 ext. 11628 y 11804.</b>
    <br /><br />
    Vencido el plazo de recepción de cotizaciones y de no contar con la de su representada, <b>Comisión Federal de Electricidad División de Distribución Noroeste</b> considerará que no exisitó interés en participar en la investigación de condiciones de mercado y no generará obligación alguna para la entidad.
    <br /><br />        
    </i></span>';

    // set core font
    $pdf->SetFont('helvetica', '', 11);
    
    // output the HTML content
    $pdf->writeHTML($html, true, 0, true, true);

    $pdf->Ln(20);
    $pdf->SetFont('helvetica', 'BI', 11);
    $pdf->Cell(0, 0, 'A T E N T A M E N T E', 0, false, 'C', 0, '', 0, false, 'M', 'M');
    
    $pdf->Ln(35);

    $emp_firma = "";
    //Nombre del empleado
    if($pog_responsable[0]["titulo"] == ""){
        $emp_firma = $pog_responsable[0]["nombre"].' '.$pog_responsable[0]["apellidoPaterno"].' '.$pog_responsable[0]["apellidoMaterno"];
    } else {
        $emp_firma = $pog_responsable[0]["titulo"].'. '.$pog_responsable[0]["nombre"].' '.$pog_responsable[0]["apellidoPaterno"].' '.$pog_responsable[0]["apellidoMaterno"];
    }


    $pdf->Cell(0, 0, $emp_firma, 0, false, 'C', 0, '', 0, false, 'M', 'M');
    $pdf->Ln();
    // reset pointer to the last page
    $pdf->lastPage();

    if($tipo == "B"){

        //Indicar en el nombre del archivo pdf el nombre de la familia, si no existe indicar que es de servicios
        $tipo_titulo = $po_general[0]["clave"];

        // ---------------------------------------------------------
        //TERCERA PÁGINA: TABLA IM

        // add a page
        $GLOBALS['pageOrientation'] = 'L';
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
            if($im_concepto[$j]["lugarEntrega"] != "0"){
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
        $pdf->Cell(150, 0, $emp_elabora, 0, false, 'L', 0, '', 0, false, 'M', 'M');
        $pdf->Cell(150, 0, $emp_aprueba, 0, false, 'L', 0, '', 0, false, 'M', 'M');
    } else {
        $tipo_titulo = "SERVICIOS";
    }


    
    $pdf->Output($tmp.'/Oficio Pet Of 137-'.sprintf("%'03d", $numero_oficio[$i]["numOficio"]).'-'.$numero_oficio[$i]["anio"].' - '.$tipo_titulo.'.pdf', 'F');
    array_push($nombresArchivos, 'Oficio Pet Of 137-'.sprintf("%'03d", $numero_oficio[$i]["numOficio"]).'-'.$numero_oficio[$i]["anio"].' - '.$tipo_titulo.'.pdf');
    array_push($archivos, $tmp.'/Oficio Pet Of 137-'.sprintf("%'03d", $numero_oficio[$i]["numOficio"]).'-'.$numero_oficio[$i]["anio"].' - '.$tipo_titulo.'.pdf');
    
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

