<?php

/* This model to deal with item content*/
class Item_model extends CI_Model{

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
	 * This is to Insert a record in item table
	 * 
	 
	 * @access	public
	 * @param   array $arrData
	 * @return	bool
	 */
	function save($arrData)
	{
		//This inserts the data into item table
		if($this->db->insert('items', $arrData))
		{
				
			return true;
		}
		else 
		{	
			
			return false;
		}
	}


	/**
	 * get_all_item_listing
	 *
	 * This is to get the all item listing  
	 *
	 
	 * @access	public	 
	 * @return array
	 */	
		function get_all_item_listing(){
		
		$arrData = array();
		$this->db->select('i.*,it.name');
		$this->db->join('item_types it', 'it.id = i.item_type_id', 'left');
		
		//This fetch the data from the item table.
		$objQuery = $this->db->get('items i');		
		
		//This returns the result in the form of array.
		return $objQuery->result_array();
		
	}
	
	/**
	 * get_details
	 *
	 * This is to get the item details of provided id. 
	 * @param $id
	 * @access	public	 
	 * @return array
	 */	
	function get_item_details($id)
	{
		
		//This is to select all the fields from table.
		$this->db->select('i.*,it.name,it.id as itemtypeid');
		$this->db->from('items as i');
		$this->db->join('item_types as it', 'it.id = i.item_type_id', 'left');
		$this->db->where('i.id', $id, FALSE);
		
		//This is to fetch the data from item table.
		$objQuery = $this->db->get();

		//echo $this->db->last_query();exit;

		//This returns the above result in array form
		return $objQuery->result_array();
	}
	

	/**
	 * get_details
	 *
	 * This is to update the item details of provided id. 
	 * @param $id
	 * @access	public	 
	 * @return array
	 */
	function update($arrData,$id)
	{
		$this->db->where('id',$id);

		//This updates the item table with provided id.
		if($this->db->update('items', $arrData))
		{	
				return true;
		}
		else
		{
				return false;
		}	
	}


	/**
	 * get_all_itemtypes
	 *
	 * This is to get the all item types listing 
	 *
	 * @access	public
	 * @return array
	 */	
	
	 function get_all_itemtypes() {
		$arrData = array();
		$this->db->select('*');
		$this->db->from('item_types');
		$objQuery = $this->db->get();
		
		
			//return $objQuery->result_array();
			 if ($objQuery->num_rows() > 0) {
				$arrData[''] = "Select Item Type";
				foreach ($objQuery->result_array() as $row) {
					
					 $arrData[$row['id']] = $row['name'];
				}
				
			 }
			 
			 $objQuery->free_result();
			 
			 return $arrData;
	 }

}


?>