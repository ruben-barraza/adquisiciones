<?php
/* 
 * Generated by CRUDigniter v3.0 Beta 
 * www.crudigniter.com
 */
 
class Poacusemodel extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get po_acuse by idPog
     */
    function get_po_acuse($idPog)
    {
        return $this->db->get_where('po_acuse',array('idPog'=>$idPog))->row_array();
    }
    
    /*
     * Get all listapo_acuse
     */
    function get_all_listapo_acuse()
    {
        return $this->db->get('po_acuse')->result_array();
    }
    
    /*
     * function to add new po_acuse
     */
	function add_po_acuse($params)
    {
		$params['id'] = $this->get_idConsecutivo();
        $this->db->insert('po_acuse',$params);
        return $this->db->insert_id();
    }
    
    function get_idConsecutivo()
    {
		$maxid = 1;
        $row = $this->db->query("select max(id) as 'maxid' from po_acuse")->row();
		if ($row) {
			$maxid = $row->maxid + 1;
		}
		return $maxid;
	}
    
    /*
     * function to update po_acuse
     */
    function update_po_acuse($idPog,$params)
    {
        $this->db->where('idPog',$idPog);
        $response = $this->db->update('po_acuse',$params);
        if($response)
        {
            return "po_acuse updated successfully";
        }
        else
        {
            return "Error occuring while updating po_acuse";
        }
    }
    
    /*
     * function to delete po_acuse
     */
    function delete_po_acuse($idPog)
    {
        $response = $this->db->delete('po_acuse',array('idPog'=>$idPog));
        if($response)
        {
            return "po_acuse deleted successfully";
        }
        else
        {
            return "Error occuring while deleting po_acuse";
        }
    }
}