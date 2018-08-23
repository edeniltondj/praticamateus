<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * MinhasRotas
 * - Gerenciamento de rotas multiusuários para o fluxo
 * @version 1.0
 * @author Edenilton Michael de Jesus
 */
class MinhasRotas
{
	
	
	/**
	 * carregará a instância ci
	 *
	 * @var	object
	 */
	private $ci;
	/**
	 * permissoes de cada usuario
	 *
	 * @var	array
	 */
	private $permissoes;
	/**
	 * permissoes de cada usuario
	 *
	 * @var	array
	 */
	private $rotas;


	//Methods
	public function __construct()
	{

		//Get CodeIgniter's instance
        $this->ci =& get_instance();
		//Loading configs
        $this->ci->load->config('rota_config');
		$this->setPermissoes( $this->ci->config->item('permissoes') );
		$this->setRotas( $this->ci->config->item('rotas') );
	}



	 /**
	 *
	 * @author Edenilton Michael de Jesus
	 * @param array - Correspondente às permissões usuários para rotas
	 * @throws \Exception
	 */
	function setPermissoes ( $permissoes ) {
	    if( !is_array($permissoes) )
	    	throw new \Exception("Permissões de accesso não validadas");
	    	
	    $this->permissoes = $permissoes;

	}

	/**
	 *
	 * @author Edenilton Michael de Jesus
	 * @param array - Correspondente as configurações de rotas 
	 * @throws \Exception
	 */
	function setrotas ( $rotas ) {
	    if( !is_array($rotas) )
	    	throw new \Exception("As rotas não estão adequadas");
	    	
	    $this->rotas = $rotas;

	}


	 /**
	 *
	 * @author Edenilton Michael de Jesus
	 * @param 
	 * @return 
	 */
	function getPermissao ( $id ) {
	    

	    return $this->permissoes[$id];

	}



	 /**
	 *
	 * @author Edenilton Michael de Jesus
	 * @param string - rota encurtada no formato permissao-rotacurta, ex: 3-agenda
	 * @return 
	 */
	function getRota ( $rotaencurtada ) {
	    $pieces = explode('-', $rotaencurtada);
	    
	    if(!is_array($pieces))
	    	throw new \Exception('Rota inválida');

	    $id = $pieces[0];
	    $rotacurta = $pieces[1];

	    //$permissao = $this->getPermissao($id);
	    $permissao = '/byStatus/1';

	   // return $this->rotas[$permissao][$rotacurta];

	    return $permissao;
	}

}
