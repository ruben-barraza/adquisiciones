<?php
/* 
 * Generated by CRUDigniter v3.0 Beta 
 * www.crudigniter.com
 */
 
class Unidadmedida extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Unidadmedidamodel');
    } 

    /*
     * Listing of listaunidadmedida
     */
    function index()
    {
        $data['listaunidadmedida'] = $this->Unidadmedidamodel->get_all_listaunidadmedida();

        $data['_view'] = 'unidadmedida/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new unidadmedida
     */
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('clave','Clave','max_length[3]');
		$this->form_validation->set_rules('descripcion','Descripcion','max_length[15]');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'clave' => $this->input->post('clave'),
				'descripcion' => $this->input->post('descripcion'),
            );
            
            $unidadmedida_id = $this->Unidadmedidamodel->add_unidadmedida($params);
            redirect('unidadmedida/index');
        }
        else
        {            
            $data['_view'] = 'unidadmedida/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a unidadmedida
     */
    function edit($id)
    {   
        // check if the unidadmedida exists before trying to edit it
        $data['unidadmedida'] = $this->Unidadmedidamodel->get_unidadmedida($id);
        
        if(isset($data['unidadmedida']['id']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('clave','Clave','max_length[3]');
			$this->form_validation->set_rules('descripcion','Descripcion','max_length[15]');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'clave' => $this->input->post('clave'),
					'descripcion' => $this->input->post('descripcion'),
                );

                $this->Unidadmedidamodel->update_unidadmedida($id,$params);            
                redirect('unidadmedida/index');
            }
            else
            {
                $data['_view'] = 'unidadmedida/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The unidadmedida you are trying to edit does not exist.');
    } 

    /*
     * Deleting unidadmedida
     */
    function remove($id)
    {
        $unidadmedida = $this->Unidadmedidamodel->get_unidadmedida($id);

        // check if the unidadmedida exists before trying to delete it
        if(isset($unidadmedida['id']))
        {
            $this->Unidadmedidamodel->delete_unidadmedida($id);
            redirect('unidadmedida/index');
        }
        else
            show_error('The unidadmedida you are trying to delete does not exist.');
    }
    
}