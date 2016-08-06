<?php

function msg($expression, $lable='') {
	if (DEBUG_MODE) {
		echo '<pre><b>'.$lable.'</b>:<br/>'.$expression.'</pre>';
	}
}

function vdump($expression, $lable='', $exit=false) {
	if (DEBUG_MODE) {
		echo '<pre><b>'.$lable.'</b>:<br/>';
		var_dump($expression);
		echo '</pre>';
		if ($exit) {
			die('Debug exit');
		}
	}
}

function vdump_e($expression, $lable='') {
	vdump($expression, $lable, true);
}