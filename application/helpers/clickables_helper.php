<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * clickable()
 * - generate a cilckable html element
 * @param (string) $value = 'element visible value'
 * @param (string) $type = 'element type'
 * @param (array) $attributes
 */
function clickable($value = NULL, $type = 'a', $attributes = array())
{
	//Vars
	$shapes = array(
		'a' => '<a {ATTRIBUTES}>{VALUE}</a>',
		'button' => '<button {ATTRIBUTES}>{VALUE}</button>',
		'submit' => '<input type="submit" {ATTRIBUTES} value="{VALUE}" />'
	);

	if(isset($shapes[$type]))
	{
		$a = array();
		if(!empty($attributes))
		{
			foreach($attributes as $k=>$v)
			{
				$a[] = $k . '="' . $v . '"';
			}
		}
		
		$attributes = implode(' ', $a);

		return str_replace(array('{ATTRIBUTES}','{VALUE}'), array($attributes, $value), $shapes[$type]);

	}
	else
	{
		return NULL;
	}
}//clickable()

/**
 * click_a()
 * - get an a element
 * @param (string) $href = 'href for link' //needs url_helper loaded
 * @param (string) $value = 'link visible value'
 * @param (array) $attributes;
 */
function click_a($href, $value = NULL, $attributes = array())
{
	$attributes['href'] = (strpos($href, 'http') !== false) ? $href : base_url($href);
	$attributes['class'] = 'button '.((isset($attributes['class'])) ? $attributes['class'] : NULL);
	if($value == NULL)
		$value = $attributes['href'];
	return clickable($value, 'a', $attributes);
}

/**
 * click_submit()
 * @param (string) $name = 'submit name'
 * @param (string) $value = 'value'
 * @param (array) $attributes
 */
function click_submit($name, $value = NULL, $attributes = array())
{
	$attributes['name'] = $name;
	$attributes['class'] = 'button '.((isset($attributes['class'])) ? $attributes['class'] : NULL);
	return clickable($value, 'submit', $attributes);
}//click_submit()

/**
 * click_submit()
 * @param (string) $name = 'submit name'
 * @param (string) $value = 'value'
 * @param (array) $attributes
 */
function click_search($name, $value = NULL, $attributes = array())
{
	$attributes['name'] = $name;
	$attributes['class'] = 'button search'.((isset($attributes['class'])) ? $attributes['class'] : NULL);
	return clickable($value, 'submit', $attributes);
}//click_submit()

/**
 * click_button()
 * @param (string) $value = 'value'
 * @param (string) $name = 'button name'
 * @param (array) $attributes
 */
function click_button($value, $name = NULL, $attributes = array())
{
	$attributes['name'] = $name;
	$attributes['class'] = 'button '.((isset($attributes['class'])) ? $attributes['class'] : NULL);
	return clickable($value, 'button', $attributes);
}//click_submit()

// SPECIAL CASES

//NEXT
function a_next($href, $value = NULL, $attributes = array())
{
	$attributes['class'] = 'next '.((isset($attributes['class'])) ? $attributes['class'] : NULL);
	return click_a($href, $value, $attributes);
}
function submit_next($name, $value = NULL, $attributes = array())
{
	$attributes['class'] = 'next '.((isset($attributes['class'])) ? $attributes['class'] : NULL);
	return click_submit($name,$value,$attributes);
}
function button_next($value, $name = NULL, $attributes = array())
{
	$attributes['class'] = 'next '.((isset($attributes['class'])) ? $attributes['class'] : NULL);
	return click_button($value,$name,$attributes);
}

//Previous
function a_previous($href, $value = NULL, $attributes = array())
{
	$attributes['class'] = 'previous '.((isset($attributes['class'])) ? $attributes['class'] : NULL);
	return click_a($href, $value, $attributes);
}
function submit_previous($name, $value = NULL, $attributes = array())
{
	$attributes['class'] = 'previous '.((isset($attributes['class'])) ? $attributes['class'] : NULL);
	return click_submit($name,$value,$attributes);
}
function button_previous($value, $name = NULL, $attributes = array())
{
	$attributes['class'] = 'previous '.((isset($attributes['class'])) ? $attributes['class'] : NULL);
	return click_button($value,$name,$attributes);
}

//confirm
function a_confirm($href, $value = NULL, $attributes = array())
{
	$attributes['class'] = 'confirm '.((isset($attributes['class'])) ? $attributes['class'] : NULL);
	return click_a($href, $value, $attributes);
}
function submit_confirm($name, $value = NULL, $attributes = array())
{
	$attributes['class'] = 'confirm '.((isset($attributes['class'])) ? $attributes['class'] : NULL);
	return click_submit($name,$value,$attributes);
}
function button_confirm($value, $name = NULL, $attributes = array())
{
	$attributes['class'] = 'confirm '.((isset($attributes['class'])) ? $attributes['class'] : NULL);
	return click_button($value,$name,$attributes);
}

//add
function a_add($href, $value = NULL, $attributes = array())
{
	$attributes['class'] = 'add '.((isset($attributes['class'])) ? $attributes['class'] : NULL);
	return click_a($href, $value, $attributes);
}
function submit_add($name, $value = NULL, $attributes = array())
{
	$attributes['class'] = 'add '.((isset($attributes['class'])) ? $attributes['class'] : NULL);
	return click_submit($name,$value,$attributes);
}
function button_add($value, $name = NULL, $attributes = array())
{
	$attributes['class'] = 'add '.((isset($attributes['class'])) ? $attributes['class'] : NULL);
	return click_button($value,$name,$attributes);
}

