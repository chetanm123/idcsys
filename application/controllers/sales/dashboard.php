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
		if($this->session->userdata('username') != "" && $this->session->userdata('user_role') == "admin")
		{
			redirect(base_url().'admin','refresh');
		}
		elseif($this->session->userdata('username') != "" && $this->session->userdata('user_role') == "billing")
		{
			redirect('billing');
		}
		elseif($this->session->userdata('username') != "" && $this->session->userdata('user_role') == "provision")
		{
			redirect('provision/provisions');
		}
	}

	public function index()
	{
		$arrData['middle'] = 'sales/dashboard';
		$this->load->view('sales/template',$arrData);
	}

	
}
?>