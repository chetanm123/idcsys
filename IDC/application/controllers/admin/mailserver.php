<?php
class Mailserver extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');	
		//Load the Model files
		$this->load->model('mailserver_model');
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
	 * This is to view all mailservers details	 
	 * @access	public	 
	 * @return	void
	 */
	public function index()
	{
		$arrData = array();

		$arrData['list_mailserver'] = $this->mailserver_model->get_all_mailserver_listing();

		$arrData['middle'] = 'admin/mailserver/listmailserver';
		$this->load->view('admin/template',$arrData);
	}

	/**
	/*
	 * create_mailserver
	 *
	 * Calls create_mailserver to create mailserver
	 *
	 * @access	public
	 * @return	void
	 */
	public function create_mailserver()
	{
		
		$arrData = array();
		$strErrorMessage = '';

		//if($this->form_validation->run() === TRUE) 
		//{
				
				
				$arrData['name'] = $this->input->post('name');
				$insertflag = $this->mailserver_model->save($arrData);
				if($insertflag)
				{
					$arrData['list_mailserver'] = $this->mailserver_model->get_all_mailserver_listing();

					$arrData['middle'] = 'admin/mailserver/listmailserver';
					$this->load->view('admin/template',$arrData);
				}
				else
				{
					$arrData['middle'] = 'admin/mailserver/listmailserver';
					$this->load->view('admin/template',$arrData);
				}

			
		//}

		//Displays the error message
		//$arrData["error_message"] = $strErrorMessage;
		
		//Loading the view to display the results obtained in frontend
		//$arrData['middle'] = 'admin/mailserver';
		//$this->load->view('admin/template',$arrData);
	}

	/**
	/*
	 * edit_mailserver
	 *
	 * Calls edit_mailserver to edit mailserver
	 *  
	 * @access	public
	 * @param int $iddepartment
	 * @return	void
	 */
	public function edit_mailserver($id)
	{
		
		$arrData = array();
		if($_POST)
		{
			$arrData["name"] = $this->input->post('name');
			$updateFlag = $this->mailserver_model->update($arrData,$id);
			if($updateFlag)
			{
				$arrData['list_mailserver'] = $this->mailserver_model->get_all_mailserver_listing();
				$arrData['middle'] = 'admin/mailserver/listmailserver';
				$this->load->view('admin/template',$arrData);
			}
		}
		else
		{
			$arrData['Details'] = $this->mailserver_model->get_details($id);
			$arrData['middle'] = 'admin/mailserver/editmailserver';
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

		$flag =  $this->mailserver_model->get_flag_value($id);
		//print_r($flag);

		if($flag[0]['disabled'] == 1)
		{	
			$flag[0]['disabled'] = 0;
			$arrData['disabled'] = $flag[0]['disabled'];
			$flagInactive =  $this->mailserver_model->updateDisabled($arrData,$id);
		}
		elseif($flag[0]['disabled'] == 0)
		{
			$flag[0]['disabled'] = 1;
			$arrData['disabled'] = $flag[0]['disabled'];
			$flagInactive =  $this->mailserver_model->updateDisabled($arrData,$id);
		}

	}

	

}
?>