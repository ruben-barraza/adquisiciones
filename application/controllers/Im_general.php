<?php
/* 
 * Generated by CRUDigniter v3.0 Beta 
 * www.crudigniter.com
 */

error_reporting(0);

class Im_general extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Imgeneralmodel');
        $this->load->model('Comboboxesmodel');
        $this->load->helper('form');
    }


    /*
     * Listing of listaim_general
     */
    function index()
    {

        $data['listaim_general'] = $this->Imgeneralmodel->get_all_listaim_general();

        $data['familias'] = $this->Comboboxesmodel->getFamilias();
        $data['_view'] = 'im_general/index';
        $this->load->view('layouts/main', $data);


    }

    function obtenerNombreEmpleadoImGeneral()
    {
        $rpe = $_POST['rpe'];
        $data['nombre'] = $this->Imgeneralmodel->get_empleado($rpe);
        echo json_encode($data);
    }

    function obtenerPreciosIMC()
    {
        $prov_id = $_POST['idProveedor'];
        $idPog = $_POST['idPog'];
        $data['preciosimc'] = $this->Imgeneralmodel->get_imc_precios($prov_id, $idPog);

        $data['subtotalimc'] = $this->Imgeneralmodel->get_imc_subtotal($prov_id, $idPog);

        $moneda = $this->Imgeneralmodel->get_imc_moneda($prov_id, $idPog);
        $data['moneda'] = $moneda;

        $data['fecha_cot'] = 0;

        $fecha_cot = $this->Imgeneralmodel->get_imc_fecha($prov_id, $idPog);
        if($moneda == "USD"){
            $fechaCotizacion = date("d/m/Y", strtotime($fecha_cot));
            $data['fecha_cot'] = $fechaCotizacion;
        } else {
            $data['fecha_cot'] = $fecha_cot;
        }

        $data['tipo_cambio'] = $this->Imgeneralmodel->get_imc_cambio($prov_id, $idPog);





        echo json_encode($data);
    }

    function updatePreciosIMC()
    {
        $cantidad = $_POST['cantidad'];
        $importe = $_POST['importe'];
        $idProveedor = $_POST['idProveedor'];
        $idPog = $_POST['idPog'];
        $precioIM = $_POST['precio'];
        $codigo = $_POST['codigo'];
        $tipocambio = $_POST['tipocambio'];
        $moneda = $_POST['moneda'];
        $cotizado = $_POST['cotizado'];

        $fecha = $_POST['fecha'];
        if (fecha != "0000-00-00"){
            $fecharep = str_replace('/', '-', $fecha);
            $fechaelaboracion = date("Y-m-d", strtotime($fecharep));
        } else {
            $fechaelaboracion = $fecha;
        }


        $idArticulo = $this->Imgeneralmodel->get_idArticulo($codigo);

        $this->Imgeneralmodel->update_imc_precios($cantidad, $precioIM, $importe, $idProveedor, $idArticulo, $idPog, $moneda, $tipocambio, $fechaelaboracion, $cotizado);
    }

    function updatePMC(){
        $idImg = $_POST['idImg'];
        $idPog = $_POST['idPog'];

        $array_pmc = $this->Imgeneralmodel->get_pmc_data($idImg);
        $output = $this->formatPmcArray($array_pmc);

        $num_cotizaciones = $this->calcularCotizaciones($output);
        $arr_cpp = $this->calcularCPP($output);

        $data['num_cotizaciones'] = $num_cotizaciones;
        $data['arr_cpp'] = $arr_cpp;

        $pmc = $this->calcularPMC($output, $num_cotizaciones, $idPog);
        $data['pmc'] = $pmc;

        /*
        if ($num_cotizaciones > 1){
            $pmc = $this->calcularPMC($output, $num_cotizaciones, $idPog);
            $data['pmc'] = $pmc;
        } else {
            $this->Imgeneralmodel->clear_pmc($idPog);

            //Arreglo que contiene los pmc al cargar la página inicialmente
            $pmc = $this->Imgeneralmodel->get_pmc_array($idPog);

            $array_pmc = array();
            foreach ($pmc as $partida){
                array_push($array_pmc, $partida["pmc"]);
            }

            $data['pmc'] = $array_pmc;
        }
        */
        echo json_encode($data);
    }

    function updateIMG()
    {
        $idimg = $_POST['idimg'];
        $titulo = $_POST['titulo'];
        $autorizaRpe = $_POST['empleadoAutorizaRpe'];
        $formulaRpe = $_POST['empleadoFormulaRpe'];
        $solped = $_POST['solped'];
        $estatus = $_POST['imcestatus'];

        $fecha = $_POST['fechaElaboracion'];
        $fecharep = str_replace('/', '-', $fecha);
        $fechaelaboracion = date("Y-m-d", strtotime($fecharep));

        $idEmpleadoAutoriza = $this->Imgeneralmodel->get_idEmpleado($autorizaRpe);
        $idEmpleadoFormula = $this->Imgeneralmodel->get_idEmpleado($formulaRpe);

        $params = array(
            'titulo' => $titulo,
            'idEmpleadoFormula' => $idEmpleadoFormula,
            'idEmpleadoAutoriza' => $idEmpleadoAutoriza,
            'estatus' => $estatus,
            'SOLPED' => $solped,
            'fechaElaboracion' => $fechaelaboracion,
        );

        $this->Imgeneralmodel->update_im_general($idimg, $params);
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

    //Recibo una referencia del arreglo que viene de la BD
    function calcularCotizaciones(&$output){
        //Guardo en un arreglo todas las llaves del subarreglo. Como cada subarreglo tiene las mismas llave, tomo el índice 0.
        $subarraykeys = array_keys($output[0]);
        //En este array vacío se van agregando los idProveedor que no cuenten con cotizacion
        $removekeys = array();

        $num_cotizaciones = 0;

        //Checo el número de cotizaciones, si la suma de algún idProveedor = 0, agrego a esa llave a $removekeys
        foreach($subarraykeys as $key){
            if(array_sum(array_column($output, $key)) != 0){
                $num_cotizaciones++;
            } else if(array_sum(array_column($output, $key)) == 0) {
                array_push($removekeys, $key);
            }
        }

        //Quito los proveedores que no tienen cotizaciones
        for ($i = 0; $i < count($output); $i++){
            foreach($removekeys as $key) {
                unset($output[$i][$key]);
            }
        }

        return $num_cotizaciones;
    }

    //Calcular cotizaciones por partida
    function calcularCPP(&$output){
        //array donde se va a guardar el número de cotizaciones por cada partida
        $array_cpp = [];

        foreach($output as $partida){
            $cotizaciones = count(array_filter($partida));
            array_push($array_cpp, $cotizaciones);
        }

        return $array_cpp;

    }

    function calcularPMC($output, $num_cotizaciones, $pog_id){
        
        //Array donde se guardan los PMC
        $array_pmc = array();

        $num_partidas = count($output);



        foreach($output as $row => $innerArray){
            foreach($innerArray as $key => $value){
                if($value == 0){
                    unset($output[$row][$key]);
                }
            }
        }



        //CON OUTPUT 2 SE EMPIEZA A CALCULAR EL PMC

        if($num_partidas > 1) {
            for ($i = 0; $i < $num_partidas; $i++)
            {
                if (count($output[$i]) <= 1){
                    //NO NECESITA HACER NADA MAS PORQUE ESA PARTIDA SOLO TIENE UNA COTIZACION
                    array_push($array_pmc, 0);
                } else{
                    //NUMERO DE LAS COTIZACIONES POR PARTIDA - 1
                    $num_intervalos = count($output[$i]) - 1;

                    $array_promedios = array();


                    $maxvalue = max($output[$i]);
                    $minvalue = min($output[$i]);
                    $val_diferencia = $maxvalue - $minvalue;
                    $val_rango = $val_diferencia/$num_intervalos;

                    for($j = 0; $j < $num_intervalos; $j++){
                        if($j == 0)
                            $lim_inf = $minvalue;

                        $lim_sup = $lim_inf + $val_rango;

                        $frec_promedio = array();
                        $frecuencias = 0;
                        $k = 0;
                        $precios_intervalo = array();
                        foreach($output[$i] as $proveedor => $precio){
                            if($j == $num_intervalos - 1){
                                if($precio >= $lim_inf && $precio <= $lim_sup){
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
                        $frec_promedio['frecuencias'] = $frecuencias;
                        $frec_promedio['promedio'] = round($prom_intervalo, 2);

                        array_push($array_promedios, $frec_promedio);
                        foreach ($precios_intervalo as $proveedor => $precio){
                            $array_promedios[$j][$proveedor] = $precio;
                        }
                        $lim_inf = $lim_sup;

                    }

                    //Encontrar el array con el mayot número de frecuencias
                    //Si es más de uno tomar el índice menor
                    $max_frecuencias = max(array_column($array_promedios, 'frecuencias'));


                    $key = array_search($max_frecuencias, array_column($array_promedios, 'frecuencias'));


                    //ESTE ES EL ARREGLO CON MAYOR NÚMERO DE FRECUENCIAS QUE SE TOMA A CONSIDERACIÓN PARA CALCULAR EL PMC
                    $array_calc_pmc = $array_promedios[$key];
                    //PROMEDIO DEL INERVALO CON MAYOR FRECUENCIAS
                    $prom_intervalo_mayor_frec = $array_calc_pmc['promedio'];
                    unset($array_calc_pmc['frecuencias']);
                    unset($array_calc_pmc['promedio']);




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
                    array_push($array_pmc, $pmc);

                }
            }

            //Guardar pmc en la tabla im_concepto
            $this->Imgeneralmodel->update_pmc($array_pmc, $pog_id);

            return $array_pmc;
        }
    }

    /*
    //Obtener el tipo de cambio
    function get_TipoDeCambioPesoDolar() {

        $resultado='';
        $tc='0.00';
        $client = new SoapClient(null, array('location' => 'http://www.banxico.org.mx:80/DgieWSWeb/DgieWS?WSDL',
            'uri'      => 'http://DgieWSWeb/DgieWS?WSDL',
            'encoding' => 'ISO-8859-1',
            'trace'    => 1) );
        try {
            $resultado = $client->tiposDeCambioBanxico();
        } catch (SoapFault $exception) {

        }
        if(!empty($resultado)) {
            $dom = new DomDocument();
            $dom->loadXML($resultado);
            $xmlDatos = $dom->getElementsByTagName( "Obs" );
            if($xmlDatos->length>1) {
                $item = $xmlDatos->item(1);
                $tc = $item->getAttribute('OBS_VALUE');
            }
        }

        return $tc;
    }
    */

    /*
     * Adding a new im_general
     */
    function add()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('titulo', 'Titulo', 'max_length[255]|required');
        $this->form_validation->set_rules('idEmpleadoFormula', 'IdEmpleadoFormula', 'max_length[5]');
        $this->form_validation->set_rules('idEmpleadoAutoriza', 'IdEmpleadoAutoriza', 'max_length[5]');
        $this->form_validation->set_rules('fechaElaboracion', 'FechaElaboracion', 'required');
        $this->form_validation->set_rules('idMunicipioElaboracion', 'IdMunicipioElaboracion', 'required');
        $this->form_validation->set_rules('solped', 'solped', 'integer', 'max_length[12]');


        if ($this->form_validation->run()) {
            $params = array(
                'titulo' => $this->input->post('titulo'),
                'idEmpleadoFormula' => $this->input->post('idEmpleadoFormula'),
                'idEmpleadoAutoriza' => $this->input->post('idEmpleadoAutoriza'),
                'fechaElaboracion' => $this->input->post('fechaElaboracion'),
                'idMunicipioElaboracion' => $this->input->post('idMunicipioElaboracion'),
            );

            redirect('im_general/index');
        } else {
            $this->load->model('Comboboxesmodel');
            $data['listaim_concepto'] = $this->Imgeneralmodel->get_all_listaim_concepto();
            $data['familias'] = $this->Comboboxesmodel->getFamilias();
            $data['almacenes'] = $this->Comboboxesmodel->getAlmacenes();
            $data['estados'] = $this->Comboboxesmodel->getEstados();
            $data['peticiones'] = $this->Comboboxesmodel->getPeticiones();
            $data['sumas'] = $this->Imgeneralmodel->suma_imgeneral();


            $data['_view'] = 'im_general/add';
            $this->load->view('layouts/main', $data);

        }
    }

    /*
     * Editing a im_general
     */
    function edit($id)
    {

        // check if the im_general exists before trying to edit it
        $data['im_general'] = $this->Imgeneralmodel->get_im_general($id);
        $pog_id = $this->Imgeneralmodel->get_pog_id($id);

        if (isset($data['im_general']['id'])) {



                $this->load->library('form_validation');

                $this->form_validation->set_rules('titulo', 'Titulo', 'max_length[255]|required');
                $this->form_validation->set_rules('empleadoFormula', 'empleadoFormula', 'required');
                $this->form_validation->set_rules('empleadoAutoriza', 'empleadoAutoriza', 'required');


                if ($this->form_validation->run()) {


                } else {

                    $data['empleadoAutoriza'] = $this->Imgeneralmodel->getEmpleadoAutoriza($id);
                    $data['empleadoFormula'] = $this->Imgeneralmodel->getEmpleadoFormula($id);
                    $data['imcProveedores'] = $this->Imgeneralmodel->get_img_proveedores($pog_id);
                    $data['imcConcepto'] = $this->Imgeneralmodel->get_imc_concepto($pog_id);


                    //Arreglo que contiene los pmc al cargar la página inicialmente
                    $pmc_inicial = $this->Imgeneralmodel->get_pmc_array($pog_id);

                    $array_pmc_inicial = array();
                    foreach ($pmc_inicial as $partida){
                        array_push($array_pmc_inicial, $partida["pmc"]);
                    }

                    $data['pmc_inicial'] = $array_pmc_inicial;

                    $arr = $this->Imgeneralmodel->get_pmc_data($id);

                    $output = $this->formatPmcArray($arr);

                    $arr_cpp = $this->calcularCPP($output);

                    $data['arr_cpp'] = $arr_cpp;


                    //Tipo de cambio
                    //CONSEGUIR EL TIPO DE CAMBIO DEL DÍA ALENTA LA PÁGINA
                    //$tipo_cambio = $this->get_TipoDeCambioPesoDolar();
                    //$data['tipo_cambio'] = $tipo_cambio;


                $data['_view'] = 'im_general/edit';
                $this->load->view('layouts/main', $data);
            }
        } else
            show_error('The im_general you are trying to edit does not exist.');


    }

    /*
     * Deleting im_general
     */
    function remove($id)
    {
        $im_general = $this->Imgeneralmodel->get_im_general($id);

        // check if the im_general exists before trying to delete it
        if (isset($im_general['id'])) {
            $this->Imgeneralmodel->delete_im_general($id);
            redirect('im_general/index');
        } else
            show_error('The im_general you are trying to delete does not exist.');
    }

    function obtenerListaIMCFamilia(){
        $clave = $_POST['clave'];
        $data['listaimcfamilia'] = $this->Imgeneralmodel->get_all_lista_imc_familia($clave);
        echo json_encode($data);
    }

    function PeticionesOferta($id)
    {
        $data['peticionesoferta'] = $this->Imgeneralmodel->peticionesoferta($id);
        echo json_encode($data);

    }

    public function GuardarDatos()
    {
        $this->Imgeneralmodel->GuardarDatosModel();

    }

}
