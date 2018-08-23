<?php

class VRS_Form_validation extends CI_Form_validation
{
	/**
	 * Verifica se o valor já está cadastrado no banco
	 * unique[users.login] retorna FALSE se o valor postado já estiver no campo login da tabela users
	 * unique[users.login:id_users!10] retorna FALSE se o valor postado já estiver no campo login da tabela users, desde que o id seja diferente de 10.
	 * 						isso é útil quando for atualizar os dados	
	 * @access	public
	 * @param	string - dados que será buscado
	 * @param	string - campo, tabela, campo de exceção e valor
	 *
	 * @return	bool
	 */
	public function unique($str=null, $field=null)
	{
		$pieces = explode('.', $field, 2);
		
		$table	= $pieces[0];
		$column	= $pieces[1];

		if(strpos($column, ':')>-1)
		{
			$pieces = explode(':', $column, 2);
			$column = $pieces[0];
			
			if(strpos($pieces[1], '!')>-1)
			{
				$pieces = explode('!', $pieces[1]);
				$exception = $pieces[0];
				$value = $pieces[1];

				if(strpos($value, '{'))
					unset($exception, $value);
			}
		}

		unset($pieces);
		
		$this->CI->db->select('COUNT(1) as total');
		$this->CI->db->where($column, $str);
		
		if( isset($exception, $value) )			
			$this->CI->db->where($exception . ' !=', $value);

		$total = $this->CI->db->get($table)->row()->total;
		return ($total > 0) ? false : true;
	}

	/**
	 * identifica se número é um binário válido
	 * @param string $str
	 * @return bool
	 */
	public function is_binary($str)
	{
		return ($str==0 || $str==1) ? true : false;
	}

	/**
	 * Verifica se dois campos tem o memso conteudo
	 * @param string $field1 - Campo 1 para se verificar
	 * @param string $field2 - Campo 2 para se verificar
	 **/
	public function is_equal_f( $field1, $field2 ){
		$f_compare_1 = $_POST[ $field1 ];
		$f_compare_2 = $_POST[ $field2 ];

		if( is_null( $f_compare_1 ) || is_null( $f_compare_2 ) )
			return false;

		return ( $f_compare_1 == $f_compare_2 ) ? true : false;
	}



	/**
	 *
	 * @param	string
	 * @return	bool
	 */
	public function alpha_ptbr($str)
	{
		return (bool) preg_match('/^[A-ZÁÉÍÓÚÀÈÌÒÙÂÊÎÔÛÃÕÜÇáéíóúàèìòùâêîôûãõüç]+$/i', $str);
	}

	/**
	 *
	 * @param	string
	 * @return	bool
	 */
	public function alphanumeric_ptbr($str)
	{
		return (bool) preg_match('/^[0-9A-ZÁÉÍÓÚÀÈÌÒÙÂÊÎÔÛÃÕÜÇáéíóúàèìòùâêîôûãõüç]+$/i', $str);
	}

	/**
	 *
	 * @param	string
	 * @return	bool
	 */
	public function alpha_ptbr_spaces($str)
	{
		return (bool) preg_match('/^[A-ZÁÉÍÓÚÀÈÌÒÙÂÊÎÔÛÃÕÜÇáéíóúàèìòùâêîôûãõüç\ ]+$/i', $str);
	}

	/**
	 *
	 * @param	string
	 * @return	bool
	 */
	public function alphanumeric_ptbr_spaces($str)
	{
		return (bool) preg_match('/^[0-9A-ZÁÉÍÓÚÀÈÌÒÙÂÊÎÔÛÃÕÜÇáéíóúàèìòùâêîôûãõüç\ ]+$/i', $str);
	}

	/**
	 *
	 * @param	string
	 * @return	bool
	 */
	public function alphanumeric_ptbr_special($str)
	{
		return (bool) preg_match('/^[0-9A-ZÁÉÍÓÚÀÈÌÒÙÂÊÎÔÛÃÕÜÇáéíóúàèìòùâêîôûãõüç\ \-\$\#\ª\º\°\*\,\.\/]+$/i', $str);
	}

	/**
	 * @param string
	 * @return bool
	 */
	public function valid_br_phone($fone)
	{
/*		echo '<!--'.$str.'-->';
		return (bool) preg_match('/^\(([0-9]){2}\)\ ([0-9]){4}\ ?\-?\ ?([0-9]{4})([0-9]{1})?$/', $str);
*/	
			if(is_null($fone)):
				return false;
			endif;

			$_extracted_phone = preg_replace('/\D/', '', $fone);
	
			$ddd = substr($_extracted_phone, 0,2);
			$_body_phone = substr($_extracted_phone, 2);

			if(strlen($_body_phone)==9){
				return $_body_phone[0]==9 ? true : false;
			}elseif (strlen($_body_phone)==8) {
				return true;
			}else{
				return false;
			}

	}

	/**
	 * @param string
	 * @return bool
	 */
	public function valid_br_cep($str)
	{
		echo '<!--'.$str . '-->';
		return (bool) preg_match('/^([0-9]{5})\-?([0-9]){3}$/', $str);
	}

	/**
	 * @param string
	 * @return bool
	 */
	public function valid_br_date($str)
	{
		return (bool) preg_match('/^((((0[1-9])|([1-2][0-9])|(30))\/(01|03|04|05|06|07|08|09|10|11|12))|((31)\/(01|03|05|07|08|10|12))|(((0[1-9])|([1-2][0-9]))\/(02)))\/((19[0-9]{2})|(20[0-9]{2}))$/', $str);
	}

	/**
	 * ValidCpf
	 *
	 * @access	public
	 * @param	string
	 * @return	bool
	 */
	public function valid_cpf($str)
	{
		$match = preg_match("/^[0-9]{3}.?[0-9]{3}.?[0-9]{3}-?[0-9]{2}$/i", $str);
		if(!$match)
			return false;
		else
		{
			$cpf = str_replace(array(".","-"),array("",""),$str);

			if($cpf == "11111111111" || $cpf == "2222222222" || $cpf == "33333333333" || $cpf == "44444444444" || $cpf == "55555555555" || $cpf == "66666666666" || $cpf == "77777777777" || $cpf == "88888888888" || $cpf == "99999999999" || $cpf == "00000000000")
			{
				return false;
			}
			else
			{
				for ($t = 9; $t < 11; $t++) {
					for ($d = 0, $c = 0; $c < $t; $c++) {
						$d += $cpf{$c} * (($t + 1) - $c);
					}
		 
					$d = ((10 * $d) % 11) % 10;
		 
					if ($cpf{$c} != $d) {
						return false;
					}
				}
				return true;
			}
		}
	}//CPF

	
}