<?php
/* 
 * Generated by CRUDigniter v3.0 Beta 
 * www.crudigniter.com
 */
 
class Abastecimientosmodel extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function get_all_listaanexo1($idImg)
    {
		$sql = 	"";
		$sql = 	"select scd.BNFPO partida, img.SOLPED solcon, art.codigo, art.descripcion, art.descripcionDetallada descripciondetallada, " .
				"scd.MENGE cantidadminima, (scd.MENGE*2) cantidadmaxima, scd.PREIS pusolcon, imc.pmc " .
				"from solcondetalle scd, im_general img, im_concepto imc, articulo art " .
				"where TRIM(LEADING '0' FROM scd.BANFN) = img.SOLPED " .
				"and CONCAT('0',img.SOLPED) = scd.BANFN " .
				"and imc.idImg = img.id " .
				"and art.id = imc.idArticulo " .
				"and TRIM(LEADING '0' FROM scd.MATNR) = art.codigo " .
				"and img.id = " . $idImg . " " .		
				"group by scd.BNFPO " .
				"order by scd.BNFPO ";
		
        return $this->db->query($sql)->result_array();
    }

    function get_all_detallesolcon($idImg)
    {
		$sql = 	"";
		$sql = 	"select scd.BNFPO partida, art.codigo, art.descripcion, scd.MSEH3 unidadmedida, " .
				"scd.MENGE cantidad, scd.PREIS pusolcon, scd.IMPORTE_PARTIDA_SOLPED,  " .
				"TRIM(LEADING '0' FROM scd.EBELN_S) pedido, scd.EBELP partidapedido, scd.NETPR pupedido, scd.NETWR importepedido, " .
				"scd.KONNR contrato, scd.SALDO_LIBERADO_PARTIDA " .
				"from solcondetalle scd, im_general img, im_concepto imc, articulo art " .
				"where TRIM(LEADING '0' FROM scd.BANFN) = img.SOLPED " .
				"and CONCAT('0',img.SOLPED) = scd.BANFN " .
				"and imc.idImg = img.id " .
				"and art.id = imc.idArticulo " .
				"and TRIM(LEADING '0' FROM scd.MATNR) = art.codigo " .
				"and img.id = " . $idImg . " " .
				"group by 1 " . 
				"order by scd.BNFPO ";
		
        return $this->db->query($sql)->result_array();
    }
    
}
