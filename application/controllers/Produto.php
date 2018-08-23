<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Produto extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Produto_model');
    }
    
    //listagem de produtos
    public function index() {
        $this->view->setPageTitle(' ');

       $data['produtos'] = $this->produto_model->listar();
        $this->view->show(__FUNCTION__, $data);
    }
    
    public function novo(){
        
        
    }
    
    public function editar($id = null){
        
    }
    
    public function listar(){
        
    }
    
    public function produtos_ajax(){
        $filial = $this->input->post('filial');
        $result = $this->produto_model->get($filial);
        echo json_encode($result);
    }
}

/* End of file logout.php */
/* Location: ./application/controllers/logout.php */