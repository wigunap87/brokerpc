<?php
	class Dashboard_model extends CI_Model {
		public function __construct() {
			parent::__construct();
		}
		
		public function getorders() {
			$this->db->group_by('orders_status');
			$q = $this->db->get('orders_record');
			return $q->result();
		}
		
		public function getstatusorder($valuestatus, $month, $year) {
			$q = $this->db->get_where('orders_record', array('MONTH(orders_date)'=>$month, 'YEAR(orders_date)'=>$year, 'orders_status'=>$valuestatus));
			return $q;
		}
		
		public function getstatus($status, $datenya) {
			$q = $this->db->get_where('orders_record', array('orders_status'=>$status, 'orders_date'=>$datenya));
			return $q;
		}
		
		public function getrevenue($datenya) {
			$q = $this->db->get_where('orders_record', array('orders_status'=>'Done', 'orders_date'=>$datenya));
			return $q;
		}
		
		public function getrevenueunplanned($datenya) {
			$q = $this->db->get_where('orders_record', array('orders_unplanned'=>'Yes', 'orders_status'=>'Done', 'orders_date'=>$datenya));
			return $q;
		}
		
		public function getadduj($ordernumber) {
			$q = $this->db->get_where('pettycash_record', array('pettycash_title'=>$ordernumber, 'pettycash_type'=>'Additional UJ', 'pettycash_flag'=>'Out', 'pettycash_status'=>'Publish'));
			return $q->result();
		}
		
		public function getinvoice($status, $datenya, $i) {
			if($status == '') {
				$q = $this->db->get_where('invoice_record', array('MONTH(invoice_createdate)'=>$i, 'YEAR(invoice_createdate)'=>$datenya));
			} else {
				$q = $this->db->get_where('invoice_record', array('MONTH(invoice_createdate)'=>$i, 'YEAR(invoice_createdate)'=>$datenya, 'invoice_status'=>$status));
			}
			return $q;
		}
		
		public function getinvoices($status) {
			$q = $this->db->get_where('invoice_record', array('invoice_status'=>$status));
			return $q;
		}
		
		public function gettypeunit() {
			$this->db->order_by('id_car_record', 'desc');
			$q = $this->db->get_where('car_record', array('car_status'=>'Publish'));
			return $q->result();			
		}
		
		public function getcountorders($val, $month, $year) {
			$q = $this->db->get_where('orders_record', array('orders_status'=>'Done', 'car_id'=>$val, 'MONTH(orders_date)'=>$month, 'YEAR(orders_date)'=>$year));
			return $q;
		}
		
		public function getdriver() {
			$this->db->order_by('driver_fullname', 'asc');
			$q = $this->db->get_where('driver_record', array('driver_status'=>'Publish'));
			return $q->result();			
		}
		
		public function getcountordersdriver($val, $month, $year) {
			$q = $this->db->get_where('orders_record', array('orders_status'=>'Done', 'driver_id'=>$val, 'MONTH(orders_date)'=>$month, 'YEAR(orders_date)'=>$year));
			return $q;
		}
		
		
		/*public function get_model() {
			$this->db->order_by('id_orders_record', 'desc');
			$this->db->limit(5);
			$q = $this->db->get_where('orders_record', array('orders_status'=>'New'));
			return $q->result();
		}
		
		public function latestmember() {
			$this->db->order_by('id_members_record', 'desc');
			$this->db->limit(1);
			$q = $this->db->get_where('members_record', array('members_status'=>'Publish'));
			return $q->result();
		}
		
		public function neworders() {
			$this->db->order_by('id_orders_record', 'desc');
			$this->db->limit(5);
			$q = $this->db->get_where('orders_record', array('orders_status'=>'New Order'));
			return $q->result();
		}
		
		public function getorders() {
			$q = $this->db->query('select DISTINCT orders_status from orders_record');
			return $q->result();
		}
		
		public function getstatusorder($valuestatus) {
			$q = $this->db->get_where('orders_record', array('orders_status'=>$valuestatus));
			return $q;
		}
		
		public function countmember() {
			$q = $this->db->get('members_record');
			return $q;
		}
		
		public function countall($table, $status, $tagline) {
			if($tagline == 'Agency' OR $tagline == 'Product') {
				$q = $this->db->get($table.'_record');
			} else {
				$q = $this->db->get_where($table.'_record', array($table.'_status'=>$status));
			}
			return $q;
		}*/
	}
?>