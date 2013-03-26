<?php

/*This class is to deal with antivirus details */
class Antivirus extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');	
		//Load the Model files
		$this->load->model('antivirus_model');
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
	 * This is to view all antiviruss details	 
	 * @access	public	 
	 * @return	void
	 */
	public function index()
	{
		$arrData = array();
		
		//This is to get all antivirus listing.
		$arrData['list_antivirus'] = $this->antivirus_model->get_all_antivirus_listing();
		
		//This loads the antivirus listing.
		$arrData['middle'] = 'admin/antivirus/listantivirus';
		$this->load->view('admin/template',$arrData);
	}

	/**
	/*
	 * create_antivirus
	 *
	 * Calls create_antivirus to create antivirus
	 *
	 * @access	public
	 * @return	void
	 */
	public function create_antivirus()
	{
		
		$arrData = array();
		$strErrorMessage = '';

		//if($this->form_validation->run() === TRUE) 
		//{
				
				
				$arrData['name'] = $this->input->post('name');
				$insertflag = $this->antivirus_model->save($arrData);
				if($insertflag)
				{
					//This lists all antivirus listing.
					$arrData['list_antivirus'] = $this->antivirus_model->get_all_antivirus_listing();
					
					//This loads the antivirus listing.
					$arrData['middle'] = 'admin/antivirus/listantivirus';
					$this->load->view('admin/template',$arrData);
				}
				else
				{
					//This loads the list antivirus view.
					$arrData['middle'] = 'admin/antivirus/listantivirus';
					$this->load->view('admin/template',$arrData);
				}

			
		//}

		//Displays the error message
		//$arrData["error_message"] = $strErrorMessage;
		
		//Loading the view to display the results obtained in frontend
		//$arrData['middle'] = 'admin/antivirus';
		//$this->load->view('admin/template',$arrData);
	}

	/**
	/*
	 * edit_antivirus
	 *
	 * Calls edit_antivirus to edit antivirus
	 *  
	 * @access	public
	 * @param int $iddepartment
	 * @return	void
	 */
	public function edit_antivirus($id)
	{
		
		$arrData = array();

		//This is to check is value inserted into input field
		if($_POST)
		{
			$arrData["name"] = $this->input->post('name');
			$updateFlag = $this->antivirus_model->update($arrData,$id);
			if($updateFlag)
			{
				//This is to get all antivirus details
				$arrData['list_antivirus'] = $this->antivirus_model->get_all_antivirus_listing();

				//This is to load list of antivirus view.
				$arrData['middle'] = 'admin/antivirus/listantivirus';
				$this->load->view('admin/template',$arrData);
			}
		}
		else
		{
			//This is to get all antivirus details.
			$arrData['Details'] = $this->antivirus_model->get_details($id);

			//This is to view load edit antivirus view.
			$arrData['middle'] = 'admin/antivirus/editantivirus';
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

		$flag =  $this->antivirus_model->get_flag_value($id);
		//print_r($flag);

		if($flag[0]['disabled'] == 1)
		{	
			$flag[0]['disabled'] = 0;
			$arrData['disabled'] = $flag[0]['disabled'];
			$flagInactive =  $this->antivirus_model->updateDisabled($arrData,$id);
		}
		elseif($flag[0]['disabled'] == 0)
		{
			$flag[0]['disabled'] = 1;
			$arrData['disabled'] = $flag[0]['disabled'];
			$flagInactive =  $this->antivirus_model->updateDisabled($arrData,$id);
		}

	}

	

}
?>