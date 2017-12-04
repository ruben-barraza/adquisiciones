<?php
/* 
 * Generated by CRUDigniter v3.0 Beta 
 * www.crudigniter.com
 */



class Imgeneralmodel extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /*
     * Get im_general by id
     */
    function get_im_general($id)
    {
        return $this->db->get_where('im_general', array('id' => $id))->row_array();
    }

    /*
     * Get all listaim_general
     */
    function get_all_listaim_general()
    {

        $this->db->select('im_general.id, im_general.idPog, im_general.titulo, im_general.fechaElaboracion, im_general.estatus, im_general.SOLPED, familia.descripcion, po_general.tipo');
        $this->db->from('im_general');
        $this->db->join('po_general', 'po_general.id = im_general.idPog', 'inner');
        $this->db->join('familia', 'familia.id = po_general.idFamilia', 'inner');
        $this->db->order_by('im_general.fechaElaboracion', 'DESC');
        $query = $this->db->get();
        return $query->result_array();


    }

    function get_all_listaim_concepto()
    {
        $this->db->select('*');
        $this->db->from('im_concepto');
        $this->db->join('articulo', 'articulo.id = im_concepto.idArticulo', 'inner');
        $this->db->join('unidadmedida', 'unidadmedida.id = articulo.idUnidadMedida', 'inner');
        $this->db->order_by('im_concepto.partida');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }




    /*
     * function to add new im_general
     */

    function add_im_general($params)
    {
        $params['id'] = $this->get_idConsecutivo();
        $this->db->insert('im_general', $params);
        return $this->db->insert_id();
    }

    function get_idConsecutivo()
    {
        $maxid = 1;
        $row = $this->db->query("select max(id) as 'maxid' from im_general")->row();
        if ($row) {
            $maxid = $row->maxid + 1;
        }
        return $maxid;
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
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }


    /*
     * function to update im_general
     */
    function update_im_general($id, $params)
    {
        $this->db->where('id', $id);
        $response = $this->db->update('im_general', $params);
        if ($response) {
            return "im_general updated successfully";
        } else {
            return "Error occuring while updating im_general";
        }
    }

    /*
     * function to delete im_general
     */
    function delete_im_general($id)
    {
        $response = $this->db->delete('im_general', array('id' => $id));
        if ($response) {
            return "im_general deleted successfully";
        } else {
            return "Error occuring while deleting im_general";
        }
    }

    function get_all_lista_imc_familia($clave){
        $this->db->select('im_general.id, im_general.idPog, im_general.titulo, im_general.fechaElaboracion, im_general.estatus, im_general.SOLPED, familia.descripcion, po_general.tipo');
        $this->db->from('im_general');
        $this->db->join('po_general', 'po_general.id = im_general.idPog', 'inner');
        $this->db->join('familia', 'familia.id = po_general.idFamilia', 'inner');
        $this->db->where('familia.clave', $clave);
        $this->db->order_by('im_general.fechaElaboracion', 'DESC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }

    public function getEmpleadoAutoriza($id)
    {
        $this->db->select('empleado.rpe, empleado.nombre, empleado.apellidoPaterno, empleado.apellidoMaterno');
        $this->db->from('im_general');
        $this->db->join('empleado', 'im_general.idEmpleadoAutoriza = empleado.id', 'inner');
        $this->db->where('im_general.id', $id);
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result_array();
        }

    }

    public function getEmpleadoFormula($id)
    {
        $this->db->select('empleado.rpe, empleado.nombre, empleado.apellidoPaterno, empleado.apellidoMaterno');
        $this->db->from('im_general');
        $this->db->join('empleado', 'im_general.idEmpleadoFormula = empleado.id', 'inner');
        $this->db->where('im_general.id', $id);
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result_array();
        }
    }

    function get_idEmpleado($rpe)
    {
        $this->db->select('id');
        $this->db->from('empleado');
        $this->db->where('rpe', $rpe);
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->row('id');
        }
    }

    public function get_pog_id($id)
    {
        $this->db->select('idPog');
        $this->db->from('im_general');
        $this->db->where('id', $id);
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->row('idPog');
        }
    }

    public function get_img_proveedores($pog_id)
    {
        $this->db->select('proveedor.id, proveedor.razonSocial');
        $this->db->from('po_general');
        $this->db->join('po_proveedor', 'po_general.id = po_proveedor.idPog', 'inner');
        $this->db->join('proveedor', 'proveedor.id = po_proveedor.idProveedor', 'inner');
        $this->db->where('po_general.id', $pog_id);
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result_array();
        }
    }

    public function get_imc_concepto($pog_id)
    {
        $this->db->select('im_concepto.id, im_concepto.partida, articulo.codigo, articulo.descripcion, unidadmedida.clave, im_concepto.cantidad');
        $this->db->from('im_concepto');
        $this->db->join('articulo', 'im_concepto.idArticulo = articulo.id', 'inner');
        $this->db->join('unidadmedida', 'articulo.idUnidadMedida = unidadmedida.id', 'inner');
        $this->db->group_by("im_concepto.partida");
        $this->db->where('im_concepto.idPog', $pog_id);
        $this->db->order_by("partida", "asc");
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result_array();
        }
    }

    public function get_imc_precios($prov_id, $idPog)
    {
        $this->db->select('im_concepto.id, im_concepto.partida, articulo.codigo, articulo.descripcion, unidadmedida.clave, im_concepto.cantidad, im_concepto.preciounitarioIM, im_concepto.importeIM');
        $this->db->from('im_concepto');
        $this->db->join('articulo', 'im_concepto.idArticulo = articulo.id', 'inner');
        $this->db->join('unidadmedida', 'articulo.idUnidadMedida = unidadmedida.id', 'inner');
        $this->db->where('im_concepto.idProveedor', $prov_id);
        $this->db->where('im_concepto.idPog', $idPog);
        $this->db->order_by("partida", "asc");
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result_array();
        }
    }

    public function get_imc_subtotal($prov_id, $idPog)
    {
        $this->db->select('sum(importeIM) as subtotal');
        $this->db->from('im_concepto');
        $this->db->where('im_concepto.idProveedor', $prov_id);
        $this->db->where('im_concepto.idPog', $idPog);
        $query = $this->db->get();
        $vl = $query->row_array();
        return $vl['subtotal'];
    }

    public function update_imc_precios($cantidad, $precioIM, $importe, $idProveedor, $idArticulo, $idPog){
        $data = array('cantidad' => $cantidad, 'preciounitarioIM' => $precioIM, 'importeIM' => $importe);
        $arraywhere = array('idProveedor' => $idProveedor, 'idArticulo' => $idArticulo, 'idPog' => $idPog);
        $this->db->where($arraywhere);
        $this->db->update('im_concepto', $data);
    }

    function get_idArticulo($codigo)
    {
        $this->db->select('id');
        $this->db->from('articulo');
        $this->db->where('codigo', $codigo);
        $query = $this->db->get();
        $vl = $query->row_array();
        return $vl['id'];
    }

    function get_pmc_data($id)
    {
        $this->db->select('partida, idProveedor, importeIM');
        $this->db->from('im_concepto');
        $this->db->where('idImg', $id);
        $this->db->order_by("idProveedor", "asc");
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result_array();
        }

    }


    public function GuardarDatosModel()
    {

        $this->load->helper('url');


        $dataImConcepto = array(
            'cantidad' => $this->input->post('cantidad'),//capturo los datos que me envian desde la vista

            'precio-unitario' => $this->input->post('preciounitario')

        );

        $dataImGeneral = array(
            'solped' => $this->input->post('solped'),//capturo los datos que me envian desde la vista

            'personaaprobo' => $this->input->post('personaaprobo'),
            'personaelaboro' => $this->input->post('personaelaboro')

        );

        if ($this->form_validation->run() == FALSE) {


            //Acción a tomar si existe un error el en la validación
            echo "Verifique sus campos";
            redirect('im_general/index');
        } else {
            return $this->db->update('im_concepto', $dataImConcepto);

        }


    }


}
