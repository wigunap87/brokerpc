<?php


class Report_model extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	
	public function getorder($_email, $_startdate, $_enddate) {
		$this->db->join('client_record', 'order_record.client_id = client_record.id_client_record', 'left');
		$this->db->join('broker_record', 'client_record.broker_id = broker_record.id_broker_record', 'left');
		$this->db->join('category_record', 'client_record.category_id = category_record.id_category_record', 'left');
		$this->db->order_by('order_createdate', 'asc');
		$q = $this->db->get_where('order_record', array('client_id'=>$_email, 'order_createdate >='=>$_startdate, 'order_createdate <='=>$_enddate));
		return $q->result();
	}
	
	public function getdetail($val, $type) {
		$this->db->join('order_record', 'orderdet_record.order_id = order_record.id_order_record', 'left');
		$this->db->join('client_record', 'order_record.client_id = client_record.id_client_record', 'left');
		$this->db->join('broker_record', 'client_record.broker_id = broker_record.id_broker_record', 'left');
		$this->db->join('category_record', 'client_record.category_id = category_record.id_category_record', 'left');
		$this->db->join('saham_record', 'orderdet_record.saham_id = saham_record.id_saham_record', 'left');
		$this->db->order_by('id_orderdet_record', 'desc');
		$q = $this->db->get_where('orderdet_record', array('order_id'=>$val, 'orderdet_type'=>$type));
		return $q->result();
	}
	
	public function getclient() {
		$this->db->order_by('client_title', 'asc');
		$q = $this->db->get_where('client_record', array('client_status'=>'Publish'));
		return $q->result();
	}
	
	public function getclientfee($_client) {
		$this->db->join('broker_record', 'client_record.broker_id = broker_record.id_broker_record', 'left');
		$q = $this->db->get_where('client_record', array('id_client_record'=>$_client));
		return $q->result();
	}
}