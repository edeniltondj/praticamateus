<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller
{

	private $controller;
	private $data = array();

	public function __construct()
	{
		parent::__construct();
		
		if($this->usuarios->validate_session(1) === true)
		{
			redirect(ADMIN_HOME);
			die();
		}

		$this->controller = 'auth';
		$this->view->setControllerName( $this->controller );
	}

	public function index()
	{
	
	
		$this->view->setPageTitle('Relatórios Terra Viva - Login');
		//$this->view->showHeader(false);
		//$this->view->showFooter(false);

		$this->data['login'] = $this->usuarios->login();
		$this->data['message_lg'] = 'qualquer mensagem';
		
		//Credenciais incorretas
		if($this->data['login']->erro == 'WRONG_USER_INFO') {
			$this->data['messages']['danger'][] = $this->data['login']->mensagem;
			$this->data['message_lg'] = 'WRONG_USER_INFO';

		}elseif( $this->data['login']->erro == 'FIRST_LOGIN' ){
			$this->data['message_lg'] = 'FIRST_LOGIN';
				$this->data['messages']['info'][] = $this->data['login']->mensagem;
		}else{
			$this->data['message_lg'] = 'algum erro';
		}

		//$this->data['message_lg'] = 'FIRST_LOGIN';
		//Login com sucesso
		if($this->data['login']->operacao) {
			//log
						
		//	redirect(ADMIN_HOME);
			redirect('inicio');
		}
		$this->view->show(__FUNCTION__, $this->data);
	}//index()


	public function cadastro(){
		$this->view->setPageTitle('Relatórios Terra Viva - Login');
		//$this->view->showHeader(false);
		//$this->view->showFooter(false);

		$this->data['registro'] = $this->usuarios->registro();
		$this->data['message_lg'] = '';
		
		//Credenciais incorretas
		if($this->data['registro']->erro == 'WRONG_USER_INFO') {
			$this->data['messages']['error'][] = $this->data['registro']->mensagem;
			$this->data['message_lg'] = 'WRONG_USER_INFO';
			//die('erro de identificação de usuario');

		}elseif( $this->data['registro']->erro == 'ERROR_STORE_DATA' ){
			// $this->data['message_lg'] = 'FIRST_LOGIN';
			//die('Erro de armazenamento de informações');
		}else{
			$this->data['message_lg'] = 'algum erro';
		}



		//$this->data['message_lg'] = 'FIRST_LOGIN';
		//Login com sucesso
		if($this->data['registro']->operacao) {
			redirect('inicio');
		}
		$this->view->show(__FUNCTION__, $this->data);
	}


	public function verificaUsuarioAjax(){
		$name =  $this->input->post('username-ajax');
		$result = $this->usuarios->verificaNomeUsuario( $name );

		echo json_encode( $result );
	}

}//Login

/* End of file login.php */
/* Location: ./application/controllers/login.php */
?>