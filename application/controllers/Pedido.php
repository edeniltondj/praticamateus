<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pedido extends CI_Controller
{

	private $controller;
	private $data = array();

	public function __construct()
	{
		parent::__construct();
		
                $this->load->model('Filial_model','filiais');
                $this->load->model('Produto_model','produtos');
                $this->load->model('Pedido_model','pedidos');
		$this->controller = 'pedidos';
		$this->view->setControllerName( $this->controller );
	}

	public function index()
	{
	
	}//index()


	public function novo(){
		$this->view->setPageTitle('Estoque - Pedidos ');
		
                $this->data['filiais'] = $this->filiais->getall();
                $this->data['produtos'] = $this->produtos->get(1);
                		
		$this->view->show('form', $this->data);
	}
        
        public function salvar(){
            $this->pedidos->add();

            redirect('estoque/listar');
            
        }


	

}//Login

/* End of file login.php */
/* Location: ./application/controllers/login.php */
?>