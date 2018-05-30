<?php

class Solcon extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Sapmodel');
    }


}