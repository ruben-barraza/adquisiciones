<?php
class Comboboxesmodel extends CI_Model{
    //put your code here
    public function getEstados() {
        $this->db->order_by('nombre', 'asc');
        $estados = $this->db->get('estado');
        
        if($estados->num_rows() > 0){
            return $estados->result();
        }
    }
    
    public function getMunicipios($idEstado) {
        $this->db->where('idEstado', $idEstado);
        $this->db->order_by('nombre', 'asc');
        $municipios = $this->db->get('municipio');
        
        if($municipios->num_rows() > 0){
            return $municipios->result();
        }
    }

    public function getPeticiones(){
           $this->db->order_by('id','asc');
           $proveedores=$this->db->get('po_general');

           if($proveedores->num_rows()>0){

               return $proveedores->result();
           }
    }

    public function getProveedoresPeticion($idPeticion){
        $this->db->select('proveedor.id id, proveedor.razonSocial razonSocial');
        $this->db->from('proveedor');
        $this->db->join('po_proveedor', 'po_proveedor.idProveedor = proveedor.id', 'inner');
        $this->db->where('po_proveedor.idPog', $idPeticion);
        $this->db->order_by('proveedor.razonSocial');
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result();
        }
    }

    public function getFamilias(){
        $this->db->order_by('clave', 'asc');
        $familias = $this->db->get('familia');

        if($familias->num_rows() > 0){
            return $familias->result();
        }
    }

    public function getAlmacenes(){
        $this->db->order_by('centroMM', 'asc');
        $almacenes = $this->db->get('almacen');

        if($almacenes->num_rows() > 0){
            return $almacenes->result();
        }
    }
}