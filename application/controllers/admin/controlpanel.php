<?php

/*This class is to deal with controlpanel details */
class Controlpanel extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');	
		//Load the Model files
		$this->load->model('controlpanel_model');
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
	 * This is to view all controlpanels details	 
	 * @access	public	 
	 * @return	void
	 */
	public function index()
	{
		$arrData = array();
		
		//This is to get all controlpanel listing.
		$arrData['list_controlpanel'] = $this->controlpanel_model->get_all_controlpanel_listing();
		
		//This loads the controlpanel listing.
		$arrData['middle'] = 'admin/controlpanel/listcontrolpanel';
		$this->load->view('admin/template',$arrData);
	}

	/**
	/*
	 * create_controlpanel
	 *
	 * Calls create_controlpanel to create controlpanel
	 *
	 * @access	public
	 * @return	void
	 */
	public function create_controlpanel()
	{
		
		$arrData = array();
		$strErrorMessage = '';

		//if($this->form_validation->run() === TRUE) 
		//{
				
				
				$arrData['name'] = $this->input->post('name');
				$insertflag = $this->controlpanel_model->save($arrData);
				if($insertflag)
				{
					//This lists all controlpanel listing.
					$arrData['list_controlpanel'] = $this->controlpanel_model->get_all_controlpanel_listing();
					
					//This loads the controlpanel listing.
					$arrData['middle'] = 'admin/controlpanel/listcontrolpanel';
					$this->load->view('admin/template',$arrData);
				}
				else
				{
					//This loads the list controlpanel view.
					$arrData['middle'] = 'admin/controlpanel/listcontrolpanel';
					$this->load->view('admin/template',$arrData);
				}

			
		//}

		//Displays the error message
		//$arrData["error_message"] = $strErrorMessage;
		
		//Loading the view to display the results obtained in frontend
		//$arrData['middle'] = 'admin/controlpanel';
		//$this->load->view('admin/template',$arrData);
	}

	/**
	/*
	 * edit_controlpanel
	 *
	 * Calls edit_controlpanel to edit controlpanel
	 *  
	 * @access	public
	 * @param int $iddepartment
	 * @return	void
	 */
	public function edit_controlpanel($id)
	{
		
		$arrData = array();

		//This is to check is value inserted into input field
		if($_POST)
		{
			$arrData["name"] = $this->input->post('name');
			$updateFlag = $this->controlpanel_model->update($arrData,$id);
			if($updateFlag)
			{
				//This is to get all controlpanel details
				$arrData['list_controlpanel'] = $this->controlpanel_model->get_all_controlpanel_listing();

				//This is to load list of controlpanel view.
				$arrData['middle'] = 'admin/controlpanel/listcontrolpanel';
				$this->load->view('admin/template',$arrData);
			}
		}
		else
		{
			//This is to get all controlpanel details.
			$arrData['Details'] = $this->controlpanel_model->get_details($id);

			//This is to view load edit controlpanel view.
			$arrData['middle'] = 'admin/controlpanel/editcontrolpanel';
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

		$flag =  $this->controlpanel_model->get_flag_value($id);
		//print_r($flag);

		if($flag[0]['disabled'] == 1)
		{	
			$flag[0]['disabled'] = 0;
			$arrData['disabled'] = $flag[0]['disabled'];
			$flagInactive =  $this->controlpanel_model->updateDisabled($arrData,$id);
		}
		elseif($flag[0]['disabled'] == 0)
		{
			$flag[0]['disabled'] = 1;
			$arrData['disabled'] = $flag[0]['disabled'];
			$flagInactive =  $this->controlpanel_model->updateDisabled($arrData,$id);
		}

	}

	

}
?>