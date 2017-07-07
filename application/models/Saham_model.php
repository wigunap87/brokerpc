<?php
	class Saham_model extends CI_Model {
		public $table = 'saham_record';
		public function __construct() {
			parent::__construct();
		}
		
		public function get_saham() {
			$this->db->order_by('id_saham_record', 'desc');
			$q = $this->db->get($this->table);
			return $q->result();
		}
		
		public function add_saham_process($_title, $_code, $_createdate, $_status) {
			$sources = array('saham_title'=>$_title, 'saham_code'=>$_code, 'saham_createdate'=>$_createdate, 'saham_status'=>$_status);
			$this->db->insert($this->table, $sources);
		}
		
		public function edit_saham_process($_getid, $_title, $_code, $_status) {
			$sources = array('saham_title'=>$_title, 'saham_code'=>$_code, 'saham_status'=>$_status);
			$this->db->where('id_'.$this->table, $_getid);
			$this->db->update($this->table, $sources);
		}
		
		public function show_saham($val) {
			$q = $this->db->get_where($this->table, array('id_saham_record'=>$val));
			return $q->result();
		}
		
		public function updatesaham($val) {
			$q = $this->db->get_where($this->table, array('id_saham_record'=>$val));
			$result = $q->row_array();
			
			if($result['saham_status'] == 'Publish') {
				$data = array('saham_status'=>'Unpublish');
				$this->db->where('id_saham_record', $val);
				$this->db->update('saham_record', $data);
			} else {
				$data = array('saham_status'=>'Publish');
				$this->db->where('id_saham_record', $val);
				$this->db->update('saham_record', $data);
			}
		}
		public function deletesaham($val) {
			$this->db->where('id_'.$this->table, $val);
			$this->db->delete($this->table);
		}
	}
?>