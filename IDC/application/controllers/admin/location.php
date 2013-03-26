<?php

/*This class is to deal with location details */
class Location extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');	
		//Load the Model files
		$this->load->model('locations_model');
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
	 * This is to view all locations details	 
	 * @access	public	 
	 * @return	void
	 */
	public function index()
	{
		$arrData = array();
		
		//This is to get all location listing.
		$arrData['list_location'] = $this->locations_model->get_all_location_listing();
		
		//This loads the location listing.
		$arrData['middle'] = 'admin/location/listlocation';
		$this->load->view('admin/template',$arrData);
	}

	/**
	/*
	 * create_location
	 *
	 * Calls create_location to create location
	 *
	 * @access	public
	 * @return	void
	 */
	public function create_location()
	{
		
		$arrData = array();
		$strErrorMessage = '';

		//if($this->form_validation->run() === TRUE) 
		//{
				
				
				$arrData['name'] = $this->input->post('name');
				$insertflag = $this->locations_model->save($arrData);
				if($insertflag)
				{
					//This lists all location listing.
					$arrData['list_location'] = $this->locations_model->get_all_location_listing();
					
					//This loads the location listing.
					$arrData['middle'] = 'admin/location/listlocation';
					$this->load->view('admin/template',$arrData);
				}
				else
				{
					//This loads the list location view.
					$arrData['middle'] = 'admin/location/listlocation';
					$this->load->view('admin/template',$arrData);
				}

			
		//}

		//Displays the error message
		//$arrData["error_message"] = $strErrorMessage;
		
		//Loading the view to display the results obtained in frontend
		//$arrData['middle'] = 'admin/location';
		//$this->load->view('admin/template',$arrData);
	}

	/**
	/*
	 * edit_location
	 *
	 * Calls edit_location to edit location
	 *  
	 * @access	public
	 * @param int $iddepartment
	 * @return	void
	 */
	public function edit_location($id)
	{
		
		$arrData = array();

		//This is to check is value inserted into input field
		if($_POST)
		{
			$arrData["name"] = $this->input->post('name');
			$updateFlag = $this->locations_model->update($arrData,$id);
			if($updateFlag)
			{
				//This is to get all location details
				$arrData['list_location'] = $this->locations_model->get_all_location_listing();

				//This is to load list of location view.
				$arrData['middle'] = 'admin/location/listlocation';
				$this->load->view('admin/template',$arrData);
			}
		}
		else
		{
			//This is to get all location details.
			$arrData['Details'] = $this->locations_model->get_details($id);

			//This is to view load edit location view.
			$arrData['middle'] = 'admin/location/editlocation';
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

		$flag =  $this->locations_model->get_flag_value($id);
		//print_r($flag);

		if($flag[0]['disabled'] == 1)
		{	
			$flag[0]['disabled'] = 0;
			$arrData['disabled'] = $flag[0]['disabled'];
			$flagInactive =  $this->locations_model->updateDisabled($arrData,$id);
		}
		elseif($flag[0]['disabled'] == 0)
		{
			$flag[0]['disabled'] = 1;
			$arrData['disabled'] = $flag[0]['disabled'];
			$flagInactive =  $this->locations_model->updateDisabled($arrData,$id);
		}

	}

	

}
?>