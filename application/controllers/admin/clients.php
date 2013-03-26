<?php

/*This class is to deal with clients details */
class Clients extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');	
		//Load the Model files
		$this->load->model('clients_model');
		$this->load->library('form_validation');
		if($this->session->userdata('username') == "")
		{
			redirect('login');
		}
	}
	
	/**
	 * index
	 * This is to view all clientss details	 
	 * @access	public	 
	 * @return	void
	 */
	public function index()
	{
		$arrData = array();
		
		//This is to get all clients listing.
		$arrData['list_clients'] = $this->clients_model->get_all_clients_listing();
		
		//This loads the clients listing.
		$arrData['middle'] = 'admin/clients/listclients';
		$this->load->view('admin/template',$arrData);
	}

	/**
	/*
	 * create_clients
	 *
	 * Calls create_clients to create clients
	 *
	 * @access	public
	 * @return	void
	 */
	public function create_clients()
	{
		
		$arrData = array();
		$strErrorMessage = '';

		//if($this->form_validation->run() === TRUE) 
		//{
				
				
				$arrData['name'] = $this->input->post('name');
				$insertflag = $this->clients_model->save($arrData);
				if($insertflag)
				{
					//This lists all clients listing.
					$arrData['list_clients'] = $this->clients_model->get_all_clients_listing();
					
					//This loads the clients listing.
					$arrData['middle'] = 'admin/clients/listclients';
					$this->load->view('admin/template',$arrData);
				}
				else
				{
					//This loads the list clients view.
					$arrData['middle'] = 'admin/clients/listclients';
					$this->load->view('admin/template',$arrData);
				}

			
		//}

		//Displays the error message
		//$arrData["error_message"] = $strErrorMessage;
		
		//Loading the view to display the results obtained in frontend
		//$arrData['middle'] = 'admin/clients';
		//$this->load->view('admin/template',$arrData);
	}

	/**
	/*
	 * edit_clients
	 *
	 * Calls edit_clients to edit clients
	 *  
	 * @access	public
	 * @param int $iddepartment
	 * @return	void
	 */
	public function edit_clients($id)
	{
		
		$arrData = array();

		//This is to check is value inserted into input field
		if($_POST)
		{
			$arrData["name"] = $this->input->post('name');
			$updateFlag = $this->clients_model->update($arrData,$id);
			if($updateFlag)
			{
				//This is to get all clients details
				$arrData['list_clients'] = $this->clients_model->get_all_clients_listing();

				//This is to load list of clients view.
				$arrData['middle'] = 'admin/clients/listclients';
				$this->load->view('admin/template',$arrData);
			}
		}
		else
		{
			//This is to get all clients details.
			$arrData['Details'] = $this->clients_model->get_details($id);

			//This is to view load edit clients view.
			$arrData['middle'] = 'admin/clients/editclients';
			$this->load->view('admin/template',$arrData);
		}
	}

	

}
?>