<?php
class Sales_companies extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('companies_model');
		$this->load->library('form_validation');
		if($this->session->userdata('username') == "")
		{
			redirect('login');
		}
		elseif($this->session->userdata('username') != "" && $this->session->userdata('user_role') == "billing")
		{
			redirect('billing');
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
		$arrData = array();
		$arrData['companyDetails'] = $this->companies_model->get_company_details();
		$arrData['middle'] = 'admin/companies/listcompanies';
		$this->load->view('admin/template',$arrData);
	}

	public function add()
	{
		$arrInsertData["name"] = $this->input->post('firstname');
		
		$insertedFlag = $this->companies_model->save_company($arrInsertData);
							
		if($insertedFlag)
		{
			//$this->session->set_flashdata('success', 'Company  Added Successfully !!');
			$arrData['companyDetails'] = $this->companies_model->get_company_details();
			$arrData['middle'] = 'admin/companies/listcompanies';
			$this->load->view('admin/template',$arrData);
		}
		else
		{
			//$this->session->set_flashdata('error', 'Failed to Add Comapny  !!');
			$arrData['middle'] = 'admin/companies/listcompanies';
			$this->load->view('admin/template',$arrData);
		}
	}

	public function edit($id)
	{
		if($_POST)
		{
			$arrInsertData["name"] = $this->input->post('firstname');
			$updateFlag = $this->companies_model->edit_company($arrInsertData,$id);
			if($updateFlag)
			{
				$arrData['companyDetails'] = $this->companies_model->get_company_details();
				$arrData['middle'] = 'admin/companies/listcompanies';
				$this->load->view('admin/template',$arrData);
			}
		}
		else
		{
			$arrData['Details'] = $this->companies_model->get_details($id);
			$arrData['middle'] = 'admin/companies/editcompanies';
			$this->load->view('admin/template',$arrData);
		}
	}


	/**
	/*
	 * activeinactiveflag
	 *
	 * Calls activeinactiveflag to enable and disable functionality.
	 *  
	 * @access	public
	 * @param int $id
	 * @return	void
	 */
	public function activeinactiveflag($id)
	{
		
		$arrData = array();

		$flag =  $this->companies_model->get_flag_value($id);
		//print_r($flag);

		if($flag[0]['disabled'] == 1)
		{	
			$flag[0]['disabled'] = 0;
			$arrData['disabled'] = $flag[0]['disabled'];
			$flagInactive =  $this->companies_model->updateDisabled($arrData,$id);
		}
		elseif($flag[0]['disabled'] == 0)
		{
			$flag[0]['disabled'] = 1;
			$arrData['disabled'] = $flag[0]['disabled'];
			$flagInactive =  $this->companies_model->updateDisabled($arrData,$id);
		}

	}
}
?>