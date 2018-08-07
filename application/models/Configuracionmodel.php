<?php
/*
 * Generated by CRUDigniter v3.0 Beta
 * www.crudigniter.com
 */

class Configuracionmodel extends CI_Model
{
    function __construct()
    {
        parent::__construct();

    }

    function get_solconupdate()
    {
        $mySAP = $this->load->database('mySAP', TRUE);

        $sql = 	"select s.BANFN, s.BNFPO, s.MATNR, s.TXZ01, um.MSEH3, s.PREIS, s.MENGE, s.EBELN, " .
            "s.AFNAM, s.WERKS, s.LGORT, s.BWTAR, s.EBELP, s.WAERS, (s.PREIS*s.MENGE) IMPORTE_PARTIDA_SOLPED, " .
            "IFNULL(p.LOEKZ, '') LOEKZ, IFNULL(p.TXZ01, '') TXZ01, IFNULL(p.MATNR, '') MATNR, " .
            "IFNULL(p.BUKRS, '') BUKRS, IFNULL(p.WERKS, '') WERKS, IFNULL(p.MENGE, '') MENGE, IFNULL(um2.MSEH3, '') MSEH3, IFNULL(p.NETPR, 0) * IFNULL(p1.WKURS, 0) NETPR, " .
            "IFNULL(p.NETWR, 0) * IFNULL(p1.WKURS, 0) NETWR, IFNULL(p.KONNR, '') KONNR, IFNULL(p.KTPNR, '') KTPNR, IFNULL(p.GEBER, '') GEBER, IFNULL(p.FISTL, '') FISTL, " .
            "IFNULL(p.FIPOS, '') FIPOS, " .
            "IFNULL(sc1.TDLINE, '') JUSTIFICACION, IFNULL(sc2.TDLINE, '') TITULO, " .
            "IFNULL((s.PREIS*s.MENGE) - p.NETWR, s.PREIS*s.MENGE) SALDO_REAL_PARTIDA_SOLPED, " .
            "IF ( " .
            "((s.PREIS*s.MENGE) - (IFNULL(p.NETWR, 0) * IFNULL(p1.WKURS, 0))) <= 0, 0, " .
            "IFNULL((s.PREIS*s.MENGE) - (p.NETWR  * IFNULL(p1.WKURS, 0)), s.PREIS*s.MENGE) " .
            ") SALDO_LIBERADO_PARTIDA ".
            "from EBAN s ".
            "LEFT OUTER JOIN EBAN_TEXT sc1 ON sc1.TDNAME = s.BANFN and sc1.TDID = 'B01' ".
            "LEFT OUTER JOIN EBAN_TEXT sc2 ON sc2.TDNAME = s.BANFN and sc2.TDID = 'B02' ".
            "LEFT OUTER JOIN T006B um ON um.MSEHI = s.MEINS ".
            "LEFT OUTER JOIN EKPO p ON p.BANFN = s.BANFN AND p.BNFPO = s.BNFPO AND p.EBELN = s.EBELN AND p.MATNR = s.MATNR ".
            "LEFT OUTER JOIN T006B um2 ON um2.MSEHI = p.MEINS ".
            "LEFT OUTER JOIN EKKO p1 ON p1.EBELN = p.EBELN ".
            "where s.BANFN in ( ".
            "SELECT DISTINCT TDNAME FROM EBAN_TEXT ".
            "WHERE TDID = 'B02' ".
            ")".
            "AND s.LOEKZ = ''".
            "order by s.BANFN, s.BNFPO";

        //return $this->db->query($sql)->result_array();
        return $mySAP->query($sql)->result_array();
    }

    function updateSolcon($datosSolcon)
    {
        //Insertar los datos de datosSolcon en solcondetalle_tmp
        $this->insertSolcon($datosSolcon, 'solcondetalle_tmp');

        //Borrar los contenidos de solcondetalle
        $this->deleteSolconTable();

        //Copiar los datos de solcondetalle_tmp a solcondetalle
        $this->insertSolcon($datosSolcon, 'solcondetalle');
    }

    function insertSolcon($datosSolcon, $tableName)
    {
        $local = $this->load->database('default', TRUE);
        foreach ($datosSolcon as $row){
            $params = array(
                'BANFN' => $row['BANFN'],
                'BNFPO' => $row['BNFPO'],
                'MATNR' => $row['MATNR'],
                'TXZ01' => $row['TXZ01'],
                'MSEH3' => $row['MSEH3'],
                'PREIS' => $row['PREIS'],
                'MENGE' => $row['MENGE'],
                'EBELN_S' => $row['EBELN'],
                'AFNAM' => $row['AFNAM'],
                'WERKS' => $row['WERKS'],
                'LGORT' => $row['LGORT'],
                'BWTAR' => $row['BWTAR'],
                'EBELP' => $row['EBELP'],
                'WAERS' => $row['WAERS'],
                'IMPORTE_PARTIDA_SOLPED' => $row['IMPORTE_PARTIDA_SOLPED'],
                'LOEKZ' => $row['LOEKZ'],
                'TXZ01_P' => $row['TXZ01'],
                'MATNR_P' => $row['MATNR'],
                'BUKRS' => $row['BUKRS'],
                'WERKS_P' => $row['WERKS'],
                'MENGE_P' => $row['MENGE'],
                'MSEH3_P' => $row['MSEH3'],
                'NETPR' => $row['NETPR'],
                'NETWR' => $row['NETWR'],
                'KONNR' => $row['KONNR']
            );

            $local->insert($tableName, $params);
        }

    }

    function deleteTmpTable()
    {
        $local = $this->load->database('default', TRUE);
        $local->empty_table('solcondetalle_tmp');
    }

    function deleteSolconTable()
    {
        $local = $this->load->database('default', TRUE);
        $local->empty_table('solcondetalle');
    }

}



























