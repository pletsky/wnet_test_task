<?php

$db = new mysqli($db_host, $db_user, $db_passw, $db_name);

if ($db->connect_error) {
    die('Ошибка подключения (' . $db->connect_errno . ') '. $db->connect_error);
}

$db->query('SET NAMES utf8');

