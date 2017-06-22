<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class PeticionesOfertaYProveedoresmodel extends CI_Model{
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function peticionesOferta()
	{
		$this->db->order_by('id','asc');
		$peticionesOferta = $this->db->get('po_general');
		if($peticionesOferta->num_rows()>0)
		{
			return $peticionesOferta->result();
		}
	}
	
	public function proveedores ($peticionoferta)
	{
		$this->db->where('idProveedor',$peticionoferta);
        $this->db->where('id',$peticionoferta);
		$this->db->order_by('idProveedor','asc');
		$proveedores = $this->db->get('proveedor');
		if($proveedores->num_rows()>0)
		{
			return $proveedores->result();
		}
	}
}