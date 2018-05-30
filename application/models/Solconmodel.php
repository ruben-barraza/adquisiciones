<?php

class Solconmodel extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    //Get solcon by id
    function get_solcon($id)
    {
        return $this->db->get_where('solcon',array('id'=>$id))->row_array();
    }

    //Get lista de solcons
    function get_all_listasolcon()
    {
        //return $this->db->get('autorizacion')->result_array();
        $this->db->select('solcon.id, origenRecurso, solcon, idAt1, idAt2, idAt3, tipoCompra, centro, centroCosto, solicitante, sd.GEBER AS fondo, contrato, pedido, im_general.titulo, anioEjercicio, sum(IMPORTE_PARTIDA_SOLPED) IMPORTE_SOLPED, sum(IFNULL(NETWR,0)) IMPORTE_PEDIDO, SUM(sd.SALDO_LIBERADO_PARTIDA) SALDO_LIBERADO_PARTIDA, ');

        $this->db->select('CONCAT(AT1.numero, "/", AT1.año) AS numeroAt1, AT1.descripcion as descripcionAt1, AT1.importe as importeAt1, ');
        $this->db->select('CONCAT(AT2.numero, "/", AT2.año) AS numeroAt2, AT2.descripcion as descripcionAt2, AT2.importe as importeAt2, ');
        $this->db->select('CONCAT(AT3.numero, "/", AT3.año) AS numeroAt3, AT3.descripcion as descripcionAt3, AT3.importe as importeAt3 ');

        $this->db->from('solcon');

        $this->db->join('autorizacion as AT1', 'AT1.id = solcon.idAt1', 'left outer');
        $this->db->join('autorizacion as AT2', 'AT2.id = solcon.idAt2', 'left outer');
        $this->db->join('autorizacion as AT3', 'AT3.id = solcon.idAt3', 'left outer');

        $this->db->join('im_general', 'im_general.SOLPED = solcon.solcon', 'left outer');

        $this->db->join('solcondetalle as sd', 'sd.BANFN = CONCAT("0",solcon.solcon)', 'left outer');		
		
        $this->db->group_by('1,2,3,4,5,6,7,8,9,10,11,12,13,14,15');
        $this->db->order_by('solcon','asc');		
		
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_idConsecutivo()
    {
        $maxid = 1;
        $row = $this->db->query("select max(id) as 'maxid' from solcon")->row();
        if ($row) {
            $maxid = $row->maxid + 1;
        }
        return $maxid;
    }

    //Add new solcon
    function add_solcon($params)
    {
        $params['id'] = $this->get_idConsecutivo();
        $this->db->insert('solcon',$params);
        return $this->db->insert_id();
    }

    //Update solcon
    function update_solcon($id,$params)
    {
        $this->db->where('id',$id);
        $response = $this->db->update('solcon',$params);
        if($response)
        {
            return "Solcon actualizado exitosamente";
        }
        else
        {
            return "Ocurrió un error al actualizar el solcon";
        }
    }

    /*
     * function to delete solcon
     */
    function delete_solcon($id)
    {
        $response = $this->db->delete('solcon',array('id'=>$id));
        if($response)
        {
            return "Solcon eliminado exitosamente";
        }
        else
        {
            return "Ocurrió un error al actualizar el solcon";
        }
    }
	
    //Get solcon by numeroSolcon
    function get_solconDetalle($solcon)
    {
        $this->db->select('JUSTIFICACION, TITULO');
        $this->db->from('solcondetalle');
        $this->db->where('BANFN', $solcon);
        $this->db->limit(0,1);
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result_array();
        }
        //return $this->db->get_where('solcondetalle','BANFN'=>$numeroSolcon)->row_array();
    }
	
}