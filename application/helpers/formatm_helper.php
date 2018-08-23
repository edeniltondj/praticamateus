<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


function is_valid_br_phone($fone)
  {
/*    echo '<!--'.$str.'-->';
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
* Formata a string passada em cpf
*/
function str_to_format_cpf( $string ){

	if( strlen(  $string )  == 11 ){
		$format_cpf = substr($string, 0,3);
    	$format_cpf.= '.'. substr($string, 3,3);
    	$format_cpf.= '.'. substr($string, 6,3);
    	$format_cpf.= '-'. substr($string, 9);
    	return $format_cpf;
	}

	return $string;
}

/**
* Formata a string passada em cnpj
*/
function str_to_format_cnpj( $string ){

	if( strlen(  $string )  == 14 ){
		$format_cnpj = substr($string, 0,2);
   		$format_cnpj.= '.'. substr($string, 2,3);
   		$format_cnpj.= '.'. substr($string, 5,3);
   		$format_cnpj.= '/'. substr($string, 8,4);
   		$format_cnpj.= '-'. substr($string, 12);
    	return $format_cnpj;
	}

	return $string;
}

/**
* Formata a string passada em cnpj
*/
function str_to_format_cpf_cnpj( $string ){

	//cpf
	if( strlen(  $string )  == 11 ){
		
		$format_cpf = substr($string, 0,3);
    	$format_cpf.= '.'. substr($string, 3,3);
    	$format_cpf.= '.'. substr($string, 6,3);
    	$format_cpf.= '-'. substr($string, 9);
    	return $format_cpf;

	}elseif( strlen(  $string )  == 14 ){ //cnpj
		
		$format_cnpj = substr($string, 0,2);
   		$format_cnpj.= '.'. substr($string, 2,3);
   		$format_cnpj.= '.'. substr($string, 5,3);
   		$format_cnpj.= '/'. substr($string, 8,4);
   		$format_cnpj.= '-'. substr($string, 12);
    	return $format_cnpj;	
	}

	return $string;
}

/**
* Formata a string passada em cnpj
*/
function str_to_format_telefone( $string ){

  //cpf
  if( strlen(  $string )  == 11 ){
    
    $format_cpf = '('.substr($string, 0,2).') ';
      $format_cpf.= substr($string, 2,5);
      $format_cpf.= '-'. substr($string, 7,4);
      return $format_cpf;

  }elseif( strlen(  $string )  == 10 ){ //cnpj
    
      $format_cnpj = substr($string, 0,2);
      $format_cnpj.= substr($string, 2,4);
      $format_cnpj.= '-'. substr($string, 6,4);
      return $format_cnpj;  
  }

  return $string;
}


