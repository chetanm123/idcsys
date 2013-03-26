<?php

/*This class is to deal with userroles details */
class Userroles extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');	
		//Load the Model files
		$this->load->model('userroles_model');
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
	 * This is to view all userroless details	 
	 * @access	public	 
	 * @return	void
	 */
	public function index()
	{
		$arrData = array();
		
		//This is to get all userroles listing.
		$arrData['list_userroles'] = $this->userroles_model->get_all_userroles_listing();
		
		//This loads the userroles listing.
		$arrData['middle'] = 'admin/userroles/listuserroles';
		$this->load->view('admin/template',$arrData);
	}

	/**
	/*
	 * create_userroles
	 *
	 * Calls create_userroles to create userroles
	 *
	 * @access	public
	 * @return	void
	 */
	public function create_userroles()
	{
		
		$arrData = array();
		$strErrorMessage = '';

		//if($this->form_validation->run() === TRUE) 
		//{
				
				
				$arrData['name'] = $this->input->post('name');
				$insertflag = $this->userroles_model->save($arrData);
				if($insertflag)
				{
					//This lists all userroles listing.
					$arrData['list_userroles'] = $this->userroles_model->get_all_userroles_listing();
					
					//This loads the userroles listing.
					$arrData['middle'] = 'admin/userroles/listuserroles';
					$this->load->view('admin/template',$arrData);
				}
				else
				{
					//This loads the list userroles view.
					$arrData['middle'] = 'admin/userroles/listuserroles';
					$this->load->view('admin/template',$arrData);
				}

			
		//}

		//Displays the error message
		//$arrData["error_message"] = $strErrorMessage;
		
		//Loading the view to display the results obtained in frontend
		//$arrData['middle'] = 'admin/userroles';
		//$this->load->view('admin/template',$arrData);
	}

	/**
	/*
	 * edit_userroles
	 *
	 * Calls edit_userroles to edit userroles
	 *  
	 * @access	public
	 * @param int $iddepartment
	 * @return	void
	 */
	public function edit_userroles($id)
	{
		
		$arrData = array();

		//This is to check is value inserted into input field
		if($_POST)
		{
			$arrData["name"] = $this->input->post('name');
			$updateFlag = $this->userroles_model->update($arrData,$id);
			if($updateFlag)
			{
				//This is to get all userroles details
				$arrData['list_userroles'] = $this->userroles_model->get_all_userroles_listing();

				//This is to load list of userroles view.
				$arrData['middle'] = 'admin/userroles/listuserroles';
				$this->load->view('admin/template',$arrData);
			}
		}
		else
		{
			//This is to get all userroles details.
			$arrData['Details'] = $this->userroles_model->get_details($id);

			//This is to view load edit userroles view.
			$arrData['middle'] = 'admin/userroles/edituserroles';
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

		$flag =  $this->userroles_model->get_flag_value($id);
		//print_r($flag);

		if($flag[0]['disabled'] == 1)
		{	
			$flag[0]['disabled'] = 0;
			$arrData['disabled'] = $flag[0]['disabled'];
			$flagInactive =  $this->userroles_model->updateDisabled($arrData,$id);
		}
		elseif($flag[0]['disabled'] == 0)
		{
			$flag[0]['disabled'] = 1;
			$arrData['disabled'] = $flag[0]['disabled'];
			$flagInactive =  $this->userroles_model->updateDisabled($arrData,$id);
		}

	}

}
?>