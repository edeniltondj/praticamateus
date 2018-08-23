<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bcrypt
{
	//CodeIgniter instance
	protected $CI;
	private $salt;
	//Process Cost
	private $cost = '08';

	public function __construct()
	{
		$this->CI =& get_instance();
		//Essential library
		$this->CI->load->library('encrypt');
		$this->salt = substr( md5( $this->CI->encrypt->get_key() . uniqid(date('c'))), 0, 22);
	}

	/**
	 * convert
	 * - convert a password
	 * @param (string) $password = 'password to be converted'
	 * @return (string) 'hash generated'
	 */
	public function convert($password)
	{
		$hash = crypt($password, '$2a$' . $this->cost . '$' . $this->salt . '$');
		return $hash;
	}//convert()

	/**
	 * validate()
	 * - validates a blowfish crypt password
	 * @param (string) $maybeRight = 'password to be tested'
	 * @param (string) $truePassword = 'the hashed true password'
	 * @return (bool) verification result
	 */
	public function validate($maybeRight, $truePassword)
	{
		return (crypt($maybeRight, $truePassword) === $truePassword);
	}//validate()

}//Bcrypt

/* End of file Bcrypt.php */
/* Location: ./application/libraries/Bcrypt.php */
