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