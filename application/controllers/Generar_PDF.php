<?php
/* 
 * Generated by CRUDigniter v3.0 Beta 
 * www.crudigniter.com
 */

 
class Generar_pdf extends CI_Controller{
    
    function __construct()
    {
        parent::__construct();
        $this->load->library('Pdf');
        $this->load->model('Generarpdfmodel');
    } 

    //PDF
    function pdf($id){

        //Identificar si la PO es de bienes o servicios
        $po_tipo = $this->Generarpdfmodel->get_po_tipo($id);

        $data['tipo'] = $po_tipo;
        $data['contactos'] = $this->Generarpdfmodel->get_contactos($id);
        $data['po_general'] = $this->Generarpdfmodel->get_pog_data($id);
        $data['numero_oficio'] = $this->Generarpdfmodel->get_pog_numero_oficio($id);
        $data['pog_responsable'] = $this->Generarpdfmodel->get_pog_responsable($id);
        $data['pog_formula'] = $this->Generarpdfmodel->get_pog_formula($id);
        $data['po_consideracion'] = $this->Generarpdfmodel->get_po_consideracion($id);
        $data['im_general'] = $this->Generarpdfmodel->get_im_general($id);

        if ($po_tipo == "B"){
            //DATOS PARA LA TABLA IM
            $data['im_concepto'] = $this->Generarpdfmodel->get_im_concepto($id);
            $data['im_elabora'] = $this->Generarpdfmodel->get_im_empleado_elabora($id);
            $data['im_aprueba'] = $this->Generarpdfmodel->get_im_empleado_autoriza($id);
        }

        $this->load->view('reporte_pog', $data);
        

        //Para probar los queries del modelo
        //$this->load->view('reporte_prueba_bd', $data);


    }

    function pdf_imc($id){

        $data['imc_header'] = $this->Generarpdfmodel->get_imc_header($id);
        $data['im_elabora'] = $this->Generarpdfmodel->get_im_empleado_elabora($id);
        $data['im_aprueba'] = $this->Generarpdfmodel->get_im_empleado_autoriza($id);

        //obtener la fecha de impresion del reporte
        $fechaimp = $this->Generarpdfmodel->get_imc_fecha_imp($id);

        //si la fecha existe, se toma de la bd
        //si no, se toma la fecha actual y se guarda en la bd

        if($fechaimp == "0000-00-00"){
            $fechaImpresion = date('Y-m-d');
            $this->Generarpdfmodel->update_img_fechaimp($id, $fechaImpresion);
        } else {
            $fechaImpresion = $fechaimp;
        }

        $data['fechaImpresion'] = $fechaImpresion;

        $nombres_proveedores = $this->Generarpdfmodel->get_razonsocial($id);

        $data['nombres'] = $this->Generarpdfmodel->get_razonsocial($id);

        //DIVIDIR LA LISTA DE PROVEEDORES EN GRUPOS DE 3 (3 PROVS EN CADA PÁGINA)
        $proveedores_split = array_chunk($nombres_proveedores, 3);

        //Arreglo donde se guarda el codigo html que se include en el header de cada tabla
        $arr_th = array();

        //$data['cotizaciones'] = $this->Generarpdfmodel->get_cotizaciones($id);

        //EN ESTE ARRAY SE GUARDAN LAS COTIZACIONES POR PARTIDA DE CADA PROVEEDOR
        $arr_cot = array();

        //OBTIENE LAS COTIZACIONES DE CADA PROVEEDOR Y GUARDA CADA ARREGLO DE COTIZACIONES POR PROVEEDOR EN UN SOLO ARREGLO
        for($j = 0; $j < count($nombres_proveedores); $j++){
            $cot_proveedor = $this->Generarpdfmodel->get_cotizacion($id, $nombres_proveedores[$j]['id']);
            array_push($arr_cot, $cot_proveedor);
        }

        $cot_split = array_chunk($arr_cot, 3);

        $data['arr_cot'] = $arr_cot;
        $data['arr_cotsplit'] = $cot_split;

        $arr_width = array();


        foreach($proveedores_split as $prov_group){
            $num_provs = count($prov_group);

            switch ($num_provs) {
                case 1: $width_desc = 368;
                        $width_familia = 170;
                        break;
                case 2: $width_desc = 308;
                        $width_familia = 135;
                        break;
                case 3: $width_desc = 248;
                        $width_familia = 100;
                        break;
            }

            $th = "";
            for ($i = 0; $i < $num_provs; $i++){
                $th .= '<th align="center" valign="middle" width="95"><b>'.$prov_group[$i]['razonSocial'].'</b></th>';
            }

            $array_widths = array("descripcion" => $width_desc, "familia" => $width_familia);

            array_push($arr_th, $th);
            array_push($arr_width, $array_widths);
        }

        //NUMERO DE COTIZACIONES POR PROVEEDOR. CADA PROVEEDOR TIENE EL MISMO NUMERO DE COTIZACIONES.
        $cot_por_prov = count($cot_split[0][0]);

        $arr_td = array();

        //count($arr_width) nos dice cuantas páginas se van a generar
        for($i = 0; $i < count($proveedores_split); $i++){
            $num_provs = count($cot_split[$i]);
            for($j = 0; $j < $cot_por_prov; $j++){
                $td = "";
                for ($k = 0; $k < $num_provs; $k++){
                    $preciounitario = $cot_split[$i][$k][$j]["preciounitarioIM"];
                    if ($preciounitario == "0.00"){
                        $importe = "N/C";
                    } else {
                        $importe = " $ " . number_format($cot_split[$i][$k][$j]["preciounitarioIM"], 2, '.', ',');
                        //$importe = "A";
                    }
                    $td .= '<td align="right" valign="middle" width="95">  '. $importe . '</td>';
                }
                //array_push($arr_td, $td);
                $arr_td[$i][$j] = $td;
            }

        }


        $data['arr_width'] = $arr_width;


        $data['prov_split'] = $proveedores_split;
        $data['arr_th'] = $arr_th;

        $data['arr_td'] = $arr_td;

        $data['imc_data'] = $this->Generarpdfmodel->get_imcdata($id);


        $this->load->view('reporte_imc.php', $data);

        //Para probar los queries del modelo
        //$this->load->view('reporte_prueba_bd', $data);
    }

