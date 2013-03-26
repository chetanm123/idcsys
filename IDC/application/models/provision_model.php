<?php
class Provision_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	 /**
	 * get_all_provision_listing
	 * This is to get the provision listing 
	 * @access	public	 
	 * @return array
	 */	
	function get_all_provision_listing()
	{
		$arrData = array();
		$this->db->select('*');
		
		$objQuery = $this->db->get('provisioned_items');		
		
		return $objQuery->result_array();
	}
	
	function get_provision_start_complete($id)
	{
		$arrData = array();
		$this->db->select('*');
		$this->db->where('provision_start_complete.request_id',$id);
		
		$objQuery = $this->db->get('provision_start_complete');		
		
		return $objQuery->result_array();
	}

	function save_provision($arrData)
	{
		if($this->db->insert('request_provisions', $arrData))
		{
			return true;
		}
		else
		{
			return false;
		}
	}


	function save_provision_start_complete($arrData)
	{
		if($this->db->insert('provision_start_complete', $arrData))
		{
			//echo $this->db->last_query();exit;
			return true;
		}
		else
		{
			return false;
		}
	}

	function get_start_complete_provision_details()
	{
		$arrData = array();
		$this->db->select('*');
		$this->db->group_by('request_id');
		
		$objQuery = $this->db->get('provision_start_complete');		
		
		return $objQuery->result_array();
	}


	function updateRequest($id,$arrData)
	{
		$this->db->where('id',$id);
		if($this->db->update('requests', $arrData))
		{
				return true;
		}
		else
		{
				return false;
		}	
	}

	function update_provision_start_complete($arrData,$id,$provisionid)
	{
		$this->db->where('id',$provisionid);
		$this->db->where('request_id',$id);
		if($this->db->update('provision_start_complete', $arrData))
		{
				return true;
		}
		else
		{
				return false;
		}	
	}

	function edit_provision_details($id,$arrData)
	{
		//echo $id;
		//echo "<pre>";print_r($arrData);
		$this->db->where('request_id',$id);
		if($this->db->update('request_provisions', $arrData))
		{
				return true;
		}
		else
		{
				return false;
		}	
	}

	function get_edit_details($id)
	{
		$arrData = array();
		$this->db->select('*');
		$this->db->where('request_id',$id);
		$objQuery = $this->db->get('request_provisions');		
		return $objQuery->result_array();
	}
	
	function get_start_complete_details_for_user($userid,$requestid)
	{
		$this->db->select('*');
		$this->db->where('provision_start_by_id',$userid);
		$this->db->where('request_id',$requestid);
		$objQuery = $this->db->get('provision_start_complete');		
		return $objQuery->result_array();
	}

	function get_provisioned_details()
	{
		$this->db->select('requests.*,request_provisions.*,request_provisions.id as request_provision_id,request_provisions.request_id as request_id,users.name as Createdby,processors.name as Processor,raid_plans.name as RAID,mail_servers.name as Mailserver,operating_systems.name as OS,control_panels.name as Panel,disk_plans.name as disk_name,request_disc.quantity as disk_quantity,request_disc.size as disk_size');
		$this->db->from('requests');
		$this->db->join('request_provisions','request_provisions.request_id = requests.id');
		$this->db->join('processors', 'processors.id = requests.processor_id');
		
		//$this->db->join('memory_plans', 'memory_plans.id = requests.memory_plan_id');
		//$this->db->join('raid_plans', 'raid_plans.id = requests.raid_plan_id');
		
		$this->db->join('mail_servers', 'mail_servers.id = requests.mail_server_id');
		$this->db->join('operating_systems', 'operating_systems.id = requests.os_id');
		$this->db->join('antiviruses', 'antiviruses.id = requests.antivirus_id');
		$this->db->join('control_panels', 'control_panels.id = requests.control_panel_id');
		$this->db->join('users', 'users.id = requests.createdby_id');

		$this->db->join('request_disc', 'request_disc.request_id = requests.id');
		$this->db->join('raid_plans', 'raid_plans.id = request_disc.raid_id');

		//$this->db->join('ram_details', 'ram_details.request_id = requests.id');
		//$this->db->join('memory_plans', 'memory_plans.id = ram_details.ram_id');
		$this->db->join('disk_plans', 'disk_plans.id = request_disc.disc_id');

		$this->db->group_by('requests.id');

		$this->db->where('requests.active', '1'); 
		$query = $this->db->get();
		return $query->result_array();
	}

	function get_active_details()
	{
		$this->db->select('requests.*,users.name as Createdby,processors.name as Processor,raid_plans.name as RAID,mail_servers.name as Mailserver,operating_systems.name as OS,control_panels.name as Panel,disk_plans.name as disk_name,request_disc.quantity as disk_quantity,request_disc.size as disk_size');
		$this->db->from('requests');
		$this->db->join('processors', 'processors.id = requests.processor_id');
		//$this->db->join('memory_plans', 'memory_plans.id = requests.memory_plan_id');
		//$this->db->join('raid_plans', 'raid_plans.id = requests.raid_plan_id');
		$this->db->join('mail_servers', 'mail_servers.id = requests.mail_server_id');
		$this->db->join('operating_systems', 'operating_systems.id = requests.os_id');
		$this->db->join('antiviruses', 'antiviruses.id = requests.antivirus_id');
		$this->db->join('control_panels', 'control_panels.id = requests.control_panel_id');
		$this->db->join('users', 'users.id = requests.createdby_id');
		
		$this->db->join('request_disc', 'request_disc.request_id = requests.id');
		$this->db->join('raid_plans', 'raid_plans.id = request_disc.raid_id');		
		
		$this->db->join('disk_plans', 'disk_plans.id = request_disc.disc_id');

		$this->db->group_by('requests.id');
		$this->db->where('active', '0');
		$query = $this->db->get();
		//echo $this->db->last_query();exit;
		return $query->result_array();
	}


	function get_provisioned_status_details()
	{
		$this->db->select('requests.*,users.name as Createdby,processors.name as Processor,raid_plans.name as RAID,memory_plans.name as Memory,mail_servers.name as Mailserver,operating_systems.name as OS,control_panels.name as Panel,active,provision_start_complete.provision_start_time,provision_start_complete.provision_end_time');
		$this->db->from('requests');
		$this->db->join('processors', 'processors.id = requests.processor_id');
		$this->db->join('memory_plans', 'memory_plans.id = requests.memory_plan_id');
		$this->db->join('raid_plans', 'raid_plans.id = requests.raid_plan_id');
		$this->db->join('mail_servers', 'mail_servers.id = requests.mail_server_id');
		$this->db->join('operating_systems', 'operating_systems.id = requests.os_id');
		$this->db->join('antiviruses', 'antiviruses.id = requests.antivirus_id');
		$this->db->join('control_panels', 'control_panels.id = requests.control_panel_id');
		$this->db->join('users', 'users.id = requests.createdby_id');
		$this->db->join('provision_start_complete', 'provision_start_complete.request_id = requests.id');
		
		$this->db->where('provision_start_complete.provision_start_by_id',$this->session->userdata('userid')); 
		$this->db->or_where('provision_start_complete.provision_end_by_id',$this->session->userdata('userid')); 
		$query = $this->db->get();
		return $query->result_array();
	}

	function get_requestview($id)
	{
		//echo $id;exit;
		$this->db->select('requests.*,processors.name as Processor,raid_plans.name as RAID,mail_servers.name as Mailserver,operating_systems.name as OS,control_panels.name as Panel,bandwidth_plans.name as Bandwidth,antiviruses.name as antivirus,firewall_plans.name as firewall,locations.name as location,companies.name as Company_billed');
		$this->db->from('requests');
		$this->db->join('processors', 'processors.id = requests.processor_id');
		$this->db->join('request_provisions', 'request_provisions.request_id = requests.id');
		//$this->db->join('memory_plans', 'memory_plans.id = requests.memory_plan_id');
		//$this->db->join('raid_plans', 'raid_plans.id = requests.raid_plan_id');
		$this->db->join('mail_servers', 'mail_servers.id = requests.mail_server_id');
		$this->db->join('operating_systems', 'operating_systems.id = requests.os_id');
		$this->db->join('antiviruses', 'antiviruses.id = requests.antivirus_id');
		$this->db->join('control_panels','control_panels.id = requests.control_panel_id');
		$this->db->join('bandwidth_plans','bandwidth_plans.id = requests.bandwidth_plan_id');
		$this->db->join('firewall_plans','firewall_plans.id = requests.firewall_plan_id');
		$this->db->join('locations','locations.id = requests.location_id');
		$this->db->join('companies','companies.id = requests.company_id');

		$this->db->join('request_disc', 'request_disc.request_id = requests.id');
		$this->db->join('raid_plans', 'raid_plans.id = request_disc.raid_id');		
		
		$this->db->join('disk_plans', 'disk_plans.id = request_disc.disc_id');

		$this->db->where('request_provisions.id', $id); 
		//echo "<pre>";print_r($this->db->from('requests'));
		$objQuery = $this->db->get();
		//echo $this->db->last_query();exit;
		return $objQuery->result_array();
	}
	
	function get_salesrequestview($id)
	{
		//$arrData = array();
		//$this->db->select('*');
		$this->db->select('requests.*,processors.name as Processor,raid_plans.name as RAID,mail_servers.name as Mailserver,operating_systems.name as OS,control_panels.name as Panel,bandwidth_plans.name as Bandwidth,antiviruses.name as antivirus,firewall_plans.name as firewall,locations.name as location,companies.name as Company_billed');
		$this->db->from('requests');
		//$this->db->join('request_provisions','request_provisions.request_id = requests.id');
		$this->db->join('processors', 'processors.id = requests.processor_id');
		//$this->db->join('memory_plans', 'memory_plans.id = requests.memory_plan_id');
		//$this->db->join('raid_plans', 'raid_plans.id = requests.raid_plan_id');

		$this->db->join('mail_servers', 'mail_servers.id = requests.mail_server_id');
		$this->db->join('operating_systems', 'operating_systems.id = requests.os_id');
		$this->db->join('antiviruses', 'antiviruses.id = requests.antivirus_id');
		$this->db->join('control_panels','control_panels.id = requests.control_panel_id');
		$this->db->join('bandwidth_plans','bandwidth_plans.id = requests.bandwidth_plan_id');
		$this->db->join('firewall_plans','firewall_plans.id = requests.firewall_plan_id');
		$this->db->join('locations','locations.id = requests.location_id');
		$this->db->join('companies','companies.id = requests.company_id');

		$this->db->join('request_disc', 'request_disc.request_id = requests.id','left');
		$this->db->join('raid_plans', 'raid_plans.id = request_disc.raid_id','inner');

		//$this->db->join('disk_plans','disk_plans.id = request_disc.disc_id');

		//$this->db->join('ram_details', 'ram_details.request_id = requests.id','left');

		//$this->db->join('memory_plans', 'memory_plans.id = ram_details.ram_id','left');
		
		$this->db->where('requests.id', $id); 
		$objQuery = $this->db->get();
		return $objQuery->result_array();
	}


	function get_discdetails($id)
	{
		$this->db->select('disk_plans.name as disk_name,request_disc.quantity,request_disc.size');
		$this->db->from('requests');		
		$this->db->join('request_disc', 'request_disc.request_id = requests.id');
		$this->db->join('disk_plans','disk_plans.id = request_disc.disc_id');		
		
		$this->db->where('requests.id', $id); 
		$objQuery = $this->db->get();
		return $objQuery->result_array();
	}


	function get_provisionview($id)
	{
		$this->db->select('request_provisions.*,switchport_speeds.name as Switchport,controller_software.name as CS,lancard_speeds.name as Lan_Card,raid_plans.name as RAID,operating_systems.name as OS,control_panels.name as Panel,antiviruses.name as antivirus,firewall_plans.name as firewall,control_panels.name as Control_Panel,databases.name as DB ');
		$this->db->from('request_provisions');
		//$this->db->join('request_provisions','request_provisions.request_id = requests.id');
		$this->db->join('lancard_speeds', 'lancard_speeds.id = request_provisions.lancard_speed_id');
		$this->db->join('switchport_speeds', 'switchport_speeds.id = request_provisions.switchport_speed_id');
		$this->db->join('controller_software', 'controller_software.id = request_provisions.controller_software');
		$this->db->join('raid_plans', 'raid_plans.id = request_provisions.raid_plan_id');
		$this->db->join('operating_systems', 'operating_systems.id = request_provisions.os_id');
		$this->db->join('firewall_plans', 'firewall_plans.id = request_provisions.firewall_rules');
		$this->db->join('antiviruses', 'antiviruses.id = request_provisions.antivirus_id');
		$this->db->join('control_panels', 'control_panels.id = request_provisions.control_panel_id');
		$this->db->join('databases', 'databases.id = request_provisions.db_id');
		
		$this->db->where('request_provisions.id', $id); 
		$objQuery = $this->db->get();
		return $objQuery->result_array();
	}
}
?>