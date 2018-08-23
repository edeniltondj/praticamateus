<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


function dateBRtoSQL( $date ){
	if( !preg_match('/^(0[1-9]|[12][0-9]|3[01])\/(0[1-9]|1[012])\/[12][0-9]{3}$/', $date) )
		return '';

	return implode('-', array_reverse( explode('/', $date) ));

}	


function dateSQLtoBR( $date ){
	if( !preg_match('/^[12][0-9]{3}\-(0[1-9]|1[012])\-(0[1-9]|[12][0-9]|3[01])$/', $date) )
		return '00/00/0000';

	return implode('/', array_reverse( explode('-', $date) ));

}

function valid_sql_date( $date ){
   return !(preg_match('/^[12][0-9]{3}\-(0[1-9]|1[012])\-(0[1-9]|[12][0-9]|3[01])$/', $date) ) ? false : true;
}

function valid_br_date( $date ){
   return !(preg_match('/^(0[1-9]|[12][0-9]|3[01])\/(0[1-9]|1[012])\/[12][0-9]{3}$/', $date) ) ? false : true;
}





function getFullNameAcomodacao( $sigla = null ){
	$names = array(
		'A' => 'APART.',
		'E' => 'ENFER.',
		'M' => 'MIXTO',
		);

	return array_key_exists($sigla, $names) ? $names[ $sigla ] : $sigla;

}
 ?>