    function resumen_icm($id){
        $resumen = $this->Generarpdfmodel->get_resumenicm($id);
        $data['imc_header'] = $this->Generarpdfmodel->get_imc_header($id);
        $data['im_aprueba'] = $this->Generarpdfmodel->get_im_empleado_autoriza($id);

        $tr = "";
        foreach ($resumen as $row){

            $lugar = "";
            if($row['lugarEntrega'] == "OTRO"){
                $lugar = "ESPECIFICADO EN ANEXO";
            } else if($row['lugarEntrega'] == "0"){
                $lugar = "N/A";
            } else {
                $lugar = $row['lugarEntrega'];
            }

            $tr .= '
            <tr nobr="true">
                <td align="center" width="120"><i>'.$row['razonSocial'].'</i></td>
                <td align="center" width="160"><i>'.$row['descripcion'].'</i></td>
                <td align="center" width="60">'.$row['cantidad'].'</td>
                <td align="center" width="60">'.$row['partida'].'</td>
                <td align="center" width="50">'.$row['tiempoEntrega'].'</td>
                <td align="center" width="124">'.$lugar.'</td>
                <td align="center" width="50">'.$row['moneda'].'</td>
                <td align="center" width="50">'.$row['vigenciacotizacion'].' DIAS</td>
                <td align="center" width="100">'.$row['especificacion'].'</td>
                <td align="right"> $ '.number_format($row['preciounitarioIM'],'2', '.', ',').'</td>
                <td align="right"> $ '.number_format($row['preciounitarioIM']*$row['cantidad'],'2', '.', ',').'</td>
            </tr>';
        }

        $data['tbody'] = $tr;
        $this->load->view('reporte_resumenicm', $data);
        //$this->load->view('reporte_prueba_bd', $data);

    }

