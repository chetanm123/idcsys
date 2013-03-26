<?php
class Requests extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('username') == "")
		{
			redirect('login');
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
		//$arrData['list_storage'] = $this->storage_model->get_all_storage_listing();
		
		//This loads the storage listing.
		$arrData['middle'] = 'admin/request/listrequest';
		$this->load->view('admin/template',$arrData);
	}

	
}
?>