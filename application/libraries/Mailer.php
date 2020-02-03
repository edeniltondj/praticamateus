<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH.'third_party/phpmailer/class.phpmailer.php');

class Mailer {

	public $pm;

	public function __construct()
	{
		$this->pm = new PHPMailer();

		$this->pm->Mailer     = 'smtp';
		$this->pm->IsHTML(true); 
		$this->pm->CharSet    = 'utf-8';
		$this->pm->SMTPSecure = 'tls';

		$this->pm->Host       = 'mail.provedor.com';
		$this->pm->Port       = '587';                   
		$this->pm->SMTPAuth   = true;

		$this->pm->Username   = 'servidor@provedor.com.br';
		$this->pm->Password   = 'senhadele';


		$this->pm->From       = 'email@emaildele.com.br';
		$this->pm->FromName   = 'Sistema de relatórios terra viva';
	}

	public function send($to,$subject,$body)
	{

		$this->pm->Subject = $subject;
		$this->pm->Body = $body;

		$this->pm->AddAddress($to);

		return $this->pm->Send();	
	}

	public function send_one($from, $fromName, $subject, $body)
	{
		$this->pm->From       = $from;
		$this->pm->FromName   = $fromName;

		$this->pm->Subject = $subject;
		$this->pm->Body = $body;

		return $this->pm->Send();
	}
}//Mailer