<?php 

/**
 * messages_helper
 * - otimiza a geração de mensagens
 */

function message($type, $message, $attributes = array()) {
    //Base vars

    $m = '<div  class="alert alert-{CLASS} alert-dismissible" {ATTRIBUTES}>{MESSAGE}<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><span></span></div>';
    
    $attributes_string = "";
    $allowed_types = array('info','confirm','alert','error','danger');

    //Operation
    $type = (!in_array($type, $allowed_types)) ? $allowed_types[0] : $type;

    foreach($attributes as $k=>$v) {
        if($k == 'class')
            $type .= " {$v}";
        else
            $attibutes_string .= " $k=\"$v\"";
    }

    $m = str_replace(array('{CLASS}','{ATTRIBUTES}','{MESSAGE}'), array($type, $attributes_string, $message), $m);

  //  echo $m;
    //die;

    return $m;
}//message

function confirm($message, $attributes = array()) {
    return message('confirm', $message, $attributes);
}

function alert($message, $attributes = array()) {
    return message('alert', $message, $attributes);
}

function error($message, $attributes = array()) {
    return message('error', $message, $attributes);
}

function danger($message, $attributes = array()) {
    return message('danger', $message, $attributes);
}

function info($message, $attributes = array()) {
    return message('info', $message, $attributes);
}

function message_lot($array) {
	$messages = '';

	foreach($array as $k => $v)
	{
		$function = $k;

		foreach ($v as $m) {
			$messages .= $function($m);
		}
	}

	return $messages;
}