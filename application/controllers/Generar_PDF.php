<?php
/* 
 * Generated by CRUDigniter v3.0 Beta 
 * www.crudigniter.com
 */

    $this->load->library('Pdf');
    // Extend the TCPDF class to create custom Header and Footer
    class MYPDF extends Pdf {

        //Page header
        public function Header() {
            // Logo
            $image_file = K_PATH_IMAGES.'logo_example.jpg';
            $this->Image($image_file, 10, 10, 15, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
            // Set font
            $this->SetFont('helvetica', 'B', 20);
            // Title
            $this->Cell(0, 15, '<< TCPDF Example 003 >>', 0, false, 'C', 0, '', 0, false, 'M', 'M');
        }

        // Page footer
        public function Footer() {
            // Position at 15 mm from bottom
            $this->SetY(-15);
            // Set font
            $this->SetFont('helvetica', 'I', 8);
            // Page number
            $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
        }
    }
 
class Generar_PDF extends CI_Controller{
    
    function __construct()
    {
        parent::__construct();
        //$this->load->model('Generarpdfmodel');
    } 

    //PDF
    function pdf($id){
        

        $pdf = new MYPDF('P', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetTitle('Petición Oferta '.$id);
        $pdf->SetHeaderData("image_demo.jpg", PDF_HEADER_LOGO_WIDTH, "Application PDF", "Application Form\nRaining Pesos, Inc. - www.rainingpesos.com");
        $pdf->SetHeaderMargin(30);
        $pdf->SetTopMargin(20);
        $pdf->setFooterMargin(20);
        $pdf->SetAutoPageBreak(true);
        $pdf->SetAuthor('Author');
        $pdf->SetDisplayMode('real', 'default');

        $pdf->AddPage();

        $pdf->Write(5, 'Hola');
        $pdf->Output('Peticion_Oferta_'.$id.'.pdf', 'I');
    }
    
}