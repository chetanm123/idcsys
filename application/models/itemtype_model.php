<?php

/* This model to deal with itemtype content*/
class Itemtype_model extends CI_Model{

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
	 * This is to Insert a record in itemtype table
	 * 
	 
	 * @access	public
	 * @param   array $arrData
	 * @return	bool
	 */
	function save($arrData)
	{
		//This inserts the data into itemtype table
		if($this->db->insert('item_types', $arrData))
		{
				
			return true;
		}
		else 
		{	
			
			return false;
		}
	}


	/**
	 * get_all_itemtype_listing
	 *
	 * This is to get the all itemtype listing  
	 *
	 
	 * @access	public	 
	 * @return array
	 */	
		function get_all_itemtype_listing(){
		
		$arrData = array();
		$this->db->select('*');
		
		//This fetch the data from the itemtype table.
		$objQuery = $this->db->get('item_types');		
		
		//This returns the result in the form of array.
		return $objQuery->result_array();

		
		
	}
	
	/**
	 * get_details
	 *
	 * This is to get the itemtype details of provided id. 
	 * @param $id
	 * @access	public	 
	 * @return array
	 */	
	function get_details($id)
	{
		//This is to select all the fields from table.
		$this->db->select('*');
		
		$this->db->where('id', $id); 
		
		//This is to fetch the data from itemtype table.
		$objQuery = $this->db->get('item_types');
		
		//This returns the result in the form of array.
		return $objQuery->result_array();
	}
	

	/**
	 * get_details
	 *
	 * This is to update the itemtype details of provided id. 
	 * @param $id
	 * @access	public	 
	 * @return array
	 */
	function update($arrData,$id)
	{
		$this->db->where('id',$id);

		//This updates the itemtype table with provided id.
		if($this->db->update('item_types', $arrData))
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