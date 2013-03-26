<?php

/*This class is to deal with itemtype details */
class Itemtype extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');	
		//Load the Model files
		$this->load->model('itemtype_model');
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
	 * This is to view all itemtypes details	 
	 * @access	public	 
	 * @return	void
	 */
	public function index()
	{
		$arrData = array();
		
		//This is to get all itemtype listing.
		$arrData['list_itemtype'] = $this->itemtype_model->get_all_itemtype_listing();
		
		//This loads the itemtype listing.
		$arrData['middle'] = 'admin/itemtype/listitemtype';
		$this->load->view('admin/template',$arrData);
	}

	/**
	/*
	 * create_itemtype
	 *
	 * Calls create_itemtype to create itemtype
	 *
	 * @access	public
	 * @return	void
	 */
	public function create_itemtype()
	{
		
		$arrData = array();
		$strErrorMessage = '';

		//if($this->form_validation->run() === TRUE) 
		//{
				
				
				$arrData['name'] = $this->input->post('name');
				$insertflag = $this->itemtype_model->save($arrData);
				if($insertflag)
				{
					//This lists all itemtype listing.
					$arrData['list_itemtype'] = $this->itemtype_model->get_all_itemtype_listing();
					
					//This loads the itemtype listing.
					$arrData['middle'] = 'admin/itemtype/listitemtype';
					$this->load->view('admin/template',$arrData);
				}
				else
				{
					//This loads the list itemtype view.
					$arrData['middle'] = 'admin/itemtype/listitemtype';
					$this->load->view('admin/template',$arrData);
				}

			
		//}

		//Displays the error message
		//$arrData["error_message"] = $strErrorMessage;
		
		//Loading the view to display the results obtained in frontend
		//$arrData['middle'] = 'admin/itemtype';
		//$this->load->view('admin/template',$arrData);
	}

	/**
	/*
	 * edit_itemtype
	 *
	 * Calls edit_itemtype to edit itemtype
	 *  
	 * @access	public
	 * @param int $iddepartment
	 * @return	void
	 */
	public function edit_itemtype($id)
	{
		
		$arrData = array();

		//This is to check is value inserted into input field
		if($_POST)
		{
			$arrData["name"] = $this->input->post('name');
			$updateFlag = $this->itemtype_model->update($arrData,$id);
			if($updateFlag)
			{
				//This is to get all itemtype details
				$arrData['list_itemtype'] = $this->itemtype_model->get_all_itemtype_listing();

				//This is to load list of itemtype view.
				$arrData['middle'] = 'admin/itemtype/listitemtype';
				$this->load->view('admin/template',$arrData);
			}
		}
		else
		{
			//This is to get all itemtype details.
			$arrData['Details'] = $this->itemtype_model->get_details($id);

			//This is to view load edit itemtype view.
			$arrData['middle'] = 'admin/itemtype/edititemtype';
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

		$flag =  $this->itemtype_model->get_flag_value($id);
		//print_r($flag);

		if($flag[0]['disabled'] == 1)
		{	
			$flag[0]['disabled'] = 0;
			$arrData['disabled'] = $flag[0]['disabled'];
			$flagInactive =  $this->itemtype_model->updateDisabled($arrData,$id);
		}
		elseif($flag[0]['disabled'] == 0)
		{
			$flag[0]['disabled'] = 1;
			$arrData['disabled'] = $flag[0]['disabled'];
			$flagInactive =  $this->itemtype_model->updateDisabled($arrData,$id);
		}

	}

	

}
?>