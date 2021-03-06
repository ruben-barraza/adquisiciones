<?php
/* 
 * Generated by CRUDigniter v3.0 Beta 
 * www.crudigniter.com
 */
 
class Po_aclaracion extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Poaclaracionmodel');
    } 

    /*
     * Listing of listapo_aclaracion
     */
    function index()
    {
        $data['listapo_aclaracion'] = $this->Poaclaracionmodel->get_all_listapo_aclaracion();

        $data['_view'] = 'po_aclaracion/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new po_aclaracion
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
            );
            
            $po_aclaracion_id = $this->Poaclaracionmodel->add_po_aclaracion($params);
            redirect('po_aclaracion/index');
        }
        else
        {            
            $data['_view'] = 'po_aclaracion/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a po_aclaracion
     */
    function edit($idPog)
    {   
        // check if the po_aclaracion exists before trying to edit it
        $data['po_aclaracion'] = $this->Poaclaracionmodel->get_po_aclaracion($idPog);
        
        if(isset($data['po_aclaracion']['idPog']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
                );

                $this->Poaclaracionmodel->update_po_aclaracion($idPog,$params);            
                redirect('po_aclaracion/index');
            }
            else
            {
                $data['_view'] = 'po_aclaracion/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The po_aclaracion you are trying to edit does not exist.');
    } 

    /*
     * Deleting po_aclaracion
     */
    function remove($idPog)
    {
        $po_aclaracion = $this->Poaclaracionmodel->get_po_aclaracion($idPog);

        // check if the po_aclaracion exists before trying to delete it
        if(isset($po_aclaracion['idPog']))
        {
            $this->Poaclaracionmodel->delete_po_aclaracion($idPog);
            redirect('po_aclaracion/index');
        }
        else
            show_error('The po_aclaracion you are trying to delete does not exist.');
    }
    
}
