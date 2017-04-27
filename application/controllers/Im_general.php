<?php
/* 
 * Generated by CRUDigniter v3.0 Beta 
 * www.crudigniter.com
 */
 
class Im_general extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Imgeneralmodel');
    } 

    function obtenerNombreEmpleado(){
        $rpe = $_POST['rpe'];
        $data['nombre'] = $this->Imgeneralmodel->get_empleado($rpe);
		echo json_encode($data);
    }

    function obtenerDescripcionFamilia(){
        $id = $_POST['id'];
        $data['descripcion'] = $this->Imgeneralmodel->get_descripcion_familia($id);
        echo json_encode($data);
    }

    function obtenerListaProveedores(){
        $clave = $_POST['clave']; 
        $data['listaproveedores'] = $this->Imgeneralmodel->get_all_listaproveedorfamilia($clave);
        echo json_encode($data);
    }

    /*
     * Listing of listaim_general
     */
    function index()
    {
        $data['listaim_general'] = $this->Imgeneralmodel->get_all_listaim_general();

        $data['_view'] = 'im_general/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new im_general
     */
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('titulo','Titulo','max_length[255]|required');
		$this->form_validation->set_rules('idEmpleadoFormula','IdEmpleadoFormula','required');
		$this->form_validation->set_rules('idEmpleadoAutoriza','IdEmpleadoAutoriza','required');
		$this->form_validation->set_rules('fechaElaboracion','FechaElaboracion','required');
		$this->form_validation->set_rules('idMunicipioElaboracion','IdMunicipioElaboracion','required');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'titulo' => $this->input->post('titulo'),
				'idEmpleadoFormula' => $this->input->post('idEmpleadoFormula'),
				'idEmpleadoAutoriza' => $this->input->post('idEmpleadoAutoriza'),
				'fechaElaboracion' => $this->input->post('fechaElaboracion'),
				'idMunicipioElaboracion' => $this->input->post('idMunicipioElaboracion'),
            );
            
            $im_general_id = $this->Imgeneralmodel->add_im_general($params);
            redirect('im_general/index');
        }
        else
        {
			$this->load->model('Empleadomodel');
			$data['all_listaempleado'] = $this->Empleadomodel->get_all_listaempleado();
			$data['all_listaempleado'] = $this->Empleadomodel->get_all_listaempleado();

			$this->load->model('Municipiomodel');
			$data['all_listamunicipio'] = $this->Municipiomodel->get_all_listamunicipio();

            $this->load->model('Comboboxesmodel');
			$data['familias'] = $this->Comboboxesmodel->getFamilias();
            
            $data['_view'] = 'im_general/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a im_general
     */
    function edit($id)
    {   
        // check if the im_general exists before trying to edit it
        $data['im_general'] = $this->Imgeneralmodel->get_im_general($id);
        
        if(isset($data['im_general']['id']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('titulo','Titulo','max_length[255]|required');
			$this->form_validation->set_rules('idEmpleadoFormula','IdEmpleadoFormula','required');
			$this->form_validation->set_rules('idEmpleadoAutoriza','IdEmpleadoAutoriza','required');
			$this->form_validation->set_rules('fechaElaboracion','FechaElaboracion','required');
			$this->form_validation->set_rules('idMunicipioElaboracion','IdMunicipioElaboracion','required');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'titulo' => $this->input->post('titulo'),
					'idEmpleadoFormula' => $this->input->post('idEmpleadoFormula'),
					'idEmpleadoAutoriza' => $this->input->post('idEmpleadoAutoriza'),
					'fechaElaboracion' => $this->input->post('fechaElaboracion'),
					'idMunicipioElaboracion' => $this->input->post('idMunicipioElaboracion'),
                );

                $this->Imgeneralmodel->update_im_general($id,$params);            
                redirect('im_general/index');
            }
            else
            {
				$this->load->model('Empleadomodel');
				$data['all_listaempleado'] = $this->Empleadomodel->get_all_listaempleado();
				$data['all_listaempleado'] = $this->Empleadomodel->get_all_listaempleado();

				$this->load->model('Municipiomodel');
				$data['all_listamunicipio'] = $this->Municipiomodel->get_all_listamunicipio();

                $data['_view'] = 'im_general/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The im_general you are trying to edit does not exist.');
    } 

    /*
     * Deleting im_general
     */
    function remove($id)
    {
        $im_general = $this->Imgeneralmodel->get_im_general($id);

        // check if the im_general exists before trying to delete it
        if(isset($im_general['id']))
        {
            $this->Imgeneralmodel->delete_im_general($id);
            redirect('im_general/index');
        }
        else
            show_error('The im_general you are trying to delete does not exist.');
    }
    
}
