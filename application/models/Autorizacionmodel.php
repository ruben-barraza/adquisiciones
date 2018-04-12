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
        //return $this->db->get('autorizacion')->result_array();
        $this->db->select('*');
        $this->db->from('autorizacion');
        $this->db->order_by('numero','asc');
        $query = $this->db->get();
        return $query->result_array();
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