<?php 
class Companies_model extends CI_Model
{
	
	// --------------------------------------------------------------------

	/**
	 * __construct
	 *
	 * Calls parent constructor
	 * @author	Sunil Silumala
	 * @access	public
	 * @return	void
	 */
	function __construct()
	{
		//echo "comapny";exit;
		// Initialization of class
		parent::__construct();
	}

	function get_company_details()
	{
		
		$arrData = array();
		
		$this->db->select('*');

		$this->db->where('disabled','1');
		
		$objQuery = $this->db->get('companies');
		
		return $objQuery->result_array();

	}

	function save_company($arrData)
	{
		if($this->db->insert('companies', $arrData))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function get_details($id)
	{
		$this->db->select('*');
		
		$this->db->where('id', $id); 
		
		$objQuery = $this->db->get('companies');
		
		return $objQuery->result_array();
	}

	function edit_company($arrData,$id)
	{
		$this->db->where('id',$id);
		if($this->db->update('companies', $arrData))
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

		$objQuery = $this->db->get('companies');
		
		return $objQuery->result_array();
	}


	public function updateDisabled($arrData,$id)
	{
		$this->db->where('id',$id);
		if($this->db->update('companies', $arrData))
		{
				return true;
		}
		else
		{
				return false;
		}
	}
}
	