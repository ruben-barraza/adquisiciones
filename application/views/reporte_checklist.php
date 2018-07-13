<?php

// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {


    //Page header
    public function Header() {
        // Set font
        $this->SetFont('helvetica', 'B', 12);
        // Title
        $this->SetY(15);
        $this->Cell(0, 0, 'Formulario para la entrega de solcon de bienes', 0, false, 'C', 0, '', 0, false, 'M', 'M');

    }

    // Page footer
    public function Footer() {
        // Position autorizacion 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
    }

}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetTitle('Checklist');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, 25, PDF_MARGIN_RIGHT);
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



$pdf->AddPage('P');

$tbl = <<<EOD
<table cellspacing="0" cellpadding="3">
    <tr>
        <td>Solcon</td>
        <td style="border-bottom-width: thin">{$checklist[0]["SOLPED"]}</td>
    </tr>
    <tr>
        <td>Bien</td>
        <td style="border-bottom-width: thin">{$checklistdesc[0]["descripcion"]}</td>
    </tr>
    <tr>
        <td>Lugar de entrega</td>
        <td style="border-bottom-width: thin">{$checklistdesc[0]["lugarEntrega"]}</td>
    </tr>
    <tr>
        <td>Plazo de entrega</td>
        <td style="border-bottom-width: thin">{$checklistdesc[0]["plazoEntrega"]} días</td>
    </tr>
</table>
EOD;

$pdf->SetFont('helvetica', '', 10);
$pdf->writeHTML($tbl, true, false, false, false, '');

//Declaración de variables
if ($checklist[0]["concurso"] == "NAC"){
    $concurso_nac = "X";
    $concurso_int = "";
} else {
    $concurso_nac = "";
    $concurso_int = "X";
}

if ($checklist[0]["fabricacionnacional"] == "S"){
    $fabricacionS = "X";
    $fabricacionN = "";
} else {
    $fabricacionS = "";
    $fabricacionN = "X";
}

if($checklist[0]["proveedoraprovado"] == "S"){
    $proveedorapS = "X";
    $proveedorapN = "";
} else {
    $proveedorapS = "";
    $proveedorapN = "X";
}

if($checklist[0]["prototipoaprovado"] == "S"){
    $prototipoapS = "X";
    $prototipoapN = "";
} else {
    $prototipoapS = "";
    $prototipoapN = "X";
}

if($checklist[0]["avisopruebas"] == "S"){
    $avisoS = "X";
    $avisoN = "";
} else {
    $avisoS = "";
    $avisoN = "X";
}

if($checklist[0]["bajodemanda"] == "S"){
    $bajodemS = "X";
    $bajodemN = "";
    $bajodempor = $checklist[0]["porcentajedemanda"];
} else {
    $bajodemS = "";
    $bajodemN = "X";
    $bajodempor = "";
}

if($checklist[0]["preciosfijos"] == "S"){
    $preciosfijosS = "X";
    $preciosfijosN = "";
} else {
    $preciosfijosS = "";
    $preciosfijosN = "X";
}

if($checklist[0]["anticipo"] == "S"){
    $anticipoS = "X";
    $anticipoN = "";
} else {
    $anticipoS = "";
    $anticipoN = "X";
}

if($checklist[0]["garantiacumplimiento"] == "S"){
    $garantiacumplimientoS = "X";
    $garantiacumplimientoN = "";
    $garantiacumplimientopor = $checklist[0]["porcentajegarantiacumplimiento"];
} else {
    $garantiacumplimientoS = "";
    $garantiacumplimientoN = "X";
    $garantiacumplimientopor = "";
}

if($checklist[0]["garantiacalidad"] == "S"){
    $garantiacalidadS = "X";
    $garantiacalidadN = "";
    $garantiacalidadpor = $checklist[0]["porcentajegarantiacalidad"];
} else {
    $garantiacalidadS = "";
    $garantiacalidadN = "X";
    $garantiacalidadpor = "";
}

if($checklist[0]["sesionaclaraciones"] == "S"){
    $sesionaclaracionesS = "X";
    $sesionaclaracionesN = "";
} else {
    $sesionaclaracionesS = "";
    $sesionaclaracionesN = "X";
}
if($checklist[0]["requieremuestra"] == "S"){
    $requieremuestraS = "X";
    $requieremuestraN = "";
} else {
    $requieremuestraS = "";
    $requieremuestraN = "X";
}
if($checklist[0]["cuesttecnico"] == "S"){
    $cuesttecnicoS = "X";
    $cuesttecnicoN = "";
} else {
    $cuesttecnicoS = "";
    $cuesttecnicoN = "X";
}

