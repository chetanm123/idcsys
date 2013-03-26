<?php
class Provisions extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		//Load the Model files
		$this->load->model('provision_model');
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
	 * This is to view all provision details.
	 
	 * @access	public	 
	 * @return	void
	 */
	public function index()
	{
		$arrData = array();
		
		//This is to get all storage listing.
		$arrData['list_provision'] = $this->provision_model->get_all_provision_listing();
		
		//This loads the storage listing.
		$arrData['middle'] = 'admin/provision/listprovision';
		$this->load->view('admin/template',$arrData);
	}

	
}
?>