<?php


class Report_model extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	
	public function getorder($_email, $_startdate, $_enddate) {
		$this->db->order_by('order_createdate', 'asc');
		$q = $this->db->get_where('order_record', array('client_id'=>$_email, 'order_createdate >='=>$_startdate, 'order_createdate <='=>$_enddate));
		return $q->result();
	}
}