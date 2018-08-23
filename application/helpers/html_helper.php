<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * MY_html_helper.php
 * - Extensão do helper HTML para funções extras no codeigniter
 */

function debug($data) {
    echo '<pre class="debug">';
    print_r($data);
    echo '</pre>';
}

function remove_accents($string) {
	return preg_replace( '/[`^~\'"]/', null, iconv( 'UTF-8', 'ASCII//TRANSLIT', strtolower($string)));
}