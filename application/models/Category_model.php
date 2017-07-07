<?php
	class Category_model extends CI_Model {
		public $table = 'category_record';
		public function __construct() {
			parent::__construct();
		}
		
		public function get_category() {
			$this->db->order_by('id_category_record', 'desc');
			$q = $this->db->get($this->table);
			return $q->result();
		}
		
		public function add_category_process($_title, $_status) {
			$sources = array('category_title'=>$_title, 'category_status'=>$_status);
			$this->db->insert($this->table, $sources);
		}
		
		public function edit_category_process($_getid, $_title, $_status) {
			$sources = array('category_title'=>$_title, 'category_status'=>$_status);
			$this->db->where('id_'.$this->table, $_getid);
			$this->db->update($this->table, $sources);
		}
		
		public function show_category($val) {
			$q = $this->db->get_where($this->table, array('id_category_record'=>$val));
			return $q->result();
		}
		
		public function updatecategory($val) {
			$q = $this->db->get_where($this->table, array('id_category_record'=>$val));
			$result = $q->row_array();
			
			if($result['category_status'] == 'Publish') {
				$data = array('category_status'=>'Unpublish');
				$this->db->where('id_category_record', $val);
				$this->db->update('category_record', $data);
			} else {
				$data = array('category_status'=>'Publish');
				$this->db->where('id_category_record', $val);
				$this->db->update('category_record', $data);
			}
		}
		public function deletecategory($val) {
			$this->db->where('id_'.$this->table, $val);
			$this->db->delete($this->table);
		}
	}
?>