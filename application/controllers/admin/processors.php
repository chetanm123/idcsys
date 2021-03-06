<?php
class Processors extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');	
		//Load the Model files
		$this->load->model('processor_model');
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
	 * This is to view all processors details	 
	 * @access	public	 
	 * @return	void
	 */
	public function index()
	{
		$arrData = array();

		$arrData['list_processor'] = $this->processor_model->get_all_processor_listing();

		$arrData['middle'] = 'admin/processor/listprocessor';
		$this->load->view('admin/template',$arrData);
	}

	/**
	/*
	 * create_processor
	 *
	 * Calls create_processor to create processor
	 *
	 * @access	public
	 * @return	void
	 */
	public function create_processor()
	{
		
		$arrData = array();
		$strErrorMessage = '';

		//if($this->form_validation->run() === TRUE) 
		//{
				
				
				$arrData['name'] = $this->input->post('name');
				$insertflag = $this->processor_model->save($arrData);
				if($insertflag)
				{
					$arrData['list_processor'] = $this->processor_model->get_all_processor_listing();

					$arrData['middle'] = 'admin/processor/listprocessor';
					$this->load->view('admin/template',$arrData);
				}
				else
				{
					$arrData['middle'] = 'admin/processor/listprocessor';
					$this->load->view('admin/template',$arrData);
				}

			
		//}

		//Displays the error message
		//$arrData["error_message"] = $strErrorMessage;
		
		//Loading the view to display the results obtained in frontend
		//$arrData['middle'] = 'admin/processor';
		//$this->load->view('admin/template',$arrData);
	}

	/**
	/*
	 * edit_processor
	 *
	 * Calls edit_processor to edit processor
	 *  
	 * @access	public
	 * @param int $iddepartment
	 * @return	void
	 */
	public function edit_processor($id)
	{
		
		$arrData = array();
		if($_POST)
		{
			$arrData["name"] = $this->input->post('name');
			$updateFlag = $this->processor_model->update($arrData,$id);
			if($updateFlag)
			{
				$arrData['list_processor'] = $this->processor_model->get_all_processor_listing();
				$arrData['middle'] = 'admin/processor/listprocessor';
				$this->load->view('admin/template',$arrData);
			}
		}
		else
		{
			$arrData['Details'] = $this->processor_model->get_details($id);
			$arrData['middle'] = 'admin/processor/editprocessor';
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

		$flag =  $this->processor_model->get_flag_value($id);
		//print_r($flag);

		if($flag[0]['disabled'] == 1)
		{	
			$flag[0]['disabled'] = 0;
			$arrData['disabled'] = $flag[0]['disabled'];
			$flagInactive =  $this->processor_model->updateDisabled($arrData,$id);
		}
		elseif($flag[0]['disabled'] == 0)
		{
			$flag[0]['disabled'] = 1;
			$arrData['disabled'] = $flag[0]['disabled'];
			$flagInactive =  $this->processor_model->updateDisabled($arrData,$id);
		}

	}

}
?>