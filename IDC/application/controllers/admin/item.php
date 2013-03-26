<?php

/*This class is to deal with item details */
class Item extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');	
		//Load the Model files
		$this->load->model('item_model');		
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
	 * This is to view all items details	 
	 * @access	public	 
	 * @return	void
	 */
	public function index()
	{
		$arrData = array();
		
		//This is to get all item listing.
		$arrData['list_item'] = $this->item_model->get_all_item_listing();		

		$arrData['list_itemtype'] = $this->item_model->get_all_itemtypes();
		
		//This loads the item listing.
		$arrData['middle'] = 'admin/item/listitem';
		$this->load->view('admin/template',$arrData);
	}

	/**
	/*
	 * create_item
	 *
	 * Calls create_item to create item
	 *
	 * @access	public
	 * @return	void
	 */
	public function create_item()
	{
		
		$arrData = array();
		$arrItemData = array();
		$strErrorMessage = '';

		//if($this->form_validation->run() === TRUE) 
		//{
				
				
				$arrItemData['details'] = $this->input->post('name');
				$arrItemData['item_type_id'] = $this->input->post('itemtype');
				
				$arrData['list_itemtype'] = $this->item_model->get_all_itemtypes();
				$insertflag = $this->item_model->save($arrItemData);
				if($insertflag)
				{
					//This lists all item listing.
					$arrData['list_item'] = $this->item_model->get_all_item_listing();
					
					//This loads the item listing.
					$arrData['middle'] = 'admin/item/listitem';
					$this->load->view('admin/template',$arrData);
				}
				else
				{
					$arrData['item_type'] = $this->item_model->get_all_itemtypes();
					//This loads the list item view.
					$arrData['middle'] = 'admin/item/listitem';
					$this->load->view('admin/template',$arrData);
				}

			
		//}

		//Displays the error message
		//$arrData["error_message"] = $strErrorMessage;
		
		//Loading the view to display the results obtained in frontend
		//$arrData['middle'] = 'admin/item';
		//$this->load->view('admin/template',$arrData);
	}

	/**
	/*
	 * edit_item
	 *
	 * Calls edit_item to edit item
	 *  
	 * @access	public
	 * @param int $iddepartment
	 * @return	void
	 */
	public function edit_item($id)
	{
		
		$arrData = array();
		$arrItemData = array();

		$arrData['item_details'] = $this->item_model->get_item_details($id);

		//This is to check is value inserted into input field
		if($_POST)
		{
			
			//This is to get item type in the dropdown for items to add.
			$arrData['list_itemtype'] = $this->item_model->get_all_itemtypes();

			//This get the item details with item type.
			$arrData['item_details'] = $this->item_model->get_item_details($id);

			$arrItemData['details'] = $this->input->post('name');
			$arrItemData['item_type_id'] = $this->input->post('itemtype');
			
			//This is to update item data while editing item.
			$updateFlag = $this->item_model->update($arrItemData,$id);
			if($updateFlag)
			{
				//This is to get all item details
				$arrData['list_item'] = $this->item_model->get_all_item_listing();
				
				//This get the item details with item type.
				$arrData['item_details'] = $this->item_model->get_item_details($id);

				//This is to load list of item view.
				$arrData['middle'] = 'admin/item/listitem';
				$this->load->view('admin/template',$arrData);
			}
		}
		else
		{
			$arrData['list_itemtype'] = $this->item_model->get_all_itemtypes();

			//This is to get all item details
			$arrData['list_item'] = $this->item_model->get_all_item_listing();
			
			//This get the item details with item type.
			$arrData['item_details'] = $this->item_model->get_item_details($id);

			//This is to get all item details of provided item id.
			$arrData['Details'] = $this->item_model->get_item_details($id);

			//This is to view load edit item view.
			$arrData['middle'] = 'admin/item/edititem';
			$this->load->view('admin/template',$arrData);
		}
	}

	

}
?>