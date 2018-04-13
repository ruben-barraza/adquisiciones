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
        /*


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
        */

        //Array donde se guardan los PMC
        $array_pmc = array();

        $num_partidas = count($output);

        //Este array va a contener solamente las cotizaciones, no incluye ningún precio histórico
        //De aquí se toma el mínimo para la cotización más baja
        $array_cotizaciones = $output;
        $keys_historicos = array("idProveedor_6666", "idProveedor_7777", "idProveedor_8888", "idProveedor_9999");

        //Quito los precios historicos del array output3
        for ($i = 0; $i < count($array_cotizaciones); $i++){
            foreach($keys_historicos as $key) {
                unset($array_cotizaciones[$i][$key]);
            }
        }

        //$num_intervalos = $num_cotizaciones - 1;

        //QUITA LOS PROVEEDORES QUE NO TIENEN COTIZACION
        foreach($output as $row => $innerArray){
            foreach($innerArray as $key => $value){
                if($value == 0){
                    unset($output[$row][$key]);
                }
            }
        }

        foreach($array_cotizaciones as $row => $innerArray){
            foreach($innerArray as $key => $value){
                if($value == 0){
                    unset($array_cotizaciones[$row][$key]);
                }
            }
        }


        //Ciclo para cada partida
        for ($i = 0; $i < $num_partidas; $i++)
        {
            if (count($output[$i]) <= 1){
                //NO NECESITA HACER NADA MAS PORQUE ESA PARTIDA SOLO TIENE UNA COTIZACION
                array_push($array_pmc, 0);

            } else {
                //En este array se agregan la frecuencia y el promedio que hubo en cada intervalo (donde no fue 0)
                $array_promedios = array();

                //Contiene los promedios de los intervalos con mayor número de frecuencias
                $max_frec_prom = array();

                //Toma los valores máximos y mínimos sin importar si son cotizaciones o históricos
                $maxvalue = max($output[$i]);
                $minvalue = min($output[$i]);

                $num_intervalos = count($output[$i]) - 1;


                $val_diferencia = $maxvalue - $minvalue;
                //Valor de rango del intervalo
                $val_rango = $val_diferencia/$num_intervalos;

                //Ciclo para cada intervalo
                for($j = 0; $j < $num_intervalos; $j++){
                    //El primer intervalo empieza con el valor mínimo
                    if($j == 0)
                        $lim_inf = $minvalue;
                    $lim_sup = $lim_inf + $val_rango;

                    //Es un array temporal usado en este ciclo compuesto de dos llaves "frecuancia" y "promedio"
                    //Solo se crea si hubo una cotización en este intervalo
                    $frec_promedio = array();
                    $frecuencias = 0;

                    //Array que contiene todas las cotizaciones en ese intervalo
                    $precios_intervalo = array();

                    //Recorre cada subarreglo (cotizaciones)
                    foreach($output[$i] as $value){
                        //Si está en el último intervalo cambia la condicional
                        if($j == $num_intervalos - 1){
                            if($value >= $lim_inf && $value <= $lim_sup){
                                $frecuencias++;
                                array_push($precios_intervalo, $value);
                            }
                        } else {
                            if($value >= $lim_inf && $value < $lim_sup) {
                                $frecuencias++;
                                array_push($precios_intervalo, $value);
                            }
                        }
                    }

                    if (empty($precios_intervalo)){
                        //Si no hubo cotizaciones en ese intervalo
                        $prom_intervalo = 0;
                    } else {
                        //Se calcula el promedio de las cotizaciones en ese intervalo
                        $prom_intervalo = array_sum($precios_intervalo)/count($precios_intervalo);
                    }
                    $frec_promedio['frecuencias'] = $frecuencias;
                    $frec_promedio['promedio'] = round($prom_intervalo, 2);

                    array_push($array_promedios, $frec_promedio);
                    $lim_inf = $lim_sup;

                }

                //Valor max de frecuencias
                $max_frecuencias = max(array_column($array_promedios, 'frecuencias'));
                //Checo el arreglo $array_promedios y todos los promedios que coincidan con el valor máximo de frecuencias
                //se agregan a $max_frec_prom
                foreach ($array_promedios as $row){
                    if ($row['frecuencias'] == $max_frecuencias){
                        array_push($max_frec_prom, $row['promedio']);
                    }
                }

                //Saco el promedio de los promedios que tengan el máximo número de frecuencias
                $prom_frec = array_sum($max_frec_prom)/count($max_frec_prom);

                $cot_mas_baja =  min(array_filter($array_cotizaciones[$i]));

                $pmc = min($prom_frec, $cot_mas_baja);
                array_push($array_pmc, $pmc);
            }
        }

        //Guardar pmc en la tabla im_concepto
        $this->Imgeneralmodel->update_pmc($array_pmc, $pog_id);

        return $array_pmc;
    }

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



                    //Check pmc
                    //Copia para ver el debug en edit var
                    $output2 = $output;


                    $output = $this->formatPmcArray($arr);
                    $output2 = $output;
                    $num_cotizaciones = $this->calcularCotizaciones($output);
                    $arr_cpp = $this->calcularCPP($output);
                    $data['num_cotizaciones'] = $num_cotizaciones;
                    $data['arr_cpp'] = $arr_cpp;
                    $data['newOutput'] = $output;
                    if ($num_cotizaciones > 1){
                        $pmc = $this->calcularPMC($output, $num_cotizaciones, $pog_id);
                        $data['pmc'] = $pmc;
                    }
                    $data['output2'] = $output2;




                    //////////////
                    //Tipo de cambio
                    $tipo_cambio = $this->get_TipoDeCambioPesoDolar();
                    $data['tipo_cambio'] = $tipo_cambio;


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
