<?php


class Contractperiod_model extends CI_Model{

	/**
	 * __construct
	 *
	 * Calls parent constructor
	 *
	 * @access	public
	 * @return	void
	 */
	function __construct()
	{
		// Initialization of class
		parent::__construct();
	}

	/**
	 * save
	 *
	 * This is to Insert a record in mail_server table
	 * 
	 
	 * @access	public
	 * @param   array $arrData
	 * @return	bool
	 */
	function save($arrData)
	{
		
		if($this->db->insert('contract_periods', $arrData))
		{
				
			return true;
		}
		else 
		{	
			
			return false;
		}
	}


	/**
	 * get_all_contractperiod_listing
	 *
	 * This is to get the contractperiod listing  
	 *
	 
	 * @access	public
	 * @param   int $limit
	 * @param   int $iOffset
	 * @return array
	 */	
		function get_all_contractperiod_listing(){
		
		$arrData = array();
		$this->db->select('*');
		
		$objQuery = $this->db->get('contract_periods');		
		
		
		return $objQuery->result_array();

		
		
	}
	

	function get_details($id)
	{
		$this->db->select('*');
		
		$this->db->where('id', $id); 
		
		$objQuery = $this->db->get('contract_periods');
		
		return $objQuery->result_array();
	}

	function update($arrData,$id)
	{
		$this->db->where('id',$id);
		if($this->db->update('contract_periods', $arrData))
		{
				return true;
		}
		else
		{
				return false;
		}	
	}

	function get_flag_value($id)
	{
		$this->db->select('*');
		
		$this->db->where('id',$id);

		$objQuery = $this->db->get('contract_periods');
		
		return $objQuery->result_array();
	}


	public function updateDisabled($arrData,$id)
	{
		$this->db->where('id',$id);
		if($this->db->update('contract_periods', $arrData))
		{
				return true;
		}
		else
		{
				return false;
		}
	}

}


?>