<?php 
class Sales_model extends CI_Model
{
	
	// --------------------------------------------------------------------

	/**
	 * __construct
	 *
	 * Calls parent constructor
	 * @author	Chhaya Parab
	 * @access	public
	 * @return	void
	 */
	function __construct()
	{
		parent::__construct();
	}

	function get_request_details()
	{
		
		$arrData = array();
		
		$this->db->select('*');
		
		$objQuery = $this->db->get('requests');
		
		return $objQuery->result_array();

	}

	function get_all_details()
	{
		$this->db->select('requests.*,users.name as Createdby,processors.name as Processor,raid_plans.name as RAID,mail_servers.name as Mailserver,operating_systems.name as OS,control_panels.name as Panel,disk_plans.name as disk_name,request_disc.quantity as disk_quantity,request_disc.size as disk_size');
		$this->db->from('requests');
		$this->db->join('processors', 'processors.id = requests.processor_id');
		
		$this->db->join('mail_servers', 'mail_servers.id = requests.mail_server_id');
		$this->db->join('operating_systems', 'operating_systems.id = requests.os_id');
		$this->db->join('antiviruses', 'antiviruses.id = requests.antivirus_id');
		$this->db->join('control_panels', 'control_panels.id = requests.control_panel_id');
		$this->db->join('users', 'users.id = requests.createdby_id');
		
		$this->db->join('request_disc', 'request_disc.request_id = requests.id');
		
		$this->db->join('raid_plans', 'raid_plans.id = request_disc.raid_id');
		$this->db->join('billing_cycle', 'billing_cycle.id = requests.billing_cycle_id');


		//$this->db->join('ram_details', 'ram_details.request_id = requests.id');
		//$this->db->join('memory_plans', 'memory_plans.id = ram_details.ram_id');
		$this->db->join('disk_plans', 'disk_plans.id = request_disc.disc_id');
		$this->db->group_by('requests.id');

		$query = $this->db->get();
		
		return $query->result_array();
	}

	/*function get_details($id)
	{
		$this->db->select('requests.*,users.name as Createdby,processors.name as Processor,raid_plans.name as RAID,memory_plans.name as Memory,mail_servers.name as Mailserver,operating_systems.name as OS,control_panels.name as Panel,disk_plans.name as disk_name,request_disc.quantity as disk_quantity,request_disc.size as disk_size,ram_details.quantity as ram_quantity');
		$this->db->from('requests');
		$this->db->join('processors', 'processors.id = requests.processor_id');
		$this->db->join('request_disc', 'request_disc.request_id = requests.id');
		$this->db->join('raid_plans', 'raid_plans.id = request_disc.raid_id');
		$this->db->join('ram_details', 'ram_details.request_id = requests.id');
		$this->db->join('memory_plans', 'memory_plans.id = ram_details.ram_id');
		$this->db->join('mail_servers', 'mail_servers.id = requests.mail_server_id');
		$this->db->join('operating_systems', 'operating_systems.id = requests.os_id');
		$this->db->join('antiviruses', 'antiviruses.id = requests.antivirus_id');
		$this->db->join('control_panels', 'control_panels.id = requests.control_panel_id');
		$this->db->join('users', 'users.id = requests.createdby_id');
		$this->db->join('disk_plans', 'disk_plans.id = request_disc.disc_id');
		$this->db->where('requests.id', $id);
		$query = $this->db->get();
		return $query->result_array();
	}*/

