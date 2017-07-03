<?php
/* 
 * Generated by CRUDigniter v3.0 Beta 
 * www.crudigniter.com
 */
 
class Pogeneralmodel extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get po_general by id
     */
    function get_po_general($id)
    {
        return $this->db->get_where('po_general',array('id'=>$id))->row_array();
    }
    
    /*
     * Get all listapo_general
     */
    function get_all_listapo_general()
    {
        return $this->db->get('po_general')->result_array();
    }
    
    /*
     * function to add new po_general
     */
	
	function add_po_general($params)
    {
		$params['id'] = $this->get_idConsecutivo();
        $this->db->insert('po_general',$params);
        return $this->db->insert_id();
    }

    function add_im_general($params)
    {
        $params['id'] = $this->get_idConsecutivoImg();
        $this->db->insert('im_general',$params);
    }
    
    function add_im_concepto($params)
    {
        $params['id'] = $this->get_idConsecutivoImc();
        $this->db->insert('im_concepto',$params);
    }

    function add_uk_po_aclaracion_acuse($idPog, $idEmpleado)
    {
        $this->db->insert('po_acuse', array(
            'idPog' => $idPog,
            'idEmpleado' => $idEmpleado
        ));

        $this->db->insert('po_aclaracion', array(
            'idPog' => $idPog,
            'idEmpleado' => $idEmpleado
        ));
    }

    function add_relacion_pog_proveedor($idPog, $idProveedor, $numContacto){
        $this->db->insert('po_proveedor', array(
            'idPog' => $idPog,
            'idProveedor' => $idProveedor,
            'contacto' => $numContacto
        ));
    }

    
    function get_idConsecutivo()
    {
		$maxid = 1;
        $row = $this->db->query("select max(id) as 'maxid' from po_general")->row();
		if ($row) {
			$maxid = $row->maxid + 1;
		}
		return $maxid;
	}
    

    function get_idConsecutivoImg()
    {
		$maxid = 1;
        $row = $this->db->query("select max(id) as 'maxid' from im_general")->row();
		if ($row) {
			$maxid = $row->maxid + 1;
		}
		return $maxid;
	}


    function get_idConsecutivoImc()
    {
		$maxid = 1;
        $row = $this->db->query("select max(id) as 'maxid' from im_concepto")->row();
		if ($row) {
			$maxid = $row->maxid + 1;
		}
		return $maxid;
	}

    function get_idEmpleado($rpe)
    {
        $this->db->select('id');
        $this->db->from('empleado');
        $this->db->where('rpe', $rpe);
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result_array();
        }
    }

    function get_idProveedor($clave)
    {
        $this->db->select('id');
        $this->db->from('proveedor');
        $this->db->where('clave', $clave);
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result_array();
        }
    }

    function get_idArticulo($codigo)
    {
        $this->db->select('id');
        $this->db->from('articulo');
        $this->db->where('codigo', $codigo);
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result_array();
        }
    }

    function get_empleado($rpe)
    {
        $this->db->select('nombre, apellidoPaterno, apellidoMaterno');
        $this->db->from('empleado');
        $this->db->where('rpe', $rpe);
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result_array();
        }
    }

    function get_all_listaproveedorfamilia($idFamilia)
    {
        $this->db->select('proveedor.clave, proveedor.razonSocial, proveedor.direccion, proveedor.nombre1, proveedor.nombre2, proveedor.nombre3, proveedor.correoElectronico1, proveedor.correoElectronico2, proveedor.correoElectronico3');
        $this->db->from('proveedor');
        $this->db->join('relacionproveedorfamilia', 'relacionproveedorfamilia.idProveedor = proveedor.id', 'inner');
        $this->db->join('familia', 'familia.id = relacionproveedorfamilia.idFamilia', 'inner');
        $this->db->where('familia.id', $idFamilia);
        $this->db->order_by('proveedor.razonSocial');
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result_array();
        }
    }

    function get_all_listaproveedorservicio()
    {
        $this->db->select('proveedor.clave, proveedor.razonSocial, proveedor.direccion, proveedor.nombre1, proveedor.nombre2, proveedor.nombre3, proveedor.correoElectronico1, proveedor.correoElectronico2, proveedor.correoElectronico3');
        $this->db->from('proveedor');
        $this->db->where('proveedor.tipo', 'S');
        $this->db->or_where('proveedor.tipo', 'A');
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result_array();
        }
    }

    function get_direccionalmacen($idAlmacen)
    {
        $this->db->select('domicilio');
        $this->db->from('almacen');
        $this->db->where('id', $idAlmacen);
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result_array();
        }
    }

    function get_all_listaarticulos($idFamilia)
    {
        $this->db->select('articulo.codigo, articulo.descripcion, articulo.tiempoEntrega, articulo.cantidadEmbalaje, unidadmedida.clave unidadmedida');
        $this->db->from('articulo');
        $this->db->join('unidadmedida', 'articulo.idUnidadMedida = unidadmedida.id', 'inner');
        $this->db->join('familia', 'articulo.idFamilia = familia.id', 'inner');
        $this->db->where('articulo.idFamilia', $idFamilia);
        $this->db->order_by('articulo.descripcion');
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result_array();
        }
    }

    function get_articulo_clave($codigo)
    {
        $this->db->select('articulo.codigo, articulo.descripcion, articulo.tiempoEntrega, articulo.cantidadEmbalaje, unidadmedida.clave unidadmedida');
        $this->db->from('articulo');
        $this->db->join('unidadmedida', 'articulo.idUnidadMedida = unidadmedida.id', 'inner');
        $this->db->join('familia', 'articulo.idFamilia = familia.id', 'inner');
        $this->db->where('articulo.codigo', $codigo);
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result_array();
        }
    }

    function get_proveedor_codigo($clave)
    {
        $this->db->select('proveedor.clave, proveedor.razonSocial, proveedor.direccion, proveedor.nombre1, proveedor.nombre2, proveedor.nombre3, proveedor.correoElectronico1, proveedor.correoElectronico2, proveedor.correoElectronico3');
        $this->db->from('proveedor');
        $this->db->where('proveedor.clave', $clave);
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result_array();
        }
    }
    
    /*
     * function to update po_general
     */
    function update_po_general($id,$params)
    {
        $this->db->where('id',$id);
        $response = $this->db->update('po_general',$params);
        if($response)
        {
            return "po_general updated successfully";
        }
        else
        {
            return "Error occuring while updating po_general";
        }
    }
    
    /*
     * function to delete po_general
     */
    function delete_po_general($id)
    {
        $response = $this->db->delete('po_general',array('id'=>$id));
        if($response)
        {
            return "po_general deleted successfully";
        }
        else
        {
            return "Error occuring while deleting po_general";
        }
    }

    function delete_po_proveedor($id)
    {
        $this->db->where('idPog', $id);
        $this->db->delete('po_proveedor');
    }

    function delete_po_acuse($id)
    {
        $this->db->where('idPog', $id);
        $this->db->delete('po_acuse');
    }

    function delete_po_aclaracion($id)
    {
        $this->db->where('idPog', $id);
        $this->db->delete('po_aclaracion');
    }

    function delete_im_general($id)
    {
        $this->db->where('idPog', $id);
        $this->db->delete('im_general');
    }
}