    function bitacora_pmc($id){
        $this->load->model('Imgeneralmodel');

        //Arreglo que contiene los pmc al cargar la página inicialmente
        $pmc_inicial = $this->Imgeneralmodel->get_pmc_array($id);

        $array_pmc_inicial = array();
        foreach ($pmc_inicial as $partida){
            array_push($array_pmc_inicial, $partida["pmc"]);
        }

        $data['pmc_inicial'] = $array_pmc_inicial;

        $arr = $this->Imgeneralmodel->get_pmc_data($id);

        $output2 = $this->formatPmcArray($arr);

        $listaprov = $this->Imgeneralmodel->get_img_prooveedores_cotizados($id);

        $bitacora_pmc = "";


        $num_partidas = count($output2);

        foreach($output2 as $row => $innerArray){
            foreach($innerArray as $key => $value){
                if($value == 0){
                    unset($output2[$row][$key]);
                }
            }
        }

        $bitacora_pmc .= "NUMERO DE PARTIDAS: ".$num_partidas;
        $bitacora_pmc .= "<br>";
        $bitacora_pmc .= "--------------------------------------------------------------------------------------------------------------------------------------------";
        $bitacora_pmc .= "<br>";



        if($num_partidas >= 1) {
            for ($i = 0; $i < $num_partidas; $i++)
            {

                $bitacora_pmc .= "<br>";
                $bitacora_pmc .= "<br>";
                $bitacora_pmc .= "<h2>Partida ".($i + 1)."</h2>";
                $bitacora_pmc .= "<br>";

                if (count($output2[$i]) <= 1){
                    //NO NECESITA HACER NADA MAS PORQUE ESA PARTIDA SOLO TIENE UNA COTIZACION

                    $bitacora_pmc .= "SOLO HAY UNA COTIZACION EN ESTA PARTIDA";
                    $bitacora_pmc .= "<br>";
                    $bitacora_pmc .= "<h4><b>PMC = 0</b></h4>";
                    $bitacora_pmc .= "----------------------------------------------------------------------------------------------------------------------------------------------------------";


                } else{
                    //NUMERO DE LAS COTIZACIONES POR PARTIDA - 1
                    $num_intervalos = count($output2[$i]) - 1;

                    $array_promedios = array();



                    $maxvalue = max($output2[$i]);
                    $minvalue = min($output2[$i]);
                    $val_diferencia = $maxvalue - $minvalue;
                    $bitacora_pmc .= "VAL DIFERENCIA: $val_diferencia";
                    $bitacora_pmc .= "<br>";
                    $val_rango = $val_diferencia/$num_intervalos;
                    //echo "VL: $val_rango";
                    //echo "<br>";

                    //ARRAY DE FILA PARA LA TABLA PMC
                    $arr_filapmc = array();
                    //$arr_filapmc["partida"] = $i + 1;



                    for($j = 0; $j < $num_intervalos; $j++){


                        $bitacora_pmc .= "<br>";
                        $bitacora_pmc .= "<h3>Intervalo ".($j+1)."</h3>";
                        $bitacora_pmc .= "<br>";

                        if($j == 0)
                            $lim_inf = $minvalue;

                        $bitacora_pmc .= "Límite inferior: ".round($lim_inf, 2);
                        $bitacora_pmc .= "<br>";
                        $lim_sup = $lim_inf + $val_rango;

                        $bitacora_pmc .= "Límite superior: ".round($lim_sup, 2);
                        $bitacora_pmc .= "<br>";

                        $frec_promedio = array();
                        $frecuencias = 0;
                        $k = 0;
                        $precios_intervalo = array();
                        $prom_intervalo = 0;
                        foreach($output2[$i] as $proveedor => $precio){
                            if($j == $num_intervalos - 1){
                                if($precio >= $lim_inf && $precio <= $maxvalue){
                                    $frecuencias++;
                                    $precios_intervalo[$proveedor] = $precio;
                                }
                            } else {
                                if($precio >= $lim_inf && $precio < $lim_sup) {
                                    $frecuencias++;
                                    $precios_intervalo[$proveedor] = $precio;
                                }
                            }

                            $k++;
                        }

                        if (empty($precios_intervalo)){
                            $prom_intervalo = 0;
                        } else {
                            $prom_intervalo = array_sum($precios_intervalo)/count($precios_intervalo);
                        }

                        $bitacora_pmc .= "Frecuencias en el intervalo: $frecuencias";
                        $bitacora_pmc .= "<br>";
                        $bitacora_pmc .= "Promedio del intervalo: ".round($prom_intervalo, 2);
                        $bitacora_pmc .= "<br>";
                        $bitacora_pmc .= "<br>";

                        $frec_promedio['frecuencias'] = $frecuencias;
                        $frec_promedio['promedio'] = round($prom_intervalo, 2);

                        array_push($array_promedios, $frec_promedio);
                        foreach ($precios_intervalo as $proveedor => $precio){
                            $array_promedios[$j][$proveedor] = $precio;
                        }


                        $lim_inf = $lim_sup;


                        $bitacora_pmc .= "PRECIOS DENTRO DEL INTERVALO ";
                        $bitacora_pmc .= "<br>";
                        foreach ($precios_intervalo as $key => $value){
                            $idProveedor = substr($key, strpos($key, "_") + 1);
                            $bitacora_pmc .= $listaprov[$idProveedor].": $".$value;
                            $bitacora_pmc .= "<br>";
                        }
                        $bitacora_pmc .= "<br>";
                        $bitacora_pmc .= "****************************************************************************";
                        $bitacora_pmc .= "<br>";


                    }

                    //echo "ARRAY PROMEDIOS";
                    //var_dump($array_promedios);

                    //Encontrar el array con el mayot número de frecuencias
                    //Si es más de uno tomar el índice menor
                    $max_frecuencias = max(array_column($array_promedios, 'frecuencias'));

                    $bitacora_pmc .= "Número máximo de frecuencias: $max_frecuencias";
                    $bitacora_pmc .= "<br>";
                    $bitacora_pmc .= "<br>";

                    $key = array_search($max_frecuencias, array_column($array_promedios, 'frecuencias'));

                    $bitacora_pmc .= "Intervalo con el número máximo de frecuencias: ".($key+1);
                    $bitacora_pmc .= "<br>";
                    $bitacora_pmc .= "<br>";

                    $bitacora_pmc .= "<br>";


                    //ESTE ES EL ARREGLO CON MAYOR NÚMERO DE FRECUENCIAS QUE SE TOMA A CONSIDERACIÓN PARA CALCULAR EL PMC
                    $array_calc_pmc = $array_promedios[$key];
                    //PROMEDIO DEL INERVALO CON MAYOR FRECUENCIAS
                    $prom_intervalo_mayor_frec = $array_calc_pmc['promedio'];
                    unset($array_calc_pmc['frecuencias']);
                    unset($array_calc_pmc['promedio']);

                    //var_dump($array_calc_pmc);
                    //echo "Promedio : ";


                    //VERIFICAR LAS COTIZACIONES REALES Y LAS HISTORICAS
                    $cot_reales = array();
                    $cot_historicas = array();

                    foreach ($array_calc_pmc as $key => $value){
                        if(preg_match('(6666|7777|8888|9999)', $key) === 1) {
                            array_push($cot_historicas, $value);
                        } else {
                            array_push($cot_reales, $value);
                        }
                    }


                    $bitacora_pmc .= "COTIZACIONES HISTÓRICAS";
                    //var_dump($cot_historicas);
                    $bitacora_pmc .= "<br>";
                    foreach ($cot_historicas as $key => $value){
                        $bitacora_pmc .= "$ ".$value;
                        $bitacora_pmc .= "<br>";
                    }


                    $bitacora_pmc .= "COTIZACIONES REALES";
                    $bitacora_pmc .= "<br>";
                    foreach ($cot_reales as $key => $value){
                        $bitacora_pmc .= "$ ".$value;
                        $bitacora_pmc .= "<br>";
                    }
                    $bitacora_pmc .= "<br>";
                    $bitacora_pmc .= "<br>";

                    $bitacora_pmc .= "PROMEDIO DEL INTERVALO CON MAYOR FRECUENCIA: " . $prom_intervalo_mayor_frec;
                    $bitacora_pmc .= "<br>";


                    //SI EL ARREGLO DE COTIZACIONES REALES ESTÁ VACÍO HAY QUE SACAR EL PROMEDIO DE LAS COIZACIONES HISTORICAS
                    //SI EL ARREGLO DE COIZACIONES HISTÓRICAS ESTÁ VACÍO EL MENOR VALOR

                    if(empty($cot_reales)){
                        $pmc = round(array_sum($cot_historicas)/count($cot_historicas), 2);
                    } else {
                        $cot_minima = min($cot_reales);
                        if($cot_minima < $prom_intervalo_mayor_frec){
                            $pmc = $cot_minima;
                        } else {
                            $pmc = $prom_intervalo_mayor_frec;
                        }
                    }


                    $bitacora_pmc .= "<br>";
                    $bitacora_pmc .= "<br>";
                    $bitacora_pmc .= "<h4><b>PMC = ".$pmc."</b></h4>";
                    $bitacora_pmc .= "<br>";
                    $bitacora_pmc .= "<br>";
                    $bitacora_pmc .= "<br>";
                    $bitacora_pmc .= "----------------------------------------------------------------------------------------------------------------------------------------------------------";
                    $bitacora_pmc .= "<br>";
                    //echo $val_rango;
                    $bitacora_pmc .= "<br>";
                }
            }
        }

        $data['bitacora'] = $bitacora_pmc;


        $this->load->view('bitacora_pmc.php', $data);
    }

    function formatPmcArray($arr){

        $output = array();

        foreach($arr as $item){
            if(in_array($item['partida'], array_column($output, 'partida'))){
                // add store to already existing item
                $key = array_search($item['partida'], array_column($arr, 'partida'));
                $output[$key]['idProveedor_' . $item['idProveedor']] = floatval($item['preciounitarioIM']);
            }else{
                // add new item with store
                $tmp = array(
                    'partida' => $item['partida'],
                    'idProveedor_' . $item['idProveedor'] => floatval($item['preciounitarioIM']),
                );
                $output[] = $tmp;
            }
        }

        //Quito la llave "partida" del arreglo
        foreach(array_keys($output) as $key) {
            unset($output[$key]['partida']);
        }

        return $output;
    }
}

?>