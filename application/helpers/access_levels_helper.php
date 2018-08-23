<?php

/**
 * Função funciona como alias da função da model access_levels_model da página permissões, para conferir se um usuário possui determinado nivel
 * se possuir retorna verdadeiro para que um checkbox seja marcado
 */
function check_permissions($al_id, $user_permissions) {
	$CI =& get_instance();
	return $CI->access_levels->check_permissions(array($al_id), $user_permissions);
}