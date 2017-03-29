<?php
/* 
 * Generated by CRUDigniter v3.0 Beta 
 * www.crudigniter.com
 */
 
class Proveedormodel extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get proveedor by id
     */
    function get_proveedor($id)
    {
        return $this->db->get_where('proveedor',array('id'=>$id))->row_array();
    }
    
    /*
     * Get all listaproveedor
     */
    function get_all_listaproveedor()
    {
        return $this->db->get('proveedor')->result_array();
    }
    
    /*
     * function to add new proveedor
     */
	
	function add_proveedor($params)
    {
		$params['id'] = $this->get_idConsecutivo();
        $this->db->insert('proveedor',$params);
        return $this->db->insert_id();
    }
    
    function get_idConsecutivo()
    {
		$maxid = 1;
        $row = $this->db->query("select max(id) as 'maxid' from proveedor")->row();
		if ($row) {
			$maxid = $row->maxid + 1;
		}
		return $maxid;
	}

    /*
     * función para guardar en la tabla relacionproveedofamilia
     */
    function add_uk_proveedor_familia($id, $params){
        foreach($params as $clave){
            $this->db->select('id')->from('familia')->where('clave', $clave);
            $valor = $this->db->get();

            $vl = $valor->row_array();
            $familia = $vl['id'];

            $this->db->insert('relacionproveedorfamilia', array(
                'idProveedor' => $id,
                'idFamilia' => $familia
            ));
        }    
    }

    /*
     * function to update proveedor
     */
    function update_proveedor($id,$params)
    {
        $this->db->where('id',$id);
        $response = $this->db->update('proveedor',$params);
        if($response)
        {
            return "proveedor updated successfully";
        }
        else
        {
            return "Error occuring while updating proveedor";
        }
    }
    
    /*
     * function to delete proveedor
     */
    function delete_proveedor($id)
    {
        $response = $this->db->delete('proveedor',array('id'=>$id));
        if($response)
        {
            return "proveedor deleted successfully";
        }
        else
        {
            return "Error occuring while deleting proveedor";
        }
    }

    /*
     * función para obtener el estado seleccionado de la base de datos
     */
     public function editEstados($idProveedor) {
        $this->db->select('idMunicipio')->from('proveedor')->where('id', $idProveedor);
        $valorMunicipio = $this->db->get();
        $vlMunicipio = $valorMunicipio->row_array();
        $municipio = $vlMunicipio['idMunicipio'];

        $this->db->select('idEstado')->from('municipio')->where('id', $municipio);
        $valorEstado = $this->db->get('estado');
        $vlEstado = $valorEstado->row_array();
        $estado = $vlEstado['idEstado'];
    }

    /*
     * funcies para obtener el ID del municipio que corresponde al proveedor que se quiere editar
     */
    public function obtenerIdMunicipio($idProveedor){
        $this->db->select('idMunicipio')->from('proveedor')->where('id', $idProveedor);
        $valor = $this->db->get();
        $vl = $valor->row_array();
        return $vl['idMunicipio'];
    }

    public function obtenerIdMunicipio1($idProveedor){
        $this->db->select('idMunicipio1')->from('proveedor')->where('id', $idProveedor);
        $valor = $this->db->get();
        $vl = $valor->row_array();
        return $vl['idMunicipio1'];
    }

    public function obtenerIdMunicipio2($idProveedor){
        $this->db->select('idMunicipio2')->from('proveedor')->where('id', $idProveedor);
        $valor = $this->db->get();
        $vl = $valor->row_array();
        return $vl['idMunicipio2'];
    }

    public function obtenerIdMunicipio3($idProveedor){
        $this->db->select('idMunicipio3')->from('proveedor')->where('id', $idProveedor);
        $valor = $this->db->get();
        $vl = $valor->row_array();
        return $vl['idMunicipio3'];
    }
    
    /*
     * función para obtener el estado seleccionado de la base de datos
     */
    public function obtenerIdEstado($idMunicipio){
        $this->db->select('idEstado')->from('municipio')->where('id', $idMunicipio);
        $valor = $this->db->get();
        $vl = $valor->row_array();
        return $vl['idEstado'];  
    }

    /*
     * función para obtener los ids de las familias que corresponden 
     * un proveedor de tipo bienes
     */

     public function obtenerIdFamiliaProveedor($idProveedor){
         $this->db->select('idFamilia')->from('relacionproveedorfamilia')->where('idProveedor', $idProveedor);
         $query = $this->db->get();
         $arrayFamilias = array();

         foreach($query->result() as $row){
             $arrayFamilias = $row['idFamilia'];
         }
         
         return $arrayFamilias;
     }
     
}
