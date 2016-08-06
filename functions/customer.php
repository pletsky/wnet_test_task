<?php

include_once(PATH_CLASSES.'/customer.class.php');
include_once(PATH_CLASSES.'/customers.class.php');

function get_customer_info() {
	if (array_key_exists('customer', $_GET)) {
		$customer = Customers::get_customer($_GET['customer']);
		$customer = Customers::get_customer($_GET['customer']);
		$customer = Customers::get_customer($_GET['customer']+1);

		set_value('name_customer', $customer->get_name());
		set_value('company', $customer->get_company());
	}

	return parse_tpl('customer_info');
}


function get_status_checkboxes () {
	foreach (Customer::get_status_list() as $status) {
		$ar_status[] = array('status' => $status);
	}
	return parse_array_to_html($ar_status, 'status');
}

