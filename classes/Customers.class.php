<?php

include_once(PATH_CLASSES.'/Customer.class.php');

class Customers {
	private static $ar_customers = array();

	public static function get_customer($customer, $ar_filter=array()) {
		if (!array_key_exists($customer, self::$ar_customers)) {
			$obj_customer = new Customer($customer, $ar_filter);
//vdump($obj_customer->get_id(), '$obj_customer->get_id()');
			if ($obj_customer->get_id()) {
				self::$ar_customers[$obj_customer->get_id()] = $obj_customer;
				self::$ar_customers[$obj_customer->get_name()] = $obj_customer;
			} else {
				self::$ar_customers[$customer] = null;
			}
		}
		return self::$ar_customers[$customer];
	}
}