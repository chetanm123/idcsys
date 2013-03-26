<?php

/*This class is to deal with osplans details */
class Osplans extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');	
		//Load the Model files
		$this->load->model('osplans_model');
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
	 * This is to view all osplanss details	 
	 * @access	public	 
	 * @return	void
	 */
	public function index()
	{
		$arrData = array();
		
		//This is to get all osplans listing.
		$arrData['list_osplans'] = $this->osplans_model->get_all_osplans_listing();
		
		//This loads the osplans listing.
		$arrData['middle'] = 'admin/osplan/listosplan';
		$this->load->view('admin/template',$arrData);
	}

	/**
	/*
	 * create_osplans
	 *
	 * Calls create_osplans to create osplans
	 *
	 * @access	public
	 * @return	void
	 */
	public function create_osplans()
	{
		
		$arrData = array();
		$strErrorMessage = '';

		//if($this->form_validation->run() === TRUE) 
		//{
				
				
				$arrData['name'] = $this->input->post('name');
				$insertflag = $this->osplans_model->save($arrData);
				if($insertflag)
				{
					//This lists all osplans listing.
					$arrData['list_osplans'] = $this->osplans_model->get_all_osplans_listing();
					
					//This loads the osplans listing.
					$arrData['middle'] = 'admin/osplan/listosplan';
					$this->load->view('admin/template',$arrData);
				}
				else
				{
					//This loads the list osplans view.
					$arrData['middle'] = 'admin/osplan/listosplan';
					$this->load->view('admin/template',$arrData);
				}

			
		//}

		//Displays the error message
		//$arrData["error_message"] = $strErrorMessage;
		
		//Loading the view to display the results obtained in frontend
		//$arrData['middle'] = 'admin/osplans';
		//$this->load->view('admin/template',$arrData);
	}

	/**
	/*
	 * edit_osplans
	 *
	 * Calls edit_osplans to edit osplans
	 *  
	 * @access	public
	 * @param int $iddepartment
	 * @return	void
	 */
	public function edit_osplans($id)
	{
		
		$arrData = array();

		//This is to check is value inserted into input field
		if($_POST)
		{
			$arrData["name"] = $this->input->post('name');
			$updateFlag = $this->osplans_model->update($arrData,$id);
			if($updateFlag)
			{
				//This is to get all osplans details
				$arrData['list_osplans'] = $this->osplans_model->get_all_osplans_listing();

				//This is to load list of osplans view.
				$arrData['middle'] = 'admin/osplan/listosplan';
				$this->load->view('admin/template',$arrData);
			}
		}
		else
		{
			//This is to get all osplans details.
			$arrData['Details'] = $this->osplans_model->get_details($id);

			//This is to view load edit osplans view.
			$arrData['middle'] = 'admin/osplan/editosplan';
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

		$flag =  $this->osplans_model->get_flag_value($id);
		//print_r($flag);

		if($flag[0]['disabled'] == 1)
		{	
			$flag[0]['disabled'] = 0;
			$arrData['disabled'] = $flag[0]['disabled'];
			$flagInactive =  $this->osplans_model->updateDisabled($arrData,$id);
		}
		elseif($flag[0]['disabled'] == 0)
		{
			$flag[0]['disabled'] = 1;
			$arrData['disabled'] = $flag[0]['disabled'];
			$flagInactive =  $this->osplans_model->updateDisabled($arrData,$id);
		}

	}

}
?>