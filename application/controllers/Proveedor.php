<?php
/* 
 * Generated by CRUDigniter v3.0 Beta 
 * www.crudigniter.com
 */
 
class Proveedor extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Proveedormodel');
    } 

    //Crea las relaciones proveedor-familia cuando se añade un proveedor
	//de tipo bienes
	function crearRelacion(){
		$this->load->model('Proveedormodel');
		$familias_seleccion = $_POST['familias_seleccion'];
		$idProveedor = $this->Proveedormodel->get_idConsecutivo();
		$this->Proveedormodel->add_uk_proveedor_familia($idProveedor, $familias_seleccion);
	}
	
	//Edita las relaciones proveedor-familia si se agregan o quitan familias
	//al editar un proveedor
	function editarRelacion(){
        $familias_seleccion = $_POST['familias_seleccion'];
		$idProveedor = $_POST['idProveedor'];
        $this->Proveedormodel->delete_uk_proveedor_familia($idProveedor);
        $this->Proveedormodel->add_uk_proveedor_familia($idProveedor, $familias_seleccion);
	}

	//Elimina las relaciones cuando un proveedor cambia de bienes a servicios
	//Elimina las relaciones cuando se elimina un proveedor de la BD
	function eliminarRelacion(){
		$this->load->model('Proveedormodel');
		$idProveedor = $_POST['idProveedor'];
		$this->Proveedormodel->delete_uk_proveedor_familia($idProveedor);
	}

	//Obtiene una lista de los proveedores que ofrecen la familia seleccionada
	function obtenerListaProveedorFamilia(){
		$this->load->model('Proveedormodel');
		$idFamilia = $_POST['idFamilia'];
		$data['listaproveedorfamilia'] = $this->Proveedormodel->get_all_listaproveedorfamilia($idFamilia);
		echo json_encode($data);
	}

    /*
     * Listing of listaproveedor
     */
    function index()
    {
        $data['listaproveedor'] = $this->Proveedormodel->get_all_listaproveedor();
		$this->load->model('Comboboxesmodel');
		$data['familias'] = $this->Comboboxesmodel->getFamilias();

        $data['_view'] = 'proveedor/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new proveedor
     */
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('clave','Clave','max_length[15]');
		$this->form_validation->set_rules('rfc','Rfc','max_length[15]');
		$this->form_validation->set_rules('razonSocial','RazonSocial','max_length[150]|required');
		$this->form_validation->set_rules('direccion','Direccion','max_length[150]');
		$this->form_validation->set_rules('codigoPostal','CodigoPostal','exact_length[5]');
		$this->form_validation->set_rules('idMunicipio','IdMunicipio','required');
		$this->form_validation->set_rules('nombre1','Nombre1','max_length[100]|required');
		$this->form_validation->set_rules('direccion1','Direccion1','max_length[150]');
		$this->form_validation->set_rules('codigoPostal1','CodigoPostal1','exact_length[5]');
		$this->form_validation->set_rules('idMunicipio1','IdMunicipio1');
		$this->form_validation->set_rules('telefonoFijo1','TelefonoFijo1','max_length[15]');
		$this->form_validation->set_rules('telefonoMovil1','TelefonoMovil1','max_length[15]');
		$this->form_validation->set_rules('correoElectronico1','CorreoElectronico1','max_length[100]');
		$this->form_validation->set_rules('extension1','Extension1','max_length[11]');
		$this->form_validation->set_rules('nombre2','Nombre2','max_length[100]');
		$this->form_validation->set_rules('direccion2','Direccion2','max_length[150]');
		$this->form_validation->set_rules('idMunicipio2','IdMunicipio2');
		$this->form_validation->set_rules('codigoPostal2','CodigoPostal2','exact_length[5]');
		$this->form_validation->set_rules('telefonoFijo2','TelefonoFijo2','max_length[15]');
		$this->form_validation->set_rules('telefonoMovil2','TelefonoMovil2','max_length[15]');
		$this->form_validation->set_rules('correoElectronico2','CorreoElectronico2','max_length[100]');
		$this->form_validation->set_rules('extension2','Extension2','max_length[11]');
		$this->form_validation->set_rules('nombre3','Nombre3','max_length[100]');
		$this->form_validation->set_rules('direccion3','Direccion3','max_length[150]');
		$this->form_validation->set_rules('idMunicipio3','IdMunicipio3');
		$this->form_validation->set_rules('codigoPostal3','CodigoPostal3','exact_length[5]');
		$this->form_validation->set_rules('telefonoFijo3','TelefonoFijo3','max_length[15]');
		$this->form_validation->set_rules('telefonoMovil3','TelefonoMovil3','max_length[15]');
		$this->form_validation->set_rules('correoElectronico3','CorreoElectronico3','max_length[100]');
		$this->form_validation->set_rules('extension3','Extension3','max_length[11]');
		$this->form_validation->set_rules('estatus','Estatus','required');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'clave' => $this->input->post('clave'),
				'rfc' => $this->input->post('rfc'),
				'razonSocial' => $this->input->post('razonSocial'),
				'direccion' => $this->input->post('direccion'),
				'codigoPostal' => $this->input->post('codigoPostal'),
				'idMunicipio' => $this->input->post('idMunicipio'),
				'nombre1' => $this->input->post('nombre1'),
				'direccion1' => $this->input->post('direccion1'),
				'idMunicipio1' => $this->input->post('idMunicipio1'),
				'codigoPostal1' => $this->input->post('codigoPostal1'),
				'telefonoFijo1' => $this->input->post('telefonoFijo1'),
				'telefonoMovil1' => $this->input->post('telefonoMovil1'),
				'correoElectronico1' => $this->input->post('correoElectronico1'),
				'extension1' => $this->input->post('extension1'),
				'nombre2' => $this->input->post('nombre2'),
				'direccion2' => $this->input->post('direccion2'),
				'idMunicipio2' => $this->input->post('idMunicipio2'),
				'codigoPostal2' => $this->input->post('codigoPostal2'),
				'telefonoFijo2' => $this->input->post('telefonoFijo2'),
				'telefonoMovil2' => $this->input->post('telefonoMovil2'),
				'correoElectronico2' => $this->input->post('correoElectronico2'),
				'extension2' => $this->input->post('extension2'),
				'nombre3' => $this->input->post('nombre3'),
				'direccion3' => $this->input->post('direccion3'),
				'idMunicipio3' => $this->input->post('idMunicipio3'),
				'codigoPostal3' => $this->input->post('codigoPostal3'),
				'telefonoFijo3' => $this->input->post('telefonoFijo3'),
				'telefonoMovil3' => $this->input->post('telefonoMovil3'),
				'correoElectronico3' => $this->input->post('correoElectronico3'),
				'extension3' => $this->input->post('extension3'),
				'estatus' => $this->input->post('estatus'),
				'tipo' => $this->input->post('tipo'),
            );
            
			//$idProveedor = $this->Proveedormodel->get_idConsecutivo();
            $proveedor_id = $this->Proveedormodel->add_proveedor($params);

			redirect('proveedor/index');
        }
        else
        {
			$this->load->model('Comboboxesmodel');
        	$data['estados'] = $this->Comboboxesmodel->getEstados();
			$data['estados1'] = $this->Comboboxesmodel->getEstados();
			$data['estados2'] = $this->Comboboxesmodel->getEstados();
			$data['estados3'] = $this->Comboboxesmodel->getEstados();
			$data['familias'] = $this->Comboboxesmodel->getFamilias();
            $data['_view'] = 'proveedor/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a proveedor
     */
    function edit($id)
    {   
        // check if the proveedor exists before trying to edit it
        $data['proveedor'] = $this->Proveedormodel->get_proveedor($id);

        if(isset($data['proveedor']['id']))
        {
			
            $this->load->library('form_validation');

			$this->form_validation->set_rules('clave','Clave','max_length[15]');
			$this->form_validation->set_rules('rfc','Rfc','max_length[15]');
			$this->form_validation->set_rules('razonSocial','RazonSocial','max_length[150]|required');
			$this->form_validation->set_rules('direccion','Direccion','max_length[150]');
			$this->form_validation->set_rules('codigoPostal','CodigoPostal','exact_length[5]');
			$this->form_validation->set_rules('idMunicipio','IdMunicipio','required');
			$this->form_validation->set_rules('nombre1','Nombre1','max_length[100]|required');
			$this->form_validation->set_rules('direccion1','Direccion1','max_length[150]');
			$this->form_validation->set_rules('codigoPostal1','CodigoPostal1','exact_length[5]');
			$this->form_validation->set_rules('idMunicipio1','IdMunicipio1');
			$this->form_validation->set_rules('telefonoFijo1','TelefonoFijo1','max_length[15]');
			$this->form_validation->set_rules('telefonoMovil1','TelefonoMovil1','max_length[15]');
			$this->form_validation->set_rules('correoElectronico1','CorreoElectronico1','max_length[100]');
			$this->form_validation->set_rules('extension1','Extension1','max_length[11]');
			$this->form_validation->set_rules('nombre2','Nombre2','max_length[100]');
			$this->form_validation->set_rules('direccion2','Direccion2','max_length[150]');
			$this->form_validation->set_rules('idMunicipio2','IdMunicipio2');
			$this->form_validation->set_rules('codigoPostal2','CodigoPostal2','exact_length[5]');
			$this->form_validation->set_rules('telefonoFijo2','TelefonoFijo2','max_length[15]');
			$this->form_validation->set_rules('telefonoMovil2','TelefonoMovil2','max_length[15]');
			$this->form_validation->set_rules('correoElectronico2','CorreoElectronico2','max_length[100]');
			$this->form_validation->set_rules('extension2','Extension2','max_length[11]');
			$this->form_validation->set_rules('nombre3','Nombre3','max_length[100]');
			$this->form_validation->set_rules('direccion3','Direccion3','max_length[150]');
			$this->form_validation->set_rules('idMunicipio3','IdMunicipio3');
			$this->form_validation->set_rules('codigoPostal3','CodigoPostal3','exact_length[5]');
			$this->form_validation->set_rules('telefonoFijo3','TelefonoFijo3','max_length[15]');
			$this->form_validation->set_rules('telefonoMovil3','TelefonoMovil3','max_length[15]');
			$this->form_validation->set_rules('correoElectronico3','CorreoElectronico3','max_length[100]');
			$this->form_validation->set_rules('extension3','Extension3','max_length[11]');
			$this->form_validation->set_rules('estatus','Estatus','required');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'clave' => $this->input->post('clave'),
					'rfc' => $this->input->post('rfc'),
					'razonSocial' => $this->input->post('razonSocial'),
					'direccion' => $this->input->post('direccion'),
					'codigoPostal' => $this->input->post('codigoPostal'),
					'idMunicipio' => $this->input->post('idMunicipio'),
					'nombre1' => $this->input->post('nombre1'),
					'direccion1' => $this->input->post('direccion1'),
					'idMunicipio1' => $this->input->post('idMunicipio1'),
					'codigoPostal1' => $this->input->post('codigoPostal1'),
					'telefonoFijo1' => $this->input->post('telefonoFijo1'),
					'telefonoMovil1' => $this->input->post('telefonoMovil1'),
					'correoElectronico1' => $this->input->post('correoElectronico1'),
					'extension1' => $this->input->post('extension1'),
					'nombre2' => $this->input->post('nombre2'),
					'direccion2' => $this->input->post('direccion2'),
					'idMunicipio2' => $this->input->post('idMunicipio2'),
					'codigoPostal2' => $this->input->post('codigoPostal2'),
					'telefonoFijo2' => $this->input->post('telefonoFijo2'),
					'telefonoMovil2' => $this->input->post('telefonoMovil2'),
					'correoElectronico2' => $this->input->post('correoElectronico2'),
					'extension2' => $this->input->post('extension2'),
					'nombre3' => $this->input->post('nombre3'),
					'direccion3' => $this->input->post('direccion3'),
					'idMunicipio3' => $this->input->post('idMunicipio3'),
					'codigoPostal3' => $this->input->post('codigoPostal3'),
					'telefonoFijo3' => $this->input->post('telefonoFijo3'),
					'telefonoMovil3' => $this->input->post('telefonoMovil3'),
					'correoElectronico3' => $this->input->post('correoElectronico3'),
					'extension3' => $this->input->post('extension3'),
					'estatus' => $this->input->post('estatus'),
					'tipo' => $this->input->post('tipo'),
                );


                $this->Proveedormodel->update_proveedor($id,$params);            
                redirect('proveedor/index');
            }
            else
            {

				$this->load->model('Comboboxesmodel');
        		$data['estados'] = $this->Comboboxesmodel->getEstados();
				$data['estados1'] = $this->Comboboxesmodel->getEstados();
				$data['estados2'] = $this->Comboboxesmodel->getEstados();
				$data['estados3'] = $this->Comboboxesmodel->getEstados();
				$data['familias'] = $this->Comboboxesmodel->getFamilias();

				$this->load->model('Proveedormodel');
				
				$idMunicipioSeleccionado = $this->Proveedormodel->obtenerIdMunicipio($id);
				$data['municipioSeleccionado'] = $idMunicipioSeleccionado;

				$idMunicipioSeleccionado1 = $this->Proveedormodel->obtenerIdMunicipio1($id);
				$data['municipioSeleccionado1'] = $idMunicipioSeleccionado1;
				
				$idMunicipioSeleccionado2 = $this->Proveedormodel->obtenerIdMunicipio2($id);
				$data['municipioSeleccionado2'] = $idMunicipioSeleccionado2;
				
				$idMunicipioSeleccionado3 = $this->Proveedormodel->obtenerIdMunicipio3($id);
				$data['municipioSeleccionado3'] = $idMunicipioSeleccionado3;

				$data['familiasSeleccionadas'] = $this->Proveedormodel->obtenerIdFamiliaProveedor($id);

				$data['estadoSeleccionado'] = $this->Proveedormodel->obtenerIdEstado($idMunicipioSeleccionado);
				$data['estadoSeleccionado1'] = $this->Proveedormodel->obtenerIdEstado($idMunicipioSeleccionado1);
				$data['estadoSeleccionado2'] = $this->Proveedormodel->obtenerIdEstado($idMunicipioSeleccionado2);
				$data['estadoSeleccionado3'] = $this->Proveedormodel->obtenerIdEstado($idMunicipioSeleccionado3);
				

                $data['_view'] = 'proveedor/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('El proveedor que está tratando de editar no existe');
    } 

    /*
     * Deleting proveedor
     */
    function remove($id)
    {
        $proveedor = $this->Proveedormodel->get_proveedor($id);

        // check if the proveedor exists before trying to delete it
        if(isset($proveedor['id']))
        {
            $this->Proveedormodel->delete_proveedor($id);
			//elimina las relaciones proveedor-familia existentes
			$this->Proveedormodel->delete_uk_proveedor_familia($id);
            redirect('proveedor/index');
        }
        else
            show_error('El proveedor que está tratando de eliminar no existe');
    }
    
}
