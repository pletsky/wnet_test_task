<?php

$html = '';

include('_start.php');

$t = array_key_exists('t', $_GET) ? $_GET['t'] : 'index';
$html = parse_tpl($t);

echo $html;

include('_stop.php');
