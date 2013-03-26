<?php
class Dashboard extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('username') == "")
		{
			redirect(base_url().'login','refresh');
		}
		if($this->session->userdata('username') != "" && $this->session->userdata('user_role') == "sales")
		{
			redirect(base_url().'sales','refresh');
		}
		elseif($this->session->userdata('username') != "" && $this->session->userdata('user_role') == "billing")
		{
			redirect(base_url().'billing','refresh');
		}
		elseif($this->session->userdata('username') != "" && $this->session->userdata('user_role') == "provision")
		{
			redirect(base_url().'provision/provisions','refresh');
		}
	}

	public function index()
	{
		$arrData['middle'] = 'admin/dashboard';
		$this->load->view('admin/template',$arrData);
	}
}
?>