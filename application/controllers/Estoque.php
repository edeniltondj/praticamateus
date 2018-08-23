<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Estoque extends CI_Controller {

    private $controller;
    private $data = array();

    public function __construct() {
        parent::__construct();

        $this->load->model('Estoque_model','estoque');
        $this->load->model('Filial_model','filiais');

        $this->controller = 'estoque';
        $this->view->setControllerName($this->controller);
    }

    public function index() {
        
    }

//index()

    public function novo() {
        $this->view->setPageTitle('Estoque - Pedidos ');

        $this->view->show('form', $this->data);
    }

    public function listar($filial = 1) {
        
        $this->view->setPageTitle('Estoque - Pedidos ');
        
        $this->data['filiais'] = $this->filiais->getall();
         
        $this->data['estoques'] = $this->estoque->get_por_filial($filial);
       
        $this->view->show('lista', $this->data);
    }

}

//Login

/* End of file login.php */
/* Location: ./application/controllers/login.php */
?>