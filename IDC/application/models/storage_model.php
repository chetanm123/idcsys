<?php

/* This model to deal with storage content*/
class Storage_model extends CI_Model{

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
	 * This is to Insert a record in storage table
	 * 
	 
	 * @access	public
	 * @param   array $arrData
	 * @return	bool
	 */
	function save($arrData)
	{
		//This inserts the data into storage table
		if($this->db->insert('storage', $arrData))
		{
				
			return true;
		}
		else 
		{	
			
			return false;
		}
	}


	/**
	 * get_all_storage_listing
	 *
	 * This is to get the all storage listing  
	 *
	 
	 * @access	public	 
	 * @return array
	 */	
		function get_all_storage_listing(){
		
		$arrData = array();
		$this->db->select('*');
		
		//This fetch the data from the storage table.
		$objQuery = $this->db->get('storage');		
		
		//This returns the result in the form of array.
		return $objQuery->result_array();

		
		
	}
	
	/**
	 * get_details
	 *
	 * This is to get the storage details of provided id. 
	 * @param $id
	 * @access	public	 
	 * @return array
	 */	
	function get_details($id)
	{
		//This is to select all the fields from table.
		$this->db->select('*');
		
		$this->db->where('id', $id); 
		
		//This is to fetch the data from storage table.
		$objQuery = $this->db->get('storage');
		
		//This returns the result in the form of array.
		return $objQuery->result_array();
	}
	

	/**
	 * get_details
	 *
	 * This is to update the storage details of provided id. 
	 * @param $id
	 * @access	public	 
	 * @return array
	 */
	function update($arrData,$id)
	{
		$this->db->where('id',$id);

		//This updates the storage table with provided id.
		if($this->db->update('storage', $arrData))
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

		$objQuery = $this->db->get('storage');
		
		return $objQuery->result_array();
	}


	public function updateDisabled($arrData,$id)
	{
		$this->db->where('id',$id);
		if($this->db->update('storage', $arrData))
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