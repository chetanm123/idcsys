<?php
class Sales extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('sales_model');
		$this->load->model('billing_model');
		$this->load->model('companies_model');
		$this->load->model('provision_model');
		$this->load->library('form_validation');
		if($this->session->userdata('username') == "")
		{
			redirect('login');
		}
		if($this->session->userdata('username') != "" && $this->session->userdata('user_role') == "admin")
		{
			redirect(base_url().'admin','refresh');
		}
		elseif($this->session->userdata('username') != "" && $this->session->userdata('user_role') == "billing")
		{
			redirect('billing');
		}
		elseif($this->session->userdata('username') != "" && $this->session->userdata('user_role') == "provision")
		{
			redirect('provision/provisions');
		}
	}

	public function index()
	{
		$arrData['middle'] = 'sales/addsales';
		$this->load->view('sales/template',$arrData);
	}

	public function create_sales()
	{
		if($this->input->post() != "")
		{
			//echo "<pre>";print_r($_POST);exit;
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
			$arrInsertData["disc_id"] = $this->input->post('disk');
			$arrInsertData["raid_plan_id"] = $this->input->post('raid');
			$arrInsertData["no_of_ips"] = $this->input->post('no_of_ip');
			$arrInsertData["bandwidth_plan_id"] = $this->input->post('bandwidth');
			$arrInsertData["os_id"] = $this->input->post('op');
			$arrInsertData["memory_size"] = $this->input->post('memory');
			$arrInsertData["user_os_licence"] = $this->input->post('licence_os');
			$arrInsertData["control_panel_id"] = $this->input->post('control_panel');
			$arrInsertData["firewall_plan_id"] = $this->input->post('firewall');
			$arrInsertData["mail_server_id"] = $this->input->post('mail_server');
			$arrInsertData["antivirus_id"] = $this->input->post('anti_virus');
			$arrInsertData["managed_services"] = $this->input->post('radiofield');
			$arrInsertData["no_of_drivers"] = $this->input->post('no_of_drivers');
			$arrInsertData["miscellaneous"] = $this->input->post('miscellaneous');
			$arrInsertData["createdby_id"]= $this->session->userdata('userid');
			$arrInsertData["billing_cycle_id"]= $this->session->userdata('billingcycle');
			
			$date = $this->input->post('delivery_date');
			$date1 = explode('/',$date);
			$dt = $date1[2]."-".$date1[0]."-".$date1[1];
			$arrInsertData["delivery_date"] = $dt;
			
			$dateBillingstart = $this->input->post('billingstart');
			$dateBillingstart1 = explode('/',$dateBillingstart);
			$dtBillingStart = $dateBillingstart1[2]."-".$dateBillingstart1[0]."-".$dateBillingstart1[1];
			$arrInsertData["billing_start"] = $dtBillingStart;
			
			$arrInsertData["setup_charge"] = $this->input->post('setupcharge');
			$arrInsertData["setup_charge_currency"] = $this->input->post('setupcurrency');
			$arrInsertData["recurring_amount"] = $this->input->post('recurringamount');
			$arrInsertData["recurring_amount_currency"] = $this->input->post('recurringamountcurrency');
			$arrInsertData["contract_period_id"] = $this->input->post('contractperiod');

			$insertedFlag = $this->sales_model->save_request($arrInsertData);
			$ins_id = $this->db->insert_id();
			
			$cnt = count($_POST["disk_id"]);
			//echo $cnt;exit;
			for($i=0;$i<$cnt;$i++)
			{
				$dataRequestDisc["disc_id"] = $_POST["disk_id"][$i];
				$dataRequestDisc["quantity"] = $_POST["qty"][$i];
				$dataRequestDisc["raid_id"] = $_POST["raid1"][$i];
				$dataRequestDisc["size"] = $_POST["size"][$i];
				$dataRequestDisc["request_id"] = $ins_id;
				$insertedDisc = $this->sales_model->save_request_disc($dataRequestDisc);
				//echo $insertedDisc;exit;
			}
			
			if($insertedFlag)
			{
				$arrData['allDetails'] = $this->sales_model->get_all_details();
				$arrData['middle'] = 'sales/allsales';
				$this->load->view('sales/template',$arrData);
			}

			
		}
		
		else
		{
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

			

			$arrData['contract_period'] = $this->billing_model->get_all_contract_period();
			$arrData['packages'] = $this->billing_model->get_all_packages();
			$arrData['billing_rep'] = $this->billing_model->get_all_billing_rep();
			$arrData['billingcycle'] = $this->billing_model->get_all_billingcycle();


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
				$arrUpdateData["memory_size"] = $this->input->post('memory');
				$arrUpdateData["user_os_licence"] = $this->input->post('licence_os');
				$arrUpdateData["control_panel_id"] = $this->input->post('control_panel');
				$arrUpdateData["firewall_plan_id"] = $this->input->post('firewall');
				$arrUpdateData["mail_server_id"] = $this->input->post('mail_server');
				$arrUpdateData["antivirus_id"] = $this->input->post('anti_virus');
				$arrUpdateData["managed_services"] = $this->input->post('radiofield');
				$arrUpdateData["no_of_drivers"] = $this->input->post('no_of_drivers');
				$arrUpdateData["miscellaneous"] = $this->input->post('miscellaneous');
				$arrUpdateData["createdby_id"]= $this->session->userdata('userid');
				$arrUpdateData["billing_cycle_id"]= $this->input->post('billingcycle');
				$date = $this->input->post('delivery_date');
				$date1 = explode('/',$date);
				$dt = $date1[2]."-".$date1[0]."-".$date1[1];
				$arrUpdateData["delivery_date"] = $dt;

				$dateBillingstart = $this->input->post('billingstart');
				$dateBillingstart1 = explode('/',$dateBillingstart);
				$dtBillingStart = $dateBillingstart1[2]."-".$dateBillingstart1[0]."-".$dateBillingstart1[1];
				$arrInsertData["billing_start"] = $dtBillingStart;
				//$arrInsertData["request_id"] = $id;
				$arrUpdateData["setup_charge"] = $this->input->post('setupcharge');
				$arrUpdateData["setup_charge_currency"] = $this->input->post('setupcurrency');
				$arrUpdateData["recurring_amount"] = $this->input->post('recurringamount');
				$arrUpdateData["recurring_amount_currency"] = $this->input->post('recurringamountcurrency');
				$arrUpdateData["contract_period_id"] = $this->input->post('contractperiod');

				$editFlag = $this->sales_model->update_request($arrUpdateData,$id);
				//$upd_id = $this->db->last_update_id();echo $upd_id;exit;
				$qty = count($_POST["qty"]);
				$cnt = count($_POST["id"]);
				//echo $cnt;exit;
				if($qty==$cnt)
				{	
				for($i=0;$i<$cnt;$i++)
				{
					$dataRequestDisc["quantity"] = $_POST["qty"][$i];
					$dataRequestDisc["raid_id"] = $_POST["raid1"][$i];
					$dataRequestDisc["size"] = $_POST["size"][$i];
					$dataRequestDisc["request_id"] = $_POST["request_id"][$i];
					$insertedDisc = $this->sales_model->update_request_disc($dataRequestDisc,$_POST["id"][$i]);
					
				}
				}
				else
				{	
					$req_id =  $_POST["request_id"][0];
					$p=0;
					for($i=0;$i<$qty;$i++)
					{
						if($i>=$cnt)
						{
							$dataRequestDisc["disc_id"] = $_POST["disk_id"][$p];
							$dataRequestDisc["quantity"] = $_POST["qty"][$i];
							$dataRequestDisc["raid_id"] = $_POST["raid1"][$i];
							$dataRequestDisc["size"] = $_POST["size"][$i];
							$dataRequestDisc["request_id"] = $req_id;
							//echo "<pre>";print_r($dataRequestDisc);exit;
							$insertedDisc = $this->sales_model->save_request_disc($dataRequestDisc);
							$p++;
						}
						else
						{
							$dataRequestDisc["quantity"] = $_POST["qty"][$i];
							$dataRequestDisc["raid_id"] = $_POST["raid1"][$i];
							$dataRequestDisc["size"] = $_POST["size"][$i];
							$dataRequestDisc["request_id"] = $_POST["request_id"][$i];
							$insertedDisc = $this->sales_model->update_request_disc($dataRequestDisc,$_POST["id"][$i]);
						}
					}
				}
				if($editFlag)
				{
					$arrData['allDetails'] = $this->sales_model->get_all_details();
					$arrData['middle'] = 'sales/allsales';
					$this->load->view('sales/template',$arrData);
				}
			}
		
		else
		{
			//echo $id;exit;
			$arrData['editDetails'] = $this->sales_model->get_details($id);
			//echo "<pre>";print_r($arrData['editDetails']);
			$arrData['editRequestDisk'] = $this->sales_model->get_request_disk($id);
			$arrData['editRequestmemory'] = $this->sales_model->get_request_memory($id);
			//echo "<pre>";print_r($arrData['editRequestDisk']);
			//echo "<pre>";print_r($arrData['editRequestmemory']);
			//echo "<pre>";print_r($arrData['editDetails']);
			//exit;
			$arrData['companyDetails'] = $this->companies_model->get_company_details();
			$arrData['locationDetails'] = $this->sales_model->get_location_details();
			$arrData['processorDetails'] = $this->sales_model->get_processor_details();
			$arrData['raidDetails'] = $this->sales_model->get_raid_details();
			$arrData['diskDetails'] = $this->sales_model->get_disk_details();
			$arrData['bandwidthDetails'] = $this->sales_model->get_bandwidth_details();
			$arrData['osDetails'] = $this->sales_model->get_os_details();
			$arrData['memoryDetails'] = $this->sales_model->get_memory_details();
			$arrData['controlpanelDetails'] = $this->sales_model->get_controlpanel_details();
			$arrData['firewallDetails'] = $this->sales_model->get_firewall_details();
			$arrData['mailserverDetails'] = $this->sales_model->get_mailserver_details();
			$arrData['antivirusDetails'] = $this->sales_model->get_antivirus_details();

			$arrData['contract_period'] = $this->billing_model->get_all_contract_period();

			//echo "<pre>";print_r($arrData['contract_period']);exit;
			$arrData['packages'] = $this->billing_model->get_all_packages();
			$arrData['billing_rep'] = $this->billing_model->get_all_billing_rep();
			$arrData['billingcycle'] = $this->billing_model->get_all_billingcycle();

			$arrData['middle'] = 'sales/editsales';
			$this->load->view('sales/template',$arrData);
		}
	}

	public function previous_sales()
	{
		$arrData['previousDetails'] = $this->sales_model->get_previous_details();
		//print_r($arrData['previousDetails']);exit;
		
		if(!empty($arrData['previousDetails']))
		{
			$arrData['billingdetails'] = $this->sales_model->get_billing_details_for_bill($arrData['previousDetails'][0]['id']);
		}
		
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

		$arrData['discDetails'] = $this->provision_model->get_discdetails($id);

		$arrData['middle'] = 'sales/requestview';
		$this->load->view('sales/template',$arrData);
	}

	public function provisionview($id)
	{
		//echo $id;exit;
		$arrData['provisionView'] = $this->provision_model->get_provisionview($id);
		$arrData['middle'] = 'sales/provisionview';
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