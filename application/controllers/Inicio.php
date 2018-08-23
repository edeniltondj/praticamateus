<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inicio extends CI_Controller
{

	private $controller;
	private $data = array();
	private $needed_permissions = 1; //Permissões para acesso

	public function __construct()
	{
		parent::__construct();

		//Checa as permissões do usuário
		$has_permission = $this->usuarios->validate_session($this->needed_permissions);
		if($has_permission !== true)
		{

			redirect('auth');
			die();
		}

		$this->controller = 'inicio';

		//Definições da view
		$this->view->setControllerName( $this->controller );
		$this->view->showMenu(true);
		$this->view->isLogged(true);
		$this->view->setSessionInfo($this->session->all_userdata());//Envia dados da sessão para a view
	}

	/**
	 * Parametros de menu
	 * SHOW_ALL_MENUS -> exibe todos os elementos da página
	 * NO_FOOTER -> não exibe rodapé
	 * NO_HEADER -> Não exibe cabeçalho
	 * NO_HEADER_FOOTER -> Não exibe nem cabeçalho e nem rodapé
	 * 
	 **/
	public function index($menuStyle = 'SHOW_ALL_MENUS')
	{		
		$this->view->setPageTitle('Início');	
		$this->data['true'] = true;
		//echo '<script> console.log("Nivel: '.$this->session->userdata['titulo_nivel'].'"); </script>';

		//Breadcrumbs
		//$this->breadcrumbs->addCrumb('Início', 'inicio');
		//$this->data['breadcrumbs'] = $this->breadcrumbs->make();
		/*$cont = 0;
		for($i = 0; $i<6;$i++):
		if($this->usuarios->validate_session($i) !== true)
		{
			
			$cont++;
		}
		endfor;
		if($cont==5):
			redirect('auth');
			die();
		endif;
*/		
		switch ($menuStyle ) {
			case 'NO_FOOTER':
				$this->view->showFooter(false);
				break;
			case 'NO_HEADER':
				$this->view->showHeader(false);
				break;
			case 'NO_HEADER_FOOTER':
				$this->view->showFooter(false);
				$this->view->showHeader(false);
				break;
		}
		$this->view->show(__FUNCTION__, $this->data);
	}//index();

	public function alternativo(){
	$this->data['valor'] = 'valor';

	$this->view->show(__FUNCTION__,$this->data);
}

}



/* End of file inicio.php */
/* Location: ./application/controllers/inicio.php */
?>