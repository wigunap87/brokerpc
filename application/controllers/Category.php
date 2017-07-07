<?php
	class Category extends CI_Controller {
		public function __construct() {
			parent::__construct();
			$this->load->model('Category_model');
			$this->load->model('Main_model');
		}
		
		public function index() {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('main', 'refresh');
			} else {
				$sources['title'] = 'Category | System Information Administrator';
				$sources['name'] = 'Category';
				$sources['content'] = 'category';
				
				$sources['no'] = 1;
				$sources['showcategory'] = $this->Category_model->get_category();
				
				// Setting General Information
				$this->load->view('home', $sources);
			}
		}
		
		public function addcategory() {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('main', 'refresh');
			} else {
				$sources['title'] = 'Tambah Broker | System Information Administrator';
				$sources['name'] = 'Tambah Broker';
				$sources['content'] = 'addcategory';
				
				// Setting General Information
				$this->load->view('home', $sources);
			}
		}
		
		public function addcategory_process() {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('main', 'refresh');
			} else {
				if($this->input->post('submit')) {
					$configform = array(
						array('field'=>'title', 'name'=>'title', 'rules'=>'required|max_length[100]'),
						array('field'=>'status', 'name'=>'status', 'rules'=>'required')
					);
					
					$this->form_validation->set_rules($configform);
					if($this->form_validation->run() != true) {
						$this->session->set_flashdata('errornotif', '<div class="errornotif">* Field required</div>');
						redirect('category/addcategory/', 'refresh');
					} else {
						$_title = $this->security->xss_clean($this->input->post('title'));
						$_status = $this->security->xss_clean($this->input->post('status'));
						
						$this->Category_model->add_category_process($_title, $_status);
						redirect('category', 'refresh');
					}
				} else {
					redirect('main', 'refresh');
				}
			}
		}
		
		public function editcategory($val) {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('main', 'refresh');
			} else {
				$sources['title'] = 'Edit Broker | System Information Administrator';
				$sources['name'] = 'Edit Broker';
				$sources['content'] = 'editcategory';
				
				$sources['show_category'] = $this->Category_model->show_category($val);
				
				// Setting General Information
				$this->load->view('home', $sources);
			}
		}
		
		public function editcategory_process() {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('main', 'refresh');
			} else {
				if($this->input->post('submit')) {
					$configform = array(
						array('field'=>'title', 'name'=>'title', 'rules'=>'required|max_length[100]'),
						array('field'=>'status', 'name'=>'status', 'rules'=>'required')
					);
					
					$this->form_validation->set_rules($configform);
					if($this->form_validation->run() != true) {
						$this->session->set_flashdata('errornotif', '<div class="errornotif">* Field required</div>');
						redirect('category/editcategory/'.$this->input->post('getid'), 'refresh');
					} else {
						$_getid = $this->security->xss_clean($this->input->post('getid'));
						$_title = $this->security->xss_clean($this->input->post('title'));
						$_status = $this->security->xss_clean($this->input->post('status'));
											
						$this->Category_model->edit_category_process($_getid, $_title, $_status);
						redirect('category', 'refresh');
					}
				} else {
					redirect('main', 'refresh');
				}
			}
		}
		
		public function updatecategory($val) {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('main', 'refresh');
			} else {
				$this->Category_model->updatecategory($val);
				redirect('category', 'refresh');
			}
		}
		
		public function deletecategory($val) {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('main', 'refresh');
			} else {
				$this->Category_model->deletecategory($val);
				redirect('category', 'refresh');
			}
		}
	}
?>