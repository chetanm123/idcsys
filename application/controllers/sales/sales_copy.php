<?php
class Sales extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('sales_model');
		$this->load->model('companies_model');
		//$this->load->library('form_validation');
		if($this->session->userdata('username') == "")
		{
			redirect('login');
		}
//		elseif($this->session->userdata('username') != "" && $this->session->userdata('user_role') == "admin")
//		{
//			redirect('admin');
//		}
//		elseif($this->session->userdata('username') != "" && $this->session->userdata('user_role') == "sales")
//		{
//			redirect('sales');
//		}
//		elseif($this->session->userdata('username') != "" && $this->session->userdata('user_role') == "billing")
//		{
//			redirect('billing');
//		}
//		elseif($this->session->userdata('username') != "" && $this->session->userdata('user_role') == "provision")
//		{
//			redirect('provision/provisions');
//		}
	}

	public function index()
	{
		$arrData['middle'] = 'sales/addsales';
		$this->load->view('sales/template',$arrData);
	}

	public function create_sales()
	{
		$this -> output -> enable_profiler( TRUE );
		
		$this -> load -> library( 'form_validation' );
		$this -> form_validation -> set_error_delimiters('<span class="error">', '</span>');
		
		$this -> form_validation -> set_rules( 'contact_name', 'Contact Name', 'trim|required|alpha|min_length[3]|max_length[15]' );
		$this -> form_validation -> set_rules( 'contact_no', 'Contact No', 'trim|required|numeric|min_length[4]|max_length[15]' );
		$this -> form_validation -> set_rules( 'mobile_no', 'Mobile No', 'trim|required|numeric|min_length[4]|max_length[15]' );
		$this -> form_validation -> set_rules( 'company_nm', 'Company Name', 'trim|required|alpha|min_length[4]|max_length[15]' );
		$this -> form_validation -> set_rules( 'fax', 'Fax No', 'trim|required|numeric|min_length[4]|max_length[15]' );
		//$this -> form_validation -> set_rules( 'contact_no', 'Contact No', 'trim|required|numeric|min_length[4]|max_length[15]' );
		$this -> form_validation -> set_rules( 'email', 'Email address', 'trim|required|valid_email' );
		//$this -> form_validation -> set_rules( 'gender', 'Gender', 'required' );
		//$this -> form_validation -> set_rules( 'state', 'State', 'required' );
		$this -> form_validation -> set_rules( 'address', 'Address', 'required' );
		
		//Setting custom error messages
		$this -> form_validation -> set_message( 'min_length', 'Minimum length for %s is %s characters');
		$this -> form_validation -> set_message( 'max_length', 'Maximum length for %s is %s characters');

		if(!empty($_POST))
		{
			if ( $this -> form_validation -> run() === FALSE )
			{
				$arrData['middle'] = 'sales/addsales';
				$this->load->view('sales/template',$arrData);
			}
			else
			{
				$arrInsertData["company_id"] = $this->input->post('company_billed');
				$arrInsertData["contact_name"] = $this->input->post('contact_name');
				$arrInsertData["address"] = $this->input->post('address');
				$arrInsertData["contact_no"] = $this->input->post('contact_no');
				$arrInsertData["mobile_no"] = $this->input->post('mobile_no');
				$arrInsertData["company_name"] = $this->input->post('company_nm');
				$arrInsertData["email"] = $this->input->post('email');
				$arrInsertData["fax_no"] = $this->input->post('fax');
				$arrInsertData["location_id"] = $this->input->post('location');
				$arrInsertData["processor_id"] = $this->input->post('processor');
				$arrInsertData["raid_plan_id"] = $this->input->post('raid');
				$arrInsertData["no_of_ips"] = $this->input->post('no_of_ip');
				$arrInsertData["bandwidth_plan_id"] = $this->input->post('bandwidth');
				$arrInsertData["os_id"] = $this->input->post('op');
				$arrInsertData["memory_plan_id"] = $this->input->post('memory');
				$arrInsertData["user_os_licence"] = $this->input->post('licence_os');
				$arrInsertData["control_panel_id"] = $this->input->post('control_panel');
				$arrInsertData["firewall_plan_id"] = $this->input->post('firewall');
				$arrInsertData["mail_server_id"] = $this->input->post('mail_server');
				$arrInsertData["antivirus_id"] = $this->input->post('anti_virus');
				$arrInsertData["managed_services"] = $this->input->post('radiofield');
				$arrInsertData["no_of_drivers"] = $this->input->post('no_of_drivers');
				$arrInsertData["miscellaneous"] = $this->input->post('miscellaneous');
				$arrInsertData["createdby_id"]= $this->session->userdata('userid');
				$date = $this->input->post('delivery_date');
				$date1 = explode('/',$date);
				$dt = $date1[2]."-".$date1[0]."-".$date1[1];
				$arrInsertData["delivery_date"] = $dt;
				$insertedFlag = $this->sales_model->save_request($arrInsertData);
				if($insertedFlag)
				{
					$arrData['allDetails'] = $this->sales_model->get_all_details();
					$arrData['middle'] = 'sales/allsales';
					$this->load->view('sales/template',$arrData);
				}
			}
		}
		else
		{
			$arrData['companyDetails'] = $this->companies_model->get_company_details();
			$arrData['locationDetails'] = $this->sales_model->get_location_details();
			$arrData['processorDetails'] = $this->sales_model->get_processor_details();
			$arrData['raidDetails'] = $this->sales_model->get_raid_details();
			$arrData['bandwidthDetails'] = $this->sales_model->get_bandwidth_details();
			$arrData['osDetails'] = $this->sales_model->get_os_details();
			$arrData['memoryDetails'] = $this->sales_model->get_memory_details();
			$arrData['controlpanelDetails'] = $this->sales_model->get_controlpanel_details();
			$arrData['firewallDetails'] = $this->sales_model->get_firewall_details();
			$arrData['mailserverDetails'] = $this->sales_model->get_mailserver_details();
			$arrData['antivirusDetails'] = $this->sales_model->get_antivirus_details();
			$arrData['middle'] = 'sales/addsales';
			$this->load->view('sales/template',$arrData);
		}
	}

	public function active_sales()
	{
		$arrData['activeDetails'] = $this->sales_model->get_active_details();
		$arrData['middle'] = 'sales/activesales';
		$this->load->view('sales/template',$arrData);
	}

	public function edit_sales($id)
	{
		if(!empty($_POST))
		{
			$arrUpdateData["company_id"] = $this->input->post('company_billed');
			$arrUpdateData["contact_name"] = $this->input->post('contact_name');
			$arrUpdateData["address"] = $this->input->post('address');
			$arrUpdateData["contact_no"] = $this->input->post('contact_no');
			$arrUpdateData["mobile_no"] = $this->input->post('mobile_no');
			$arrUpdateData["company_name"] = $this->input->post('company_nm');
			$arrUpdateData["email"] = $this->input->post('email');
			$arrUpdateData["fax_no"] = $this->input->post('fax');
			$arrUpdateData["location_id"] = $this->input->post('location');
			$arrUpdateData["processor_id"] = $this->input->post('processor');
			$arrUpdateData["raid_plan_id"] = $this->input->post('raid');
			$arrUpdateData["no_of_ips"] = $this->input->post('no_of_ip');
			$arrUpdateData["bandwidth_plan_id"] = $this->input->post('bandwidth');
			$arrUpdateData["os_id"] = $this->input->post('op');
			$arrUpdateData["memory_plan_id"] = $this->input->post('memory');
			$arrUpdateData["user_os_licence"] = $this->input->post('licence_os');
			$arrUpdateData["control_panel_id"] = $this->input->post('control_panel');
			$arrUpdateData["firewall_plan_id"] = $this->input->post('firewall');
			$arrUpdateData["mail_server_id"] = $this->input->post('mail_server');
			$arrUpdateData["antivirus_id"] = $this->input->post('anti_virus');
			$arrUpdateData["managed_services"] = $this->input->post('radiofield');
			$arrUpdateData["no_of_drivers"] = $this->input->post('no_of_drivers');
			$arrUpdateData["miscellaneous"] = $this->input->post('miscellaneous');
			$arrUpdateData["createdby_id"]= $this->session->userdata('userid');
			$date = $this->input->post('delivery_date');
			$date1 = explode('/',$date);
			$dt = $date1[2]."-".$date1[0]."-".$date1[1];
			$arrUpdateData["delivery_date"] = $dt;
			$editFlag = $this->sales_model->update_request($arrUpdateData,$id);
			if($editFlag)
			{
				$arrData['allDetails'] = $this->sales_model->get_all_details();
				$arrData['middle'] = 'sales/allsales';
				$this->load->view('sales/template',$arrData);
			}
		}
		else
		{
			$arrData['editDetails'] = $this->sales_model->get_details($id);
			$arrData['companyDetails'] = $this->companies_model->get_company_details();
			$arrData['locationDetails'] = $this->sales_model->get_location_details();
			$arrData['processorDetails'] = $this->sales_model->get_processor_details();
			$arrData['raidDetails'] = $this->sales_model->get_raid_details();
			$arrData['bandwidthDetails'] = $this->sales_model->get_bandwidth_details();
			$arrData['osDetails'] = $this->sales_model->get_os_details();
			$arrData['memoryDetails'] = $this->sales_model->get_memory_details();
			$arrData['controlpanelDetails'] = $this->sales_model->get_controlpanel_details();
			$arrData['firewallDetails'] = $this->sales_model->get_firewall_details();
			$arrData['mailserverDetails'] = $this->sales_model->get_mailserver_details();
			$arrData['antivirusDetails'] = $this->sales_model->get_antivirus_details();
			//echo "<pre>";print_r($arrData['editDetails']);exit;
			$arrData['middle'] = 'sales/editsales';
			$this->load->view('sales/template',$arrData);
		}
	}

	public function previous_sales()
	{
		$arrData['previousDetails'] = $this->sales_model->get_previous_details();
		//echo "<pre>";
		//print_r($arrData['previousDetails']);exit;
		//foreach($arrData['previousDetails'] as $provisiondetails)
		//{
		$arrData['billingdetails'] = $this->sales_model->get_billing_details_for_bill($arrData['previousDetails'][0]['id']);
		//}
		//echo "<pre>";
		//print_r($arrData['billingdetails']);exit;
		$arrData['middle'] = 'sales/previoussales';
		$this->load->view('sales/template',$arrData);
	}

	public function all_sales()
	{
		$arrData['allDetails'] = $this->sales_model->get_all_details();
		$arrData['middle'] = 'sales/allsales';
		$this->load->view('sales/template',$arrData);
	}

	public function requestview($id)
	{
		$arrData['requestView'] = $this->sales_model->get_requestview($id);
		$arrData['middle'] = 'sales/requestview';
		$this->load->view('sales/template',$arrData);
	}


	public function requestbillview($id)
	{
		//echo $id;exit;
		$arrData = array();
		$arrData['billingrequestview'] = $this->sales_model->get_billingrequestview($id);
		//echo "<pre>";print_r($arrData['billingrequestview']);exit;
		$arrData['middle'] = 'sales/billview';
		$this->load->view('sales/template',$arrData);
	}

}
?>