<?php

class Solcon extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Autorizacionmodel');
        $this->load->model('Solconmodel');
		$this->load->model('Sapmodel');
    }

    /*
     * Listado de solcons
     */
    function index()
    {
        $data['listaSolcon'] = $this->Solconmodel->get_all_listasolcon();
        $data['listaAT'] = $this->Autorizacionmodel->get_all_listaautorizacion();
        $data['_view'] = 'solcon/index';
		
        $this->load->view('layouts/main',$data);
    }

    /*
     * Agregar un nuevo solcon
     */	 
    function add()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('solcon','Solcon','max_length[100]|required');
        $this->form_validation->set_rules('origenRecurso','OrigenRecurso','max_length[1000]');
        $this->form_validation->set_rules('idAt1','IdAt1','integer');
        $this->form_validation->set_rules('idAt2','IdAt2','integer');
        $this->form_validation->set_rules('idAt3','IdAt3','integer');
        $this->form_validation->set_rules('tipoCompra','TipoCompra','max_length[500]');
        $this->form_validation->set_rules('idFamilia','IdFamilia');
        $this->form_validation->set_rules('anioEjercicio','anioEjercicio','integer');


        if($this->form_validation->run())
        {

            if($this->input->post('idAt2') === NULL) {
                $idAt2 = 0;
            } else {
                $idAt2 = $this->input->post('idAt2');
            }

            if($this->input->post('idAt3') === NULL) {
                $idAt3 = 0;
            } else {
                $idAt3 = $this->input->post('idAt3');
            }

            $params = array(
                'solcon' => $this->input->post('solcon'),
                'origenRecurso' => $this->input->post('origenRecurso'),
                'idAt1' => $this->input->post('idAt1'),
                'idAt2' => $idAt2,
                'idAt3' => $idAt3,
                'tipoCompra' => $this->input->post('tipoCompra'),
                'idFamilia' => $this->input->post('idFamilia'),
                'anioEjercicio' => $this->input->post('anioEjercicio')
            );

            print_r($_POST);
            echo $this->input->post('origenRecurso');

            $this->Solconmodel->add_solcon($params);
            redirect('solcon/index');
        }
        else
        {
            $this->load->model('Comboboxesmodel');
            $data['autorizacion'] = $this->Comboboxesmodel->getAutorizaciones();
            $data['familias'] = $this->Comboboxesmodel->getFamilias();
            $data['_view'] = 'solcon/add';
            $this->load->view('layouts/main',$data);
        }
    }

    /*
     * Editar solcon
     */

    function edit($id)
    {
        $data['solcon'] = $this->Solconmodel->get_solcon($id);

        if(isset($data['solcon']['id']))
        {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('solcon','Solcon','max_length[100]|required');
            $this->form_validation->set_rules('origenRecurso','OrigenRecurso','max_length[1000]');
            $this->form_validation->set_rules('idAt1','IdAt1','integer');
            $this->form_validation->set_rules('idAt2','IdAt2','integer');
            $this->form_validation->set_rules('idAt3','IdAt3','integer');
            $this->form_validation->set_rules('tipoCompra','TipoCompra','max_length[500]');
            $this->form_validation->set_rules('idFamilia','IdFamilia');
            $this->form_validation->set_rules('anioEjercicio','anioEjercicio','integer');
            if($this->form_validation->run())
            {
                $params = array(
                    'solcon' => $this->input->post('solcon'),
                    'origenRecurso' => $this->input->post('origenRecurso'),
                    'idAt1' => $this->input->post('idAt1'),
                    'idAt2' => $this->input->post('idAt2'),
                    'idAt3' => $this->input->post('idAt3'),
                    'tipoCompra' => $this->input->post('tipoCompra'),
                    'idFamilia' => $this->input->post('idFamilia'),
                    'anioEjercicio' => $this->input->post('anioEjercicio'),
                );

                $this->Solconmodel->update_solcon($id,$params);
                redirect('solcon/index');
            }
            else
            {
                $this->load->model('Comboboxesmodel');
                $data['autorizacion'] = $this->Comboboxesmodel->getAutorizaciones();
                $data['familias'] = $this->Comboboxesmodel->getFamilias();
                $data['_view'] = 'solcon/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('El solcon que está tratando de editar no existe.');
    }

    /*
     * Eliminar solcon
     */
    function remove($id)
    {
        $solcon = $this->Solconmodel->get_solcon($id);

        // check if the solcon exists before trying to delete it
        if(isset($solcon['id']))
        {
            $this->Solconmodel->delete_solcon($id);
            redirect('solcon/index');
        }
        else
            show_error('El solcon que está tratando de eliminar no existe.');
    }
	
	function buscarSolconSap($numeroSolcon) {
		//$solcon = $this->Solconmodel->get_solcon($id);
	}
	
    function buscarSolconDetalle()
    {
        $solcon = $_POST['solcon'];
        $data['detalle'] = $this->Solconmodel->get_solconDetalle($solcon);
        echo json_encode($data);
    }
	
}