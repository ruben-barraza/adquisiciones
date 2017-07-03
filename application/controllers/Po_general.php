<?php
/* 
 * Generated by CRUDigniter v3.0 Beta 
 * www.crudigniter.com
 */

date_default_timezone_set('America/Hermosillo');
 
class Po_general extends CI_Controller{
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pogeneralmodel');
    } 

    //Crea las relaciones en las tablas po_acuse y po_aclaracion
	function crearRelacionEmpleado(){
        $idPog = $_POST['id'];
		$rpe1 = $_POST['rpe1'];
        $rpe2 = $_POST['rpe2'];
        
        $idEmpleado1 = $this->Pogeneralmodel->get_idEmpleado($rpe1);
        $empleadoResponsable = array_values($idEmpleado1)[0]['id'];
        $idEmpleado2 = $this->Pogeneralmodel->get_idEmpleado($rpe2);
        $empleadoFormula = array_values($idEmpleado2)[0]['id'];
		
        $this->Pogeneralmodel->add_uk_po_aclaracion_acuse($idPog, $empleadoResponsable);
        $this->Pogeneralmodel->add_uk_po_aclaracion_acuse($idPog, $empleadoFormula);
	}

    function crearRelacionProveedor(){
        $idPog = $_POST['id'];
        $clave = $_POST['clave'];
        $contacto = $_POST['numcontacto']; 

        $proveedor = $this->Pogeneralmodel->get_idProveedor($clave);
        $idProveedor = array_values($proveedor)[0]['id'];
        $this->Pogeneralmodel->add_relacion_pog_proveedor($idPog, $idProveedor, $contacto);
    }

    function crearRelacionIMGeneral(){
        $idPog = $_POST['id'];
        $titulo = $_POST['titulo'];
        $rpe1 = $_POST['rpe1'];
        $rpe2 = $_POST['rpe2'];
        $idMunicipio = $_POST['idMunicipio'];
        $fecha = $_POST['fecha'];

        $fechaElaboracion = str_replace('/', '-', $fecha);

        $idEmpleado1 = $this->Pogeneralmodel->get_idEmpleado($rpe1);
        $empleadoResponsable = array_values($idEmpleado1)[0]['id'];
        $idEmpleado2 = $this->Pogeneralmodel->get_idEmpleado($rpe2);
        $empleadoFormula = array_values($idEmpleado2)[0]['id'];

        $params_im = array(
            'idPog' => $idPog,
            'titulo' => $titulo,
            'idEmpleadoFormula' => $empleadoFormula,
            'idEmpleadoAutoriza' => $empleadoResponsable,
			'fechaElaboracion' => date("Y-m-d", strtotime($fechaElaboracion)),
            'idMunicipioElaboracion' => $idMunicipio,
            'estatus' => '0'
        );

        $this->Pogeneralmodel->add_im_general($params_im);

    }

    function crearRelacionIMConcepto(){
        $idPog = $_POST['id'];
        $tipo = $_POST['tipo'];
        $codigo = $_POST['articuloCodigo'];
        $partida = $_POST['partida'];
        $plazoEntrega = $_POST['plazoEntrega'];
        $cantidad = $_POST['cantidad'];
        $lugarEntrega = $_POST['lugarEntrega'];
        $direccion = $_POST['direccion'];

        //Obtener el ID del artículo según el código
        $articulo = $this->Pogeneralmodel->get_idArticulo($codigo);
        $idArticulo = array_values($articulo)[0]['id'];

        $params = array(
            'idPog' => $idPog,
            'idImg' => -1,
            'tipo' => $tipo,
            'idArticulo' => $idArticulo,
            'idProveedor' => -1,
            'partida' => $partida,
            'plazoEntrega' => $plazoEntrega,
            'cantidad' => $cantidad,
            'cantidadPO' => 0,
            'cantidadIM' => 0,
            'lugarEntrega' => $lugarEntrega,
            'direccionEntrega' => $direccion,
            'idAlmacen' => -1,
        );

        $this->Pogeneralmodel->add_im_concepto($params);
    }

    function obtenerNombreEmpleado(){
        $rpe = $_POST['rpe'];
        $data['nombre'] = $this->Pogeneralmodel->get_empleado($rpe);
		echo json_encode($data);
    }

    function obtenerIdConsecutivo(){
        $data['idPog'] = $this->Pogeneralmodel->get_idConsecutivo();
        echo json_encode($data);
    }

    function obtenerListaProveedores(){
        $idFamilia = $_POST['idFamilia']; 
        $data['listaproveedores'] = $this->Pogeneralmodel->get_all_listaproveedorfamilia($idFamilia);
        echo json_encode($data);
    }

    function obtenerListaProveedoresServicio(){
        $data['listaproveedoresservicio'] = $this->Pogeneralmodel->get_all_listaproveedorservicio();
        echo json_encode($data);
    }

    function obtenerListaArticulos(){
        $idFamilia = $_POST['idFamilia'];
        $data['listaarticulos'] = $this->Pogeneralmodel->get_all_listaarticulos($idFamilia);
        echo json_encode($data);
    }

    function obtenerDireccionAlmacen(){
        $idAlmacen = $_POST['idAlmacen'];
        $data['almacen'] = $this->Pogeneralmodel->get_direccionalmacen($idAlmacen);
        echo json_encode($data);
    }

    function obtenerArticuloCodigo(){
        $codigo = $_POST['codigo'];
        $data['articulo'] = $this->Pogeneralmodel->get_articulo_clave($codigo);
        echo json_encode($data);
    }

    function obtenerProveedorClave(){
        $clave = $_POST['clave'];
        $data['proveedor'] = $this->Pogeneralmodel->get_proveedor_codigo($clave);
        echo json_encode($data);
    }

    /*
     * Listing of listapo_general
     */
    function index()
    {
        $data['listapo_general'] = $this->Pogeneralmodel->get_all_listapo_general();

        $data['_view'] = 'po_general/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new po_general
     */
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('tipo','Tipo','required');
        $this->form_validation->set_rules('idFamilia','IdFamilia');
        $this->form_validation->set_rules('oficioNumero','OficioNumero','max_length[20]');
		$this->form_validation->set_rules('domicilio','Domicilio','max_length[255]|required');
		$this->form_validation->set_rules('empleadoResponsable','EmpleadoResponsable','max_length[5]required');
		$this->form_validation->set_rules('empleadoFormula','EmpleadoFormula','max_length[5]required');
		$this->form_validation->set_rules('fechaLimitePresentacion','FechaLimitePresentacion','required');
        $this->form_validation->set_rules('horaLimitePresentacion','HoraLimitePresentacion','max_length[10]');
		$this->form_validation->set_rules('ccp1','Ccp1','max_length[250]');
		$this->form_validation->set_rules('ccp2','Ccp2','max_length[250]');
		$this->form_validation->set_rules('ccp3','Ccp3','max_length[250]');
		$this->form_validation->set_rules('fechaElaboracion','FechaElaboracion','required');
		$this->form_validation->set_rules('asunto','Asunto','max_length[255]|required');

        //$this->form_validation->set_rules('titulo','Titulo','max_length[255]');
		//$this->form_validation->set_rules('fechaUltimaModificacion','FechaUltimaModificacion','required');
		
		if($this->form_validation->run())     
        {   
            $fecha1 = $this->input->post('fechaLimitePresentacion');
            $fechaLimitePresentacion = str_replace('/', '-', $fecha1);
            $fecha2 = $this->input->post('fechaElaboracion');
            $fechaElaboracion = str_replace('/', '-', $fecha2);

            $idEmpleadoResponsable = $this->Pogeneralmodel->get_idEmpleado($this->input->post('empleadoResponsable'));
            $empleadoResponsable = array_values($idEmpleadoResponsable)[0]['id']; 
            $idEmpleadoFormula = $this->Pogeneralmodel->get_idEmpleado($this->input->post('empleadoFormula'));
            $empleadoFormula = array_values($idEmpleadoFormula)[0]['id']; 

            $params = array(
				'tipo' => $this->input->post('tipo'),
                'idFamilia' => $this->input->post('idFamilia'),
                'oficioNumero' => $this->input->post('oficioNumero'),
				'domicilio' => $this->input->post('domicilio'),
				'idEmpleadoResponsable' => $empleadoResponsable,
				'idEmpleadoFormula' => $empleadoFormula,
				'fechaLimitePresentacion' => date("Y-m-d", strtotime($fechaLimitePresentacion)),
                'horaLimitePresentacion' => $this->input->post('horaLimitePresentacion'),
				'ccp1' => $this->input->post('ccp1'),
				'ccp2' => $this->input->post('ccp2'),
				'ccp3' => $this->input->post('ccp3'),
				'fechaElaboracion' => date("Y-m-d", strtotime($fechaElaboracion)),
				'asunto' => $this->input->post('asunto'),
				'idMunicipio' => $this->input->post('idMunicipio'),
				'fechaUltimaModificacion' => date('Y/m/d H:i:s', time()),
            );
            
            $po_general_id = $this->Pogeneralmodel->add_po_general($params);

            /*
            $params_im = array(
                'titulo' => $this->input->post('titulo'),
                'idEmpleadoFormula' => $empleadoFormula,
                'idEmpleadoAutoriza' => $empleadoResponsable,
				'fechaElaboracion' => date("Y-m-d", strtotime($fechaElaboracion)),
                'idMunicipioElaboracion' => $this->input->post('idMunicipio'),
                'estatus' => '0'
            );

            $this->Pogeneralmodel->add_im_general($params_im);
            */
            redirect('po_general/index');
        }
        else
        {
			$this->load->model('Empleadomodel');
			$data['all_listaempleado'] = $this->Empleadomodel->get_all_listaempleado();

            $this->load->model('Comboboxesmodel');
			$data['familias'] = $this->Comboboxesmodel->getFamilias();
            $data['almacenes'] = $this->Comboboxesmodel->getAlmacenes();
            $data['estados'] = $this->Comboboxesmodel->getEstados();

			$this->load->model('Municipiomodel');
			$data['all_listamunicipio'] = $this->Municipiomodel->get_all_listamunicipio();
            
            $data['_view'] = 'po_general/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a po_general
     */
    function edit($id)
    {   
        // check if the po_general exists before trying to edit it
        $data['po_general'] = $this->Pogeneralmodel->get_po_general($id);
        
        if(isset($data['po_general']['id']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('tipo','Tipo','required');
            $this->form_validation->set_rules('oficioNumero','OficioNumero','max_length[20]');
			$this->form_validation->set_rules('domicilio','Domicilio','max_length[255]|required');
			$this->form_validation->set_rules('idEmpleadoResponsable','IdEmpleadoResponsable','required');
			$this->form_validation->set_rules('idEmpleadoFormula','IdEmpleadoFormula','required');
			$this->form_validation->set_rules('fechaLimitePresentacion','FechaLimitePresentacion','required');
            $this->form_validation->set_rules('horaLimitePresentacion','HoraLimitePresentacion','max_length[10]');
			$this->form_validation->set_rules('ccp1','Ccp1','max_length[250]');
			$this->form_validation->set_rules('ccp2','Ccp2','max_length[250]');
			$this->form_validation->set_rules('ccp3','Ccp3','max_length[250]');
			$this->form_validation->set_rules('fechaElaboracion','FechaElaboracion','required');
			$this->form_validation->set_rules('asunto','Asunto','max_length[255]|required');
			$this->form_validation->set_rules('fechaUltimaModificacion','FechaUltimaModificacion');
		
			if($this->form_validation->run())     
            {   
                
                $fecha1 = $this->input->post('fechaLimitePresentacion');
                $fechaLimitePresentacion = str_replace('/', '-', $fecha1);
                $fecha2 = $this->input->post('fechaElaboracion');
                $fechaElaboracion = str_replace('/', '-', $fecha2);

                $idEmpleadoResponsable = $this->Pogeneralmodel->get_idEmpleado($this->input->post('empleadoResponsable'));
                $empleadoResponsable = array_values($idEmpleadoResponsable)[0]['id']; 
                $idEmpleadoFormula = $this->Pogeneralmodel->get_idEmpleado($this->input->post('empleadoFormula'));
                $empleadoFormula = array_values($idEmpleadoFormula)[0]['id']; 

                $params = array(
					'tipo' => $this->input->post('tipo'),
                    'oficioNumero' => $this->input->post('oficioNumero'),
					'domicilio' => $this->input->post('domicilio'),
					'idEmpleadoResponsable' => $empleadoResponsable,
					'idEmpleadoFormula' => $empleadoFormula,
					'fechaLimitePresentacion' => date("Y-m-d", strtotime($fechaLimitePresentacion)),
					'ccp1' => $this->input->post('ccp1'),
					'ccp2' => $this->input->post('ccp2'),
					'ccp3' => $this->input->post('ccp3'),
					'fechaElaboracion' => date("Y-m-d", strtotime($fechaElaboracion)),
                    'horaLimitePresentacion' => $this->input->post('horaLimitePresentacion'),
					'asunto' => $this->input->post('asunto'),
					'idMunicipio' => $this->input->post('idMunicipio'),
					'fechaUltimaModificacion' => date('Y/m/d H:i:s', time()),
                );

                $this->Pogeneralmodel->update_po_general($id,$params);            
                redirect('po_general/index');
            }
            else
            {
				$this->load->model('Empleadomodel');
				$data['all_listaempleado'] = $this->Empleadomodel->get_all_listaempleado();
				$data['all_listaempleado'] = $this->Empleadomodel->get_all_listaempleado();

				$this->load->model('Municipiomodel');
				$data['all_listamunicipio'] = $this->Municipiomodel->get_all_listamunicipio();

                $data['_view'] = 'po_general/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The po_general you are trying to edit does not exist.');
    } 

    /*
     * Deleting po_general
     */
    function remove($id)
    {
        $po_general = $this->Pogeneralmodel->get_po_general($id);

        // check if the po_general exists before trying to delete it
        if(isset($po_general['id']))
        {
            $this->Pogeneralmodel->delete_po_general($id);

            //Borrar de la tabla PO_Proveedor

            //Borrar de la tabla PO_Acuse

            //Borrar de la tabla PO_ACLARACION

            //Borrar de la tabla IM_General

            

            redirect('po_general/index');
        }
        else
            show_error('The po_general you are trying to delete does not exist.');
    }
    
}
