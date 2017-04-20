<?php
/* 
 * Generated by CRUDigniter v3.0 Beta 
 * www.crudigniter.com
 */
 
class Imgeneralmodel extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get im_general by id
     */
    function get_im_general($id)
    {
        return $this->db->get_where('im_general',array('id'=>$id))->row_array();
    }
    
    /*
     * Get all listaim_general
     */
    function get_all_listaim_general()
    {
        return $this->db->get('im_general')->result_array();
    }
    
    /*
     * function to add new im_general
     */
	
	function add_im_general($params)
    {
		$params['id'] = $this->get_idConsecutivo();
        $this->db->insert('im_general',$params);
        return $this->db->insert_id();
    }
    
    function get_idConsecutivo()
    {
		$maxid = 1;
        $row = $this->db->query("select max(id) as 'maxid' from im_general")->row();
		if ($row) {
			$maxid = $row->maxid + 1;
		}
		return $maxid;
	}

    function get_empleado($rpe){
        $this->db->select('nombre, apellidoPaterno, apellidoMaterno');
        $this->db->from('empleado');
        $this->db->where('rpe', $rpe);
        return $this->db->get();
    }
    
    /*
     * function to update im_general
     */
    function update_im_general($id,$params)
    {
        $this->db->where('id',$id);
        $response = $this->db->update('im_general',$params);
        if($response)
        {
            return "im_general updated successfully";
        }
        else
        {
            return "Error occuring while updating im_general";
        }
    }
    
    /*
     * function to delete im_general
     */
    function delete_im_general($id)
    {
        $response = $this->db->delete('im_general',array('id'=>$id));
        if($response)
        {
            return "im_general deleted successfully";
        }
        else
        {
            return "Error occuring while deleting im_general";
        }
    }
}
