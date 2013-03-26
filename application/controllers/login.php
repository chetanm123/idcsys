<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller{

	function __construct()
	{
		parent::__construct();
		$this->load->model("login_model");	
		
		//echo $this->uri->segment(1);exit;
		if($this->uri->segment(2) != 'logout')
		{
			if($this->session->userdata('user_logged_in') == true)
			{
				redirect(base_url().$this->session->userdata('user_role'),'refresh');
			}
		}
//		elseif($this->session->userdata('username') != "" && $this->session->userdata('user_role') == "sales")
//		{
//			redirect(base_url().'sales','refresh');
//		}
//		elseif($this->session->userdata('username') != "" && $this->session->userdata('user_role') == "billing")
//		{
//			redirect(base_url().'billing','refresh');
//		}
//		elseif($this->session->userdata('username') != "" && $this->session->userdata('user_role') == "provision")
//		{
//			redirect(base_url().'provision/provisions','refresh');
//		}
	}
     /**
	 * index
	 * Public function to authorize the user login
	 * @access	public	 
	 * @return	void
	 */
	public function index()
	{
		
		if($this->input->post('randval'))
		{
			$username = $this->input->post('username');
			$password = md5($this->input->post('password'));
			$userInfo=$this->login_model->getuser($username,$password);
			
			//echo "<pre>";
			//print_r($userInfo);exit;

			
			if(sizeof($userInfo)>0)
			{
				$userid = $userInfo[0]['id'];
				$this->session->set_userdata('user_logged_in',true);
				$this->session->set_userdata('username',$username);
				$this->session->set_userdata('user_role',$userInfo[0]['rolename']);
				$this->session->set_userdata('userid',$userid);
				$sess = $this->session->all_userdata();
				//print_r($userInfo);
				//echo "<pre>";print_r($sess);exit;
				if($userInfo[0]['role_id']==1)
					redirect("admin");
				elseif($userInfo[0]['role_id']==2)
					redirect("sales");
				elseif($userInfo[0]['role_id']==3)
					redirect("provision/provisions");
				elseif($userInfo[0]['role_id']==4)
					redirect("billing");
			}
			else
				$this->session->set_userdata('invalid','Invalid username/password');	
		}
		$this->load->view('login_view');
	}


	/**
	 * logout
	 * Public function to logout the user
	 * @access	public	 
	 * @return	void
	 */
	public function logout()
	{	
		$this->session->sess_destroy();
		//echo "<pre>";
		//print_r($this->session->all_userdata());exit;
		redirect(base_url().'login','refresh');

		$this->load->view('login_view');
	}
}