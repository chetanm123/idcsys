<?php

/* This model to deal with user roles content*/
class Userroles_model extends CI_Model{

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
	 * This is to Insert a record in user roles table
	 * 
	 
	 * @access	public
	 * @param   array $arrData
	 * @return	bool
	 */
	function save($arrData)
	{
		//This inserts the data into user roles table
		if($this->db->insert('roles', $arrData))
		{
				
			return true;
		}
		else 
		{	
			
			return false;
		}
	}


	/**
	 * get_all_user roles_listing
	 *
	 * This is to get the all user roles listing  
	 *
	 
	 * @access	public	 
	 * @return array
	 */	
		function get_all_userroles_listing(){
		
		$arrData = array();
		$this->db->select('*');
		
		//This fetch the data from the user roles table.
		$objQuery = $this->db->get('roles');		
		
		//This returns the result in the form of array.
		return $objQuery->result_array();

		
		
	}
	
	/**
	 * get_details
	 *
	 * This is to get the user roles details of provided id. 
	 * @param $id
	 * @access	public	 
	 * @return array
	 */	
	function get_details($id)
	{
		//This is to select all the fields from table.
		$this->db->select('*');
		
		$this->db->where('id', $id); 
		
		//This is to fetch the data from user roles table.
		$objQuery = $this->db->get('roles');
		
		//This returns the result in the form of array.
		return $objQuery->result_array();
	}
	

	/**
	 * get_details
	 *
	 * This is to update the user roles details of provided id. 
	 * @param $id
	 * @access	public	 
	 * @return array
	 */
	function update($arrData,$id)
	{
		$this->db->where('id',$id);

		//This updates the user roles table with provided id.
		if($this->db->update('roles', $arrData))
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