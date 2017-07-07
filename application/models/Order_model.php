<?php
	class order_model extends CI_Model {
		public $table = 'order_record';
		public function __construct() {
			parent::__construct();
		}
		
		public function get_order() {
			$this->db->join('client_record', 'order_record.client_id = client_record.id_client_record', 'left');
			$this->db->join('broker_record', 'client_record.broker_id = broker_record.id_broker_record', 'left');
			$this->db->join('category_record', 'client_record.category_id = category_record.id_category_record', 'left');
			$this->db->order_by('id_order_record', 'desc');
			$q = $this->db->get($this->table);
			return $q->result();
		}
		
		public function getlist() {
			$this->db->join('client_record', 'order_record.client_id = client_record.id_client_record', 'left');
			$this->db->join('broker_record', 'client_record.broker_id = broker_record.id_broker_record', 'left');
			$this->db->join('category_record', 'client_record.category_id = category_record.id_category_record', 'left');
			$this->db->order_by('id_order_record', 'desc');
			$q = $this->db->get($this->table);
			return $q->result();
		}
		
		public function add_order_process($_client, $feeclientbuy, $feeclientsell, $feebrokerbuy, $feebrokersell, $_createdate, $_createby, $_status) {
			$sources = array('client_id'=>$_client, 'order_feeclientbuy'=>$feeclientbuy, 'order_feeclientsell'=>$feeclientsell, 'order_feebrokerbuy'=>$feebrokerbuy, 'order_feebrokersell'=>$feebrokersell, 'order_createdate'=>$_createdate, 'order_createby'=>$_createby, 'order_status'=>$_status);
			$this->db->insert($this->table, $sources);
		}
		
		public function edit_order_process($_getid, $_title, $_code, $_status) {
			$sources = array('order_title'=>$_title, 'order_code'=>$_code, 'order_status'=>$_status);
			$this->db->where('id_'.$this->table, $_getid);
			$this->db->update($this->table, $sources);
		}
		
		public function show_order($val) {
			$this->db->join('client_record', 'order_record.client_id = client_record.id_client_record', 'left');
			$this->db->join('broker_record', 'client_record.broker_id = broker_record.id_broker_record', 'left');
			$this->db->join('category_record', 'client_record.category_id = category_record.id_category_record', 'left');
			$q = $this->db->get_where($this->table, array('id_order_record'=>$val));
			return $q->result();
		}
		
		public function getclientfee($_client) {
			$this->db->join('broker_record', 'client_record.broker_id = broker_record.id_broker_record', 'left');
			$q = $this->db->get_where('client_record', array('id_client_record'=>$_client));
			return $q->result();
		}
		
		public function updateorder($val) {
			$q = $this->db->get_where($this->table, array('id_order_record'=>$val));
			$result = $q->row_array();
			
			if($result['order_status'] == 'Publish') {
				$data = array('order_status'=>'Unpublish');
				$this->db->where('id_order_record', $val);
				$this->db->update('order_record', $data);
			} else {
				$data = array('order_status'=>'Publish');
				$this->db->where('id_order_record', $val);
				$this->db->update('order_record', $data);
			}
		}
		public function deleteorder($val) {
			$this->db->where('id_'.$this->table, $val);
			$this->db->delete($this->table);
		}
		
		public function getclient() {
			$this->db->order_by('client_title', 'asc');
			$q = $this->db->get_where('client_record', array('client_status'=>'Publish'));
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
		
		public function showsaham() {
			$this->db->order_by('saham_code', 'asc');
			$q = $this->db->get_where('saham_record', array('saham_status'=>'Publish'));
			return $q->result();
		}
		
		public function insert_orderdet($_getid, $_saham, $_price, $_lot, $_lembar, $_nominal, $_type, $_createdate, $_status) {
			$sources = array('order_id'=>$_getid, 'saham_id'=>$_saham, 'orderdet_price'=>$_price, 'orderdet_lot'=>$_lot, 'orderdet_countlot'=>$_lembar, 'orderdet_count'=>$_nominal, 'orderdet_type'=>$_type, 'orderdet_createdate'=>$_createdate, 'orderdet_status'=>$_status);
			$this->db->insert('orderdet_record', $sources);
		}
		
		public function update_status_correction($val, $_status, $_bywho, $_bydate, $_date) {
			$sources = array('order_status'=>$_status, 'order_updateby'=>$_bywho, 'order_updatedate'=>$_bydate, 'order_processdate'=>$_date);
			$this->db->where('id_order_record', $val);
			$this->db->update('order_record', $sources);
		}
	}
?>