//cancel
function a_cancel($href, $value = NULL, $attributes = array())
{
	$attributes['class'] = 'cancel '.((isset($attributes['class'])) ? $attributes['class'] : NULL);
	return click_a($href, $value, $attributes);
}
function submit_cancel($name, $value = NULL, $attributes = array())
{
	$attributes['class'] = 'cancel '.((isset($attributes['class'])) ? $attributes['class'] : NULL);
	return click_submit($name,$value,$attributes);
}
function button_cancel($value, $name = NULL, $attributes = array())
{
	$attributes['class'] = 'cancel '.((isset($attributes['class'])) ? $attributes['class'] : NULL);
	return click_button($value,$name,$attributes);
}

//graph
function a_graph($href, $value = NULL, $attributes = array())
{
	$attributes['class'] = 'graph '.((isset($attributes['class'])) ? $attributes['class'] : NULL);
	return click_a($href, $value, $attributes);
}
function submit_graph($name, $value = NULL, $attributes = array())
{
	$attributes['class'] = 'graph '.((isset($attributes['class'])) ? $attributes['class'] : NULL);
	return click_submit($name,$value,$attributes);
}
function button_graph($value, $name = NULL, $attributes = array())
{
	$attributes['class'] = 'graph '.((isset($attributes['class'])) ? $attributes['class'] : NULL);
	return click_button($value,$name,$attributes);
}

//save
function a_save($href, $value = NULL, $attributes = array())
{
	$attributes['class'] = 'save '.((isset($attributes['class'])) ? $attributes['class'] : NULL);
	return click_a($href, $value, $attributes);
}
function submit_save($name, $value = NULL, $attributes = array())
{
	$attributes['class'] = 'save '.((isset($attributes['class'])) ? $attributes['class'] : NULL);
	return click_submit($name,$value,$attributes);
}
function button_save($value, $name = NULL, $attributes = array())
{
	$attributes['class'] = 'save '.((isset($attributes['class'])) ? $attributes['class'] : NULL);
	return click_button($value,$name,$attributes);
}

//config
function a_config($href, $value = NULL, $attributes = array())
{
	$attributes['class'] = 'config '.((isset($attributes['class'])) ? $attributes['class'] : NULL);
	return click_a($href, $value, $attributes);
}
function submit_config($name, $value = NULL, $attributes = array())
{
	$attributes['class'] = 'config '.((isset($attributes['class'])) ? $attributes['class'] : NULL);
	return click_submit($name,$value,$attributes);
}
function button_config($value, $name = NULL, $attributes = array())
{
	$attributes['class'] = 'config '.((isset($attributes['class'])) ? $attributes['class'] : NULL);
	return click_button($value,$name,$attributes);
}

//pdf
function a_pdf($href, $value = NULL, $attributes = array())
{
	$attributes['class'] = 'pdf '.((isset($attributes['class'])) ? $attributes['class'] : NULL);
	return click_a($href, $value, $attributes);
}
function submit_pdf($name, $value = NULL, $attributes = array())
{
	$attributes['class'] = 'pdf '.((isset($attributes['class'])) ? $attributes['class'] : NULL);
	return click_submit($name,$value,$attributes);
}
function button_pdf($value, $name = NULL, $attributes = array())
{
	$attributes['class'] = 'pdf '.((isset($attributes['class'])) ? $attributes['class'] : NULL);
	return click_button($value,$name,$attributes);
}

//Botões de tabela existem somente no formato A
function a_edit($href, $value = NULL, $attributes = array())
{
	$attributes['class'] = 'edit '.((isset($attributes['class'])) ? $attributes['class'] : NULL);
	return click_a($href, $value, $attributes);
}
function a_delete($href, $value = NULL, $attributes = array())
{
	$attributes['class'] = 'delete '.((isset($attributes['class'])) ? $attributes['class'] : NULL);
	return click_a($href, $value, $attributes);
}
function a_lock($href, $value = NULL, $attributes = array())
{
	$attributes['class'] = 'lock '.((isset($attributes['class'])) ? $attributes['class'] : NULL);
	return click_a($href, $value, $attributes);
}
function a_unlock($href, $value = NULL, $attributes = array())
{
	$attributes['class'] = 'unlock '.((isset($attributes['class'])) ? $attributes['class'] : NULL);
	return click_a($href, $value, $attributes);
}
function a_view($href, $value = NULL, $attributes = array())
{
	$attributes['class'] = 'view '.((isset($attributes['class'])) ? $attributes['class'] : NULL);
	return click_a($href, $value, $attributes);
}
function a_permissions($href, $value = NULL, $attributes = array())
{
	$attributes['class'] = 'permissions '.((isset($attributes['class'])) ? $attributes['class'] : NULL);
	return click_a($href, $value, $attributes);
}
function a_product_incoming($href, $value = NULL, $attributes = array())
{
	$attributes['class'] = 'product_incoming '.((isset($attributes['class'])) ? $attributes['class'] : NULL);
	return click_a($href, $value, $attributes);
}
function a_product_leaving($href, $value = NULL, $attributes = array())
{
	$attributes['class'] = 'product_leaving '.((isset($attributes['class'])) ? $attributes['class'] : NULL);
	return click_a($href, $value, $attributes);
}
function a_product_history($href, $value = NULL, $attributes = array())
{
	$attributes['class'] = 'product_history '.((isset($attributes['class'])) ? $attributes['class'] : NULL);
	return click_a($href, $value, $attributes);
}
