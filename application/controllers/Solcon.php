<?php

class Solcon extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Solconmodel');
    }

    /*
     * Listado de solcons
     */
    function index()
    {
        $data['listaSolcon'] = $this->Solconmodel->get_all_listasolcon();
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

        if($this->form_validation->run())
        {
            $solcon = $this->input->post('solcon');
            $params = array(
                'solcon' => $this->input->post('solcon'),
                'origenRecurso' => $this->input->post('origenRecurso'),
                'idAt1' => $this->input->post('idAt1'),
                'idAt2' => $this->input->post('idAt2'),
                'idAt3' => $this->input->post('idAt3'),
                'tipoCompra' => $this->input->post('tipoCompra'),
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

            if($this->form_validation->run())
            {
                $params = array(
                    'solcon' => $this->input->post('solcon'),
                    'origenRecurso' => $this->input->post('origenRecurso'),
                    'idAt1' => $this->input->post('idAt1'),
                    'idAt2' => $this->input->post('idAt2'),
                    'idAt3' => $this->input->post('idAt3'),
                    'tipoCompra' => $this->input->post('tipoCompra'),
                );

                $this->Solconmodel->update_solcon($id,$params);
                redirect('solcon/index');
            }
            else
            {
                $this->load->model('Comboboxesmodel');
                $data['autorizacion'] = $this->Comboboxesmodel->getAutorizaciones();
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
}