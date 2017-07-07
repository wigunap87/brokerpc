<?php
	class Saham extends CI_Controller {
		public function __construct() {
			parent::__construct();
			$this->load->model('Saham_model');
			$this->load->model('Main_model');
		}
		
		public function index() {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('main', 'refresh');
			} else {
				$sources['title'] = 'Saham | System Information Administrator';
				$sources['name'] = 'Saham';
				$sources['content'] = 'saham';
				
				$sources['no'] = 1;
				$sources['showsaham'] = $this->Saham_model->get_saham();
				
				// Setting General Information
				$this->load->view('home', $sources);
			}
		}
		
		public function addsaham() {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('main', 'refresh');
			} else {
				$sources['title'] = 'Tambah Saham | System Information Administrator';
				$sources['name'] = 'Tambah Saham';
				$sources['content'] = 'addsaham';
				
				// Setting General Information
				$this->load->view('home', $sources);
			}
		}
		
		public function addsaham_process() {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('main', 'refresh');
			} else {
				if($this->input->post('submit')) {
					$configform = array(
						array('field'=>'title', 'name'=>'Title', 'rules'=>'required|max_length[100]'),
						array('field'=>'code', 'name'=>'Code', 'rules'=>'required|max_length[100]'),
						array('field'=>'status', 'name'=>'status', 'rules'=>'required')
					);
					
					$this->form_validation->set_rules($configform);
					if($this->form_validation->run() != true) {
						$this->session->set_flashdata('errornotif', '<div class="errornotif">* Field required</div>');
						redirect('saham/addsaham/', 'refresh');
					} else {
						$_title = $this->security->xss_clean($this->input->post('title'));
						$_code = $this->security->xss_clean($this->input->post('code'));
						$_createdate = date('Y-m-d H:i:s');
						$_status = $this->security->xss_clean($this->input->post('status'));
						
						$this->Saham_model->add_saham_process($_title, $_code, $_createdate, $_status);
						redirect('saham', 'refresh');
					}
				} else {
					redirect('main', 'refresh');
				}
			}
		}
		
		public function editsaham($val) {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('main', 'refresh');
			} else {
				$sources['title'] = 'Edit Saham | System Information Administrator';
				$sources['name'] = 'Edit Saham';
				$sources['content'] = 'editsaham';
				
				$sources['show_saham'] = $this->Saham_model->show_saham($val);
				
				// Setting General Information
				$this->load->view('home', $sources);
			}
		}
		
		public function editsaham_process() {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('main', 'refresh');
			} else {
				if($this->input->post('submit')) {
					$configform = array(
						array('field'=>'title', 'name'=>'Title', 'rules'=>'required|max_length[100]'),
						array('field'=>'code', 'name'=>'Code', 'rules'=>'required|max_length[100]'),
						array('field'=>'status', 'name'=>'status', 'rules'=>'required')
					);
					
					$this->form_validation->set_rules($configform);
					if($this->form_validation->run() != true) {
						$this->session->set_flashdata('errornotif', '<div class="errornotif">* Field required</div>');
						redirect('saham/editsaham/'.$this->input->post('getid'), 'refresh');
					} else {
						$_getid = $this->security->xss_clean($this->input->post('getid'));
						$_title = $this->security->xss_clean($this->input->post('title'));
						$_code = $this->security->xss_clean($this->input->post('code'));
						$_status = $this->security->xss_clean($this->input->post('status'));
						
						$this->Saham_model->edit_saham_process($_getid, $_title, $_code, $_status);
						redirect('saham', 'refresh');
					}
				} else {
					redirect('main', 'refresh');
				}
			}
		}
		
		public function updatesaham($val) {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('main', 'refresh');
			} else {
				$this->Saham_model->updatesaham($val);
				redirect('saham', 'refresh');
			}
		}
		
		public function deletesaham($val) {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('main', 'refresh');
			} else {
				$this->Saham_model->deletesaham($val);
				redirect('saham', 'refresh');
			}
		}
	}
?>