<?php

function parse_tpl($tpl_name) {
	$tpl_full_name = PATH_TEMPLATES.'/'.$tpl_name.'.tpl';
//vdump($tpl_full_name, '$tpl_full_name');
	$tpl_text = file_get_contents($tpl_full_name);
//vdump($tpl_text, '$tpl_text');
	$ar_matches = array();
	$tpl_text = preg_replace_callback(
		'|<%([^:]*):([^:%]*)%>|U',
		function ($ar_matches) {
			$ar_matches[1] = trim($ar_matches[1]);
			if ('' == $ar_matches[1]) {
				$ar_matches[1] = 'get_value';
			}

			if ('include' == $ar_matches[1]) {
				$ar_matches[1] = 'parse_tpl';
			}

//vdump($ar_matches, '$ar_matches');
			if (function_exists($ar_matches[1])) {
//				$ar_matches[2] = explode(',', $ar_matches[2]);
//				$ar_matches[2] = $ar_matches[2][0];
				return $ar_matches[1]($ar_matches[2]);
			} else {
				return $ar_matches[0];
			}
		},
		$tpl_text 
	);

	return $tpl_text;
}

function parse_array_to_html($ar, $tpl) {
	$html = '';
	foreach ($ar as $row) {
		foreach($row as $k=>$v) {
			set_value($k, $v);
		}
		$html.= parse_tpl($tpl);
	}

	if (is_array($row) && count($row)) {
		foreach($row as $k=>$v) {
			unset_value($k);
		}
	}

	return $html;
}

function unset_value($var_name) {
	global $ar_values;
	if (array_key_exists($var_name, $ar_values)) {
		unset($ar_values[$var_name]);
	}
}

function set_value($var_name, $val) {
	global $ar_values;
	$ar_values[$var_name] = $val;
}


function get_value($var_name) {

	if (defined($var_name)) {
		$val = constant($var_name);
	} else {
		global $ar_values;
		$val = (is_array($ar_values) && array_key_exists($var_name, $ar_values) ? $ar_values[$var_name] : '');
	}

	return $val;
}