if($checklist[0]["marcaespecifica"] == "S"){
    $marcaespecificaS = "X";
    $marcaespecificaN = "";
} else {
    $marcaespecificaS = "";
    $marcaespecificaN = "X";
}

$tbl = <<<EOD
<table cellspacing="0" cellpadding="2">
    <tr>
        <td width="320">Concurso</td>
        <td width="30" border="1" align="center">{$concurso_nac}</td> 
        <td><b> Nacional</b></td> 
        <td width="30" border="1" align="center">{$concurso_int}</td>
        <td><b> Internacional</b></td>      
    </tr>
    <tr>
        <td width="320">Existe fabricación nacional</td>
        <td width="30" border="1" align="center">{$fabricacionS}</td> 
        <td><b> Si</b></td> 
        <td width="30" border="1" align="center">{$fabricacionN}</td>
        <td><b> No</b></td>
    </tr>
    <tr>
        <td width="320">Proveedor aprobado</td>
        <td width="30" border="1" align="center" align="center">{$proveedorapS}</td> 
        <td><b> Si</b></td> 
        <td width="30" border="1" align="center">{$proveedorapN}</td>
        <td><b> No</b></td>
    </tr>
    <tr>
        <td width="320">Prototipo aprobado</td>
        <td width="30" border="1" align="center">{$prototipoapS}</td> 
        <td><b> Si</b></td> 
        <td width="30" border="1" align="center">{$prototipoapN}</td>
        <td><b> No</b></td>
    </tr>
    <tr>
        <td width="320">Aviso de pruebas</td>
        <td width="30" border="1" align="center">{$avisoS}</td> 
        <td><b> Si</b></td> 
        <td width="30" border="1" align="center">{$avisoN}</td>
        <td><b> No</b></td>
    </tr>
    <tr>
        <td width="320">Contrato bajo demanda</td>
        <td width="30" border="1" align="center">{$bajodemS}</td> 
        <td><b> Si</b></td> 
        <td width="30" border="1" align="center">{$bajodemN}</td>
        <td><b> No</b></td>
    </tr>
    <tr>
        <td width="320">Porcentaje</td>
        <td width="30" border="1" align="center">{$bajodempor}</td> 
        <td><b> %</b></td>
    </tr>
    <tr>
        <td width="320">Precios fijos</td>
        <td width="30" border="1" align="center">{$preciosfijosS}</td> 
        <td><b> Si</b></td> 
        <td width="30" border="1" align="center">{$preciosfijosN}</td>
        <td><b> No</b></td>
    </tr>
    <tr>
        <td width="320">Anticipos</td>
        <td width="30" border="1" align="center">{$anticipoS}</td> 
        <td><b> Si</b></td> 
        <td width="30" border="1" align="center">{$anticipoN}</td>
        <td><b> No</b></td>
    </tr>
    <tr>
        <td width="320">Garantía de cumplimiento</td>
        <td width="30" border="1" align="center">{$garantiacumplimientoS}</td> 
        <td><b> Si</b></td> 
        <td width="30" border="1" align="center">{$garantiacumplimientoN}</td>
        <td><b> No</b></td>
    </tr>
    <tr>
        <td width="320">Porcentaje</td>
        <td width="30" border="1" align="center">{$garantiacumplimientopor}</td> 
        <td><b> %</b></td>
    </tr>
    <tr>
        <td width="320">Garantía de calidad</td>
        <td width="30" border="1" align="center">{$garantiacalidadS}</td> 
        <td><b> Si</b></td> 
        <td width="30" border="1" align="center">{$garantiacalidadN}</td>
        <td><b> No</b></td>
    </tr>
    <tr>
        <td width="320">Porcentaje</td>
        <td width="30" border="1" align="center">{$garantiacalidadpor}</td> 
        <td><b> %</b></td>
    </tr>
    <tr>
        <td width="320">Sesión de aclaraciones</td>
        <td width="30" border="1" align="center">{$sesionaclaracionesS}</td> 
        <td><b> Si</b></td> 
        <td width="30" border="1" align="center">{$sesionaclaracionesN}</td>
        <td><b> No</b></td>
    </tr>
    <tr>
        <td width="320">Muestra</td>
        <td width="30" border="1" align="center">{$requieremuestraS}</td> 
        <td><b> Si</b></td> 
        <td width="30" border="1" align="center">{$requieremuestraN}</td>
        <td><b> No</b></td>
    </tr>
    <tr>
        <td width="320">Cuestionarios técnicos</td>
        <td width="30" border="1" align="center">{$cuesttecnicoS}</td> 
        <td><b> Si</b></td> 
        <td width="30" border="1" align="center">{$cuesttecnicoN}</td>
        <td><b> No</b></td>
    </tr>
    <tr>
        <td width="320">Se indica marca y/o modelo</td>
        <td width="30" border="1" align="center">{$marcaespecificaS}</td> 
        <td><b> Si</b></td> 
        <td width="30" border="1" align="center">{$marcaespecificaN}</td>
        <td><b> No</b></td>
    </tr>
