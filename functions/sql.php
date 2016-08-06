<?php

function sqlValue($val) {
	if (is_array($val)) {
		foreach ($val as $k=>$v) {
			$val[$k] = sqlValue($v);
		}
		$val = implode(',', $val);
	} else {
		$val = '\''.mysql_escape_string($val).'\'';
	}
	return $val;
}


function viewsql($sql, $debug=0) {

	global $db;

	if ($debug) {
		msg($sql, 'SQL');
	}

	return $db->query($sql);
}

