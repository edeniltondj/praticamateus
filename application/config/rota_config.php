<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

$config['rotas'] = 	array(
	'administrador' =>array(),
	'supervisor' =>array(),
	'gerente' =>array(
		'agenda' => 'reunioes/byStatus/1'
		),
	'telemarketing' => array(),
	'analista' => array()
	);

$config['permissoes'] = array(
	'1' => 'administrador',
	'2' => 'supervisor',
	'3' => 'gerente',
	'4' => 'telemarketing',
	'5' => 'analista'
	);