<?php
class Billing extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('billing_model');
		$this->load->model('provision_model');
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

		elseif($this->session->userdata('username') != "" && $this->session->userdata('user_role') == "provision")
		{
			redirect('provision/provisions');
		}
	}

	public function index()
	{
		//$this->load->view('billing/template');

		$arrData['allDetails'] = $this->billing_model->get_all_billing_details();
		//echo "<pre>";print_r($arrData['allDetails']);exit;
		$arrData['middle'] = 'billing/all';
		$this->load->view('billing/template',$arrData);
	}

	public function create_billing($id)
	{
		$arrData['allDetails'] = $this->billing_model->get_all_details($id);
		//echo "<pre>";print_r($arrData['allDetails']);exit;		

		if(!empty($_POST))
		{
			
			//$date = $this->input->post('billingstart');
			
			//echo "hello";exit;
			//echo $this->input->post('billingstart');exit;

			//echo "<pre>";
			//print_r($date);exit;
			//$date1 = explode('/',$date);
			//$dt = $date1[2]."-".$date1[0]."-".$date1[1];
			$arrInsertData["billing_start"] = $this->input->post('billingstart');
			$arrInsertData["request_id"] = $id;
			$arrInsertData["setup_charge"] = $this->input->post('setupcharge');
			$arrInsertData["setup_charge_currency"] = $this->input->post('setupcurrency');
			$arrInsertData["recurring_amount"] = $this->input->post('recurringamount');
			$arrInsertData["recurring_amount_currency"] = $this->input->post('recurringamountcurrency');
			$arrInsertData["contract_period_id"] = $this->input->post('contractperiod');
			$arrInsertData["package"] = $this->input->post('packages');
			//$arrInsertData["billingrep_id"] = $this->input->post('billingrep');
			$arrInsertData["billing_cycle_id"] = $this->input->post('billingcycle');			
			$arrInsertData["cancel_date"] = '';
			$arrInsertData["suspend_date"] = '';
			$arrInsertData["createdby_id"] = $this->session->userdata('userid');
			$arrInsertData["createdon"] = DATE("Y-m-d");
			$arrInsertData["updatedby_id"] = $this->session->userdata('userid');
			$arrInsertData["updatedon"] = DATE("Y-m-d");
			
			
			$arrUpdateData["status"] = '1';
			
			
			$insertedFlag = $this->billing_model->save($arrInsertData);

			$arrUpdateData["request_bill_id"] = $this->db->insert_id();

			if($insertedFlag)
			{
				$updateflag = $this->billing_model->update_sales_status($arrUpdateData,$id);
				if($updateflag)
				{
					$arrData['allDetails'] = $this->billing_model->get_all_billing_details();					
					
					redirect(base_url().'billing/billing');
					//$arrData['middle'] = 'billing/all';
					//$this->load->view('billing/template',$arrData);
				}
			}
		}
		else
		{
			$arrData['allDetails'] = $this->billing_model->get_all_details($id);

			$arrData['contract_period'] = $this->billing_model->get_all_contract_period();
			$arrData['packages'] = $this->billing_model->get_all_packages();
			//$arrData['billing_rep'] = $this->billing_model->get_all_billing_rep();
			$arrData['billingcycle'] = $this->billing_model->get_all_billingcycle();

			$arrData['middle'] = 'billing/billnew';
			$this->load->view('billing/template',$arrData);
		}

		//$arrData['middle'] = 'billing/billnew';
		//$this->load->view('billing/template',$arrData);		
	}

	public function active_billing()
	{
		$arrData['activeDetails'] = $this->billing_model->get_active_details();
		//echo "<pre>";print_r($arrData['activeDetails']);exit;
		$arrData['middle'] = 'billing/active';
		$this->load->view('billing/template',$arrData);
	}

	public function previous_billing()
	{
		$arrData['previousDetails'] = $this->billing_model->get_previous_details();
		//echo "<pre>";print_r($arrData['previousDetails']);exit;
		$arrData['middle'] = 'billing/previousbilling';
		$this->load->view('billing/template',$arrData);
	}

	public function all_billing()
	{
		$arrData['allDetails'] = $this->billing_model->get_all_details();
		$arrData['middle'] = 'billing/allbilling';
		$this->load->view('billing/template',$arrData);
	}

	public function salesrequestview($id)
	{
		//echo $id;exit;
		$arrData = array();
		$arrData['salesrequestview'] = $this->billing_model->get_salesrequestview($id);

		$arrData['discDetails'] = $this->provision_model->get_discdetails($id);

		//echo "<pre>";print_r($arrData['requestView']);exit;
		$arrData['middle'] = 'billing/salesrequestview';
		$this->load->view('billing/template',$arrData);
	}
	
	public function provisionrequestview($id)
	{
		//echo $id;exit;
		$arrData = array();
		$arrData['provisionrequestview'] = $this->billing_model->get_provisionrequestview($id);
		//echo "<pre>";print_r($arrData['requestView']);exit;
		$arrData['middle'] = 'billing/provisionrequestview';
		$this->load->view('billing/template',$arrData);
	}


	public function billview($id)
	{
		//echo $id;exit;
		$arrData = array();
		$arrData['billingrequestview'] = $this->billing_model->get_billingrequestview($id);
		//echo "<pre>";print_r($arrData['billingrequestview']);exit;
		$arrData['middle'] = 'billing/billview';
		$this->load->view('billing/template',$arrData);
	}




}
?>