<?php

/*This class is to deal with users details */
class Users extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');	
		//Load the Model files
		$this->load->model('users_model');		
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
	 * This is to view all userss details	 
	 * @access	public	 
	 * @return	void
	 */
	public function index()
	{
		$arrData = array();
		
		//This is to get all users listing.
		$arrData['list_users'] = $this->users_model->get_all_users_listing();		

		$arrData['roles_list'] = $this->users_model->get_all_userroles();
		
		//This loads the users listing.
		$arrData['middle'] = 'admin/users/listusers';
		$this->load->view('admin/template',$arrData);
	}

	/**
	/*
	 * create_users
	 *
	 * Calls create_users to create users
	 *
	 * @access	public
	 * @return	void
	 */
	public function create_users()
	{
		
		$arrData = array();
		$arrItemData = array();
		$strErrorMessage = '';

		//This is validation for user creating designation with hod
		//$this->form_validation->set_rules('name', 'User Name', 'required|max_length[20]|alpha|unique[users.username]');

		//if($this->form_validation->run() === TRUE) 
		//{
				
				
				$arrUserData['name'] = $this->input->post('name');
				$arrUserData['password'] = md5($this->input->post('password'));

				$arrRolesData['role_id'] = $this->input->post('userroles');
				
				$arrData['roles_list'] = $this->users_model->get_all_userroles();
				$insertflag = $this->users_model->save($arrUserData);

				$arrRolesData['user_id'] = $this->db->insert_id();

				$insertUserRolesFlag = $this->users_model->saveUserRoles($arrRolesData);
				if($insertUserRolesFlag)
				{
					//This lists all users listing.
					$arrData['list_users'] = $this->users_model->get_all_users_listing();
					
					//This loads the users listing.
					$arrData['middle'] = 'admin/users/listusers';
					$this->load->view('admin/template',$arrData);
				}
				else
				{
					$arrData['roles_list'] = $this->users_model->get_all_userroles();
					//This loads the list users view.
					$arrData['middle'] = 'admin/users/listusers';
					$this->load->view('admin/template',$arrData);
				}

			
		//}

		//Displays the error message
		//$arrData["error_message"] = $strErrorMessage;
		
		//Loading the view to display the results obtained in frontend
		//$arrData['middle'] = 'admin/users';
		//$this->load->view('admin/template',$arrData);
	}

	/**
	/*
	 * edit_users
	 *
	 * Calls edit_users to edit users
	 *  
	 * @access	public
	 * @param int $iddepartment
	 * @return	void
	 */
	public function create_anotherrole($id)
	{
		
		$arrData = array();
		$arrItemData = array();

		$arrData['users_details'] = $this->users_model->get_users_details($id);

		//This is to check is value inserted into input field
		if($_POST)
		{
			
			//This is to get users type in the dropdown for userss to add.
			$arrData['roles_list'] = $this->users_model->get_all_userroles();

			//This get the users details with users type.
			$arrData['users_details'] = $this->users_model->get_users_details($id);

			//$arrItemData['details'] = $this->input->post('name');
			//$arrItemData['users_type_id'] = $this->input->post('userstype');
			
			//This is to update users data while editing users.
			$updateFlag = $this->users_model->update($arrItemData,$id);
			if($updateFlag)
			{
				//This is to get all users details
				$arrData['list_users'] = $this->users_model->get_all_users_listing();
				
				//This get the users details with users type.
				$arrData['users_details'] = $this->users_model->get_users_details($id);

				//This is to load list of users view.
				$arrData['middle'] = 'admin/users/listusers';
				$this->load->view('admin/template',$arrData);
			}
		}
		else
		{
			$arrData['list_userstype'] = $this->users_model->get_all_userroles();

			//This is to get all users details
			$arrData['list_users'] = $this->users_model->get_all_users_listing();
			
			//This get the users details with users type.
			$arrData['users_details'] = $this->users_model->get_users_details($id);

			//This is to get all users details of provided users id.
			$arrData['Details'] = $this->users_model->get_users_details($id);

			//This is to view load edit users view.
			$arrData['middle'] = 'admin/users/addanotherrole';
			$this->load->view('admin/template',$arrData);
		}
	}

	

}
?>