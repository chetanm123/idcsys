<?php
class Controllersoftware extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');	
		//Load the Model files
		$this->load->model('controllersoftware_model');
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
	 * This is to view all controllersoftwares details	 
	 * @access	public	 
	 * @return	void
	 */
	public function index()
	{
		$arrData = array();

		$arrData['list_controllersoftware'] = $this->controllersoftware_model->get_all_controllersoftware_listing();

		$arrData['middle'] = 'admin/controllersoftware/listcontrollersoftware';
		$this->load->view('admin/template',$arrData);
	}

	/**
	/*
	 * create_controllersoftware
	 *
	 * Calls create_controllersoftware to create controllersoftware
	 *
	 * @access	public
	 * @return	void
	 */
	public function create_controllersoftware()
	{
		
		$arrData = array();
		$strErrorMessage = '';

		//if($this->form_validation->run() === TRUE) 
		//{
				
				
				$arrData['name'] = $this->input->post('name');
				$insertflag = $this->controllersoftware_model->save($arrData);
				if($insertflag)
				{
					$arrData['list_controllersoftware'] = $this->controllersoftware_model->get_all_controllersoftware_listing();

					$arrData['middle'] = 'admin/controllersoftware/listcontrollersoftware';
					$this->load->view('admin/template',$arrData);
				}
				else
				{
					$arrData['middle'] = 'admin/controllersoftware/listcontrollersoftware';
					$this->load->view('admin/template',$arrData);
				}

			
		//}

		//Displays the error message
		//$arrData["error_message"] = $strErrorMessage;
		
		//Loading the view to display the results obtained in frontend
		//$arrData['middle'] = 'admin/controllersoftware';
		//$this->load->view('admin/template',$arrData);
	}

	/**
	/*
	 * edit_controllersoftware
	 *
	 * Calls edit_controllersoftware to edit controllersoftware
	 *  
	 * @access	public
	 * @param int $iddepartment
	 * @return	void
	 */
	public function edit_controllersoftware($id)
	{
		
		$arrData = array();
		if($_POST)
		{
			$arrData["name"] = $this->input->post('name');
			$updateFlag = $this->controllersoftware_model->update($arrData,$id);
			if($updateFlag)
			{
				$arrData['list_controllersoftware'] = $this->controllersoftware_model->get_all_controllersoftware_listing();
				$arrData['middle'] = 'admin/controllersoftware/listcontrollersoftware';
				$this->load->view('admin/template',$arrData);
			}
		}
		else
		{
			$arrData['Details'] = $this->controllersoftware_model->get_details($id);
			$arrData['middle'] = 'admin/controllersoftware/editcontrollersoftware';
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

		$flag =  $this->controllersoftware_model->get_flag_value($id);
		//print_r($flag);

		if($flag[0]['disabled'] == 1)
		{	
			$flag[0]['disabled'] = 0;
			$arrData['disabled'] = $flag[0]['disabled'];
			$flagInactive =  $this->controllersoftware_model->updateDisabled($arrData,$id);
		}
		elseif($flag[0]['disabled'] == 0)
		{
			$flag[0]['disabled'] = 1;
			$arrData['disabled'] = $flag[0]['disabled'];
			$flagInactive =  $this->controllersoftware_model->updateDisabled($arrData,$id);
		}

	}

	

}
?>