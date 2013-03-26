<?php
class Messages extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
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
	 * This is to view all messages
	 
	 * @access	public	 
	 * @return	void
	 */
	public function index()
	{
		$this->load->view('admin/messages');
	}


}
?>