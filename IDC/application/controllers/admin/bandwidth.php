<?php
class Bandwidth extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');	
		//Load the Model files
		$this->load->model('bandwidth_model');
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
	 * This is to view all bandwidths details	 
	 * @access	public	 
	 * @param   int $iOffset
	 * @return	void
	 */
	public function index($iOffset='')
	{
		$arrData = array();

		//Load the required libraries for pagination
		$this->load->library('pagination');

		//echo base_url()."<br/>";
		//echo $this->uri->segment(2);exit;
		//exit;
		
		$config['base_url'] = 'http://idc.php-dev.in/admin/bandwidth/index';
		//Display 10 results per page
		$config['per_page'] = '10';
		$config['num_links'] = '4';
		$config['uri_segment'] = '4';

		//$config['use_page_numbers'] = TRUE;

		//$config['page_query_string'] = TRUE;

		//echo $this->uri->segment(2);exit;

		$arrData['list_bandwidth'] = $this->bandwidth_model->get_all_bandwidth_listing($config['per_page'],$this->uri->segment(4));

		//Calling the get_user_count() function from the bandwidth model to get Total No of bandwidth plans. This will give the total number of rows
		$config['total_rows'] = $this->bandwidth_model->get_bandwidth_count();
		//echo "<pre>";
		//print_r($config['total_rows']);exit;

		$this->pagination->initialize($config);

		//Creating variable to display the links for page numbers
		$arrData['links']=$this->pagination->create_links();	

		//echo "<pre>";
		//print_R($arrData['links']);exit;

		//This is used for displaying serial numbers in front end
		if($iOffset == ''){
			$iOffset = 0;
		}
		$arrData['page_no']=$iOffset;

		//echo "<pre>";
		//print_R($arrData['page_no']);exit;

		$arrData['middle'] = 'admin/bandwidth/listbandwidth';
		$this->load->view('admin/template',$arrData);
	}

	/**
	/*
	 * create_bandwidth
	 *
	 * Calls create_bandwidth to create bandwidth
	 *
	 * @access	public
	 * @return	void
	 */
	public function create_bandwidth()
	{
		
		$arrData = array();
		$strErrorMessage = '';
		$iOffset='';
		
		$config['base_url'] = 'http://idc.php-dev.in/admin/bandwidth/index';
		//Load the required libraries for pagination
		$this->load->library('pagination');

		//Display 10 results per page
		$config['per_page'] = '10';
		$config['num_links'] = '4';
		$config['uri_segment'] = '4';
		

		//Calling the get_user_count() function from the bandwidth model to get Total No of bandwidth plans. This will give the total number of rows
		$config['total_rows'] = $this->bandwidth_model->get_bandwidth_count();

		$this->pagination->initialize($config);

		//Creating variable to display the links for page numbers
		$arrData['links']=$this->pagination->create_links();	

		//This is used for displaying serial numbers in front end
		if($iOffset == ''){
			$iOffset = 0;
		}
		$arrData['page_no']=$iOffset;

		//$arrData['list_bandwidth'] = $this->bandwidth_model->get_all_bandwidth_listing($config['per_page'],$this->uri->segment(3));

		//if($this->form_validation->run() === TRUE) 
		//{
				
				
				$arrDataBandwidth['name'] = $this->input->post('name');
				$insertflag = $this->bandwidth_model->save($arrDataBandwidth);
				if($insertflag)
				{
					//Creating variable to display the links for page numbers
					$arrData['links']=$this->pagination->create_links();
					//This lists all bandwidth listing.
					$arrData['list_bandwidth'] = $this->bandwidth_model->get_all_bandwidth_listing($config['per_page'],$this->uri->segment(4));
					
					//This loads the bandwidth listing.
					$arrData['middle'] = 'admin/bandwidth/listbandwidth';
					$this->load->view('admin/template',$arrData);
				}
				else
				{
					//This loads the list bandwidth view.
					$arrData['middle'] = 'admin/bandwidth/listbandwidth';
					$this->load->view('admin/template',$arrData);
				}

			
		//}

		//Displays the error message
		//$arrData["error_message"] = $strErrorMessage;
		
		//Loading the view to display the results obtained in frontend
		//$arrData['middle'] = 'admin/bandwidth';
		//$this->load->view('admin/template',$arrData);
	}

	/**
	/*
	 * edit_bandwidth
	 *
	 * Calls edit_bandwidth to edit bandwidth
	 *  
	 * @access	public
	 * @param int $iddepartment
	 * @return	void
	 */
	public function edit_bandwidth($id)
	{
		
		$arrData = array();
		$iOffset='';

		$config['base_url'] = 'http://idc.php-dev.in/admin/bandwidth/index';
		//Load the required libraries for pagination
		$this->load->library('pagination');

		//Display 10 results per page
		$config['per_page'] = '10';
		$config['num_links'] = '4';
		$config['uri_segment'] = '4';
		

		//Calling the get_user_count() function from the bandwidth model to get Total No of bandwidth plans. This will give the total number of rows
		$config['total_rows'] = $this->bandwidth_model->get_bandwidth_count();

		$this->pagination->initialize($config);

		//Creating variable to display the links for page numbers
		$arrData['links']=$this->pagination->create_links();	

		//This is used for displaying serial numbers in front end
		if($iOffset == ''){
			$iOffset = 0;
		}
		$arrData['page_no']=$iOffset;


		if($_POST)
		{
			$arrupdateDataBandwidth["name"] = $this->input->post('name');
			$updateFlag = $this->bandwidth_model->update($arrupdateDataBandwidth,$id);
			if($updateFlag)
			{
				$arrData['list_bandwidth'] = $this->bandwidth_model->get_all_bandwidth_listing($config['per_page'],$this->uri->segment(4));
				$arrData['middle'] = 'admin/bandwidth/listbandwidth';
				$this->load->view('admin/template',$arrData);
			}
		}
		else
		{
			$arrData['Details'] = $this->bandwidth_model->get_details($id);
			$arrData['middle'] = 'admin/bandwidth/editbandwidth';
			$this->load->view('admin/template',$arrData);
		}
	}

	/**
	/*
	 * activeinactiveflag
	 *
	 * Calls activeinactiveflag to enable and disable functionality.
	 *  
	 * @access	public
	 * @param int $id
	 * @return	void
	 */
	public function activeinactiveflag($id)
	{
		
		$arrData = array();

		$flag =  $this->bandwidth_model->get_flag_value($id);
		//print_r($flag);

		if($flag[0]['disabled'] == 1)
		{	
			$flag[0]['disabled'] = 0;
			$arrData['disabled'] = $flag[0]['disabled'];
			$flagInactive =  $this->bandwidth_model->updateDisabled($arrData,$id);
		}
		elseif($flag[0]['disabled'] == 0)
		{
			$flag[0]['disabled'] = 1;
			$arrData['disabled'] = $flag[0]['disabled'];
			$flagInactive =  $this->bandwidth_model->updateDisabled($arrData,$id);
		}

	}

	

}
?>