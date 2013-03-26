<?php

/*This class is to deal with storage details */
class Storage extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');	
		//Load the Model files
		$this->load->model('storage_model');
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
	 * This is to view all storages details	 
	 * @access	public	 
	 * @return	void
	 */
	public function index()
	{
		$arrData = array();
		
		//This is to get all storage listing.
		$arrData['list_storage'] = $this->storage_model->get_all_storage_listing();
		
		//This loads the storage listing.
		$arrData['middle'] = 'admin/storage/liststorage';
		$this->load->view('admin/template',$arrData);
	}

	/**
	/*
	 * create_storage
	 *
	 * Calls create_storage to create storage
	 *
	 * @access	public
	 * @return	void
	 */
	public function create_storage()
	{
		
		$arrData = array();
		$strErrorMessage = '';

		//if($this->form_validation->run() === TRUE) 
		//{
				
				
				$arrData['name'] = $this->input->post('name');
				$insertflag = $this->storage_model->save($arrData);
				if($insertflag)
				{
					//This lists all storage listing.
					$arrData['list_storage'] = $this->storage_model->get_all_storage_listing();
					
					//This loads the storage listing.
					$arrData['middle'] = 'admin/storage/liststorage';
					$this->load->view('admin/template',$arrData);
				}
				else
				{
					//This loads the list storage view.
					$arrData['middle'] = 'admin/storage/liststorage';
					$this->load->view('admin/template',$arrData);
				}

			
		//}

		//Displays the error message
		//$arrData["error_message"] = $strErrorMessage;
		
		//Loading the view to display the results obtained in frontend
		//$arrData['middle'] = 'admin/storage';
		//$this->load->view('admin/template',$arrData);
	}

	/**
	/*
	 * edit_storage
	 *
	 * Calls edit_storage to edit storage
	 *  
	 * @access	public
	 * @param int $iddepartment
	 * @return	void
	 */
	public function edit_storage($id)
	{
		
		$arrData = array();

		//This is to check is value inserted into input field
		if($_POST)
		{
			$arrData["name"] = $this->input->post('name');
			$updateFlag = $this->storage_model->update($arrData,$id);
			if($updateFlag)
			{
				//This is to get all storage details
				$arrData['list_storage'] = $this->storage_model->get_all_storage_listing();

				//This is to load list of storage view.
				$arrData['middle'] = 'admin/storage/liststorage';
				$this->load->view('admin/template',$arrData);
			}
		}
		else
		{
			//This is to get all storage details.
			$arrData['Details'] = $this->storage_model->get_details($id);

			//This is to view load edit storage view.
			$arrData['middle'] = 'admin/storage/editstorage';
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

		$flag =  $this->storage_model->get_flag_value($id);
		//print_r($flag);

		if($flag[0]['disabled'] == 1)
		{	
			$flag[0]['disabled'] = 0;
			$arrData['disabled'] = $flag[0]['disabled'];
			$flagInactive =  $this->storage_model->updateDisabled($arrData,$id);
		}
		elseif($flag[0]['disabled'] == 0)
		{
			$flag[0]['disabled'] = 1;
			$arrData['disabled'] = $flag[0]['disabled'];
			$flagInactive =  $this->storage_model->updateDisabled($arrData,$id);
		}

	}

	

}
?>