<?php
/* 
 * Generated by CRUDigniter v3.0 Beta 
 * www.crudigniter.com
 */
 
class Municipiomodel extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get municipio by id
     */
    function get_municipio($id)
    {
        return $this->db->get_where('municipio',array('id'=>$id))->row_array();
    }
    
    /*
     * Get all listamunicipio
     */
    function get_all_listamunicipio()
    {
        return $this->db->get('municipio')->result_array();
    }
    
    /*
     * function to add new municipio
     */
	
	function add_municipio($params)
    {
		$params['id'] = $this->get_idConsecutivo();
        $this->db->insert('municipio',$params);
        return $this->db->insert_id();
    }
    
    function get_idConsecutivo()
    {
		$maxid = 1;
        $row = $this->db->query("select max(id) as 'maxid' from municipio")->row();
		if ($row) {
			$maxid = $row->maxid + 1;
		}
		return $maxid;
	}
    
    /*
     * function to update municipio
     */
    function update_municipio($id,$params)
    {
        $this->db->where('id',$id);
        $response = $this->db->update('municipio',$params);
        if($response)
        {
            return "municipio updated successfully";
        }
        else
        {
            return "Error occuring while updating municipio";
        }
    }
    
    /*
     * function to delete municipio
     */
    function delete_municipio($id)
    {
        $response = $this->db->delete('municipio',array('id'=>$id));
        if($response)
        {
            return "municipio deleted successfully";
        }
        else
        {
            return "Error occuring while deleting municipio";
        }
    }
}
