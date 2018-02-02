<?php
/* 
 * Generated by CRUDigniter v3.0 Beta 
 * www.crudigniter.com
 */

 
class Generar_PDF extends CI_Controller{
    
    function __construct()
    {
        parent::__construct();
        $this->load->library('Pdf');
        $this->load->model('Generarpdfmodel');
    } 

    //PDF
    function pdf($id){

        //Identificar si la PO es de bienes o servicios
        $po_tipo = $this->Generarpdfmodel->get_po_tipo($id);

        $data['tipo'] = $po_tipo;
        $data['contactos'] = $this->Generarpdfmodel->get_contactos($id);
        $data['po_general'] = $this->Generarpdfmodel->get_pog_data($id);
        $data['numero_oficio'] = $this->Generarpdfmodel->get_pog_numero_oficio($id);
        $data['pog_responsable'] = $this->Generarpdfmodel->get_pog_responsable($id);
        $data['pog_formula'] = $this->Generarpdfmodel->get_pog_formula($id);
        $data['po_consideracion'] = $this->Generarpdfmodel->get_po_consideracion($id);
        $data['im_general'] = $this->Generarpdfmodel->get_im_general($id);

        if ($po_tipo == "B"){
            //DATOS PARA LA TABLA IM
            $data['im_concepto'] = $this->Generarpdfmodel->get_im_concepto($id);
            $data['im_elabora'] = $this->Generarpdfmodel->get_im_empleado_elabora($id);
            $data['im_aprueba'] = $this->Generarpdfmodel->get_im_empleado_autoriza($id);
        }

        $this->load->view('reporte_pog', $data);
        

        //Para probar los queries del modelo
        //$this->load->view('reporte_prueba_bd', $data);


    }
    
}

?>