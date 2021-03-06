<?php
/* 
 * Generated by CRUDigniter v3.0 Beta 
 * www.crudigniter.com
 */
 
class Articulomodel extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get articulo by id
     */
    function get_articulo($id)
    {
        return $this->db->get_where('articulo',array('id'=>$id))->row_array();
    }
    
    /*
     * Get all listaarticulo
     */
    function get_all_listaarticulo()
    {
        $this->db->select('articulo.id, articulo.codigo, articulo.descripcion, unidadmedida.clave unidadmedida, familia.clave familia, articulo.descripcionDetallada, articulo.especificacion, articulo.cantidadEmbalaje, articulo.tiempoEntrega, articulo.status');
        $this->db->from('articulo');
        $this->db->join('unidadmedida', 'articulo.idUnidadMedida = unidadmedida.id', 'inner');
        $this->db->join('familia', 'articulo.idFamilia = familia.id', 'inner');
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_all_lista_articulo_familia($idFamilia)
    {
        $this->db->select('articulo.id, articulo.codigo, familia.clave familia, unidadmedida.clave unidadmedida, articulo.descripcion, articulo.descripcionDetallada, articulo.especificacion, articulo.precioUnitario, articulo.cantidadEmbalaje, articulo.tiempoEntrega, articulo.status');
        $this->db->from('articulo');
        $this->db->join('unidadmedida', 'articulo.idUnidadMedida = unidadmedida.id', 'inner');
        $this->db->join('familia', 'articulo.idFamilia = familia.id', 'inner');
        $this->db->where('articulo.idFamilia', $idFamilia);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    /*
     * function to add new articulo
     */
	
	function add_articulo($params)
    {
		$params['id'] = $this->get_idConsecutivo();
        $this->db->insert('articulo',$params);
        return $this->db->insert_id();
    }
    
    function get_idConsecutivo()
    {
		$maxid = 1;
        $row = $this->db->query("select max(id) as 'maxid' from articulo")->row();
		if ($row) {
			$maxid = $row->maxid + 1;
		}
		return $maxid;
	}

	function get_familia($id)
    {
        $this->db->select('familia.clave');
        $this->db->from('articulo');
        $this->db->join('familia', 'articulo.idFamilia = familia.id', 'inner');
        $this->db->where('articulo.id', $id);
        $query = $this->db->get();
        if($query->num_rows() > 0){
            $vl = $query->row_array();
            return $vl['clave'];
        } else {
            return 0;
        }
    }
    
    /*
     * function to update articulo
     */
    function update_articulo($id,$params)
    {
        $this->db->where('id',$id);
        $response = $this->db->update('articulo',$params);
        if($response)
        {
            return "articulo updated successfully";
        }
        else
        {
            return "Error occuring while updating articulo";
        }
    }
    
    /*
     * function to delete articulo
     */
    function delete_articulo($id)
    {
        $response = $this->db->delete('articulo',array('id'=>$id));
        if($response)
        {
            return "articulo deleted successfully";
        }
        else
        {
            return "Error occuring while deleting articulo";
        }
    }
}