	function get_details($id)
	{
		$this->db->select('requests.*,users.name as Createdby,processors.name as Processor,mail_servers.name as Mailserver,operating_systems.name as OS,control_panels.name as Panel,contract_periods.name as contractperiodname');
		$this->db->from('requests');
		$this->db->join('processors', 'processors.id = requests.processor_id');
		
		$this->db->join('mail_servers', 'mail_servers.id = requests.mail_server_id');
		$this->db->join('operating_systems', 'operating_systems.id = requests.os_id');
		$this->db->join('antiviruses', 'antiviruses.id = requests.antivirus_id');
		$this->db->join('control_panels', 'control_panels.id = requests.control_panel_id');
		$this->db->join('users', 'users.id = requests.createdby_id');
		$this->db->join('contract_periods', 'contract_periods.id = requests.contract_period_id');
		//$this->db->join('billing_cycle', 'billing_cycle.id = requests.billing_cycle_id');
		
		//$this->db->join('request_disc', 'request_disc.request_id = requests.id');
		//$this->db->join('raid_plans', 'raid_plans.id = request_disc.raid_id');

		//$this->db->join('ram_details', 'ram_details.request_id = requests.id');
		//$this->db->join('memory_plans', 'memory_plans.id = ram_details.ram_id');
		//$this->db->join('disk_plans', 'disk_plans.id = request_disc.disc_id');
		$this->db->where('requests.id', $id);
		//$this->db->group_by('requests.id');
		$query = $this->db->get();

		//echo $this->db->last_query();exit;
		return $query->result_array();
	}

	function get_request_disk($id)
	{
		$arrData = array();
		
		$this->db->select('*');
		$this->db->where('request_id', $id);
		
		$objQuery = $this->db->get('request_disc');
		
		return $objQuery->result_array();
	}

	function get_request_memory($id)
	{
		$arrData = array();
		
		$this->db->select('*');
		$this->db->where('request_id', $id);
		
		$objQuery = $this->db->get('ram_details');
		
		return $objQuery->result_array();
	}

	/*function get_active_details()
	{
		$this->db->select('requests.*,users.name as Createdby,processors.name as Processor,raid_plans.name as RAID,memory_plans.name as Memory,mail_servers.name as Mailserver,operating_systems.name as OS,control_panels.name as Panel');
		$this->db->from('requests');
		
		$this->db->join('processors', 'processors.id = requests.processor_id');
		$this->db->join('memory_plans', 'memory_plans.id = requests.memory_plan_id');
		$this->db->join('raid_plans', 'raid_plans.id = requests.raid_plan_id');
		$this->db->join('mail_servers', 'mail_servers.id = requests.mail_server_id');
		$this->db->join('operating_systems', 'operating_systems.id = requests.os_id');
		$this->db->join('antiviruses', 'antiviruses.id = requests.antivirus_id');
		$this->db->join('control_panels', 'control_panels.id = requests.control_panel_id');
		$this->db->join('users', 'users.id = requests.createdby_id');
		$this->db->where('active', '0'); 
		$query = $this->db->get();
		
		return $query->result_array();
	}*/
	function get_active_details()
	{
		$this->db->select('requests.*,users.name as Createdby,processors.name as Processor,raid_plans.name as RAID,memory_plans.name as Memory,mail_servers.name as Mailserver,operating_systems.name as OS,control_panels.name as Panel,disk_plans.name as disk_name,request_disc.quantity as disk_quantity,request_disc.size as disk_size,ram_details.quantity as ram_quantity');
		$this->db->from('requests');
		$this->db->join('processors', 'processors.id = requests.processor_id');
		
		//$this->db->join('memory_plans', 'memory_plans.id = requests.memory_plan_id');
		//$this->db->join('raid_plans','raid_plans.id = requests.raid_plan_id');
		
		$this->db->join('mail_servers', 'mail_servers.id = requests.mail_server_id');
		$this->db->join('operating_systems', 'operating_systems.id = requests.os_id');
		$this->db->join('antiviruses', 'antiviruses.id = requests.antivirus_id');
		$this->db->join('control_panels', 'control_panels.id = requests.control_panel_id');
		$this->db->join('users', 'users.id = requests.createdby_id');
		
		$this->db->join('request_disc', 'request_disc.request_id = requests.id');
		$this->db->join('raid_plans', 'raid_plans.id = request_disc.raid_id');

		$this->db->join('ram_details', 'ram_details.request_id = requests.id');
		$this->db->join('memory_plans', 'memory_plans.id = ram_details.ram_id');
		$this->db->join('disk_plans', 'disk_plans.id = request_disc.disc_id');
		$this->db->where('requests.active', '0'); 
		$this->db->group_by('requests.id');


		$query = $this->db->get();
		
		return $query->result_array();
	}

