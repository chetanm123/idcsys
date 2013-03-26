<script>
	$(document).ready(function(){
		$("#form1").validate();
	  });
</script>
<div class="vernav2 iconmenu">
    	<ul>
			<li><a href="<?php echo base_url();?>admin/sales_companies" class="gallery">Sales Companies</a></li>
        	<li><a href="#formsub" class="editor">Sales Plans</a>
            	<span class="arrow"></span>
            	<ul id="formsub">
               		<li><a href="<?php echo base_url();?>admin/bandwidth">Bandwidth</a></li>
                    <li><a href="<?php echo base_url();?>admin/processors">Processors</a></li>
                    <li><a href="<?php echo base_url();?>admin/disk">Disk</a></li>
                    <li><a href="<?php echo base_url();?>admin/storage">Storage</a></li>
					<li><a href="<?php echo base_url();?>admin/memory">Memory</a></li>
					<li><a href="<?php echo base_url();?>admin/mailserver">Mail Servers</a></li>
					<li><a href="<?php echo base_url();?>admin/raidplans">Raid</a></li>
					<li><a href="<?php echo base_url();?>admin/osplans">Operating Systems</a></li>
					<li><a href="<?php echo base_url();?>admin/controlpanel">Control Panels</a></li>
					<li><a href="<?php echo base_url();?>admin/antivirus">Anti Viruses</a></li>
					<li><a href="<?php echo base_url();?>admin/firewall">Firewalls</a></li>
					<li><a href="<?php echo base_url();?>admin/databaseplan">Database Plan</a></li>
                </ul>
            </li>
			<li><a href="#formsub1" class="editor">Inventory</a>
            	<span class="arrow"></span>
            	<ul id="formsub1">
               		<li><a href="<?php echo base_url();?>admin/itemtype">Item Types</a></li>
                    <li><a href="<?php echo base_url();?>admin/item">Items</a></li>
                </ul>
            </li>
			<li><a href="#formsub2" class="editor">Users</a>
            	<span class="arrow"></span>
            	<ul id="formsub2">
               		<li><a href="<?php echo base_url();?>admin/userroles">User Roles</a></li>
                    <li><a href="<?php echo base_url();?>admin/users">Users</a></li>
                </ul>
            </li>
            <!-- <li><a href="<?php echo base_url();?>admin/clients" class="gallery">Clients</a></li>
            <li><a href="<?php echo base_url();?>admin/requests" class="elements">Requests</a></li> -->
            <!-- <li><a href="#" class="widgets">Provisions</a></li> -->
			<li><a href="#formsub3" class="editor">Provisions</a>
            	<span class="arrow"></span>
            	<ul id="formsub3">
               		<li><a href="<?php echo base_url();?>admin/controllersoftware">Controller Software</a></li>
					<li><a href="<?php echo base_url();?>admin/switchportspeed">Switch Port Speed</a></li>
					<li><a href="<?php echo base_url();?>admin/lancardspeed">LAN Card Speed</a></li>
                </ul>
            </li>
			<li><a href="#formsub4" class="editor">Billing</a>
            	<span class="arrow"></span>
            	<ul id="formsub4">
               		<li><a href="<?php echo base_url();?>admin/contractperiod">Contract Period</a></li>					
					<li><a href="<?php echo base_url();?>admin/packages">Packages</a></li>					
					<li><a href="<?php echo base_url();?>admin/billingrep">Billing Rep</a></li>					
					<li><a href="<?php echo base_url();?>admin/billingcycle">Billing Cycle</a></li>	
                </ul>
            </li>
			<li><a href="#formsub5" class="editor">Location</a>
            	<span class="arrow"></span>
            	<ul id="formsub5">
               		<li><a href="<?php echo base_url();?>admin/location">Location</a></li>
                </ul>
            </li>
			<!-- <li><a href="#addons" class="addons">Misc</a>
            	<span class="arrow"></span>
            	<ul id="addons">
               		<li><a href="newsfeed.html">Misc item 1</a></li>
                    <li><a href="newsfeed.html">Misc item 2</a></li>
                </ul>
            </li>
            <li><a href="#error" class="error">Error Pages</a>
            	<span class="arrow"></span>
            	<ul id="error">
               		<li><a href="notfound.html">Page Not Found</a></li>
                    <li><a href="forbidden.html">Forbidden Page</a></li>
                    <li><a href="internal.html">Internal Server Error</a></li>
                    <li><a href="offline.html">Offline</a></li>
                </ul>
            </li> -->
        </ul>
        <a class="togglemenu"></a>
        <br /><br />
    </div><!--leftmenu-->