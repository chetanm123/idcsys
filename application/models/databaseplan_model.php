<?php

/* This model to deal with databaseplan content*/
class Databaseplan_model extends CI_Model{

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
	 * This is to Insert a record in databaseplan table
	 * 
	 
	 * @access	public
	 * @param   array $arrData
	 * @return	bool
	 */
	function save($arrData)
	{
		//This inserts the data into databaseplan table
		if($this->db->insert('databases', $arrData))
		{
				
			return true;
		}
		else 
		{	
			
			return false;
		}
	}


	/**
	 * get_all_databaseplan_listing
	 *
	 * This is to get the all databaseplan listing  
	 *
	 
	 * @access	public	 
	 * @return array
	 */	
		function get_all_databaseplan_listing(){
		
		$arrData = array();
		$this->db->select('*');
		
		//This fetch the data from the databaseplan table.
		$objQuery = $this->db->get('databases');		
		
		//This returns the result in the form of array.
		return $objQuery->result_array();

		
		
	}
	
	/**
	 * get_details
	 *
	 * This is to get the databaseplan details of provided id. 
	 * @param $id
	 * @access	public	 
	 * @return array
	 */	
	function get_details($id)
	{
		//This is to select all the fields from table.
		$this->db->select('*');
		
		$this->db->where('id', $id); 
		
		//This is to fetch the data from databaseplan table.
		$objQuery = $this->db->get('databases');
		
		//This returns the result in the form of array.
		return $objQuery->result_array();
	}
	

	/**
	 * get_details
	 *
	 * This is to update the databaseplan details of provided id. 
	 * @param $id
	 * @access	public	 
	 * @return array
	 */
	function update($arrData,$id)
	{
		$this->db->where('id',$id);

		//This updates the databaseplan table with provided id.
		if($this->db->update('databases', $arrData))
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

		$objQuery = $this->db->get('databases');
		
		return $objQuery->result_array();
	}


	public function updateDisabled($arrData,$id)
	{
		$this->db->where('id',$id);
		if($this->db->update('databases', $arrData))
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