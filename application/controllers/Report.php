<?php


class Report extends CI_Controller {
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
			
			$sources['getclient'] = $this->Report_model->getclient();
				
			// Setting General Information
			$this->load->view('home', $sources);
		}
	}
	
	public function selisihprocess() {
		if($this->session->userdata('adminLogin') != TRUE) {
			redirect('main', 'refresh');
		} else {
			if($this->input->post('submit')) {
				$configform = array(
					array('field'=>'email', 'name'=>'email', 'rules'=>'required'),
					array('field'=>'startdate', 'name'=>'Start Date', 'rules'=>'required'),
					array('field'=>'enddate', 'name'=>'End Date', 'rules'=>'required')
				);
				
				$this->form_validation->set_rules($configform);
				if($this->form_validation->run() != true) {
					$this->session->set_flashdata('errorselisih', '<font color="red">All field required1.</font>');
					redirect('report/selisih', 'refresh');
				} else {
					$_email = $this->security->xss_clean($this->input->post('email', true));
					$_startdate = $this->security->xss_clean($this->input->post('startdate', true)).' 00:00:01';
					$_enddate = $this->security->xss_clean($this->input->post('enddate', true)).' 23:59:59';
					
					$getclient = $this->Report_model->getclientfee($_email);
					foreach($getclient as $gc) {
						$sources['gemail'] = $gc->client_email;
						$_emails = $gc->client_email;
					}
					
					$sources['gstartdate'] = $_startdate;
					$sources['genddate'] = $_enddate;
					
					$sources['getorder'] = $this->Report_model->getorder($_email, $_startdate, $_enddate);
					
					$sources['title'] = 'Selisih per Email | System Information Administrator';
					$sources['name'] = 'Selisih per Email - '.$_emails;
					$sources['content'] = 'selisih';
						
					// Setting General Information
					$this->load->view('home', $sources);
				}
			} else {
				$this->session->set_flashdata('errorselisih', '<font color="red">All field required2.</font>');
				redirect('report/selisih', 'refresh');
			}
		}
	}
}