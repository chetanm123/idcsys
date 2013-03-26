<?php

/* This model to deal with users content*/
class Users_model extends CI_Model{

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
	 * This is to Insert a record in users table
	 * 
	 
	 * @access	public
	 * @param   array $arrData
	 * @return	bool
	 */
	function save($arrData)
	{
		//This inserts the data into users table
		if($this->db->insert('users', $arrData))
		{
				
			return true;
		}
		else 
		{	
			
			return false;
		}
	}

	
	/**
	 * saveUserRoles
	 *
	 * This is to Insert a record in user_roles table
	 * 
	 
	 * @access	public
	 * @param   array $arrData
	 * @return	bool
	 */
	function saveUserRoles($arrData)
	{
		//This inserts the data into users table
		if($this->db->insert('user_roles', $arrData))
		{
				
			return true;
		}
		else 
		{	
			
			return false;
		}
	}
	


	/**
	 * get_all_users_listing
	 *
	 * This is to get the all users listing  
	 *
	 
	 * @access	public	 
	 * @return array
	 */	
		function get_all_users_listing(){
		
		$arrData = array();
		$this->db->select('u.*,r.id as roleid,r.name as rolename,ur.user_id,ur.role_id');
		$this->db->join('user_roles ur', 'ur.user_id = u.id', 'left');
		$this->db->join('roles r', 'r.id = ur.role_id', 'left');
		
		
		//This fetch the data from the users table.
		$objQuery = $this->db->get('users u');		
		
		//This returns the result in the form of array.
		return $objQuery->result_array();
		
	}
	
	/**
	 * get_details
	 *
	 * This is to get the users details of provided id. 
	 * @param $id
	 * @access	public	 
	 * @return array
	 */	
	function get_users_details($id)
	{
		
		//This is to select all the fields from table.
		$this->db->select('u.*,r.id as roleid,r.name as rolename,ur.user_id,ur.role_id');
		$this->db->join('user_roles ur', 'ur.user_id = u.id', 'left');
		$this->db->join('roles r', 'r.id = ur.role_id', 'left');
		$this->db->where('u.id', $id, FALSE);
		
		//This is to fetch the data from users table.
		$objQuery = $this->db->get('users u');

		//echo $this->db->last_query();exit;

		//This returns the above result in array form
		return $objQuery->result_array();
	}
	

	/**
	 * get_details
	 *
	 * This is to update the users details of provided id. 
	 * @param $id
	 * @access	public	 
	 * @return array
	 */
	function update($arrData,$id)
	{
		$this->db->where('id',$id);

		//This updates the users table with provided id.
		if($this->db->update('users', $arrData))
		{	
				return true;
		}
		else
		{
				return false;
		}	
	}


	/**
	 * get_all_userstypes
	 *
	 * This is to get the all users types listing 
	 *
	 * @access	public
	 * @return array
	 */	
	
	 function get_all_userroles() {
		$arrData = array();
		$this->db->select('*');
		$this->db->from('roles');
		$objQuery = $this->db->get();
		
		
			//return $objQuery->result_array();
			 if ($objQuery->num_rows() > 0) {
				$arrData[''] = "Select Role";
				foreach ($objQuery->result_array() as $row) {
					
					 $arrData[$row['id']] = $row['name'];
				}
				
			 }
			 
			 $objQuery->free_result();
			 
			 return $arrData;
	 }

}


?>