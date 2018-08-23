<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios extends CI_Controller
{
	private $controller;
	private $data=array();
	private $needed_permissions = 2; //Permissões para acesso

	public function __construct()
	{
		parent::__construct();

		//Checa as permissões do usuário
		if(!$this->usuarios->validate_session(2))
		{
			redirect('auth');
			die();
		}

		$this->controller = 'usuarios';
		$this->view->setControllerName( $this->controller );

		$this->view->showMenu(true);
		$this->view->isLogged(true);
		$this->view->setSessionInfo($this->session->all_userdata());

		//Default breadcrumbs
		$this->breadcrumbs->addCrumb('Início', '');
		$this->breadcrumbs->addCrumb('Usuários', '');
		$this->breadcrumbs->addCrumb('Ver todos', '');
	}

	public function index(){
		$this->view->setPageTitle(' ');

		//Dados dos usuários
		$this->db->order_by('id ASC');

		if ($this->session->userdata('user_permissions') == 1)
			// puxa todos os usuários inativos no banco
			$this->data['inativos'] = $this->usuarios->get(NULL, 'inactive_user')->result_array();

		$this->data['usuarios'] = $this->usuarios->get(NULL, 'active_user')->result_array();

	

		//Nenhuma página cadastrada
		// if(empty($this->data['usuarios']))
		// $this->data['messages']['alert'][] = 'Ainda não há nenhum usuário cadastrado!';

		if($this->session->flashdata('CONFIRM'))
			$this->data['messages']['confirm'][] = $this->session->flashdata('CONFIRM');

		$this->data['breadcrumbs'] = $this->breadcrumbs->make();

		//log
		$this->logs->add(5, 1, 0, 'O usuário listou os usuários cadastrados.');

		$this->view->show(__FUNCTION__, $this->data);
	}

	public function adicionar(){
		
		$this->view->setPageTitle(' ', ' ');

		$this->data['dados'] = $this->usuarios->add();

		$this->data['messages']['info'][] = 'Campos com asterísco(*) são obrigatórios.';

		if($this->data['dados']->operacao)
		{
			$this->session->set_flashdata('CONFIRM', $this->data['dados']->mensagem);
			
			redirect($this->controller);
			die();
			
		}
		elseif($this->data['dados']->mensagem)
		{
			$this->data['messages']['error'][] = $this->data['dados']->mensagem;
		}
		//Buscando escolaridades para a select list
		$this->data['escolaridades'] = $this->usuarios->get(NULL, 'escolaridades')->result_array();
		//Buscando Tipos de contrato para a select list
		$this->data['tipos_contrato'] = $this->usuarios->get(NULL, 'tipos_contrato')->result_array();
		//Puxando cidades e UFs cadastradas para a selection list
		$this->load->model('cidade_model', 'cidades');
		$this->data['ufs'] = $this->cidades->get_ufs();
		$this->data['tipos_usuario'] = $this->usuarios->get(NULL, 'tipos_usuario')->result_array();
		$this->data['user_permission'] = $this->session->userdata('user_permissions');
		//Dados dos usuários
		$this->db->order_by('id ASC');
		$this->usuarios->db->where('tipo', 2);
		$this->data['usuarios'] = $this->usuarios->get(NULL, 'active_user')->result_array();


		//Breadcrumbs
		$this->breadcrumbs->addCrumb('Cadastrar novo', '');
		$this->data['breadcrumbs'] = $this->breadcrumbs->make();

		//log
		$this->logs->add(1, 1, 0, 'O usuário cadastrou um novo usuário.');

		$this->view->show(__FUNCTION__, $this->data);	
		// }
	}

	public function adicionarAjax(){
		

		$this->data['dados'] = $this->usuarios->add();

		$this->data['messages']['info'][] = 'Campos com asterísco(*) são obrigatórios.';

		if($this->data['dados']->mensagem && !($this->data['dados']->operacao))
		{
			$this->data['messages']['error'][] = $this->data['dados']->mensagem;
		}
		
		//log
		$this->logs->add(1, 1, 0, 'O usuário cadastrou um novo usuário.');

		echo json_encode($this->data);	
		// }
	}

	public function editar($usuario_id = null){
		/*if($this->usuarios->validate_session(0) !== true)
		{
			redirect('inicio');
			die();
		}
		else
		{	*/
			//Se o id do usuário foi informado
			if($usuario_id/$usuario_id == 1)
			{
				$this->data['usuario'] = $this->usuarios->get($usuario_id, 'active_user')->row_array();
			}

			//Se não tem dados da página
			if(!isset($this->data['usuario']) || empty($this->data['usuario']))
			{
				redirect($this->controller);
				die();
			}

			$this->view->setPageTitle(' ', ' ');

			//Update
			$this->data['dados'] = $this->usuarios->update($usuario_id);


			$this->data['messages']['info'][] = 'Campos com asterísco(*) são obrigatórios.';

			if($this->data['dados']->operacao)
			{
				$this->session->set_flashdata('CONFIRM', $this->data['dados']->mensagem);

				//log
				$this->logs->add(2, 1, $usuario_id, 'O usuário editou um usuário cadastrado.');
				
				redirect($this->controller);
				die();
			}
			elseif($this->data['dados']->mensagem)
			{
				$this->data['messages']['error'][] = $this->data['dados']->mensagem;
			}

			//Buscando escolaridades para a select list
			$this->data['escolaridades'] = $this->usuarios->get(NULL, 'escolaridades')->result_array();
			//Buscando Tipos de contrato para a select list
			$this->data['tipos_contrato'] = $this->usuarios->get(NULL, 'tipos_contrato')->result_array();
			//Puxando cidades e UFs cadastradas para a selection list
			$this->load->model('cidade_model', 'cidades');
			$this->data['cidades'] = $this->cidades->get();
			$this->data['ufs'] = $this->cidades->get_ufs();
			$this->data['tipos_usuario'] = $this->usuarios->get(NULL, 'tipos_usuario')->result_array();
			//Dados dos supervisores
			$this->db->order_by('id ASC');
			$this->usuarios->db->where('tipo', 2);
			$this->data['supervisores'] = $this->usuarios->get(NULL, 'active_user')->result_array();

			//View elements
			$this->view->addJs(array("tinymce/tinymce.min","usuarios/editor"));
			$this->data['usuarios'] = $this->usuarios->html_select($usuario_id);

			//Breadcrumbs
			$this->breadcrumbs->addCrumb('Editar usuário "<b>'.$this->data['usuario']['nome'].'</b>"', '');
			$this->data['breadcrumbs'] = $this->breadcrumbs->make();

			$this->view->show(__FUNCTION__, $this->data);	
		// }
		}

		public function visualizar($usuario_id = null){
		/*if($this->usuarios->validate_session(0) !== true)
		{
			redirect('inicio');
			die();
		}
		else
		{	*/
			//Se o id do usuário foi informado
			if($usuario_id/$usuario_id == 1)
			{
				$this->data['usuario'] = $this->usuarios->get($usuario_id)->row_array();
			}

			$this->view->setPageTitle(' ', ' ');
			

			//Buscando escolaridades para a select list
			$this->data['escolaridades'] = $this->usuarios->get(NULL, 'escolaridades')->result_array();
			//Buscando Tipos de contrato para a select list
			$this->data['tipos_contrato'] = $this->usuarios->get(NULL, 'tipos_contrato')->result_array();
			//Puxando cidades e UFs cadastradas para a selection list
			$this->load->model('cidade_model', 'cidades');
			$this->data['cidades'] = $this->cidades->get();
			$this->data['ufs'] = $this->cidades->get_ufs();
			$this->data['tipos_usuario'] = $this->usuarios->get(NULL, 'tipos_usuario')->result_array();
			//Dados dos supervisores
			$this->db->order_by('id ASC');
			$this->usuarios->db->where('tipo', 2);
			$this->data['supervisores'] = $this->usuarios->get(NULL, 'active_user')->result_array();

			//View elements
			$this->view->addJs(array("tinymce/tinymce.min","usuarios/editor"));
			$this->data['usuarios'] = $this->usuarios->html_select($usuario_id);

			//Breadcrumbs
			$this->breadcrumbs->addCrumb('Editar usuário "<b>'.$this->data['usuario']['nome'].'</b>"', '');
			$this->data['breadcrumbs'] = $this->breadcrumbs->make();

			$this->view->show(__FUNCTION__, $this->data);	
		// }
		}

		public function desativar($usuario_id = null) {
			
			$this->data['dados'] =$this->usuarios->lock($usuario_id);

			if($this->data['dados']->operacao)
			{
				//$this->session->set_flashdata('CONFIRM', $this->data['dados']->mensagem);
				$this->data['messages']['confirm'][] = $this->data['dados']->mensagem;
			}
			elseif($this->data['dados']->mensagem)
			{
				$this->data['messages']['error'][] = $this->data['dados']->mensagem;
			}

			//log
			$this->logs->add(4, 1, $usuario_id, 'O usuário desativou um usuário cadastrado.');

			$this->index();
		}

		public function ativar($usuario_id = null) {
			
			$this->data['dados'] =$this->usuarios->unlock($usuario_id);

			if($this->data['dados']->operacao)
			{
				//$this->session->set_flashdata('CONFIRM', $this->data['dados']->mensagem);
				$this->data['messages']['confirm'][] = $this->data['dados']->mensagem;
			}
			elseif($this->data['dados']->mensagem)
			{
				$this->data['messages']['error'][] = $this->data['dados']->mensagem;
			}

			//log
			$this->logs->add(4, 1, $usuario_id, 'O usuário ativou um usuário cadastrado.');

			$this->index();
		}

		public function aprovar($usuario_id = null) {
			
			if (!empty($usuario_id)) {
				$this->data['dados'] = $this->usuarios->assess($usuario_id,true);

				if($this->data['dados']->operacao)
				{
					//$this->session->set_flashdata('CONFIRM', $this->data['dados']->mensagem);
					$this->data['messages_habilita']['confirm'][] = $this->data['dados']->mensagem;
				}
				elseif($this->data['dados']->mensagem)
				{
					$this->data['messages_habilita']['error'][] = $this->data['dados']->mensagem;
				}
			}
			
			//log
			$this->logs->add(4, 1, $usuario_id, 'O usuário habilitou um usuário cadastrado.');

			$this->index();
		}

		public function desaprovar($usuario_id = null) {
			
			if (!empty($usuario_id)) {
				$this->data['dados'] = $this->usuarios->assess($usuario_id,false);

				if($this->data['dados']->operacao)
				{
					//$this->session->set_flashdata('CONFIRM', $this->data['dados']->mensagem);
					$this->data['messages_habilita']['confirm'][] = $this->data['dados']->mensagem;
				}
				elseif($this->data['dados']->mensagem)
				{
					$this->data['messages_habilita']['error'][] = $this->data['dados']->mensagem;
				}
			}
			
			//log
			$this->logs->add(4, 1, $usuario_id, 'O usuário habilitou um usuário cadastrado.');

			$this->index();
		}

		public function get_meta_ajax(){
			$this->load->model('meta_model','metas');
			$result = array();
			
			$valor_meta = array(
				);
			$user_permission = $this->session->userdata('user_permissions');

			//telemarketing
			if($user_permission==4){
				$result = $this->metas->get_meta(4);
			//gerente
			}elseif($user_permission==3){
				$result = $this->metas->get_meta(3);
			//supervisor
			}elseif ($user_permission==2) {
				$result = $this->metas->get_meta(2);

			//administrador
			}elseif ($user_permission==1) {
				$result = $this->metas->get_meta_total();
			}

			$dados_ret = array(); 
			if( !empty($result) ){
				$dados_ret = array(
					'temdados' => 1,
					'dados' => $result,
					);
			}else{
				$dados_ret = array(
					'temdados' => 0,
					'dados' => $result,
					);
			}
			
			echo json_encode($dados_ret);
	}


	public function get_comissao_ajax(){
			$this->load->model('comissao_model','comissoes');
			$result = array();
			
			$valor_meta = array(
				);
			$user_permission = $this->session->userdata('user_permissions');

			//telemarketing
			if($user_permission==4){
				$result = $this->comissoes->get_comissao(4);
			//gerente
			}elseif($user_permission==3){
				$result = $this->comissoes->get_comissao(3);
			//supervisor
			}elseif ($user_permission==2) {
				$result = $this->comissoes->get_comissao(2);

			//administrador
			}elseif ($user_permission==1) {
				$result = $this->comissoes->get_comissao(1);
				//analista
			}elseif ($user_permission==5) {
				$result = $this->comissoes->get_comissao(5);
			}

			$dados_ret = array(); 
			if( !empty($result) ){
				$dados_ret = array(
					'temdados' => 1,
					'dados' => $result,
					);
			}else{
				$dados_ret = array(
					'temdados' => 0,
					'dados' => $result,
					);
			}
			
			echo json_encode($dados_ret);
	}


	 /**
	 *
	 * Exibe as mensagens de notificações para determinado usuário
	 * @author Edenilton Michael de Jesus
	 * @param 
	 * @return 
	 */
	function mensagens ( ) {
	    $this->view->setPageTitle(' ');

		//Dados dos usuários
		$this->db->order_by('data DESC');

		$this->data['mensagens'] = $this->usuarios->getMensagens();	

		//Nenhuma página cadastrada
		// if(empty($this->data['usuarios']))
		// $this->data['messages']['alert'][] = 'Ainda não há nenhum usuário cadastrado!';

		if($this->session->flashdata('CONFIRM'))
			$this->data['messages']['confirm'][] = $this->session->flashdata('CONFIRM');

		$this->data['breadcrumbs'] = $this->breadcrumbs->make();

		$this->view->show(__FUNCTION__, $this->data);
	
	}

	 
	
/*	public function excluir($id)
	{	
		$this->data['delete'] = $this->usuarios->delete($id);

		if($this->data['delete']->operacao)
		{
			$this->session->set_flashdata('CONFIRM', $this->data['delete']->mensagem);
			//Direciona para a página index
			redirect($this->controller.'/index');
			die();
		}

		if($this->data['delete']->error == 'DB_ERROR')
			$this->data['messages']['error'][] = $this->data['delete']->message;

		//Breadcrumbs
		$this->breadcrumbs->addCrumb(__FUNCTION__);
		$this->data['breadcrumbs'] = $this->breadcrumbs->make();

		$this->view->show(__FUNCTION__, $this->data);
	} */
}