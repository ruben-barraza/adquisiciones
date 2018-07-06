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
        $this->db->distinct();
        $this->db->select('proveedor.id, proveedor.razonSocial');
        $this->db->from('po_general');
        $this->db->join('po_proveedor', 'po_general.id = po_proveedor.idPog', 'inner');
        $this->db->join('proveedor', 'proveedor.id = po_proveedor.idProveedor', 'inner');
        $this->db->where('po_general.id', $pog_id);
        $this->db->order_by("proveedor.razonSocial", "asc");
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result_array();
        }
    }

    public function get_img_prooveedores_cotizados($img_id)
    {
        $this->db->distinct();
        $this->db->select('im_concepto.idProveedor, proveedor.razonSocial');
        $this->db->from('im_concepto');
        $this->db->join('proveedor', 'proveedor.id = im_concepto.idProveedor', 'inner');
        $this->db->where('im_concepto.idImg', $img_id);
        $this->db->where('im_concepto.importeIM !=', 0);
        $query = $this->db->get();
        if($query->num_rows() > 0){
            $listaprov = $query->result_array();
            $proveedores = array();
            for ($i = 0; $i < count($listaprov); $i++){
                $idProveedor = $listaprov[$i]["idProveedor"];
                $razonSocial = $listaprov[$i]["razonSocial"];
                $proveedores[$idProveedor] = $razonSocial;
            }
            return $proveedores;
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
        $this->db->select('im_concepto.id, im_concepto.partida, articulo.codigo, articulo.descripcion, unidadmedida.clave, im_concepto.cantidadPO, im_concepto.preciounitarioIM, im_concepto.importeIM, im_concepto.cotizado');
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

    public function get_imc_moneda($prov_id, $idPog)
    {
        $this->db->distinct();
        $this->db->select('moneda');
        $this->db->from('im_concepto');
        $this->db->where('im_concepto.idProveedor', $prov_id);
        $this->db->where('im_concepto.idPog', $idPog);
        $query = $this->db->get();
        $vl = $query->row_array();
        return $vl['moneda'];
    }

    public function get_imc_cambio($prov_id, $idPog)
    {
        $this->db->distinct();
        $this->db->select('tipoCambio');
        $this->db->from('im_concepto');
        $this->db->where('im_concepto.idProveedor', $prov_id);
        $this->db->where('im_concepto.idPog', $idPog);
        $query = $this->db->get();
        $vl = $query->row_array();
        return $vl['tipoCambio'];
    }

    public function get_imc_fecha($prov_id, $idPog)
    {
        $this->db->distinct();
        $this->db->select('fechaElaboracion');
        $this->db->from('im_concepto');
        $this->db->where('im_concepto.idProveedor', $prov_id);
        $this->db->where('im_concepto.idPog', $idPog);
        $query = $this->db->get();
        $vl = $query->row_array();
        return $vl['fechaElaboracion'];
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

    public function update_imc_precios($cantidad, $precioIM, $importe, $idProveedor, $idArticulo, $idPog, $moneda, $tipocambio, $fechaelaboracion, $cotizado){
        $data = array('cantidad' => $cantidad, 'preciounitarioIM' => $precioIM, 'importeIM' => $importe, 'moneda' => $moneda, 'tipoCambio' => $tipocambio, 'fechaElaboracion' => $fechaelaboracion, 'cotizado' => $cotizado);
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
        $this->db->select('partida, idProveedor, preciounitarioIM');
        $this->db->from('im_concepto');
        $this->db->where('idImg', $id);
        $this->db->order_by("idProveedor", "asc");
        $this->db->order_by("partida", "asc");
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result_array();
        }

    }

    function get_pmc_cpp_data($id)
    {
        $this->db->select('partida, importeIM');
        $this->db->from('im_concepto');
        $this->db->where('idImg', $id);
        $this->db->order_by("partida", "asc");
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result_array();
        }

    }

    function update_pmc($array_pmc, $idPog){
        $partidaslength = sizeof($array_pmc);

        for ($i = 0; $i < $partidaslength; $i++){
            $partida = $i + 1;
            $this->db->where('idPog', $idPog);
            $this->db->where('partida', $partida);
            $this->db->update('im_concepto', array('pmc' => $array_pmc[$i]));

        }
    }

    function clear_pmc($idPog){
        $this->db->where('idPog', $idPog);
        $this->db->update('im_concepto', array('pmc' => 0));
    }

    function get_pmc_array($idPog){
        $this->db->select('pmc');
        $this->db->from('im_concepto');
        $this->db->where('idPog', $idPog);
        $this->db->group_by('partida');
        $this->db->order_by('partida', 'asc');
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result_array();
        }
    }

    function get_idConsecutivoChecklist()
    {
        $maxid = 1;
        $row = $this->db->query("select max(id) as 'maxid' from checklist")->row();
        if ($row) {
            $maxid = $row->maxid + 1;
        }
        return $maxid;
    }


    public function update_checklist($idImg, $params){
        $this->db->select('*');
        $this->db->from('checklist');
        $this->db->where('idImg', $idImg);
        $query = $this->db->get();
        if($query->num_rows() > 0){
            $this->db->update('checklist', $params);
        } else {
            $params['id'] = $this->get_idConsecutivoChecklist();
            $params['idImg'] = $idImg;
            $this->db->insert('checklist', $params);
        }
    }

    public function get_checklist($idImg){
        $this->db->select('*');
        $this->db->from('checklist');
        $this->db->where('checklist.idImg', $idImg);
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result_array();
        }
    }

    //PARA EL PDF
    /*
    public function get_checklist_descripcion($idImg){
        $this->db->distinct();
        $this->db->select('im_concepto.plazoEntrega, im_concepto.lugarEntrega, familia.descripcion');
        $this->db->from('im_concepto');
        $this->db->join('articulo', 'articulo.id = im_concepto.idArticulo', 'inner');
        $this->db->join('familia', 'familia.id = articulo.idFamilia', 'inner');
        $this->db->where('im_concepto.idImg', $idImg);
        $this->db->where('im_concepto.idProveedor !=', '6666');
        $this->db->where('im_concepto.idProveedor !=', '7777');
        $this->db->where('im_concepto.idProveedor !=', '8888');
        $this->db->where('im_concepto.idProveedor !=', '9999');
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result_array();
        }
    }


    public function get_checklist_data($idImg){
        $this->db->select('im_general.SOLPED, checklist.concurso, checklist.fabricacionnacional, checklist.proveedoraprovado,
                            checklist.prototipoaprovado, checklist.avisopruebas, checklist.bajodemanda, checklist.porcentajedemanda,
                            checklist.preciosfijos, checklist.anticipo, checklist.garantiacumplimiento, checklist.porcentajegarantiacumplimiento,
                            checklist.garantiacalidad, checklist.porcentajegarantiacalidad, checklist.sesionaclaraciones, checklist.requieremuestra,
                            checklist.cuesttecnico, checklist.marcaespecifica, checklist.criterioevaluacion, checklist.tipotransporte');
        $this->db->from('checklist');
        $this->db->join('im_general', 'im_general.id = checklist.idImg', 'inner');
        $this->db->where('checklist.idImg', $idImg);
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result_array();
        }

    }
    */


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
