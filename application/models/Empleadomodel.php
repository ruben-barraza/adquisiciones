<?php
/* 
 * Generated by CRUDigniter v3.0 Beta 
 * www.crudigniter.com
 */
 
class Empleadomodel extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get empleado by id
     */
    function get_empleado($id)
    {
        return $this->db->get_where('empleado',array('id'=>$id))->row_array();
    }
    
    /*
     * Get all listaempleado
     */
    function get_all_listaempleado()
    {
        //return $this->db->get('empleado')->result_array();
        
        $this->db->select('empleado.id, empleado.rpe, empleado.nombre, empleado.apellidoPaterno, empleado.apellidoMaterno, empleado.correoElectronico, empleado.titulo,departamento.nombre departamento, categoria.nombre categoria');
        $this->db->from('empleado');
        $this->db->join('categoria', 'categoria.id = empleado.idCategoria', 'inner');
        $this->db->join('departamento', 'departamento.id = empleado.idDepartamento', 'inner');
        $this->db->order_by('empleado.rpe');
        $query = $this->db->get();
        return $query->result_array();
        
        
    }
    
    /*
     * function to add new empleado
     */
	
	function add_empleado($params)
    {
		$params['id'] = $this->get_idConsecutivo();
        $this->db->insert('empleado',$params);
        return $this->db->insert_id();
    }
    
    function get_idConsecutivo()
    {
		$maxid = 1;
        $row = $this->db->query("select max(id) as 'maxid' from empleado")->row();
		if ($row) {
			$maxid = $row->maxid + 1;
		}
		return $maxid;
	}
    
    /*
     * function to update empleado
     */
    function update_empleado($id,$params)
    {
        $this->db->where('id',$id);
        $response = $this->db->update('empleado',$params);
        if($response)
        {
            return "empleado updated successfully";
        }
        else
        {
            return "Error occuring while updating empleado";
        }
    }
    
    /*
     * function to delete empleado
     */
    function delete_empleado($id)
    {
        $response = $this->db->delete('empleado',array('id'=>$id));
        if($response)
        {
            return "empleado deleted successfully";
        }
        else
        {
            return "Error occuring while deleting empleado";
        }
    }
}
