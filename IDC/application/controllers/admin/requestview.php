<?php
class Requestview extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
	}
	

	 /**
	 * index
	 * This is to get all requestview details
	 
	 * @access	public	 
	 * @return	void
	 */
	 public function index()
	 {
		$this->load->view('admin/requestview');
	 }


}
?>