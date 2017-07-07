<?php
	class Admin extends CI_Controller {
	
		function __construct() {
			parent::__construct();
			$this->load->model('Admin_model');
			$this->load->model('Main_model');
		}
		
		public function index() {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('main', 'refresh');
			} else {
				$sources['content'] = 'admin';
				$this->load->library('Pagination');
				$page = $this->uri->segment(3);
				$limit = 20;
				if(!$page):
					$offset = 0;
				else:
					$offset = $page;
				endif;
				$sources['getadmin'] = $this->Admin_model->get_model($limit, $offset);
				$tot_hal = $this->db->get('admin_record');
				$config['base_url'] = base_url() . 'admin/index';
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
				$sources['name'] = 'Manage Admin';
				$sources['title'] = 'Manage Admin | System Information Administrator';
				
				// Setting General Information
				$this->load->view('home', $sources);
			}
		}
		
		public function addadmin() {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('main', 'refresh');
			} else {
				$sources['content'] = 'addadmin';
				$sources['name'] = 'Add Admin';
				$sources['title'] = 'Add Admin | System Information Administrator';
				
				// Setting General Information
				$this->load->view('home', $sources);
			}
		}
		
		public function addadmin_process() {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('main', 'refresh');
			} else {
				if($this->input->post('submit')) {
					$_fullname = $this->security->xss_clean($this->input->post('fullname', TRUE));
					$_phone = $this->security->xss_clean($this->input->post('phone', TRUE));
					$_address = htmlentities($this->security->xss_clean($this->input->post('address', TRUE)));
					$_position = $this->security->xss_clean($this->input->post('position', TRUE));
					$_email = $this->security->xss_clean($this->input->post('email', TRUE));
					$_password = $this->security->xss_clean($this->input->post('password', TRUE));
					$_passwd = sha1($_password);
					$_permission = $this->security->xss_clean($this->input->post('permission', TRUE));
					$_status = $this->security->xss_clean($this->input->post('status', TRUE));
					$_createdate = date('Y-m-d H:i:s');
					
					$this->Admin_model->add_admin_process($_fullname, $_phone, $_address, $_position, $_email, $_passwd, $_permission, $_createdate, $_status);
					redirect('admin', 'refresh');
				} else {
					redirect('main', 'refresh');
				}
			}
		}
		
		public function editadmin($id) {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('main', 'refresh');
			} else {
				$sources['content'] = 'editadmin';
				$sources['name'] = 'Edit Admin';
				$sources['title'] = 'Edit Admin | System Information Administrator';
				$sources['editadmin'] = $this->Admin_model->show_getadmin($id);
				
				// Setting General Information
				$this->load->view('home', $sources);
			}
		}
		
		public function editadmin_process() {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('main', 'refresh');
			} else {
				if($this->input->post('submit')) {
					$_getid = $this->security->xss_clean($this->input->post('getid', TRUE));
					$_fullname = $this->security->xss_clean($this->input->post('fullname', TRUE));
					$_phone = $this->security->xss_clean($this->input->post('phone', TRUE));
					$_address = htmlentities($this->security->xss_clean($this->input->post('address', TRUE)));
					$_position = $this->security->xss_clean($this->input->post('position', TRUE));
					$_email = $this->security->xss_clean($this->input->post('email', TRUE));
					$_password = $this->security->xss_clean($this->input->post('password', TRUE));
					$_permission = $this->security->xss_clean($this->input->post('permission', TRUE));
					$_status = $this->security->xss_clean($this->input->post('status', TRUE));
					
					if(empty($_password)) {
						$quer = $this->Admin_model->show_getadmin($_getid);
						foreach($quer as $query) {
							$_passwd = $query->admin_password;
						}
					} else {
						$_passwd = sha1($_password);
					}
					$this->Admin_model->edit_admin_process($_getid, $_fullname, $_phone, $_address, $_position, $_email, $_passwd, $_permission, $_status);
					redirect('admin');
				} else {
					redirect('main', 'refresh');
				}
			}
		}
		
		public function update_admin($id) {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('main', 'refresh');
			} else {
				$this->Admin_model->update_admin($id);
				redirect('admin');
			}
		}
		
		public function deleteadmin($id) {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('main', 'refresh');
			} else {
 				$this->Admin_model->delete_admin($id);
				redirect('admin');
			}
		}
	}
?>