	/*function get_previous_details()
	{
		$this->db->select('requests.*,users.name as Createdby,processors.name as Processor,raid_plans.name as RAID,memory_plans.name as Memory,mail_servers.name as Mailserver,operating_systems.name as OS,control_panels.name as Panel');
		$this->db->from('requests');
		//$this->db->join('request_provisions','request_provisions.request_id = requests.id');
		$this->db->join('processors', 'processors.id = requests.processor_id');
		$this->db->join('memory_plans', 'memory_plans.id = requests.memory_plan_id');
		$this->db->join('raid_plans', 'raid_plans.id = requests.raid_plan_id');
		$this->db->join('mail_servers', 'mail_servers.id = requests.mail_server_id');
		$this->db->join('operating_systems', 'operating_systems.id = requests.os_id');
		$this->db->join('antiviruses', 'antiviruses.id = requests.antivirus_id');
		$this->db->join('control_panels', 'control_panels.id = requests.control_panel_id');
		$this->db->join('users', 'users.id = requests.createdby_id');
		$this->db->where('active', '1'); 
		$query = $this->db->get();
		return $query->result_array();
	}*/

	function get_previous_details()
	{
		$this->db->select('requests.*,users.name as Createdby,processors.name as Processor,raid_plans.name as RAID,mail_servers.name as Mailserver,operating_systems.name as OS,control_panels.name as Panel,disk_plans.name as disk_name,request_disc.quantity as disk_quantity,request_disc.size as disk_size');
		$this->db->from('requests');
		$this->db->join('processors', 'processors.id = requests.processor_id');
		
		//$this->db->join('memory_plans', 'memory_plans.id = requests.memory_plan_id');
		//$this->db->join('raid_plans','raid_plans.id = requests.raid_plan_id');
		
		$this->db->join('mail_servers', 'mail_servers.id = requests.mail_server_id');
		$this->db->join('operating_systems', 'operating_systems.id = requests.os_id');
		$this->db->join('antiviruses', 'antiviruses.id = requests.antivirus_id');
		$this->db->join('control_panels', 'control_panels.id = requests.control_panel_id');
		$this->db->join('users', 'users.id = requests.createdby_id');
		
		$this->db->join('request_disc', 'request_disc.request_id = requests.id');
		$this->db->join('raid_plans', 'raid_plans.id = request_disc.raid_id');
		
		$this->db->join('disk_plans', 'disk_plans.id = request_disc.disc_id');
		$this->db->where('requests.active', '1'); 
		$this->db->group_by('requests.id');


		$query = $this->db->get();
		
		return $query->result_array();
	}

	function get_billing_details_for_bill($id)
	{
		$arrData = array();
		
		$this->db->select('*');
		$this->db->where('id',$id);
		
		$objQuery = $this->db->get('request_billing');
		
		return $objQuery->result_array();
	}

	function get_requestview($id)
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


	function get_billingrequestview($id)
	{
		$this->db->select('request_billing.*,requests.id as salesrequestid,request_provisions.id as provisionid,contract_periods.name as contractperiodname,packages_plans.name as packagename,billingrep.name as billingrepname,billing_cycle.name as billingcyclename');
		$this->db->from('request_billing');
		//$this->db->join('request_provisions','request_provisions.request_id = requests.id');
		$this->db->join('requests', 'requests.id = request_billing.request_id');
		$this->db->join('request_provisions', 'request_provisions.request_id = requests.id');
		$this->db->join('contract_periods', 'contract_periods.id = request_billing.contract_period_id');
		$this->db->join('packages_plans', 'packages_plans.id = request_billing.package_id');
		$this->db->join('billingrep', 'billingrep.id = request_billing.billingrep_id');
		$this->db->join('billing_cycle', 'billing_cycle.id = request_billing.billing_cycle_id');
		$this->db->where('request_billing.id', $id); 
		$objQuery = $this->db->get();
		return $objQuery->result_array();
	}

	function get_location_details()
	{
		
		$arrData = array();
		
		$this->db->select('*');

		$this->db->where('disabled','1');
		
		$objQuery = $this->db->get('locations');
		
		return $objQuery->result_array();

	}

	

