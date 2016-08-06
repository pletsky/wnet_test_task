<?php

class Customer {

	private $id;
	private $name;
	private $company;
	private $ar_contracts = array();
	

	public function __construct($customer, $ar_filter=array()) {
//vdump($ar_filter, '$ar_filter');
		$filter_by_status = is_array($ar_filter) && array_key_exists('status', $ar_filter) && count($ar_filter['status']);

		$res = viewsql('
			SELECT *
			FROM obj_customers
			WHERE '.(is_numeric($customer) ? 'id_customer = '.(int)$customer : 'name_customer = '.sqlValue($customer)).'
			'.($filter_by_status ? '
			AND EXISTS (	SELECT 1 
					FROM obj_contracts
					JOIN obj_services
					ON id_contract = f_id_contract
					WHERE f_id_customer = id_customer
					AND obj_services.status IN ('.sqlValue($ar_filter['status']).')
				)
			' : '').'
		', 0);

		if ($res->num_rows) {
			$row = $res->fetch_assoc();
			$this->id = (int)$row['id_customer'];
			$this->name = $row['name_customer'];
			$this->company = $row['company'];

			$res = viewsql('
				SELECT *
				FROM obj_contracts
				'.($filter_by_status ? '' : ' LEFT ').' JOIN obj_services
				ON id_contract = f_id_contract
				WHERE f_id_customer = '.(int)$this->id.'
				'.($filter_by_status ? '
				AND obj_services.status IN ('.sqlValue($ar_filter['status']).')' : '').'
			', 0);

			if ($res->num_rows) {
				while ($row = $res->fetch_assoc()) {
//vdump($row, '$row');
					$this->ar_contracts[] = $row;
				}
//vdump($this->ar_contracts, 'ar_contracts');
			}
		} 
	}

	public function get_id() {
		return $this->id;
	}

	public function get_name() {
		return $this->name;
	}

	public function get_company() {
		return $this->company;
	}

	public function get_contracts() {
		return $this->ar_contracts;
	}

	public function get_info($ar_filter=array()) {

		$ar_info = array(
			'id' => $this->id,
			'name' => $this->name,
			'company' => $this->company,
		);

		foreach ($this->ar_contracts as $k=>$v) {
//vdump($v, $k);
			$ar_info['ar_contracts'][$v['id_contract']]['id'] = $v['id_contract'];
			$ar_info['ar_contracts'][$v['id_contract']]['number'] = $v['number'];
			$ar_info['ar_contracts'][$v['id_contract']]['date_sign'] = $v['date_sign'];
			$ar_info['ar_contracts'][$v['id_contract']]['staff_number'] = $v['staff_number'];

			if (	!is_array($ar_filter)
				||
				!array_key_exists('status', $ar_filter)
				||
				in_array($v['status'], $ar_filter['status'])
			) {
				$ar_info['ar_contracts'][$v['id_contract']]['ar_services'][$v['id_service']] = array(
					'id' => $v['id_service'],
					'title' => $v['title_service'],
					'status' => $v['status']
				);
			}
		}
//vdump($ar_info, '$ar_info');

		return $ar_info;
	}

	public static function get_status_list() {
		return array(
			1 => 'work',
			2 => 'connecting',
			3 => 'disconnected'
		);
	}
}

