<?php

include('_start.php');

$response = '';

switch($_GET['type']) {
	case 'loadCustomer':
		$ar_filter = array();
		if (array_key_exists('status', $_GET)) {
			$ar_filter = array('status' => $_GET['status']);
		}
		$obj_customer = Customers::get_customer($_GET['customer'], $ar_filter);
		if (is_object($obj_customer)) {
			$response = json_encode($obj_customer->get_info());
		}
	break;
}

echo $response;

include('_stop.php');
