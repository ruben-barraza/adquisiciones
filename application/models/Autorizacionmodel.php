<?php

class Autorizacionmodel extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    //Get autorizacion by id
    function get_autorizacion($id)
    {
        return $this->db->get_where('autorizacion',array('id'=>$id))->row_array();
    }

    //Get lista de autorizaciones
    function get_all_listaautorizacion()
    {
		
        $this->db->select('autob.id, autob.numero, autob.año, autob.descripcion, autob.descripcionDetallada, autob.importe, autob.idFondo ');
		$this->db->select('sum(IFNULL(scd.IMPORTE_PARTIDA_SOLPED,0)) AS IMPORTE_SOLCON, sum(IFNULL(scd.NETWR,0)) AS IMPORTE_PEDIDO, ');
		$this->db->select('(sum(IFNULL(scd.NETWR,0))*1.16) AS IMPORTE_PEDIDO_MAS_IVA, ');
		$this->db->select('(IFNULL(autob.importe,0))-(sum(IFNULL(scd.NETWR,0))*1.16) AS RECURSO_NO_ASIGNADO ');
		
        $this->db->from('autorizacion as autob');
        
		$this->db->join('solcon as sc', 'sc.idAt1 = autob.id ', 'left outer');
		$this->db->join('solcondetalle as scd', 'scd.BANFN = CONCAT("0", sc.solcon) ', 'left outer');
		
		$this->db->group_by('1,2,3,4,5,6,7');
        $this->db->order_by('autob.numero, autob.año','asc');		
		
        $query = $this->db->get();
        return $query->result_array();
		

		
        //return $this->db->get('autorizacion')->result_array();
        //$this->db->select('*');
        //$this->db->from('autorizacion');
        //$this->db->order_by('numero','asc');
        //$query = $this->db->get();
        //return $query->result_array();
    }

    function get_idConsecutivo()
    {
        $maxid = 1;
        $row = $this->db->query("select max(id) as 'maxid' from autorizacion")->row();
        if ($row) {
            $maxid = $row->maxid + 1;
        }
        return $maxid;
    }

    //Add new autorizacion
    function add_autorizacion($params)
    {
        $params['id'] = $this->get_idConsecutivo();
        $this->db->insert('autorizacion',$params);
        return $this->db->insert_id();
    }

    //Update autorizacion
    function update_autorizacion($id,$params)
    {
        $this->db->where('id',$id);
        $response = $this->db->update('autorizacion',$params);
        if($response)
        {
            return "Autorización actualizada exitosamente";
        }
        else
        {
            return "Ocurrió un error al actualizar la autorización";
        }
    }

    /*
     * function to delete autorizacion
     */
    function delete_autorizacion($id)
    {
        $response = $this->db->delete('autorizacion',array('id'=>$id));
        if($response)
        {
            return "Autorización eliminada exitosamente";
        }
        else
        {
            return "Ocurrió un error al actualizar la autorización";
        }
    }
}