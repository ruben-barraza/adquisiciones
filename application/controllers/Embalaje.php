<?php
/* 
 * Generated by CRUDigniter v3.0 Beta 
 * www.crudigniter.com
 */
 
class Embalaje extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Embalajemodel');
    } 

    /*
     * Listing of listaembalaje
     */
    function index()
    {
        $data['listaembalaje'] = $this->Embalajemodel->get_all_listaembalaje();

        $data['_view'] = 'embalaje/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new embalaje
     */
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('clave','Clave','max_length[10]|required');
		$this->form_validation->set_rules('descripcion','Descripcion','max_length[100]|required');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'clave' => $this->input->post('clave'),
				'descripcion' => $this->input->post('descripcion'),
            );
            
            $embalaje_id = $this->Embalajemodel->add_embalaje($params);
            redirect('embalaje/index');
        }
        else
        {            
            $data['_view'] = 'embalaje/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a embalaje
     */
    function edit($id)
    {   
        // check if the embalaje exists before trying to edit it
        $data['embalaje'] = $this->Embalajemodel->get_embalaje($id);
        
        if(isset($data['embalaje']['id']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('clave','Clave','max_length[10]|required');
			$this->form_validation->set_rules('descripcion','Descripcion','max_length[100]|required');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'clave' => $this->input->post('clave'),
					'descripcion' => $this->input->post('descripcion'),
                );

                $this->Embalajemodel->update_embalaje($id,$params);            
                redirect('embalaje/index');
            }
            else
            {
                $data['_view'] = 'embalaje/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The embalaje you are trying to edit does not exist.');
    } 

    /*
     * Deleting embalaje
     */
    function remove($id)
    {
        $embalaje = $this->Embalajemodel->get_embalaje($id);

        // check if the embalaje exists before trying to delete it
        if(isset($embalaje['id']))
        {
            $this->Embalajemodel->delete_embalaje($id);
            redirect('embalaje/index');
        }
        else
            show_error('The embalaje you are trying to delete does not exist.');
    }
    
}