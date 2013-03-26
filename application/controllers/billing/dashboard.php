<?php
class Dashboard extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('username') == "")
		{
			redirect('login');
		}
		elseif($this->session->userdata('username') != "" && $this->session->userdata('user_role') == "admin")
		{
			redirect('admin');
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

	public function index()
	{
		$arrData['middle'] = 'billing/dashboard';
		$this->load->view('billing/template',$arrData);
	}

	
}
?>