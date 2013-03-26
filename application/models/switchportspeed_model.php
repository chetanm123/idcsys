<?php


class Switchportspeed_model extends CI_Model{

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
		
		if($this->db->insert('switchport_speeds', $arrData))
		{
				
			return true;
		}
		else 
		{	
			
			return false;
		}
	}


	/**
	 * get_all_switchportspeed_listing
	 *
	 * This is to get the switchportspeed listing  
	 *
	 
	 * @access	public
	 * @param   int $limit
	 * @param   int $iOffset
	 * @return array
	 */	
		function get_all_switchportspeed_listing(){
		
		$arrData = array();
		$this->db->select('*');
		
		$objQuery = $this->db->get('switchport_speeds');		
		
		
		return $objQuery->result_array();

		
		
	}
	

	function get_details($id)
	{
		$this->db->select('*');
		
		$this->db->where('id', $id); 
		
		$objQuery = $this->db->get('switchport_speeds');
		
		return $objQuery->result_array();
	}

	function update($arrData,$id)
	{
		$this->db->where('id',$id);
		if($this->db->update('switchport_speeds', $arrData))
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

		$objQuery = $this->db->get('switchport_speeds');
		
		return $objQuery->result_array();
	}


	public function updateDisabled($arrData,$id)
	{
		$this->db->where('id',$id);
		if($this->db->update('switchport_speeds', $arrData))
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