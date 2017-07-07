<?php
	class Main extends CI_Controller {
		public function __construct() {
			parent::__construct();
			$this->load->model('Main_model');
		}
		
		public function index() {
			$this->load->view('login');
		}
		
		public function login() {
			$this->load->view('login');
		}
		
		public function adminlogin() {
			/*$this->load->library('form_validation');
			$this->form_validation->set_rules('_email', 'Email', 'required|trim');
			$this->form_validation->set_rules('_passwd', 'Password', 'required|trim');
			
			if($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('loginadmin', '<div class="field">
							<div class="span">Sorry, Email and Password do not match</div></div>');
					redirect('main/login');
			} else {
				$_email = $this->security->xss_clean($this->input->post('_email', TRUE));
				$_passw = $this->security->xss_clean($this->input->post('_passwd', TRUE));
				$_epassw = sha1($_passw);
				$checking = $this->Main_model->get_login($_email, $_epassw);
				
				if($checking->num_rows() == 1) {
					foreach($checking->result() as $admin) {
						$_email = $admin->admin_email;
						$_userid = $admin->id_admin_record;
						$_full = $admin->admin_fullname;
						$_pers = $admin->admin_permission;
					}
					$data = array('adminLogin'=>TRUE, 'admid'=>$_userid, 'admemail'=>$_email, 'admfullname'=>$_full, 'admpermission'=>$_pers);
					$this->session->set_userdata($data);
					redirect('dashboard');
				} else {
					$this->session->set_flashdata('loginadmin', '<div class="field">
							<div class="span">Sorry, Email and Password do not match</div></div>');
					redirect('main/login');
				}
			}*/
			
			$_emailaddress = $this->security->xss_clean($this->input->post('emailaddress'));
			$_passwd = $this->security->xss_clean($this->input->post('passwd'));
			$_npassword = sha1($_passwd);
			
			$checking = $this->Main_model->get_login($_emailaddress, $_npassword);
				
			if($checking->num_rows() == 1) {
				foreach($checking->result() as $admin) {
					$_email = $admin->admin_email;
					$_userid = $admin->id_admin_record;
					$_full = $admin->admin_fullname;
					$_pers = $admin->admin_permission;
				}
				$data = array('adminLogin'=>TRUE, 'admid'=>$_userid, 'admemail'=>$_email, 'admfullname'=>$_full, 'admpermission'=>$_pers);
				$this->session->set_userdata($data);
				echo 'success';
			} else {
				echo 'wrong';
			}
		}
		
		public function logout() {
			$this->session->sess_destroy();
			redirect('main');
		}
	}
?>