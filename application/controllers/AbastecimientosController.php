e<?php
/* 
 * Generated by CRUDigniter v3.0 Beta 
 * www.crudigniter.com
 */
 
class AbastecimientosController extends CI_Controller{
    function __construct()
    {
        parent::__construct();        
    } 

    /*
     * Listing of listaalmacen
     */
    function index()
    {
        $data['listaalmacen'] = $this->Almacenmodel->get_all_listaalmacen();

        $data['_view'] = 'almacen/index';
        $this->load->view('layouts/main',$data);
    }

	function getListaAnexo1($idImg) {
		if(isset($idImg)) {
			$this->load->model('Abastecimientosmodel');
			$data['all_listaempleado'] = $this->Abastecimientosmodel->get_all_listaanexo1($idImg);		
		}
	}

    
}
