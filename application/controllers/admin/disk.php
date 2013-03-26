<?php

/*This class is to deal with disk details */
class Disk extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');	
		//Load the Model files
		$this->load->model('disk_model');
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
	 * This is to view all disks details	 
	 * @access	public	 
	 * @return	void
	 */
	public function index()
	{
		$arrData = array();
		
		//This is to get all disk listing.
		$arrData['list_disk'] = $this->disk_model->get_all_disk_listing();
		
		//This loads the disk listing.
		$arrData['middle'] = 'admin/disk/listdisk';
		$this->load->view('admin/template',$arrData);
	}

	/**
	/*
	 * create_disk
	 *
	 * Calls create_disk to create disk
	 *
	 * @access	public
	 * @return	void
	 */
	public function create_disk()
	{
		
		$arrData = array();
		$strErrorMessage = '';

		//if($this->form_validation->run() === TRUE) 
		//{
				
				
				$arrData['name'] = $this->input->post('name');
				$insertflag = $this->disk_model->save($arrData);
				if($insertflag)
				{
					//This lists all disk listing.
					$arrData['list_disk'] = $this->disk_model->get_all_disk_listing();
					
					//This loads the disk listing.
					$arrData['middle'] = 'admin/disk/listdisk';
					$this->load->view('admin/template',$arrData);
				}
				else
				{
					//This loads the list disk view.
					$arrData['middle'] = 'admin/disk/listdisk';
					$this->load->view('admin/template',$arrData);
				}

			
		//}

		//Displays the error message
		//$arrData["error_message"] = $strErrorMessage;
		
		//Loading the view to display the results obtained in frontend
		//$arrData['middle'] = 'admin/disk';
		//$this->load->view('admin/template',$arrData);
	}

	/**
	/*
	 * edit_disk
	 *
	 * Calls edit_disk to edit disk
	 *  
	 * @access	public
	 * @param int $iddepartment
	 * @return	void
	 */
	public function edit_disk($id)
	{
		
		$arrData = array();

		//This is to check is value inserted into input field
		if($_POST)
		{
			$arrData["name"] = $this->input->post('name');
			$updateFlag = $this->disk_model->update($arrData,$id);
			if($updateFlag)
			{
				//This is to get all disk details
				$arrData['list_disk'] = $this->disk_model->get_all_disk_listing();

				//This is to load list of disk view.
				$arrData['middle'] = 'admin/disk/listdisk';
				$this->load->view('admin/template',$arrData);
			}
		}
		else
		{
			//This is to get all disk details.
			$arrData['Details'] = $this->disk_model->get_details($id);

			//This is to view load edit disk view.
			$arrData['middle'] = 'admin/disk/editdisk';
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

		$flag =  $this->disk_model->get_flag_value($id);
		//print_r($flag);

		if($flag[0]['disabled'] == 1)
		{	
			$flag[0]['disabled'] = 0;
			$arrData['disabled'] = $flag[0]['disabled'];
			$flagInactive =  $this->disk_model->updateDisabled($arrData,$id);
		}
		elseif($flag[0]['disabled'] == 0)
		{
			$flag[0]['disabled'] = 1;
			$arrData['disabled'] = $flag[0]['disabled'];
			$flagInactive =  $this->disk_model->updateDisabled($arrData,$id);
		}

	}

	

}
?>