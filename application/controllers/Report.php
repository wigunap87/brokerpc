<?php


class Order extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('Report_model');
		$this->load->model('Main_model');
	}
	
	public function selisih() {
		if($this->session->userdata('adminLogin') != TRUE) {
			redirect('main', 'refresh');
		} else {
			$sources['title'] = 'Selisih per Email Filter | System Information Administrator';
			$sources['name'] = 'Selisih per Email';
			$sources['content'] = 'selisihform';
				
			// Setting General Information
			$this->load->view('home', $sources);
		}
	}
	
	public function selisihprocess() {
		if($this->session->userdata('adminLogin') != TRUE) {
			redirect('main', 'refresh');
		} else {
			if($this->input->post('submit')) {
				$configemail = array(
					array('field'=>'email', 'name'=>'email', 'rules'=>'required|valid_email'),
					array('field'=>'startdate', 'name'=>'Start Date', 'rules'=>'required'),
					array('field'=>'enddate', 'name'=>'End Date', 'rules'=>'required')
				);
				
				$this->form_validation->set_rules($configform);
				if($this->form_validation->run() != true) {
					$this->session->set_flashdata('errorselisih', '<font color="red">All field required.</font>');
					redirect('report/selisih', 'refresh');
				} else {
					$_email = $this->security->xss_clean($this->input->post('email', true));
					$_startdate = $this->security->xss_clean($this->input->post('startdate', true)).' 00:00:01';
					$_enddate = $this->security->xss_clean($this->input->post('enddate', true)).' 23:59:59';
					
					$sourcse['gemail'] = $_email;
					$sourcse['gstartdate'] = $_startdate;
					$sourcse['genddate'] = $_enddate;
					
					$sources['getorder'] = $this->Report_model->getorder($_email, $_startdate, $_enddate);
					
					$sources['title'] = 'Selisih per Email | System Information Administrator';
					$sources['name'] = 'Selisih per Email - '.$_email;
					$sources['content'] = 'selisih';
						
					// Setting General Information
					$this->load->view('home', $sources);
				}
			} else {
				$this->session->set_flashdata('errorselisih', '<font color="red">All field required.</font>');
				redirect('report/selisih', 'refresh');
			}
		}
	}
}