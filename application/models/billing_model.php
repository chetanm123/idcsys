<?php 
class Billing_model extends CI_Model
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


	function get_all_billing_details()
	{
		$this->db->select('request_billing.billing_start,request_billing.createdon as requestbillingcreatedon,request_billing.id as requestbillingid,requests.*,users.name as Createdby,processors.name as Processor,raid_plans.name as RAID,mail_servers.name as Mailserver,operating_systems.name as OS,control_panels.name as Panel,request_provisions.id as requestprovisionid,disk_plans.name as disk_name,request_disc.quantity as disk_quantity,request_disc.size as disk_size');
		$this->db->from('request_billing');
		$this->db->join('requests', 'requests.id = request_billing.request_id');
		$this->db->join('processors', 'processors.id = requests.processor_id');
		
		$this->db->join('mail_servers', 'mail_servers.id = requests.mail_server_id');
		$this->db->join('operating_systems', 'operating_systems.id = requests.os_id');
		$this->db->join('antiviruses', 'antiviruses.id = requests.antivirus_id');
		$this->db->join('control_panels', 'control_panels.id = requests.control_panel_id');
		$this->db->join('users', 'users.id = request_billing.createdby_id');
		$this->db->join('request_provisions', 'request_provisions.request_id = request_billing.request_id');

		$this->db->join('request_disc', 'request_disc.request_id = requests.id');
		$this->db->join('raid_plans', 'raid_plans.id = request_disc.raid_id');

		
		$this->db->join('disk_plans', 'disk_plans.id = request_disc.disc_id');
		//$this->db->where('requests.id',$id);
		$this->db->where('requests.active', '1');
		$this->db->group_by('requests.id');
		$query = $this->db->get();

		//echo $this->db->last_query();exit;
		return $query->result_array();
	}



	function get_all_details($id)
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

		//$this->db->join('ram_details', 'ram_details.request_id = requests.id');
		//$this->db->join('memory_plans', 'memory_plans.id = ram_details.ram_id');
		$this->db->join('disk_plans', 'disk_plans.id = request_disc.disc_id');

		$this->db->where('requests.id',$id);
		$query = $this->db->get();
		return $query->result_array();
	}

	function get_active_details()
	{
		$this->db->select('requests.*,users.name as Createdby,processors.name as Processor,raid_plans.name as RAID,mail_servers.name as Mailserver,operating_systems.name as OS,control_panels.name as Panel,request_provisions.id as provisionid,disk_plans.name as disk_name,request_disc.quantity as disk_quantity,request_disc.size as disk_size');
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

		$this->db->where('active', '1');
		$this->db->where('status', '0');

		$this->db->group_by('requests.id');
		$query = $this->db->get();
		//print_r($query);exit;
		return $query->result_array();
	}

	function get_previous_details()
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
	}

	function get_salesrequestview($id)
	{
		//$arrData = array();
		//$this->db->select('*');
		$this->db->select('requests.*,processors.name as Processor,raid_plans.name as RAID,mail_servers.name as Mailserver,operating_systems.name as OS,control_panels.name as Panel,bandwidth_plans.name as Bandwidth,antiviruses.name as antivirus,firewall_plans.name as firewall,locations.name as location,companies.name as Company_billed');
		$this->db->from('requests');
		//$this->db->join('request_provisions','request_provisions.request_id = requests.id');
//		$this->db->join('processors', 'processors.id = requests.processor_id');
//		$this->db->join('memory_plans', 'memory_plans.id = requests.memory_plan_id');
//		$this->db->join('raid_plans', 'raid_plans.id = requests.raid_plan_id');
//		$this->db->join('mail_servers', 'mail_servers.id = requests.mail_server_id');
//		$this->db->join('operating_systems', 'operating_systems.id = requests.os_id');
//		$this->db->join('antiviruses', 'antiviruses.id = requests.antivirus_id');
//		$this->db->join('control_panels','control_panels.id = requests.control_panel_id');
//		$this->db->join('bandwidth_plans','bandwidth_plans.id = requests.bandwidth_plan_id');
//		$this->db->join('firewall_plans','firewall_plans.id = requests.firewall_plan_id');
//		$this->db->join('locations','locations.id = requests.location_id');
//		$this->db->join('companies','companies.id = requests.company_id');

		$this->db->join('processors', 'processors.id = requests.processor_id');		

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

		$this->db->where('requests.id', $id); 
		$objQuery = $this->db->get();
		return $objQuery->result_array();
	}
	
	function get_provisionrequestview($id)
	{
		//echo $id;exit;
		$this->db->select('request_provisions.*,switchport_speeds.name as Switchport,controller_software.name as CS,lancard_speeds.name as Lan_Card,raid_plans.name as RAID,operating_systems.name as OS,control_panels.name as Panel,antiviruses.name as antivirus,firewall_plans.name as firewall');
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

	function get_billingrequestview($id)
	{
		$this->db->select('request_billing.*,requests.id as salesrequestid,request_provisions.id as provisionid,contract_periods.name as contractperiodname,billing_cycle.name as billingcyclename');
		$this->db->from('request_billing');
		//$this->db->join('request_provisions','request_provisions.request_id = requests.id');
		$this->db->join('requests', 'requests.id = request_billing.request_id');
		$this->db->join('request_provisions', 'request_provisions.request_id = requests.id');
		$this->db->join('contract_periods', 'contract_periods.id = request_billing.contract_period_id');
		//$this->db->join('packages_plans', 'packages_plans.id = request_billing.package_id');
		//$this->db->join('billingrep', 'billingrep.id = request_billing.billingrep_id');
		$this->db->join('billing_cycle', 'billing_cycle.id = request_billing.billing_cycle_id');
		$this->db->where('request_billing.id', $id); 
		$objQuery = $this->db->get();

		
		return $objQuery->result_array();
	}

	function get_location_details()
	{
		
		$arrData = array();
		
		$this->db->select('*');
		
		$objQuery = $this->db->get('locations');
		
		return $objQuery->result_array();

	}

	function get_database_details()
	{
		
		$arrData = array();
		
		$this->db->select('*');
		
		$objQuery = $this->db->get('databases');
		
		return $objQuery->result_array();

	}

	function get_processor_details()
	{
		
		$arrData = array();
		
		$this->db->select('*');
		
		$objQuery = $this->db->get('processors');
		
		return $objQuery->result_array();

	}

	function get_raid_details()
	{
		
		$arrData = array();
		
		$this->db->select('*');
		
		$objQuery = $this->db->get('raid_plans');
		
		return $objQuery->result_array();

	}

	function get_memory_details()
	{
		
		$arrData = array();
		
		$this->db->select('*');
		
		$objQuery = $this->db->get('memory_plans');
		
		return $objQuery->result_array();

	}

	function get_bandwidth_details()
	{
		
		$arrData = array();
		
		$this->db->select('*');
		
		$objQuery = $this->db->get('bandwidth_plans');
		
		return $objQuery->result_array();

	}
	function get_os_details()
	{
		
		$arrData = array();
		
		$this->db->select('*');
		
		$objQuery = $this->db->get('operating_systems');
		
		return $objQuery->result_array();

	}
	function get_controlpanel_details()
	{
		
		$arrData = array();
		
		$this->db->select('*');
		
		$objQuery = $this->db->get('control_panels');
		
		return $objQuery->result_array();

	}
	function get_firewall_details()
	{
		
		$arrData = array();
		
		$this->db->select('*');
		
		$objQuery = $this->db->get('firewall_plans');
		
		return $objQuery->result_array();

	}
	function get_mailserver_details()
	{
		
		$arrData = array();
		
		$this->db->select('*');
		
		$objQuery = $this->db->get('mail_servers');
		
		return $objQuery->result_array();

	}
	function get_antivirus_details()
	{
		
		$arrData = array();
		
		$this->db->select('*');
		
		$objQuery = $this->db->get('antiviruses');
		
		return $objQuery->result_array();

	}
	
	function save($arrData)
	{
		//echo "<pre>";print_r($arrData);exit;
		if($this->db->insert('request_billing', $arrData))
		{
			return true;
		}
		else
		{
			return false;
		}
	}


	/**
	 * get_all_contract_period
	 *
	 * This is to get the get_all_contract_period listing  
	 *
	 * @access	public
	 * @return array
	 */	
	
	 function get_all_contract_period() {
		$arrData = array();
		$this->db->select('*');
		$this->db->from('contract_periods');
		$this->db->where('contract_periods.disabled','1');
		$objQuery = $this->db->get();

			//return $objQuery->result_array();
			 if ($objQuery->num_rows() > 0) {
				$arrData[''] = "Select Contract Period";
				foreach ($objQuery->result_array() as $row) {
					
					 $arrData[$row['id']] = $row['name'];
				}
				
			 }
			 
			 $objQuery->free_result();
			 
			 return $arrData;
	 }


	 /**
	 * get_all_packages
	 *
	 * This is to get the get_all_packages listing  
	 *
	 * @access	public
	 * @return array
	 */	
	
	 function get_all_packages() {
		$arrData = array();
		$this->db->select('*');
		$this->db->from('packages_plans');
		$this->db->where('packages_plans.disabled','1');
		$objQuery = $this->db->get();

			//return $objQuery->result_array();
			 if ($objQuery->num_rows() > 0) {
				$arrData[''] = "Select Package";
				foreach ($objQuery->result_array() as $row) {
					
					 $arrData[$row['id']] = $row['name'];
				}
				
			 }
			 
			 $objQuery->free_result();
			 
			 return $arrData;
	 }



	 /**
	 * get_all_billing_rep
	 *
	 * This is to get the get_all_billing_rep listing  
	 *
	 * @access	public
	 * @return array
	 */	
	
	 function get_all_billing_rep() {
		$arrData = array();
		$this->db->select('*');
		$this->db->from('billingrep');
		$this->db->where('billingrep.disabled','1');
		$objQuery = $this->db->get();

			//return $objQuery->result_array();
			 if ($objQuery->num_rows() > 0) {
				$arrData[''] = "Select Billingrep";
				foreach ($objQuery->result_array() as $row) {
					
					 $arrData[$row['id']] = $row['name'];
				}
				
			 }
			 
			 $objQuery->free_result();
			 
			 return $arrData;
	 }


	 /**
	 * get_all_billingcycle
	 *
	 * This is to get the get_all_billingcycle listing  
	 *
	 * @access	public
	 * @return array
	 */	
	
	 function get_all_billingcycle() {
		$arrData = array();
		$this->db->select('*');
		$this->db->from('billing_cycle');
		$this->db->where('billing_cycle.disabled','1');
		$objQuery = $this->db->get();

			//return $objQuery->result_array();
			 if ($objQuery->num_rows() > 0) {
				$arrData[''] = "Select Billing Cycle";
				foreach ($objQuery->result_array() as $row) {
					
					 $arrData[$row['id']] = $row['name'];
				}
				
			 }
			 
			 $objQuery->free_result();
			 
			 return $arrData;
	 }


	 function update_sales_status($arrData,$id)
	 {
		$this->db->where('id',$id);

		//This updates the antivirus table with provided id.
		if($this->db->update('requests', $arrData))
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