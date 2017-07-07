<?php
	class Broker_model extends CI_Model {
		public $table = 'broker_record';
		public function __construct() {
			parent::__construct();
		}
		
		public function get_broker() {
			$this->db->order_by('id_broker_record', 'desc');
			$q = $this->db->get($this->table);
			return $q->result();
		}
		
		public function add_broker_process($_title, $_code, $_fee1, $_fee2, $_createdate, $_status) {
			$sources = array('broker_title'=>$_title, 'broker_code'=>$_code, 'broker_fee1'=>$_fee1, 'broker_fee2'=>$_fee2, 'broker_createdate'=>$_createdate, 'broker_status'=>$_status);
			$this->db->insert($this->table, $sources);
		}
		
		public function edit_broker_process($_getid, $_title, $_code, $_fee1, $_fee2, $_status) {
			$sources = array('broker_title'=>$_title, 'broker_code'=>$_code, 'broker_fee1'=>$_fee1, 'broker_fee2'=>$_fee2, 'broker_status'=>$_status);
			$this->db->where('id_'.$this->table, $_getid);
			$this->db->update($this->table, $sources);
		}
		
		public function show_broker($val) {
			$q = $this->db->get_where($this->table, array('id_broker_record'=>$val));
			return $q->result();
		}
		
		public function updatebroker($val) {
			$q = $this->db->get_where($this->table, array('id_broker_record'=>$val));
			$result = $q->row_array();
			
			if($result['broker_status'] == 'Publish') {
				$data = array('broker_status'=>'Unpublish');
				$this->db->where('id_broker_record', $val);
				$this->db->update('broker_record', $data);
			} else {
				$data = array('broker_status'=>'Publish');
				$this->db->where('id_broker_record', $val);
				$this->db->update('broker_record', $data);
			}
		}
		public function deletebroker($val) {
			$this->db->where('id_'.$this->table, $val);
			$this->db->delete($this->table);
		}
	}
?>