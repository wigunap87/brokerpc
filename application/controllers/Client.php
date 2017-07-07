<?php
	class Client extends CI_Controller {
		public function __construct() {
			parent::__construct();
			$this->load->model('Client_model');
			$this->load->model('Main_model');
		}
		
		public function index() {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('main', 'refresh');
			} else {
				$sources['title'] = 'Client | System Information Administrator';
				$sources['name'] = 'Client';
				$sources['content'] = 'client';
				
				$this->load->library('Pagination');
				$page = $this->uri->segment(3);
				$limit = 20;
				if(!$page):
					$offset=0;
				else:
					$offset = $page;
				endif;
				$sources['showclient'] = $this->Client_model->get_client($limit, $offset);
				$tot_hal = $this->Client_model->get_client_pagination();
				$config['base_url'] = base_url() . 'orders/index';
				$sources['no'] = $offset + 1;
				$config['total_rows'] = $tot_hal->num_rows();
				$config['per_page'] = $limit;
				$config['uri_segment'] = 3;
				$config['first_link'] = 'First';
				$config['last_link'] = 'Last';
				$config['next_link'] = 'Next';
				$config['prev_link'] = 'Prev';
				$this->pagination->initialize($config);
				
				$sources['paginator'] = $this->pagination->create_links();
				// Setting General Information
				$this->load->view('home', $sources);
			}
		}
		
		public function addclient() {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('main', 'refresh');
			} else {
				$sources['title'] = 'Tambah Client | System Information Administrator';
				$sources['name'] = 'Tambah Client';
				$sources['content'] = 'addclient';
				
				$sources['getcategory'] = $this->Client_model->gettable($tables='category');
				$sources['getbroker'] = $this->Client_model->gettable($tabless='broker');
				
				// Setting General Information
				$this->load->view('home', $sources);
			}
		}
		
		public function addclient_process() {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('main', 'refresh');
			} else {
				if($this->input->post('submit')) {
					$configform = array(
						array('field'=>'category', 'name'=>'Category', 'rules'=>'required'),
						array('field'=>'broker', 'name'=>'Broker', 'rules'=>'required'),
						array('field'=>'title', 'name'=>'Title', 'rules'=>'required|max_length[100]'),
						array('field'=>'address', 'name'=>'Address', 'rules'=>'required'),
						array('field'=>'phone', 'name'=>'Phone', 'rules'=>'required'),
						array('field'=>'email', 'name'=>'Email', 'rules'=>'required|valid_email|is_unique[client_record.client_email]'),
						array('field'=>'feebuy', 'name'=>'Fee Buy', 'rules'=>'required'),
						array('field'=>'feesell', 'name'=>'Fee Sell', 'rules'=>'required'),
						array('field'=>'status', 'name'=>'status', 'rules'=>'required')
					);
					
					$this->form_validation->set_rules($configform);
					if($this->form_validation->run() != true) {
						$this->session->set_flashdata('errornotif', '<div class="errornotif">* Field required or Email address not UNIQUE</div>');
						redirect('client/addclient/', 'refresh');
					} else {
						$_category = $this->security->xss_clean($this->input->post('category'));
						$_broker = $this->security->xss_clean($this->input->post('broker'));
						$_title = $this->security->xss_clean($this->input->post('title'));
						$_address = $this->security->xss_clean($this->input->post('address'));
						$_phone = $this->security->xss_clean($this->input->post('phone'));
						$_email = $this->security->xss_clean($this->input->post('email'));
						$_rekrdi = $this->security->xss_clean($this->input->post('rekrdi'));
						$_rekspv = $this->security->xss_clean($this->input->post('rekspv'));
						$_feebuy = $this->security->xss_clean($this->input->post('feebuy'));
						$_feesell = $this->security->xss_clean($this->input->post('feesell'));
						$_notes = $this->security->xss_clean($this->input->post('notes'));
						$_createdate = date('Y-m-d H:i:s');
						$_status = $this->security->xss_clean($this->input->post('status'));
						
						$this->Client_model->add_client_process($_category, $_broker, $_title, $_address, $_phone, $_email, $_rekrdi, $_rekspv, $_feebuy, $_feesell, $_notes, $_createdate, $_status);
						redirect('client', 'refresh');
					}
				} else {
					redirect('main', 'refresh');
				}
			}
		}
		
		public function editclient($val) {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('main', 'refresh');
			} else {
				$sources['title'] = 'Edit Client | System Information Administrator';
				$sources['name'] = 'Edit Client';
				$sources['content'] = 'editclient';
				
				$sources['show_client'] = $this->Client_model->show_client($val);
				$sources['getcategory'] = $this->Client_model->gettable($tables='category');
				$sources['getbroker'] = $this->Client_model->gettable($tabless='broker');
				
				// Setting General Information
				$this->load->view('home', $sources);
			}
		}
		
		public function editclient_process() {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('main', 'refresh');
			} else {
				if($this->input->post('submit')) {
					
					$_getid = $this->security->xss_clean($this->input->post('getid'));
					$_category = $this->security->xss_clean($this->input->post('category'));
					$_broker = $this->security->xss_clean($this->input->post('broker'));
					$_title = $this->security->xss_clean($this->input->post('title'));
					$_address = $this->security->xss_clean($this->input->post('address'));
					$_phone = $this->security->xss_clean($this->input->post('phone'));
					$_email = $this->security->xss_clean($this->input->post('email'));
					$_rekrdi = $this->security->xss_clean($this->input->post('rekrdi'));
					$_rekspv = $this->security->xss_clean($this->input->post('rekspv'));
					$_feebuy = $this->security->xss_clean($this->input->post('feebuy'));
					$_feesell = $this->security->xss_clean($this->input->post('feesell'));
					$_notes = $this->security->xss_clean($this->input->post('notes'));
					$_status = $this->security->xss_clean($this->input->post('status'));
						
					$this->Client_model->edit_client_process($_getid, $_category, $_broker, $_title, $_address, $_phone, $_email, $_rekrdi, $_rekspv, $_feebuy, $_feesell, $_notes, $_status);
					redirect('client', 'refresh');
					
				} else {
					redirect('main', 'refresh');
				}
			}
		}
		
		public function updateclient($val) {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('main', 'refresh');
			} else {
				$this->Client_model->updateclient($val);
				redirect('client', 'refresh');
			}
		}
		
		public function deleteclient($val) {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('main', 'refresh');
			} else {
				$this->Client_model->deleteclient($val);
				redirect('client', 'refresh');
			}
		}
	}
?>