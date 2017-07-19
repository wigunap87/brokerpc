<?php
	class Order extends CI_Controller {
		public function __construct() {
			parent::__construct();
			$this->load->model('Order_model');
			$this->load->model('Main_model');
			$this->load->library('pdfgenerator');
		}
		
		public function index() {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('main', 'refresh');
			} else {
				$sources['title'] = 'Order | System Information Administrator';
				$sources['name'] = 'Order';
				$sources['content'] = 'order';
				
				$sources['no'] = 1;
				$sources['showorder'] = $this->Order_model->get_order();
				$sources['getclient'] = $this->Order_model->getclient();
				
				// Setting General Information
				$this->load->view('home', $sources);
			}
		}
		
		public function orderlist() {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('main', 'refresh');
			} else {
				$arr = array();
				$getlist = $this->Order_model->getlist();
				foreach($getlist as $gl) {
					$ctitle = $gl->client_title;
					$email = $gl->client_email;
					$reknetbuy = $gl->client_rekrdi;
					$reknetsell = $gl->client_rekspv;
					$broker = $gl->broker_title;
					$brokerfeebuy = $gl->broker_fee1;
					$brokerfeesell = $gl->broker_fee2;
					$oid = $gl->id_order_record;
					$ocreatedate = $gl->order_createdate;
					$ostatus = $gl->order_status;
					
					$arr[] = array('client_title'=>$ctitle, 'client_email'=>$email, 'client_rekrdi'=>$reknetbuy, 'client_rekspv'=>$reknetsell, 'broker_title'=>$broker, 'broker_fee1'=>$brokerfeebuy, 'broker_fee2'=>$brokerfeesell, 'id_order_record'=>$oid, 'order_createdate'=>$ocreatedate, 'order_status'=>$ostatus, 'broker_code'=>$gl->broker_code);
				}
				$json_response = json_encode($arr);
				echo $json_response;
			}
		}
		
		public function addorder() {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('main', 'refresh');
			} else {
				$sources['title'] = 'Tambah Order | System Information Administrator';
				$sources['name'] = 'Tambah Order';
				$sources['content'] = 'addorder';
				
				$sources['getclient'] = $this->Order_model->getclient();
				// Setting General Information
				$this->load->view('home', $sources);
			}
		}
		
		public function addorder_process() {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('main', 'refresh');
			} else {
				if($this->input->post('submit')) {
					$configform = array(
						array('field'=>'client', 'name'=>'client', 'rules'=>'required'),
						array('field'=>'status', 'name'=>'status', 'rules'=>'required')
					);
					
					$this->form_validation->set_rules($configform);
					if($this->form_validation->run() != true) {
						$this->session->set_flashdata('errornotif', '<div class="errornotif">* Field required</div>');
						redirect('order/addorder/', 'refresh');
					} else {
						$_client = $this->security->xss_clean($this->input->post('client'));
						$_createby = $this->session->userdata('admid');
						$_createdate = date('Y-m-d H:i:s');
						$_status = $this->security->xss_clean($this->input->post('status'));
						
						$getclient = $this->Order_model->getclientfee($_client);
						foreach($getclient as $gc) {
							$feeclientbuy = $gc->client_feebuy;
							$feeclientsell = $gc->client_feesell;
							$feebrokerbuy = $gc->broker_fee1;
							$feebrokersell = $gc->broker_fee2;
						}
						
						$this->Order_model->add_order_process($_client, $feeclientbuy, $feeclientsell, $feebrokerbuy, $feebrokersell, $_createdate, $_createby, $_status);
						redirect('order', 'refresh');
					}
				} else {
					redirect('main', 'refresh');
				}
			}
		}
		
		public function vieworder($val) {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('main', 'refresh');
			} else {
				$sources['title'] = 'View Order | System Information Administrator';
				$sources['name'] = 'View Order';
				$sources['content'] = 'vieworder';
				
				$sources['show_order'] = $this->Order_model->show_order($val);
				$sources['getorderbuy'] = $this->Order_model->getdetail($val, $type="Buy");
				$sources['getordersell'] = $this->Order_model->getdetail($val, $type="Sell");
				
				// Setting General Information
				$this->load->view('home', $sources);
			}
		}
		
		public function editorder_process() {
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
						redirect('order/editorder/'.$this->input->post('getid'), 'refresh');
					} else {
						$_getid = $this->security->xss_clean($this->input->post('getid'));
						$_title = $this->security->xss_clean($this->input->post('title'));
						$_code = $this->security->xss_clean($this->input->post('code'));
						$_status = $this->security->xss_clean($this->input->post('status'));
						
						$this->Order_model->edit_order_process($_getid, $_title, $_code, $_status);
						redirect('order', 'refresh');
					}
				} else {
					redirect('main', 'refresh');
				}
			}
		}
		
		public function updateorder($val) {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('main', 'refresh');
			} else {
				$this->Order_model->updateorder($val);
				redirect('order', 'refresh');
			}
		}
		
		public function deleteorder($val) {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('main', 'refresh');
			} else {
				$this->Order_model->deleteorder($val);
				redirect('order', 'refresh');
			}
		}
		
		public function adddetail($val) {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('main', 'refresh');
			} else {
				$sources['title'] = 'Tambah Detail Order | System Information Administrator';
				$sources['name'] = 'Tambah DetailOrder';
				$sources['content'] = 'addorderdetail';
				
				$sources['show_order'] = $this->Order_model->show_order($val);
				$sources['showsaham'] = $this->Order_model->showsaham();
				
				// Setting General Information
				$this->load->view('home', $sources);
			}
		}
		
		public function addorderdetail_process() {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('main', 'refresh');
			} else {
				if($this->input->post('submit')) {
					$_getid = $this->security->xss_clean($this->input->post('orderid'));
					
					// Buy
					$_saham = $this->security->xss_clean($this->input->post('saham'));
					$_price = $this->security->xss_clean($this->input->post('price'));
					$_lot = $this->security->xss_clean($this->input->post('lot'));
					$_lembar = $this->security->xss_clean($this->input->post('lembar'));
					$_nominal = $this->security->xss_clean($this->input->post('nominal'));
					
					// SELL
					$_sahamsell = $this->security->xss_clean($this->input->post('sahamsell'));
					$_pricesell = $this->security->xss_clean($this->input->post('pricesell'));
					$_lotsell = $this->security->xss_clean($this->input->post('lotsell'));
					$_lembarsell = $this->security->xss_clean($this->input->post('lembarsell'));
					$_nominalsell = $this->security->xss_clean($this->input->post('nominalsell'));
					
					$_createdate = date('Y-m-d H:i:s');
					$_status = 'Publish';
					
					// Process BUY
					$_joinsaham = join(',', $_saham);
					if($_joinsaham != 0) {
						for($i=0; $i<count($_saham); $i++) {
							$this->Order_model->insert_orderdet($_getid, $_saham[$i], $_price[$i], $_lot[$i], $_lembar[$i], $_nominal[$i], $_type = 'Buy', $_createdate, $_status);
						}
					}
					
					// Process SELL
					$_joinsahamsell = join(',', $_sahamsell);
					if($_joinsahamsell != 0) {
						for($i=0; $i<count($_sahamsell); $i++) {
							$this->Order_model->insert_orderdet($_getid, $_sahamsell[$i], $_pricesell[$i], $_lotsell[$i], $_lembarsell[$i], $_nominalsell[$i], $_type = 'Sell', $_createdate, $_status);
						}
					}
					
					redirect('order/vieworder/'.$_getid, 'refresh');
				} else {
					redirect('main', 'refresh');
				}
			}
		}
		
		public function correction($val) {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('main', 'refresh');
			} else {
				$single = $this->Order_model->show_order($val);
				foreach($single as $si) :
					if($si->order_status == 'New Order') {
						$sources['title'] = 'Correction | System Information Administrator';
						$sources['name'] = 'Correction';
						$sources['content'] = 'correction';
						
						$sources['show_order'] = $this->Order_model->show_order($val);
						$sources['getorderbuy'] = $this->Order_model->getdetail($val, $type="Buy");
						$sources['getordersell'] = $this->Order_model->getdetail($val, $type="Sell");
						
						// Setting General Information
						$this->load->view('home', $sources);
					}
				endforeach;
			}
		}
		
		public function savestatus($val) {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('main', 'refresh');
			} else {
				$_status = 'Correction';
				$_bywho = $this->session->userdata('admid');
				$_date = date('Y-m-d H:i:s');
				$_bydate = date('Y-m-d H:i:s');
				
				$this->Order_model->update_status_correction($val, $_status, $_bywho, $_bydate, $_date);
				redirect('order/vieworder/'.$val, 'refresh');
			}
		}
		
		public function showprint($val) {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('main', 'refresh');
			} else {
				$sources['title'] = 'Print Order | System Information Administrator';
				$sources['name'] = 'Print Order';
				$sources['content'] = 'showprint';
						
				$sources['show_order'] = $this->Order_model->show_order($val);
				$sources['getorderbuy'] = $this->Order_model->getdetail($val, $type="Buy");
				$sources['getordersell'] = $this->Order_model->getdetail($val, $type="Sell");
						
				// Setting General Information
				$this->load->view('showprint', $sources);
				
			}
		}
		
		public function showpdf($val) {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('main', 'refresh');
			} else {
 
				$sources['show_order'] = $this->Order_model->show_order($val);
				$sources['getorderbuy'] = $this->Order_model->getdetail($val, $type="Buy");
				$sources['getordersell'] = $this->Order_model->getdetail($val, $type="Sell");
		 
				$html = $this->load->view('showprintpdf', $sources, true);
				
				$this->pdfgenerator->generate($html,'Print PDF');
			}
		}
	}
?>