<?php

/* This model to deal with antivirus content*/
class Antivirus_model extends CI_Model{

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
	 * This is to Insert a record in antivirus table
	 * 
	 
	 * @access	public
	 * @param   array $arrData
	 * @return	bool
	 */
	function save($arrData)
	{
		//This inserts the data into antivirus table
		if($this->db->insert('antiviruses', $arrData))
		{
				
			return true;
		}
		else 
		{	
			
			return false;
		}
	}


	/**
	 * get_all_antivirus_listing
	 *
	 * This is to get the all antivirus listing  
	 *
	 
	 * @access	public	 
	 * @return array
	 */	
		function get_all_antivirus_listing(){
		
		$arrData = array();
		$this->db->select('*');
		
		//This fetch the data from the antivirus table.
		$objQuery = $this->db->get('antiviruses');		
		
		//This returns the result in the form of array.
		return $objQuery->result_array();

		
		
	}
	
	/**
	 * get_details
	 *
	 * This is to get the antivirus details of provided id. 
	 * @param $id
	 * @access	public	 
	 * @return array
	 */	
	function get_details($id)
	{
		//This is to select all the fields from table.
		$this->db->select('*');
		
		$this->db->where('id', $id); 
		
		//This is to fetch the data from antivirus table.
		$objQuery = $this->db->get('antiviruses');
		
		//This returns the result in the form of array.
		return $objQuery->result_array();
	}
	

	/**
	 * get_details
	 *
	 * This is to update the antivirus details of provided id. 
	 * @param $id
	 * @access	public	 
	 * @return array
	 */
	function update($arrData,$id)
	{
		$this->db->where('id',$id);

		//This updates the antivirus table with provided id.
		if($this->db->update('antiviruses', $arrData))
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

		$objQuery = $this->db->get('antiviruses');
		
		return $objQuery->result_array();
	}


	public function updateDisabled($arrData,$id)
	{
		$this->db->where('id',$id);
		if($this->db->update('antiviruses', $arrData))
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