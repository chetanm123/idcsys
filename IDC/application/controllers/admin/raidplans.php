<?php

/*This class is to deal with raidplans details */
class Raidplans extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');	
		//Load the Model files
		$this->load->model('raidplans_model');
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
	
	/**
	 * index
	 * This is to view all raidplanss details	 
	 * @access	public	 
	 * @return	void
	 */
	public function index()
	{
		$arrData = array();
		
		//This is to get all raidplans listing.
		$arrData['list_raidplans'] = $this->raidplans_model->get_all_raidplans_listing();
		
		//This loads the raidplans listing.
		$arrData['middle'] = 'admin/raidplan/listraidplan';
		$this->load->view('admin/template',$arrData);
	}

	/**
	/*
	 * create_raidplans
	 *
	 * Calls create_raidplans to create raidplans
	 *
	 * @access	public
	 * @return	void
	 */
	public function create_raidplans()
	{
		
		$arrData = array();
		$strErrorMessage = '';

		//if($this->form_validation->run() === TRUE) 
		//{
				
				
				$arrData['name'] = $this->input->post('name');
				$insertflag = $this->raidplans_model->save($arrData);
				if($insertflag)
				{
					//This lists all raidplans listing.
					$arrData['list_raidplans'] = $this->raidplans_model->get_all_raidplans_listing();
					
					//This loads the raidplans listing.
					$arrData['middle'] = 'admin/raidplan/listraidplan';
					$this->load->view('admin/template',$arrData);
				}
				else
				{
					//This loads the list raidplans view.
					$arrData['middle'] = 'admin/raidplan/listraidplan';
					$this->load->view('admin/template',$arrData);
				}

			
		//}

		//Displays the error message
		//$arrData["error_message"] = $strErrorMessage;
		
		//Loading the view to display the results obtained in frontend
		//$arrData['middle'] = 'admin/raidplans';
		//$this->load->view('admin/template',$arrData);
	}

	/**
	/*
	 * edit_raidplans
	 *
	 * Calls edit_raidplans to edit raidplans
	 *  
	 * @access	public
	 * @param int $iddepartment
	 * @return	void
	 */
	public function edit_raidplans($id)
	{
		
		$arrData = array();

		//This is to check is value inserted into input field
		if($_POST)
		{
			$arrData["name"] = $this->input->post('name');
			$updateFlag = $this->raidplans_model->update($arrData,$id);
			if($updateFlag)
			{
				//This is to get all raidplans details
				$arrData['list_raidplans'] = $this->raidplans_model->get_all_raidplans_listing();

				//This is to load list of raidplans view.
				$arrData['middle'] = 'admin/raidplan/listraidplan';
				$this->load->view('admin/template',$arrData);
			}
		}
		else
		{
			//This is to get all raidplans details.
			$arrData['Details'] = $this->raidplans_model->get_details($id);

			//This is to view load edit raidplans view.
			$arrData['middle'] = 'admin/raidplan/editraidplan';
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

		$flag =  $this->raidplans_model->get_flag_value($id);
		//print_r($flag);

		if($flag[0]['disabled'] == 1)
		{	
			$flag[0]['disabled'] = 0;
			$arrData['disabled'] = $flag[0]['disabled'];
			$flagInactive =  $this->raidplans_model->updateDisabled($arrData,$id);
		}
		elseif($flag[0]['disabled'] == 0)
		{
			$flag[0]['disabled'] = 1;
			$arrData['disabled'] = $flag[0]['disabled'];
			$flagInactive =  $this->raidplans_model->updateDisabled($arrData,$id);
		}

	}

	

}
?>