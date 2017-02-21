<?php
/* 
 * Generated by CRUDigniter v3.0 Beta 
 * www.crudigniter.com
 */
 
class Estadomodel extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get estado by id
     */
    function get_estado($id)
    {
        return $this->db->get_where('estado',array('id'=>$id))->row_array();
    }
    
    /*
     * Get all listaestado
     */
    function get_all_listaestado()
    {
        return $this->db->get('estado')->result_array();
    }
    
    /*
     * function to add new estado
     */
	function add_estado($params)
    {
		$params['id'] = $this->get_idConsecutivo();
        $this->db->insert('estado',$params);
        return $this->db->insert_id();
    }
    
    function get_idConsecutivo()
    {
		$maxid = 1;
        $row = $this->db->query("select max(id) as 'maxid' from estado")->row();
		if ($row) {
			$maxid = $row->maxid + 1;
		}
		return $maxid;
	}
    
    /*
     * function to update estado
     */
    function update_estado($id,$params)
    {
        $this->db->where('id',$id);
        $response = $this->db->update('estado',$params);
        if($response)
        {
            return "estado updated successfully";
        }
        else
        {
            return "Error occuring while updating estado";
        }
    }
    
    /*
     * function to delete estado
     */
    function delete_estado($id)
    {
        $response = $this->db->delete('estado',array('id'=>$id));
        if($response)
        {
            return "estado deleted successfully";
        }
        else
        {
            return "Error occuring while deleting estado";
        }
    }
}