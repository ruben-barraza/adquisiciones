<?php
/* 
 * Generated by CRUDigniter v3.0 Beta 
 * www.crudigniter.com
 */
 
class Im_concepto extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Imconceptomodel');
    } 

    /*
     * Listing of listaim_concepto
     */
    function index()
    {
        $data['listaim_concepto'] = $this->Imconceptomodel->get_all_listaim_concepto();

        $data['_view'] = 'im_concepto/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new im_concepto
     */
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('tipo','Tipo','required');
		$this->form_validation->set_rules('idImg','IdImg','max_length[11]|required');
		$this->form_validation->set_rules('partida','Partida','max_length[11]|required');
		$this->form_validation->set_rules('plazoEntrega','PlazoEntrega','max_length[11]|required');
		$this->form_validation->set_rules('cantidad','Cantidad','max_length[11]|required');
		$this->form_validation->set_rules('lugarEntrega','LugarEntrega','max_length[255]|required');
		$this->form_validation->set_rules('direccionEntrega','DireccionEntrega','max_length[255]|required');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'idImg' => $this->input->post('idImg'),
				'tipo' => $this->input->post('tipo'),
				'idConcepto' => $this->input->post('idConcepto'),
				'partida' => $this->input->post('partida'),
				'plazoEntrega' => $this->input->post('plazoEntrega'),
				'cantidad' => $this->input->post('cantidad'),
				'lugarEntrega' => $this->input->post('lugarEntrega'),
				'direccionEntrega' => $this->input->post('direccionEntrega'),
            );
            
            $im_concepto_id = $this->Imconceptomodel->add_im_concepto($params);
            redirect('im_concepto/index');
        }
        else
        {
			$this->load->model('Imgeneralmodel');
			$data['all_listaim_general'] = $this->Imgeneralmodel->get_all_listaim_general();
            
            $data['_view'] = 'im_concepto/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a im_concepto
     */
    function edit($id)
    {   
        // check if the im_concepto exists before trying to edit it
        $data['im_concepto'] = $this->Imconceptomodel->get_im_concepto($id);
        
        if(isset($data['im_concepto']['id']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('tipo','Tipo','required');
			$this->form_validation->set_rules('idImg','IdImg','max_length[11]|required');
			$this->form_validation->set_rules('partida','Partida','max_length[11]|required');
			$this->form_validation->set_rules('plazoEntrega','PlazoEntrega','max_length[11]|required');
			$this->form_validation->set_rules('cantidad','Cantidad','max_length[11]|required');
			$this->form_validation->set_rules('lugarEntrega','LugarEntrega','max_length[255]|required');
			$this->form_validation->set_rules('direccionEntrega','DireccionEntrega','max_length[255]|required');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'idImg' => $this->input->post('idImg'),
					'tipo' => $this->input->post('tipo'),
					'idConcepto' => $this->input->post('idConcepto'),
					'partida' => $this->input->post('partida'),
					'plazoEntrega' => $this->input->post('plazoEntrega'),
					'cantidad' => $this->input->post('cantidad'),
					'lugarEntrega' => $this->input->post('lugarEntrega'),
					'direccionEntrega' => $this->input->post('direccionEntrega'),
                );

                $this->Imconceptomodel->update_im_concepto($id,$params);            
                redirect('im_concepto/index');
            }
            else
            {
				$this->load->model('Imgeneralmodel');
				$data['all_listaim_general'] = $this->Imgeneralmodel->get_all_listaim_general();

                $data['_view'] = 'im_concepto/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The im_concepto you are trying to edit does not exist.');
    } 

    /*
     * Deleting im_concepto
     */
    function remove($id)
    {
        $im_concepto = $this->Imconceptomodel->get_im_concepto($id);

        // check if the im_concepto exists before trying to delete it
        if(isset($im_concepto['id']))
        {
            $this->Imconceptomodel->delete_im_concepto($id);
            redirect('im_concepto/index');
        }
        else
            show_error('The im_concepto you are trying to delete does not exist.');
    }
    
}
