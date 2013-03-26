<?php

/*This class is to deal with databaseplan details */
class Databaseplan extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');	
		//Load the Model files
		$this->load->model('databaseplan_model');
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
	 * This is to view all databaseplans details	 
	 * @access	public	 
	 * @return	void
	 */
	public function index()
	{
		$arrData = array();
		
		//This is to get all databaseplan listing.
		$arrData['list_databaseplan'] = $this->databaseplan_model->get_all_databaseplan_listing();
		
		//This loads the databaseplan listing.
		$arrData['middle'] = 'admin/databaseplan/listdatabaseplan';
		$this->load->view('admin/template',$arrData);
	}

	/**
	/*
	 * create_databaseplan
	 *
	 * Calls create_databaseplan to create databaseplan
	 *
	 * @access	public
	 * @return	void
	 */
	public function create_databaseplan()
	{
		
		$arrData = array();
		$strErrorMessage = '';

		//if($this->form_validation->run() === TRUE) 
		//{
				
				
				$arrData['name'] = $this->input->post('name');
				$insertflag = $this->databaseplan_model->save($arrData);
				if($insertflag)
				{
					//This lists all databaseplan listing.
					$arrData['list_databaseplan'] = $this->databaseplan_model->get_all_databaseplan_listing();
					
					//This loads the databaseplan listing.
					$arrData['middle'] = 'admin/databaseplan/listdatabaseplan';
					$this->load->view('admin/template',$arrData);
				}
				else
				{
					//This loads the list databaseplan view.
					$arrData['middle'] = 'admin/databaseplan/listdatabaseplan';
					$this->load->view('admin/template',$arrData);
				}

			
		//}

		//Displays the error message
		//$arrData["error_message"] = $strErrorMessage;
		
		//Loading the view to display the results obtained in frontend
		//$arrData['middle'] = 'admin/databaseplan';
		//$this->load->view('admin/template',$arrData);
	}

	/**
	/*
	 * edit_databaseplan
	 *
	 * Calls edit_databaseplan to edit databaseplan
	 *  
	 * @access	public
	 * @param int $iddepartment
	 * @return	void
	 */
	public function edit_databaseplan($id)
	{
		
		$arrData = array();

		//This is to check is value inserted into input field
		if($_POST)
		{
			$arrData["name"] = $this->input->post('name');
			$updateFlag = $this->databaseplan_model->update($arrData,$id);
			if($updateFlag)
			{
				//This is to get all databaseplan details
				$arrData['list_databaseplan'] = $this->databaseplan_model->get_all_databaseplan_listing();

				//This is to load list of databaseplan view.
				$arrData['middle'] = 'admin/databaseplan/listdatabaseplan';
				$this->load->view('admin/template',$arrData);
			}
		}
		else
		{
			//This is to get all databaseplan details.
			$arrData['Details'] = $this->databaseplan_model->get_details($id);

			//This is to view load edit databaseplan view.
			$arrData['middle'] = 'admin/databaseplan/editdatabaseplan';
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

		$flag =  $this->databaseplan_model->get_flag_value($id);
		//print_r($flag);

		if($flag[0]['disabled'] == 1)
		{	
			$flag[0]['disabled'] = 0;
			$arrData['disabled'] = $flag[0]['disabled'];
			$flagInactive =  $this->databaseplan_model->updateDisabled($arrData,$id);
		}
		elseif($flag[0]['disabled'] == 0)
		{
			$flag[0]['disabled'] = 1;
			$arrData['disabled'] = $flag[0]['disabled'];
			$flagInactive =  $this->databaseplan_model->updateDisabled($arrData,$id);
		}

	}

	

}
?>