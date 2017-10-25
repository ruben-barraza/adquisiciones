<?php
/* 
 * Generated by CRUDigniter v3.0 Beta 
 * www.crudigniter.com
 */



class Im_general extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Imgeneralmodel');
        $this->load->model('Comboboxesmodel');
        $this->load->helper('form');
    }


    /*
     * Listing of listaim_general
     */
    function index()
    {

        $data['listaim_general'] = $this->Imgeneralmodel->get_all_listaim_general();

        $data['familias'] = $this->Comboboxesmodel->getFamilias();
        $data['_view'] = 'im_general/index';
        $this->load->view('layouts/main', $data);


    }


    /*
     * Adding a new im_general
     */
    function add()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('titulo', 'Titulo', 'max_length[255]|required');
        $this->form_validation->set_rules('idEmpleadoFormula', 'IdEmpleadoFormula', 'max_length[5]');
        $this->form_validation->set_rules('idEmpleadoAutoriza', 'IdEmpleadoAutoriza', 'max_length[5]');
        $this->form_validation->set_rules('fechaElaboracion', 'FechaElaboracion', 'required');
        $this->form_validation->set_rules('idMunicipioElaboracion', 'IdMunicipioElaboracion', 'required');
        $this->form_validation->set_rules('solped', 'solped', 'integer', 'max_length[12]');


        if ($this->form_validation->run()) {
            $params = array(
                'titulo' => $this->input->post('titulo'),
                'idEmpleadoFormula' => $this->input->post('idEmpleadoFormula'),
                'idEmpleadoAutoriza' => $this->input->post('idEmpleadoAutoriza'),
                'fechaElaboracion' => $this->input->post('fechaElaboracion'),
                'idMunicipioElaboracion' => $this->input->post('idMunicipioElaboracion'),
            );

            $im_general_id = $this->Imgeneralmodel->add_im_general($params);
            redirect('im_general/index');
        } else {
            $this->load->model('Comboboxesmodel');
            $data['listaim_concepto'] = $this->Imgeneralmodel->get_all_listaim_concepto();
            $data['familias'] = $this->Comboboxesmodel->getFamilias();
            $data['almacenes'] = $this->Comboboxesmodel->getAlmacenes();
            $data['estados'] = $this->Comboboxesmodel->getEstados();
            $data['peticiones'] = $this->Comboboxesmodel->getPeticiones();
            $data['sumas'] = $this->Imgeneralmodel->suma_imgeneral();


            $data['_view'] = 'im_general/add';
            $this->load->view('layouts/main', $data);

        }
    }

    function obtenerNombreEmpleadoImGeneral()
    {
        $rpe = $_POST['rpe'];
        $data['nombre'] = $this->Imgeneralmodel->get_empleado($rpe);
        echo json_encode($data);
    }

    /*
     * Editing a im_general
     */
    function edit($id)
    {
        // check if the im_general exists before trying to edit it
        $data['im_general'] = $this->Imgeneralmodel->get_im_general($id);
        $pog_id = $this->Imgeneralmodel->get_pog_id($id);

        if (isset($data['im_general']['id'])) {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('titulo', 'Titulo', 'max_length[255]|required');
            $this->form_validation->set_rules('idEmpleadoFormula', 'IdEmpleadoFormula', 'required');
            $this->form_validation->set_rules('idEmpleadoAutoriza', 'IdEmpleadoAutoriza', 'required');
            $this->form_validation->set_rules('fechaElaboracion', 'FechaElaboracion', 'required');
            $this->form_validation->set_rules('idMunicipioElaboracion', 'IdMunicipioElaboracion', 'required');

            if ($this->form_validation->run()) {
                $params = array(
                    'titulo' => $this->input->post('titulo'),
                    'idEmpleadoFormula' => $this->input->post('idEmpleadoFormula'),
                    'idEmpleadoAutoriza' => $this->input->post('idEmpleadoAutoriza'),
                    'fechaElaboracion' => $this->input->post('fechaElaboracion'),
                    'idMunicipioElaboracion' => $this->input->post('idMunicipioElaboracion'),
                );

                $this->Imgeneralmodel->update_im_general($id, $params);
                redirect('im_general/index');
            } else {

                $data['empleadoResponsable'] = $this->Imgeneralmodel->getEmpleadoAutoriza($id);
                $data['empleadoFormula'] = $this->Imgeneralmodel->getEmpleadoFormula($id);
                $data['imcProveedores'] = $this->Imgeneralmodel->get_img_proveedores($pog_id);
                $data['imcConcepto'] = $this->Imgeneralmodel->get_imc_concepto($pog_id);


                $this->load->model('Municipiomodel');
                $data['all_listamunicipio'] = $this->Municipiomodel->get_all_listamunicipio();

                $data['_view'] = 'im_general/edit';
                $this->load->view('layouts/main', $data);
            }
        } else
            show_error('The im_general you are trying to edit does not exist.');
    }

    /*
     * Deleting im_general
     */
    function remove($id)
    {
        $im_general = $this->Imgeneralmodel->get_im_general($id);

        // check if the im_general exists before trying to delete it
        if (isset($im_general['id'])) {
            $this->Imgeneralmodel->delete_im_general($id);
            redirect('im_general/index');
        } else
            show_error('The im_general you are trying to delete does not exist.');
    }

    function obtenerListaIMCFamilia(){
        $clave = $_POST['clave'];
        $data['listaimcfamilia'] = $this->Imgeneralmodel->get_all_lista_imc_familia($clave);
        echo json_encode($data);
    }

    function PeticionesOferta($id)
    {
        $data['peticionesoferta'] = $this->Imgeneralmodel->peticionesoferta($id);
        echo json_encode($data);

    }

    public function GuardarDatos()
    {
        $this->Imgeneralmodel->GuardarDatosModel();

    }

}
