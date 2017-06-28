<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class PeticionesOfertaYProveedores extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('PeticionesOfertaYProveedoresmodel');
	}
	
	public function index()
	{
		$data['peticionesOferta'] = $this->PeticionesOfertaYProveedoresmodel->peticionesOferta();
		$this->load->view('im_general/add',$data);
	}
	
	public function llena_proveedores()
	{
	
		if($this->input->post('peticionoferta'))
		{
			$peticionoferta = $this->input->post('peticionoferta');
			$proveedores = $this->PeticionesOfertaYProveedoresmodel->proveedores($peticionoferta);
			echo '<option value="0">Seleccione</option>';
			  foreach($proveedores as $fila){
                echo '<option value="'. $fila->idProveedor .'">'. $fila->razonSocial .'</option>';
            }
        }  else {
            echo '<option value="0">Seleccione</option>';
        }

		}

	}

}