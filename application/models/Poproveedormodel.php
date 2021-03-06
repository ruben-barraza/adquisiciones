<?php
/* 
 * Generated by CRUDigniter v3.0 Beta 
 * www.crudigniter.com
 */
 
class Poproveedormodel extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get po_proveedor by idPog
     */
    function get_po_proveedor($idPog)
    {
        return $this->db->get_where('po_proveedor',array('idPog'=>$idPog))->row_array();
    }
    
    /*
     * Get all listapo_proveedor
     */
    function get_all_listapo_proveedor()
    {
        return $this->db->get('po_proveedor')->result_array();
    }
    
    /*
     * function to add new po_proveedor
     */
	
	function add_po_proveedor($params)
    {
		$params['id'] = $this->get_idConsecutivo();
        $this->db->insert('po_proveedor',$params);
        return $this->db->insert_id();
    }
    
    function get_idConsecutivo()
    {
		$maxid = 1;
        $row = $this->db->query("select max(id) as 'maxid' from po_proveedor")->row();
		if ($row) {
			$maxid = $row->maxid + 1;
		}
		return $maxid;
	}
    
    /*
     * function to update po_proveedor
     */
    function update_po_proveedor($idPog,$params)
    {
        $this->db->where('idPog',$idPog);
        $response = $this->db->update('po_proveedor',$params);
        if($response)
        {
            return "po_proveedor updated successfully";
        }
        else
        {
            return "Error occuring while updating po_proveedor";
        }
    }
    
    /*
     * function to delete po_proveedor
     */
    function delete_po_proveedor($idPog)
    {
        $response = $this->db->delete('po_proveedor',array('idPog'=>$idPog));
        if($response)
        {
            return "po_proveedor deleted successfully";
        }
        else
        {
            return "Error occuring while deleting po_proveedor";
        }
    }
}
