<?php
	class Dashboard extends CI_Controller {
		public function __construct() {
			parent::__construct();
			$this->load->model('Dashboard_model');
			$this->load->model('Main_model');
		}
		
		public function index() {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('main', 'refresh');
			} else {
				$sources['name'] = '';
				$sources['title'] = 'Dashboard | System Information Administrator';
				$sources['content'] = 'dashboard';
				
				$sources['no'] = 1;
				//$sources['getorders'] = $this->Dashboard_model->get_model();
				
				// Setting General Information
				$this->load->view('home', $sources);
			}
		}
		
		public function getjson_so() {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('main', 'refresh');
			} else {
				$rows = array();
				header("Content-type: text/json");
				$totalmoney = 0;
				$getorders = $this->Dashboard_model->getorders();
				foreach($getorders as $gorders) {
					$countorder = $this->Dashboard_model->getstatusorder($gorders->orders_status, $month = date('m'), $year = date('Y'));
					$counting = (int)$countorder->num_rows();
					$rows[] = array($gorders->orders_status, $counting);
				}
				echo json_encode($rows);
			}
		}
		
		public function getjson_columpermonth($month, $year, $status) {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('main', 'refresh');
			} else {
				
			}
		}
		
		public function getjson_globalinvoice() {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('main', 'refresh');
			} else {
				$rows = array();
				header("Content-type: text/json");
				$getinvoice = $this->Dashboard_model->getglobalinvoice();
				foreach($getinvoice as $ginv) {
					
					$rows[] = array();
				}
				echo json_encode($rows);
			}
		}
	}
?>