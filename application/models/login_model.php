<?php 
class Login_model extends CI_Model
{
	
	// --------------------------------------------------------------------

	/**
	 * __construct
	 *
	 * Calls parent constructor
	 * @access	public
	 * @return	void
	 */
	function __construct()
	{
		parent::__construct();
	}

    /**
	 * getuser
	 * Fetching the user details
	 * parameter $usernme
	 * @access public
	 * return $userData
	*/
	function getuser($username,$password)
	{
		$this->db->select("users.id,users.name,role_id,roles.name as rolename");
		$this->db->from("users");
		$this->db->join("user_roles",'users.id=user_roles.user_id');
		$this->db->join("roles",'roles.id=user_roles.role_id');
		$this->db->where("users.name",$username);
		$this->db->where("users.password",$password);
		$query=$this->db->get();
		$userData=$query->result_array();
		return $userData;
	}
}
?>