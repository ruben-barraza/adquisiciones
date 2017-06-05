<?php
/* 
 * Generated by CRUDigniter v3.0 Beta 
 * www.crudigniter.com
 */
 
class Po_consideracion extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Poconsideracionmodel');
    } 

    /*
     * Listing of listapo_consideracion
     */
    function index()
    {
        $data['listapo_consideracion'] = $this->Poconsideracionmodel->get_all_listapo_consideracion();

        $data['_view'] = 'po_consideracion/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new po_consideracion
     */
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('fc1','Fc1','max_length[500]|required');
		$this->form_validation->set_rules('fc2','Fc2','max_length[500]|required');
		$this->form_validation->set_rules('fc3','Fc3','max_length[500]|required');
		$this->form_validation->set_rules('fc4','Fc4','max_length[500]|required');
		$this->form_validation->set_rules('fc5','Fc5','max_length[500]|required');
		$this->form_validation->set_rules('fc6','Fc6','max_length[500]|required');
		$this->form_validation->set_rules('fc7','Fc7','max_length[500]|required');
		$this->form_validation->set_rules('fc8','Fc8','max_length[500]|required');
		$this->form_validation->set_rules('fc9','Fc9','max_length[500]|required');
		$this->form_validation->set_rules('fc10','Fc10','max_length[500]|required');
		$this->form_validation->set_rules('fc11','Fc11','max_length[500]|required');
		$this->form_validation->set_rules('fc12','Fc12','max_length[500]|required');
		$this->form_validation->set_rules('fc13','Fc13','max_length[500]|required');
		$this->form_validation->set_rules('fc14','Fc14','max_length[500]|required');
		$this->form_validation->set_rules('fc15','Fc15','max_length[500]|required');
		$this->form_validation->set_rules('fc16','Fc16','max_length[500]|required');
		$this->form_validation->set_rules('fc17','Fc17','max_length[500]|required');
		$this->form_validation->set_rules('fc18','Fc18','max_length[500]|required');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'idpog' => $this->input->post('idpog'),
				'fc1' => $this->input->post('fc1'),
				'fc2' => $this->input->post('fc2'),
				'fc3' => $this->input->post('fc3'),
				'fc4' => $this->input->post('fc4'),
				'fc5' => $this->input->post('fc5'),
				'fc6' => $this->input->post('fc6'),
				'fc7' => $this->input->post('fc7'),
				'fc8' => $this->input->post('fc8'),
				'fc9' => $this->input->post('fc9'),
				'fc10' => $this->input->post('fc10'),
				'fc11' => $this->input->post('fc11'),
				'fc12' => $this->input->post('fc12'),
				'fc13' => $this->input->post('fc13'),
				'fc14' => $this->input->post('fc14'),
				'fc15' => $this->input->post('fc15'),
				'fc16' => $this->input->post('fc16'),
				'fc17' => $this->input->post('fc17'),
				'fc18' => $this->input->post('fc18'),
            );
            
            $po_consideracion_id = $this->Poconsideracionmodel->add_po_consideracion($params);
            redirect('po_consideracion/index');
        }
        else
        {
			$this->load->model('Pogeneralmodel');
			$data['all_listapo_general'] = $this->Pogeneralmodel->get_all_listapo_general();
            
            $data['_view'] = 'po_consideracion/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a po_consideracion
     */
    function edit($id)
    {   
        // check if the po_consideracion exists before trying to edit it
        $data['po_consideracion'] = $this->Poconsideracionmodel->get_po_consideracion($id);
        
        if(isset($data['po_consideracion']['id']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('fc1','Fc1','max_length[500]|required');
			$this->form_validation->set_rules('fc2','Fc2','max_length[500]|required');
			$this->form_validation->set_rules('fc3','Fc3','max_length[500]|required');
			$this->form_validation->set_rules('fc4','Fc4','max_length[500]|required');
			$this->form_validation->set_rules('fc5','Fc5','max_length[500]|required');
			$this->form_validation->set_rules('fc6','Fc6','max_length[500]|required');
			$this->form_validation->set_rules('fc7','Fc7','max_length[500]|required');
			$this->form_validation->set_rules('fc8','Fc8','max_length[500]|required');
			$this->form_validation->set_rules('fc9','Fc9','max_length[500]|required');
			$this->form_validation->set_rules('fc10','Fc10','max_length[500]|required');
			$this->form_validation->set_rules('fc11','Fc11','max_length[500]|required');
			$this->form_validation->set_rules('fc12','Fc12','max_length[500]|required');
			$this->form_validation->set_rules('fc13','Fc13','max_length[500]|required');
			$this->form_validation->set_rules('fc14','Fc14','max_length[500]|required');
			$this->form_validation->set_rules('fc15','Fc15','max_length[500]|required');
			$this->form_validation->set_rules('fc16','Fc16','max_length[500]|required');
			$this->form_validation->set_rules('fc17','Fc17','max_length[500]|required');
			$this->form_validation->set_rules('fc18','Fc18','max_length[500]|required');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'idpog' => $this->input->post('idpog'),
					'fc1' => $this->input->post('fc1'),
					'fc2' => $this->input->post('fc2'),
					'fc3' => $this->input->post('fc3'),
					'fc4' => $this->input->post('fc4'),
					'fc5' => $this->input->post('fc5'),
					'fc6' => $this->input->post('fc6'),
					'fc7' => $this->input->post('fc7'),
					'fc8' => $this->input->post('fc8'),
					'fc9' => $this->input->post('fc9'),
					'fc10' => $this->input->post('fc10'),
					'fc11' => $this->input->post('fc11'),
					'fc12' => $this->input->post('fc12'),
					'fc13' => $this->input->post('fc13'),
					'fc14' => $this->input->post('fc14'),
					'fc15' => $this->input->post('fc15'),
					'fc16' => $this->input->post('fc16'),
					'fc17' => $this->input->post('fc17'),
					'fc18' => $this->input->post('fc18'),
                );

                $this->Poconsideracionmodel->update_po_consideracion($id,$params);            
                redirect('po_consideracion/index');
            }
            else
            {
				$this->load->model('Pogeneralmodel');
				$data['all_listapo_general'] = $this->Pogeneralmodel->get_all_listapo_general();

                $data['_view'] = 'po_consideracion/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The po_consideracion you are trying to edit does not exist.');
    } 

    /*
     * Deleting po_consideracion
     */
    function remove($id)
    {
        $po_consideracion = $this->Poconsideracionmodel->get_po_consideracion($id);

        // check if the po_consideracion exists before trying to delete it
        if(isset($po_consideracion['id']))
        {
            $this->Poconsideracionmodel->delete_po_consideracion($id);
            redirect('po_consideracion/index');
        }
        else
            show_error('The po_consideracion you are trying to delete does not exist.');
    }
    
}
