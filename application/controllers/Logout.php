<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); class Logout extends CI_Controller {
	public function __construct() {
		parent::__construct();
	} public function index() {
		//$this->logs->add(9, 1, $this->session->userdata['user_id'], 'O usuário efetuou logout.');
		$this->usuarios->logout();
		redirect(ADMIN_LOGIN); die();
	}
}

/* End of file logout.php */
/* Location: ./application/controllers/logout.php */