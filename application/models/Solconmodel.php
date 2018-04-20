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
        $this->db->select('*');
        $this->db->from('solcon');
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
}