<?php
class Lancardspeed extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');	
		//Load the Model files
		$this->load->model('lancardspeed_model');
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
	 * This is to view all lancardspeeds details	 
	 * @access	public	 
	 * @return	void
	 */
	public function index()
	{
		$arrData = array();

		$arrData['list_lancardspeed'] = $this->lancardspeed_model->get_all_lancardspeed_listing();

		$arrData['middle'] = 'admin/lancardspeed/listlancardspeed';
		$this->load->view('admin/template',$arrData);
	}

	/**
	/*
	 * create_lancardspeed
	 *
	 * Calls create_lancardspeed to create lancardspeed
	 *
	 * @access	public
	 * @return	void
	 */
	public function create_lancardspeed()
	{
		
		$arrData = array();
		$strErrorMessage = '';

		//if($this->form_validation->run() === TRUE) 
		//{
				
				
				$arrData['name'] = $this->input->post('name');
				$insertflag = $this->lancardspeed_model->save($arrData);
				if($insertflag)
				{
					$arrData['list_lancardspeed'] = $this->lancardspeed_model->get_all_lancardspeed_listing();

					$arrData['middle'] = 'admin/lancardspeed/listlancardspeed';
					$this->load->view('admin/template',$arrData);
				}
				else
				{
					$arrData['middle'] = 'admin/lancardspeed/listlancardspeed';
					$this->load->view('admin/template',$arrData);
				}

			
		//}

		//Displays the error message
		//$arrData["error_message"] = $strErrorMessage;
		
		//Loading the view to display the results obtained in frontend
		//$arrData['middle'] = 'admin/lancardspeed';
		//$this->load->view('admin/template',$arrData);
	}

	/**
	/*
	 * edit_lancardspeed
	 *
	 * Calls edit_lancardspeed to edit lancardspeed
	 *  
	 * @access	public
	 * @param int $iddepartment
	 * @return	void
	 */
	public function edit_lancardspeed($id)
	{
		
		$arrData = array();
		if($_POST)
		{
			$arrData["name"] = $this->input->post('name');
			$updateFlag = $this->lancardspeed_model->update($arrData,$id);
			if($updateFlag)
			{
				$arrData['list_lancardspeed'] = $this->lancardspeed_model->get_all_lancardspeed_listing();
				$arrData['middle'] = 'admin/lancardspeed/listlancardspeed';
				$this->load->view('admin/template',$arrData);
			}
		}
		else
		{
			$arrData['Details'] = $this->lancardspeed_model->get_details($id);
			$arrData['middle'] = 'admin/lancardspeed/editlancardspeed';
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

		$flag =  $this->lancardspeed_model->get_flag_value($id);
		//print_r($flag);

		if($flag[0]['disabled'] == 1)
		{	
			$flag[0]['disabled'] = 0;
			$arrData['disabled'] = $flag[0]['disabled'];
			$flagInactive =  $this->lancardspeed_model->updateDisabled($arrData,$id);
		}
		elseif($flag[0]['disabled'] == 0)
		{
			$flag[0]['disabled'] = 1;
			$arrData['disabled'] = $flag[0]['disabled'];
			$flagInactive =  $this->lancardspeed_model->updateDisabled($arrData,$id);
		}

	}

	

}
?>