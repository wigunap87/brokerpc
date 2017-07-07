<?php
	class Main_model extends CI_Model {
		public function __construct() {
			parent::__construct();
		}
		
		public function get_login($_email, $_epassw) {
			$this->db->order_by('id_admin_record', 'desc');
			$this->db->limit(1);
			$q = $this->db->get_where('admin_record', array('admin_email'=>$_email, 'admin_password'=>$_epassw, 'admin_status'=>'Publish', 'admin_permission !='=>'Owner'));
			return $q;
		}
		
		public function insert_history($_idadminhistory, $_pagehistory, $_deschistory, $_datehistory, $_timehistory) {
			$sources = array('id_admin_record'=>$_idadminhistory, 'adminhistory_page'=>$_pagehistory, 'adminhistory_desc'=>$_deschistory, 'adminhistory_date'=>$_datehistory, 'adminhistory_time'=>$_timehistory);
			$this->db->insert('adminhistory_record', $sources);
		}
		
		public function get_total($tablenya) {
			$q = $this->db->get_where($tablenya.'record', array($tablenya.'status'=>'Publish'));
			return $q;
		}
		public function get_total_unpublish($tablenya) {
			$q = $this->db->get_where($tablenya.'record', array($tablenya.'status'=>'Unpublish'));
			return $q;
		}
		
		public function getsinglecount($table, $status, $tagline) {
			if($tagline == 'Car' OR $tagline == 'Route' OR $tagline == 'Driver' OR $tagline == 'Order' OR $tagline == 'Origin') {
				$q = $this->db->get($table.'_record');
			} else {
				$q = $this->db->get_where($table.'_record', array($table.'_status'=>$status));
			}
			return $q;
		}
	}
?>