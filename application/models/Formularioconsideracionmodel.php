<?php
/* 
 * Generated by CRUDigniter v3.0 Beta 
 * www.crudigniter.com
 */
 
class Formularioconsideracionmodel extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get formularioconsideracion by id
     */
    function get_formularioconsideracion($id)
    {
        return $this->db->get_where('formularioconsideracion',array('id'=>$id))->row_array();
    }
    
    /*
     * Get all listaformularioconsideracion
     */
    function get_all_listaformularioconsideracion()
    {
        return $this->db->get('formularioconsideracion')->result_array();
    }
    
    /*
     * function to add new formularioconsideracion
     */
	
	function add_formularioconsideracion($params)
    {
		$params['id'] = $this->get_idConsecutivo();
        $this->db->insert('formularioconsideracion',$params);
        return $this->db->insert_id();
    }
    
    function get_idConsecutivo()
    {
		$maxid = 1;
        $row = $this->db->query("select max(id) as 'maxid' from formularioconsideracion")->row();
		if ($row) {
			$maxid = $row->maxid + 1;
		}
		return $maxid;
	}
    
    /*
     * function to update formularioconsideracion
     */
    function update_formularioconsideracion($id,$params)
    {
        $this->db->where('id',$id);
        $response = $this->db->update('formularioconsideracion',$params);
        if($response)
        {
            return "formularioconsideracion updated successfully";
        }
        else
        {
            return "Error occuring while updating formularioconsideracion";
        }
    }
    
    /*
     * function to delete formularioconsideracion
     */
    function delete_formularioconsideracion($id)
    {
        $response = $this->db->delete('formularioconsideracion',array('id'=>$id));
        if($response)
        {
            return "formularioconsideracion deleted successfully";
        }
        else
        {
            return "Error occuring while deleting formularioconsideracion";
        }
    }
}
