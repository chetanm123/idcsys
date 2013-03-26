<?php

/* This model to deal with clients content*/
class Clients_model extends CI_Model{

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
	 * This is to Insert a record in clients table
	 * 
	 
	 * @access	public
	 * @param   array $arrData
	 * @return	bool
	 */
	function save($arrData)
	{
		//This inserts the data into clients table
		if($this->db->insert('clients', $arrData))
		{
				
			return true;
		}
		else 
		{	
			
			return false;
		}
	}


	/**
	 * get_all_clients_listing
	 *
	 * This is to get the all clients listing  
	 *
	 
	 * @access	public	 
	 * @return array
	 */	
		function get_all_clients_listing(){
		
		$arrData = array();
		$this->db->select('*');
		
		//This fetch the data from the clients table.
		$objQuery = $this->db->get('clients');		
		
		//This returns the result in the form of array.
		return $objQuery->result_array();

		
		
	}
	
	/**
	 * get_details
	 *
	 * This is to get the clients details of provided id. 
	 * @param $id
	 * @access	public	 
	 * @return array
	 */	
	function get_details($id)
	{
		//This is to select all the fields from table.
		$this->db->select('*');
		
		$this->db->where('id', $id); 
		
		//This is to fetch the data from clients table.
		$objQuery = $this->db->get('clients');
		
		//This returns the result in the form of array.
		return $objQuery->result_array();
	}
	

	/**
	 * get_details
	 *
	 * This is to update the clients details of provided id. 
	 * @param $id
	 * @access	public	 
	 * @return array
	 */
	function update($arrData,$id)
	{
		$this->db->where('id',$id);

		//This updates the clients table with provided id.
		if($this->db->update('clients', $arrData))
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