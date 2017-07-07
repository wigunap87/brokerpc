<?php
	class Client_model extends CI_Model {
		public $table = 'client_record';
		public function __construct() {
			parent::__construct();
		}
		
		public function get_client($limit, $offset) {
			$this->db->join('category_record', 'client_record.category_id = category_record.id_category_record', 'left');
			$this->db->join('broker_record', 'client_record.broker_id = broker_record.id_broker_record', 'left');
			$this->db->order_by('id_client_record', 'desc');
			$this->db->limit($limit, $offset);
			$q = $this->db->get($this->table);
			return $q->result();
		}
		
		public function get_client_pagination() {
			$this->db->join('category_record', 'client_record.category_id = category_record.id_category_record', 'left');
			$this->db->join('broker_record', 'client_record.broker_id = broker_record.id_broker_record', 'left');
			$this->db->order_by('id_client_record', 'desc');
			$q = $this->db->get($this->table);
			return $q;
		}
		
		public function add_client_process($_category, $_broker, $_title, $_address, $_phone, $_email, $_rekrdi, $_rekspv, $_feebuy, $_feesell, $_notes, $_createdate, $_status) {
			$sources = array('category_id'=>$_category, 'broker_id'=>$_broker, 'client_title'=>$_title, 'client_address'=>$_address, 'client_phone'=>$_phone, 'client_email'=>$_email, 'client_rekrdi'=>$_rekrdi, 'client_rekspv'=>$_rekspv, 'client_feebuy'=>$_feebuy, 'client_feesell'=>$_feesell, 'client_note'=>$_notes, 'client_createdate'=>$_createdate, 'client_status'=>$_status);
			$this->db->insert($this->table, $sources);
		}
		
		public function edit_client_process($_getid, $_category, $_broker, $_title, $_address, $_phone, $_email, $_rekrdi, $_rekspv, $_feebuy, $_feesell, $_notes, $_status) {
			$sources = array('category_id'=>$_category, 'broker_id'=>$_broker, 'client_title'=>$_title, 'client_address'=>$_address, 'client_phone'=>$_phone, 'client_email'=>$_email, 'client_rekrdi'=>$_rekrdi, 'client_rekspv'=>$_rekspv, 'client_feebuy'=>$_feebuy, 'client_feesell'=>$_feesell, 'client_note'=>$_notes, 'client_status'=>$_status);
			$this->db->where('id_'.$this->table, $_getid);
			$this->db->update($this->table, $sources);
		}
		
		public function show_client($val) {
			$this->db->join('category_record', 'client_record.category_id = category_record.id_category_record', 'left');
			$this->db->join('broker_record', 'client_record.broker_id = broker_record.id_broker_record', 'left');
			$q = $this->db->get_where($this->table, array('id_client_record'=>$val));
			return $q->result();
		}
		
		public function updateclient($val) {
			$q = $this->db->get_where($this->table, array('id_client_record'=>$val));
			$result = $q->row_array();
			
			if($result['client_status'] == 'Publish') {
				$data = array('client_status'=>'Unpublish');
				$this->db->where('id_client_record', $val);
				$this->db->update('client_record', $data);
			} else {
				$data = array('client_status'=>'Publish');
				$this->db->where('id_client_record', $val);
				$this->db->update('client_record', $data);
			}
		}
		public function deleteclient($val) {
			$this->db->where('id_'.$this->table, $val);
			$this->db->delete($this->table);
		}
		
		public function gettable($tables) {
			$this->db->order_by($tables.'_title', 'asc');
			$q = $this->db->get_where($tables.'_record', array($tables.'_status'=>'Publish'));
			return $q->result();
		}
	}
?>