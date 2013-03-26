<?php

class Provisions extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('provision_model');
		$this->load->model('sales_model');
		$this->load->model('companies_model');
		$this->load->library('form_validation');
		if($this->session->userdata('username') == "")
		{
			redirect('login');
		}		
		elseif($this->session->userdata('username') != "" && $this->session->userdata('user_role') == "admin")
		{
			redirect('admin');
		}
		elseif($this->session->userdata('username') != "" && $this->session->userdata('user_role') == "sales")
		{
			redirect('sales');
		}
		elseif($this->session->userdata('username') != "" && $this->session->userdata('user_role') == "billing")
		{
			redirect('billing');
		}

	}
	
	/**
	 * index
	 * Function to fetch the Active request for provision
	 * @access public
	 * return void
	*/
	public function index()
	{
		$arrData = array();	
		$provisionDetailsOfUser = array();	
		$arrData['activeDetails'] = $this->provision_model->get_active_details();

		//echo "<pre>";
		//print_r($arrData['activeDetails']);exit;

		$arrData['activeProvisionDetails'] =  $this->provision_model->get_start_complete_provision_details();

		//echo "<pre>";
		//print_r($arrData['activeProvisionDetails']);exit;
		
//		foreach($activeProvisionDetails as $listProvisionStartComplete => $listing){
//
//		
//		}

		
		foreach($arrData['activeDetails'] as $allActiveDetails)
		{
			$arrData['provisionDetailsofuser'] = $this->provision_model->get_start_complete_details_for_user($this->session->userdata('userid'),$allActiveDetails['id']);
			
			$provisionDetailsOfUser = $arrData['provisionDetailsofuser'];
		}
		
		$arrData['provisionActiveDetails'] = $provisionDetailsOfUser;

		$arrData['middle'] = 'provision/activerequest';
		$this->load->view('provision/template',$arrData);
	}

	public function edit_sales($id)
	{
		if($this->input->post() != "")
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
					$arrData['activeDetails'] = $this->provision_model->get_active_details();
					$arrData['middle'] = 'provision/activerequest';
					$this->load->view('provision/template',$arrData);
				}
			}
		
		else
		{
			$arrData['editDetails'] = $this->sales_model->get_details($id);
			$arrData['companyDetails'] = $this->companies_model->get_company_details();
			$arrData['locationDetails'] = $this->sales_model->get_location_details();
			$arrData['diskDetails'] = $this->sales_model->get_disk_details();
			$arrData['processorDetails'] = $this->sales_model->get_processor_details();
			$arrData['raidDetails'] = $this->sales_model->get_raid_details();
			$arrData['bandwidthDetails'] = $this->sales_model->get_bandwidth_details();
			$arrData['osDetails'] = $this->sales_model->get_os_details();
			$arrData['memoryDetails'] = $this->sales_model->get_memory_details();
			$arrData['controlpanelDetails'] = $this->sales_model->get_controlpanel_details();
			$arrData['firewallDetails'] = $this->sales_model->get_firewall_details();
			$arrData['mailserverDetails'] = $this->sales_model->get_mailserver_details();
			$arrData['antivirusDetails'] = $this->sales_model->get_antivirus_details();
			$arrData['middle'] = 'provision/editsales';
			$this->load->view('provision/template',$arrData);
		}
	}

	/**
	 * provision_new
	 * Function to store the new provision data
	 * @access public
	 * return void
	*/
	public function provision_new($id)
	{
		if($this->input->post() != "")
		{	
			$str_date = $this->input->post('start_time');
			$strt_date1 = explode('/',$str_date);
			$strt_dt = $strt_date1[2]."-".$strt_date1[0]."-".$strt_date1[1];
			$arrInsertData["startdate"] = $strt_dt;
			$arrInsertData["hostname"] = $this->input->post('hostname');
			$arrInsertData["primary_ip"] = $this->input->post('primaryip');
			$arrInsertData["misc_ips"] = $this->input->post('secondaryips');
			$arrInsertData["switchport_speed_id"] = $this->input->post('switch_port_speed');
			$arrInsertData["switch_port_no"] = $this->input->post('switch_port_no');
			$arrInsertData["lancard_speed_id"] = $this->input->post('lan_card_speed');
			$arrInsertData["controller_software"] = $this->input->post('controller_software');
			$arrInsertData["raid_plan_id"] = $this->input->post('raid_plan');
			$arrInsertData["firewall_rules"] = $this->input->post('firewall_rules');
			$arrInsertData["location"] = $this->input->post('firewall_stop');
			$arrInsertData["os_id"] = $this->input->post('os_install');
			$arrInsertData["antivirus_id"] = $this->input->post('antivirus');
			$arrInsertData["control_panel_id"] = $this->input->post('control_panel');
			$arrInsertData["db_id"] = $this->input->post('database');
			$arrInsertData["request_id"] = $id;
			$arrInsertData["remote_access"] = $this->input->post('monitoring');
			$arrInsertData["monitor_added"] = $this->input->post('monitoring');
			$arrInsertData["PRTG_created"] = $this->input->post('PRTG');
			$arrInsertData["PRTG_login"] = $this->input->post('prtg_login');
			$arrInsertData["PRTG_password"] = MD5($this->input->post('prtg_password'));
			$arrInsertData["PRTG_url"] = $this->input->post('prtg_url');
			$arrInsertData["server_updates"] = $this->input->post('server_updates');
			$arrInsertData["server_hardening"] = $this->input->post('server_hardening');
			$arrInsertData["client_details_FC"] = $this->input->post('client_details_fc');
			$arrInsertData["FC_login"] = $this->input->post('fc_login');
			$arrInsertData["FC_password"]= MD5($this->session->userdata('fc_password'));
			$arrInsertData["FC_url"] = $this->input->post('fc_url');
			$arrInsertData["server_details_FC"] = $this->input->post('server_details_fc');
			$arrInsertData["server_username"] = $this->input->post('server_username');
			$arrInsertData["server_password"] = MD5($this->input->post('server_password'));
			$arrInsertData["login_credentials"] = $this->input->post('login_credentials');
			$arrInsertData["miscellaneous"] = $this->input->post('miscellaneous');
			
			$arrInsertData["createdby_id"]= $this->session->userdata('userid');
			$arrUpdateData["active"]= "1";
			$date = $this->input->post('delivery_date2');
			$date1 = explode('/',$date);
			$dt = $date1[2]."-".$date1[0]."-".$date1[1];
			$arrInsertData["delivery_date"] = $dt;
			
			$insertedFlag = $this->provision_model->save_provision($arrInsertData);
			$updateRequestFlag = $this->provision_model->updateRequest($id,$arrUpdateData);
			if($insertedFlag)
			{
				
				$arrData['provision_start_complet'] = $this->provision_model->get_provision_start_complete($id);
				$arrInsertProvisionEndData["provision_end_time"] = date("Y-m-d H:i:s");
				$arrInsertProvisionEndData["provision_end_by_id"] = $this->session->userdata('userid');
				//$arrInsertProvisionEndData["request_id"] = $id;
				
				$updateProvisionFlag = $this->provision_model->update_provision_start_complete($arrInsertProvisionEndData,$id,$arrData['provision_start_complet'][0]['id']);

				$arrData['activeDetails'] = $this->provision_model->get_active_details();

				$arrData['activeProvisionDetails'] =  $this->provision_model->get_start_complete_provision_details();
				$arrData['middle'] = 'provision/activerequest';
				$this->load->view('provision/template',$arrData);
			}
		}
		else
		{
			$arrInsertProvisionEndData['provision_start_time'] = date("Y-m-d H:i:s");
			$arrInsertProvisionEndData['provision_start_by_id'] = $this->session->userdata('userid');
			$arrInsertProvisionEndData["request_id"] = $id;
			$arrInsertProvisionEndData["provision_end_time"] = '';
			$arrInsertProvisionEndData["provision_end_by_id"] = '';
			

			$insertProvisionFlag = $this->provision_model->save_provision_start_complete($arrInsertProvisionEndData);

			$arrData['provisionView'] = $this->provision_model->get_requestview($id);

			//echo "<pre>";
			//print_r($arrData['provisionView']);exit;
			$arrData['raidDetails'] = $this->sales_model->get_raid_details();
			$arrData['firewallDetails'] = $this->sales_model->get_firewall_details();
			$arrData['CSDetails'] = $this->sales_model->get_CS_details();
			$arrData['osDetails'] = $this->sales_model->get_os_details();
			$arrData['antivirusDetails'] = $this->sales_model->get_antivirus_details();
			$arrData['controlpanelDetails'] = $this->sales_model->get_controlpanel_details();
			$arrData['databaseDetails'] = $this->sales_model->get_database_details();
			$arrData['middle'] = 'provision/provision_new';
			$this->load->view('provision/template',$arrData);
		}
	}

	public function provisioned()
	{
		$arrData['provisionDetails'] = $this->provision_model->get_provisioned_details();
		$arrData['middle'] = 'provision/provisioned';
		$this->load->view('provision/template',$arrData);	
	}

	public function provision_status()
	{
		$arrData['provisionStatusDetails'] = $this->provision_model->get_provisioned_status_details();

		//echo "<pre>";
		//print_r($arrData['provisionStatusDetails']);exit;
		$arrData['middle'] = 'provision/provision_status';
		$this->load->view('provision/template',$arrData);
	}

	public function requestview($id)
	{
		$arrData['requestView'] = $this->provision_model->get_salesrequestview($id);

		$arrData['discDetails'] = $this->provision_model->get_discdetails($id);

		$arrData['middle'] = 'provision/requestview';
		$this->load->view('provision/template',$arrData);
	}

	public function provisionview($id)
	{
		$arrData['provisionView'] = $this->provision_model->get_provisionview($id);
		$arrData['middle'] = 'provision/provisionview';
		$this->load->view('provision/template',$arrData);
	}

	public function editprovision($id)
	{
		
		if(!empty($_POST))
		{
			
			$str_date = $this->input->post('start_time');
			$strt_dt = date('Y-m-d', strtotime($str_date));
			
			$arrUpdateData["startdate"] = $strt_dt;
			$arrUpdateData["hostname"] = $this->input->post('hostname');
			$arrUpdateData["primary_ip"] = $this->input->post('primaryip');
			$arrUpdateData["misc_ips"] = $this->input->post('secondaryips');
			$arrUpdateData["switchport_speed_id"] = $this->input->post('switch_port_speed');
			$arrUpdateData["switch_port_no"] = $this->input->post('switch_port_no');
			$arrUpdateData["lancard_speed_id"] = $this->input->post('lan_card_speed');
			$arrUpdateData["controller_software"] = $this->input->post('controller_software');
			$arrUpdateData["raid_plan_id"] = $this->input->post('raid_plan');
			$arrUpdateData["firewall_rules"] = $this->input->post('firewall_rules');
			$local_firewall_stopped = $this->input->post('firewall_stop');
			if($local_firewall_stopped==1)
			{
				$arrUpdateData["local_firewall_stopped"] = 1; 
			}
			$arrUpdateData["os_id"] = $this->input->post('os_install');
			$arrUpdateData["antivirus_id"] = $this->input->post('antivirus');
			$arrUpdateData["control_panel_id"] = $this->input->post('control_panel');
			$arrUpdateData["db_id"] = $this->input->post('database');
			$arrUpdateData["request_id"] = $id;
			$arrUpdateData["remote_access"] = $this->input->post('monitoring');
			$arrUpdateData["monitor_added"] = $this->input->post('monitoring');
			$arrUpdateData["PRTG_created"] = $this->input->post('PRTG');
			$arrUpdateData["PRTG_login"] = $this->input->post('prtg_login');
			$arrUpdateData["PRTG_password"] = $this->input->post('prtg_password');
			
			$arrUpdateData["PRTG_url"] = $this->input->post('prtg_url');
			$arrUpdateData["server_updates"] = $this->input->post('server_updates');
			$arrUpdateData["server_hardening"] = $this->input->post('server_hardening');
			$client_details_FC = $this->input->post('client_details_fc');
			if($client_details_FC==1)
			{
				$arrUpdateData["client_details_FC"] = 1; 
			}
			$arrUpdateData["FC_login"] = $this->input->post('fc_login');
			$arrUpdateData["FC_password"] = $this->input->post('fc_password');
			
			$arrUpdateData["FC_url"] = $this->input->post('fc_url');
			$server_details_FC = $this->input->post('server_details_fc');
			if($server_details_FC==1)
			{
				$arrUpdateData["server_details_FC"] = 1; 
			}
			$arrUpdateData["server_username"] = $this->input->post('server_username');
			$arrUpdateData["server_password"] = $this->input->post('server_password');
			
			$arrUpdateData["login_credentials"] = $this->input->post('login_credentials');
			$arrUpdateData["miscellaneous"] = $this->input->post('miscellaneous');
			
			$date = $this->input->post('delivery_date2');
			$dt = date('Y-m-d', strtotime($date));
			
			$arrUpdateData["delivery_date"] = $dt;
			//echo "<pre>";print_r($arrUpdateData);exit;
			$updateFlag = $this->provision_model->edit_provision_details($id,$arrUpdateData);
			
			if($updateFlag)
			{
				//echo $updateFlag;exit;
				$arrData['provisionDetails'] = $this->provision_model->get_provisioned_details();
				$arrData['middle'] = 'provision/provisioned';
				$this->load->view('provision/template',$arrData);	
			}
		}
		else
		{
			$arrData['provisionView'] = $this->provision_model->get_requestview($id);
			$arrData['switchportDetails'] = $this->sales_model->get_switchport_details();
			$arrData['lancardDetails'] = $this->sales_model->get_lancard_details();
			$arrData['CSDetails'] = $this->sales_model->get_CS_details();
			$arrData['firewallDetails'] = $this->sales_model->get_firewall_details();
			$arrData['osDetails'] = $this->sales_model->get_os_details();
			$arrData['antivirusDetails'] = $this->sales_model->get_antivirus_details();
			$arrData['raidDetails'] = $this->sales_model->get_raid_details();
			$arrData['dbDetails'] = $this->sales_model->get_db_details();
			$arrData['controlpanelDetails'] = $this->sales_model->get_controlpanel_details();
			$arrData['editDetails'] = $this->provision_model->get_edit_details($id);
			$arrData['middle'] = 'provision/edit_provision';
			$this->load->view('provision/template',$arrData);
		}
	}
}

?>
