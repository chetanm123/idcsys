<?php


class Bandwidth_model extends CI_Model{

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
		
		if($this->db->insert('bandwidth_plans', $arrData))
		{
				
			return true;
		}
		else 
		{	
			
			return false;
		}
	}


	/**
	 * get_all_bandwidth_listing
	 *
	 * This is to get the bandwidth listing  
	 *
	 
	 * @access	public
	 * @param   int $limit
	 * @param   int $iOffset
	 * @return array
	 */	
		function get_all_bandwidth_listing($limit,$iOffset){
		
		$arrData = array();
		$this->db->select('*');
		$this->db->limit($limit, $iOffset);
		
		$objQuery = $this->db->get('bandwidth_plans');
		
		//echo $this->db->last_query();exit;
		
		
		return $objQuery->result_array();

		
		
	}


	/**
	 * get_bandwidth_count
	 *
	 * This is to get the count of total rows in bandwidth_plans table
	 * 
	 * @author	Yogesh P
	 * @access	public
	 * @return	int
	 */
	 
	function get_bandwidth_count()
	{
		$this->db->select('name');
		$this->db->from('bandwidth_plans');
		$objQuery = $this->db->get();
		
		//echo $this->db->last_query();exit;
		//This returns the number of row in int form
		return $objQuery->num_rows();
	}
	

	function get_details($id)
	{
		$this->db->select('*');
		
		$this->db->where('id', $id); 
		
		$objQuery = $this->db->get('bandwidth_plans');
		
		return $objQuery->result_array();
	}

	function update($arrData,$id)
	{
		$this->db->where('id',$id);
		if($this->db->update('bandwidth_plans', $arrData))
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

		$objQuery = $this->db->get('bandwidth_plans');
		
		return $objQuery->result_array();
	}


	public function updateDisabled($arrData,$id)
	{
		$this->db->where('id',$id);
		if($this->db->update('bandwidth_plans', $arrData))
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