	function get_database_details()
	{
		$arrData = array();
		
		$this->db->select('*');
		$this->db->where('disabled','1');
		
		$objQuery = $this->db->get('databases');
		
		return $objQuery->result_array();

	}

	function get_processor_details()
	{
		
		$arrData = array();
		
		$this->db->select('*');
		$this->db->where('disabled','1');
		
		$objQuery = $this->db->get('processors');
		
		return $objQuery->result_array();

	}

	function get_switchport_details()
	{
		
		$arrData = array();
		
		$this->db->select('*');
		$this->db->where('disabled','1');
		
		$objQuery = $this->db->get('switchport_speeds');
		
		return $objQuery->result_array();

	}

	function get_lancard_details()
	{
		
		$arrData = array();
		
		$this->db->select('*');
		$this->db->where('disabled','1');
		
		$objQuery = $this->db->get('lancard_speeds');
		
		return $objQuery->result_array();

	}

	function get_CS_details()
	{
		$arrData = array();
		
		$this->db->select('*');
		$this->db->where('disabled','1');
		
		$objQuery = $this->db->get('controller_software');
		
		return $objQuery->result_array();

	}

	function get_raid_details()
	{
		
		$arrData = array();
		
		$this->db->select('*');
		$this->db->where('disabled','1');
		
		$objQuery = $this->db->get('raid_plans');
		
		return $objQuery->result_array();

	}

	function get_disk_details()
	{
		
		$arrData = array();
		
		$this->db->select('*');
		$this->db->where('disabled','1');
		
		$objQuery = $this->db->get('disk_plans');
		
		return $objQuery->result_array();

	}

	function get_memory_details()
	{
		
		$arrData = array();
		
		$this->db->select('*');
		$this->db->where('disabled','1');
		
		$objQuery = $this->db->get('memory_plans');
		
		return $objQuery->result_array();

	}

	function get_bandwidth_details()
	{
		
		$arrData = array();
		
		$this->db->select('*');
		$this->db->where('disabled','1');
		
		$objQuery = $this->db->get('bandwidth_plans');
		
		return $objQuery->result_array();

	}
	function get_os_details()
	{
		$arrData = array();
		
		$this->db->select('*');
		$this->db->where('disabled','1');
		
		$objQuery = $this->db->get('operating_systems');
		
		return $objQuery->result_array();

	}
	function get_controlpanel_details()
	{
		
		$arrData = array();
		
		$this->db->select('*');
		$this->db->where('disabled','1');
		
		$objQuery = $this->db->get('control_panels');
		
		return $objQuery->result_array();

	}
	function get_firewall_details()
	{
		
		$arrData = array();
		
		$this->db->select('*');
		$this->db->where('disabled','1');
		
		$objQuery = $this->db->get('firewall_plans');
		
		return $objQuery->result_array();

	}

	function update_request($arrData,$id)
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

	function get_mailserver_details()
	{
		
		$arrData = array();
		
		$this->db->select('*');
		$this->db->where('disabled','1');
		
		$objQuery = $this->db->get('mail_servers');
		
		return $objQuery->result_array();

	}

	function get_antivirus_details()
	{
		
		$arrData = array();
		
		$this->db->select('*');
		$this->db->where('disabled','1');
		
		$objQuery = $this->db->get('antiviruses');
		
		return $objQuery->result_array();

	}

	function get_db_details()
	{
		
		$arrData = array();
		
		$this->db->select('*');
		$this->db->where('disabled','1');
		
		$objQuery = $this->db->get('databases');
		
		return $objQuery->result_array();

	}
	
	function save_request($arrData)
	{
		//echo "<pre>";print_r($arrData);exit;
		if($this->db->insert('requests', $arrData))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function save_request_disc($arrData)
	{
		//echo "<pre>";print_r($arrData);exit;
		if($this->db->insert('request_disc', $arrData))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function update_request_disc($arrData,$id)
	{
		$this->db->where('id',$id);
		if($this->db->update('request_disc', $arrData))
		{
				return true;
		}
		else
		{
				return false;
		}	
	}

	function save_request_memory($arrData)
	{
		//echo "<pre>";print_r($arrData);exit;
		if($this->db->insert('ram_details', $arrData))
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