</table>
EOD;

$pdf->SetFont('helvetica', '', 10);
$pdf->writeHTML($tbl, true, false, false, false, '');

switch ($checklist[0]["criterioevaluacion"]){
    case "PR":
        $pr = "X";
        $pp = "";
        $cb = "";
        break;
    case "PP":
        $pr = "";
        $pp = "X";
        $cb = "";
        break;
    case "CB":
        $pr = "";
        $pp = "";
        $cb = "X";
        break;
}

$tbl = <<<EOD
<table cellspacing="0" cellpadding="2">
    <tr>
        <td rowspan="3" width="320">Criterio de evaluación</td>
        <td width="30" border="1" align="center">{$pr}</td> 
        <td><b> Por precio</b></td> 
    </tr>
    <tr>
        <td width="30" border="1" align="center">{$pp}</td> 
        <td><b> Puntos y porcentajes</b></td> 
    </tr>
    <tr>
        <td width="30" border="1" align="center">{$cb}</td> 
        <td><b> Costo-Beneficio</b></td> 
    </tr>
    
</table>
EOD;

$pdf->SetFont('helvetica', '', 10);
$pdf->writeHTML($tbl, true, false, false, false, '');

switch ($checklist[0]["adjudicacion"]){
    case "LIC":
        $lic = "X";
        $par = "";
        $lot = "";
        break;
    case "PAR":
        $lic = "";
        $par = "X";
        $lot = "";
        break;
    case "LOT":
        $lic = "";
        $par = "";
        $lot = "X";
        break;
}

$tbl = <<<EOD
<table cellspacing="0" cellpadding="2">
    <tr>
        <td rowspan="3" width="320">Forma de adjudicación</td>
        <td width="30" border="1" align="center">{$lic}</td> 
        <td><b> Un solo licitante</b></td> 
    </tr>
    <tr>
        <td width="30" border="1" align="center">{$par}</td> 
        <td><b> Por partida</b></td> 
    </tr>
    <tr>
        <td width="30" border="1" align="center">{$lot}</td>
        <td><b> Por lote</b></td> 
    </tr>
    
</table>
EOD;

$pdf->SetFont('helvetica', '', 10);
$pdf->writeHTML($tbl, true, false, false, false, '');

