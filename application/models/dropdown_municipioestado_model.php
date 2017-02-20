<?php
class dropdown_demo_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function get_estado()
    {
        $result = $this->db->get('estado')->result();;
        $id = array('0');
        $nombre = array('Seleccione');
        for ($i = 0; $i < count($result); $i++)
        {
            array_push($id, $result[$i]->id);
            array_push($nombre, $result[$i]->nombre);
        }
        return array_combine($id, $nombre);
    }
    
    function get_municipio($mid=NULL)
    {
        $result = $this->db->where('idEstado', $mid)->get('nombre')->result();
        $id = array('0');
        $nombre = array('Seleccione');
        for ($i=0; $i<count($result); $i++)
        {
            array_push($id, $result[$i]->id);
            array_push($nombre, $result[$i]->nombre);
        }
        return array_combine($id, $nombre);
    }
}
?>