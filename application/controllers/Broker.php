<?php
	class Broker extends CI_Controller {
		public function __construct() {
			parent::__construct();
			$this->load->model('Broker_model');
			$this->load->model('Main_model');
		}
		
		public function index() {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('main', 'refresh');
			} else {
				$sources['title'] = 'Broker | System Information Administrator';
				$sources['name'] = 'Broker';
				$sources['content'] = 'broker';
				
				$sources['no'] = 1;
				$sources['showbroker'] = $this->Broker_model->get_broker();
				
				// Setting General Information
				$this->load->view('home', $sources);
			}
		}
		
		public function addbroker() {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('main', 'refresh');
			} else {
				$sources['title'] = 'Tambah Broker | System Information Administrator';
				$sources['name'] = 'Tambah Broker';
				$sources['content'] = 'addbroker';
				
				// Setting General Information
				$this->load->view('home', $sources);
			}
		}
		
		public function addbroker_process() {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('main', 'refresh');
			} else {
				if($this->input->post('submit')) {
					$configform = array(
						array('field'=>'title', 'name'=>'Title', 'rules'=>'required|max_length[100]'),
						array('field'=>'code', 'name'=>'Code', 'rules'=>'required|max_length[100]'),
						array('field'=>'fee1', 'name'=>'Fee 1', 'rules'=>'required|max_length[100]'),
						array('field'=>'fee2', 'name'=>'Fee 2', 'rules'=>'required|max_length[100]'),
						array('field'=>'status', 'name'=>'status', 'rules'=>'required')
					);
					
					$this->form_validation->set_rules($configform);
					if($this->form_validation->run() != true) {
						$this->session->set_flashdata('errornotif', '<div class="errornotif">* Field required</div>');
						redirect('broker/addbroker/', 'refresh');
					} else {
						$_title = $this->security->xss_clean($this->input->post('title'));
						$_code = $this->security->xss_clean($this->input->post('code'));
						$_fee1 = $this->security->xss_clean($this->input->post('fee1'));
						$_fee2 = $this->security->xss_clean($this->input->post('fee2'));
						$_createdate = date('Y-m-d H:i:s');
						$_status = $this->security->xss_clean($this->input->post('status'));
						
						$this->Broker_model->add_broker_process($_title, $_code, $_fee1, $_fee2, $_createdate, $_status);
						redirect('broker', 'refresh');
					}
				} else {
					redirect('main', 'refresh');
				}
			}
		}
		
		public function editbroker($val) {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('main', 'refresh');
			} else {
				$sources['title'] = 'Edit Broker | System Information Administrator';
				$sources['name'] = 'Edit Broker';
				$sources['content'] = 'editbroker';
				
				$sources['show_broker'] = $this->Broker_model->show_broker($val);
				
				// Setting General Information
				$this->load->view('home', $sources);
			}
		}
		
		public function editbroker_process() {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('main', 'refresh');
			} else {
				if($this->input->post('submit')) {
					$configform = array(
						array('field'=>'title', 'name'=>'Title', 'rules'=>'required|max_length[100]'),
						array('field'=>'code', 'name'=>'Code', 'rules'=>'required|max_length[100]'),
						array('field'=>'fee1', 'name'=>'Fee 1', 'rules'=>'required|max_length[100]'),
						array('field'=>'fee2', 'name'=>'Fee 2', 'rules'=>'required|max_length[100]'),
						array('field'=>'status', 'name'=>'status', 'rules'=>'required')
					);
					
					$this->form_validation->set_rules($configform);
					if($this->form_validation->run() != true) {
						$this->session->set_flashdata('errornotif', '<div class="errornotif">* Field required</div>');
						redirect('broker/editbroker/'.$this->input->post('getid'), 'refresh');
					} else {
						$_getid = $this->security->xss_clean($this->input->post('getid'));
						$_title = $this->security->xss_clean($this->input->post('title'));
						$_code = $this->security->xss_clean($this->input->post('code'));
						$_fee1 = $this->security->xss_clean($this->input->post('fee1'));
						$_fee2 = $this->security->xss_clean($this->input->post('fee2'));
						$_status = $this->security->xss_clean($this->input->post('status'));
											
						$this->Broker_model->edit_broker_process($_getid, $_title, $_code, $_fee1, $_fee2, $_status);
						redirect('broker', 'refresh');
					}
				} else {
					redirect('main', 'refresh');
				}
			}
		}
		
		public function updatebroker($val) {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('main', 'refresh');
			} else {
				$this->Broker_model->updatebroker($val);
				redirect('broker', 'refresh');
			}
		}
		
		public function deletebroker($val) {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('main', 'refresh');
			} else {
				$this->Broker_model->deletebroker($val);
				redirect('broker', 'refresh');
			}
		}
	}
?>