switch ($checklist[0]["tipotransporte"]){
    case "IND":
        $ind = "X";
        $pla = "";
        $cajas = "";
        $cajasa = "";
        $cama = "";
        $plap = "";
        $plal = "";
        $plat = "";
        $aut = "";
        $paq = "";
        break;
    case "PLA":
        $ind = "";
        $pla = "X";
        $cajas = "";
        $cajasa = "";
        $cama = "";
        $plap = "";
        $plal = "";
        $plat = "";
        $aut = "";
        $paq = "";
        break;
    case "CAJAS":
        $ind = "";
        $pla = "";
        $cajas = "X";
        $cajasa = "";
        $cama = "";
        $plap = "";
        $plal = "";
        $plat = "";
        $aut = "";
        $paq = "";
        break;
    case "CAJASA":
        $ind = "";
        $pla = "";
        $cajas = "";
        $cajasa = "X";
        $cama = "";
        $plap = "";
        $plal = "";
        $plat = "";
        $aut = "";
        $paq = "";
        break;
    case "CAMA":
        $ind = "";
        $pla = "";
        $cajas = "";
        $cajasa = "";
        $cama = "X";
        $plap = "";
        $plal = "";
        $plat = "";
        $aut = "";
        $paq = "";
        break;
    case "PAQ":
        $ind = "";
        $pla = "";
        $cajas = "";
        $cajasa = "";
        $cama = "";
        $plap = "";
        $plal = "";
        $plat = "";
        $aut = "";
        $paq = "X";
        break;
    case "PLAP":
        $ind = "";
        $pla = "";
        $cajas = "";
        $cajasa = "";
        $cama = "";
        $plap = "X";
        $plal = "";
        $plat = "";
        $aut = "";
        $paq = "";
        break;
    case "PLAL":
        $ind = "";
        $pla = "";
        $cajas = "";
        $cajasa = "";
        $cama = "";
        $plap = "";
        $plal = "X";
        $plat = "";
        $aut = "";
        $paq = "";
        break;
    case "PLAT":
        $ind = "";
        $pla = "";
        $cajas = "";
        $cajasa = "";
        $cama = "";
        $plap = "";
        $plal = "";
        $plat = "X";
        $aut = "";
        $paq = "";
        break;
    case "AUT":
        $ind = "";
        $pla = "";
        $cajas = "";
        $cajasa = "";
        $cama = "";
        $plap = "";
        $plal = "";
        $plat = "";
        $aut = "X";
        $paq = "";
        break;
}

$tbl = <<<EOD
<table cellspacing="0" cellpadding="2">
    <tr>
        <td rowspan="10" width="320">Tipo de transporte</td>
        <td width="30" border="1" align="center">{$ind}</td> 
        <td><b> Indistinto</b></td> 
    </tr>
    <tr>
        <td width="30" border="1" align="center">{$cajas}</td> 
        <td><b> Caja seca</b></td> 
    </tr>
    <tr>
        <td width="30" border="1" align="center">{$cajasa}</td> 
        <td><b> Caja seca-aire</b></td> 
    </tr>
    <tr>
        <td width="30" border="1" align="center">{$cama}</td> 
        <td><b> Cama baja</b></td> 
    </tr>
    <tr>
        <td width="30" border="1" align="center">{$paq}</td> 
        <td><b> Paquetería</b></td> 
    </tr>
    <tr>
        <td width="30" border="1" align="center">{$pla}</td> 
        <td width="230"><b> Plataforma con redilas desmontables</b></td> 
    </tr>
    <tr>
        <td width="30" border="1" align="center">{$plap}</td> 
        <td><b> Plataforma patín</b></td> 
    </tr>
    <tr>
        <td width="30" border="1" align="center">{$plal}</td> 
        <td><b> Plataforma llana</b></td> 
    </tr>
    <tr>
        <td width="30" border="1" align="center">{$plat}</td> 
        <td><b> Plataforma telescópica</b></td> 
    </tr>
    <tr>
        <td width="30" border="1" align="center">{$aut}</td> 
        <td><b> Autotanque</b></td> 
    </tr>
    
</table>
EOD;

$pdf->SetFont('helvetica', '', 10);
$pdf->writeHTML($tbl, true, false, false, false, '');

$emp_elabora = "";
//Nombre del empleado
if($im_elabora[0]["titulo"] == ""){
    $emp_elabora = mb_strtoupper($im_elabora[0]["nombre"], 'utf-8').' '.mb_strtoupper($im_elabora[0]["apellidoPaterno"], 'utf-8').' '.mb_strtoupper($im_elabora[0]["apellidoMaterno"], 'utf-8');
} else {
    $emp_elabora = mb_strtoupper($im_elabora[0]["titulo"], 'utf-8').'. '.mb_strtoupper($im_elabora[0]["nombre"], 'utf-8').' '.mb_strtoupper($im_elabora[0]["apellidoPaterno"], 'utf-8').' '.mb_strtoupper($im_elabora[0]["apellidoMaterno"], 'utf-8');
}

$tbl = <<<EOD
<table>
    <tr>
        <td></td>
        <td><b>Formuló: </b>{$emp_elabora}</td>
    </tr>
</table>
EOD;

$pdf->SetFont('helvetica', '', 10);
$pdf->writeHTML($tbl, true, false, false, false, '');


$pdf->Output('Checklist.pdf', 'I');

