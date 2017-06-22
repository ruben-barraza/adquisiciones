<?php
class controllerComboBoxes extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("Comboboxesmodel");
    
    }

    public function index(){

        $data['peticionesoferta']=$this->
    }
    //put your code here    
    public function fillMunicipios() {
        $idEstado = $this->input->post('idEstado');
        
        if($idEstado){
            $this->load->model('Comboboxesmodel');
            $municipios = $this->Comboboxesmodel->getMunicipios($idEstado);
            echo '<option value="0">Seleccione</option>';
            foreach($municipios as $fila){
                echo '<option value="'. $fila->id .'">'. $fila->nombre .'</option>';
            }
        }  else {
            echo '<option value="0">Seleccione</option>';
        }
    }

    public function fillProveedores(){

        $peticionoferta=$this->input->post('peticionoferta');

        if($peticionoferta){

            $this->load->model('Comboboxesmodel');
            $proveedores=$this->Comboboxesmodel->getProveedores($peticionoferta);
            foreach($proveedores as $fila){
                echo '<option value="'. $fila->idPog .'">'. $fila->idProveedor .'</option>';
            }
        }  else {
            echo '<option value="0">Seleccione</option>';
        }
        }
    }
