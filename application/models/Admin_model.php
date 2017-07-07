<?php
	class admin_model extends CI_Model {
	
		public $table = "admin_record";
		
		public function __construct() {
			parent::__construct();
		}
		
		public function get_model($limit, $offset) {
			$this->db->order_by('id_admin_record', 'desc');
			$this->db->limit($limit, $offset);
			$q = $this->db->get($this->table);
			return $q->result();
		}
		
		public function add_admin_process($_fullname, $_phone, $_address, $_position, $_email, $_passwd, $_permission, $_createdate, $_status) {
			$data = array('admin_fullname'=>$_fullname, 'admin_phone'=>$_phone, 'admin_address'=>$_address, 'admin_position'=>$_position, 'admin_email'=>$_email, 'admin_password'=>$_passwd, 'admin_permission'=>$_permission, 'admin_createdate'=>$_createdate, 'admin_status'=>$_status);
			$this->db->insert('admin_record', $data);
		}
		
		public function edit_admin_process($_getid, $_fullname, $_phone, $_address, $_position, $_email, $_passwd, $_permission, $_status) {
			$data = array('admin_fullname'=>$_fullname, 'admin_phone'=>$_phone, 'admin_address'=>$_address, 'admin_position'=>$_position, 'admin_email'=>$_email, 'admin_password'=>$_passwd, 'admin_permission'=>$_permission, 'admin_status'=>$_status);
			$this->db->where('id_admin_record', $_getid);
			$this->db->update('admin_record', $data);
		}
		
		public function show_getadmin($id) {
			$this->db->where('id_admin_record', $id);
			$q = $this->db->get('admin_record');
			return $q->result();
		}
		
		public function update_admin($id) {
			$q = $this->db->get_where($this->table, array('id_admin_record'=>$id));
			$result = $q->row_array();
			
			if($result['admin_status'] == 'Publish') {
				$data = array('admin_status'=>'Unpublish');
				$this->db->where('id_admin_record', $id);
				$this->db->update('admin_record', $data);
			} else {
				$data = array('admin_status'=>'Publish');
				$this->db->where('id_admin_record', $id);
				$this->db->update('admin_record', $data);
			}
		}
		
		public function delete_admin($id) {
			$this->db->where('id_admin_record', $id);
			$this->db->delete('admin_record');
		}
	}
?>