<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * resource_helper.php
 * - Helper para auxiliar na inclusão de arquivos css, js e imagens nas VIEWS
 */

function r_css($css, $path = NULL) {
    $code = '';
    $base = '<link type="text/css" rel="stylesheet" href="{LINK}.css" />'."\n";

    if(gettype($css) == 'array') {
        
        foreach($css as $c) {
            $code .= str_replace('{LINK}', base_url('src/' . $path) . '/css/' . $c, $base);
        }

    } else {
        $code = str_replace('{LINK}', base_url('src/' . $path) . '/css/' . $css, $base);
    }

    return $code;
}

function r_js($js, $path = NULL) {
    $code = '';
    $base = '<script type="text/javascript" src="{LINK}.js"></script>'."\n";

    if(gettype($js) == 'array') {
        
        foreach($js as $j) {
            $code .= str_replace('{LINK}', base_url('src/' . $path) . '/js/' . $j, $base);
        }

    } else {
        $code = str_replace('{LINK}', base_url('src/' . $path) . '/js/' . $js, $base);
    }

    return $code;
}

function r_img($img, $alt = NULL, $attributes = array() , $path = NULL) {
    $code = '';
    $base = '<img src="{LINK}" {ATTRIBUTES} alt="{ALT}" />';
    
    $link = base_url('src/' . $path)."/".$img;

    if(!empty($attributes)) {
        $a = array();
        foreach ($attributes as $k=>$v) { $a[] = $k . '="' . $v . '"'; }
        $attributes = implode(' ', $a);
        unset($a);
    }else{
        $attributes = "";
    }

    $code = str_replace(array('{LINK}', '{ATTRIBUTES}', '{ALT}'), array($link, $attributes, $alt), $base);

    return $code;
}

function r_favicon($icon, $path = NULL)
{
    return '<link rel="shortcut icon" type="image/x-icon" href="' . base_url('src/' . $path) . '/' . $icon . '.ico" />';
}