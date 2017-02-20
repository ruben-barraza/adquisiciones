<?php
class dropdown_demo extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->database();
        $this->load->model('dropdown_municipioestado_model');
    }
    
    function index()
    {
        $data['estado'] = $this->dropdown_municipioestado_model->get_estado();
        $data['municipio'] = $this->dropdown_municipioestado_model->get_municipio();
		$this->load->view('layouts/main',$data);
    }

    function populate_municipio()
    {
        $id = $this->input->post('id');
        echo(json_encode($this->dropdown_municipioestado_model->get_municipio($id)));
    }
}
?>