<?php

function convert_html($to_convert, $method = 'safe')
{
	$true_html = 	array(
						'<',
						'>',
						'"',
						'\'',
						'/'

					);

	$html_codes = 	array(
						'&#60;',	# <
						'&#62;',	# >
						'&#34;',	# "
						'&#39;',	# '
						'&#47;'		# /
					);

	$a1 = ($method == 'safe') ? $true_html : $html_codes;
	$a2 = ($method == 'safe') ? $html_codes : $true_html;

	return str_replace($a1, $a2, $to_convert);
}