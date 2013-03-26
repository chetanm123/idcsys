<?php //echo "<pre>"; print_r($provisionView);exit;?>
<style>
	.testerror{
		color:red;
		font-size:20px;
	}
 </style>

<script>
$(function() {
$( "#datepicker" ).datepicker();
$( "#datepicker1" ).datepicker();

});

</script>
<script type="text/javascript">
	window.onload=function()
	{
		
		jQuery('#wizard').smartWizard({onFinish: onFinishCallback});
      	
		function onFinishCallback()
		{
			document.forms['provision_frm'].submit();
		} 
		//jQuery(".inline").colorbox({inline:true, width: '60%', height: '500px'});
		jQuery('select, input:checkbox').uniform();

	};
</script>
 <div class="centercontent">    
        <div class="pageheader">
            <h1 class="pagetitle">Provision - Request <?php echo $provisionView[0]['id'];?></h1>
            <p style="margin-left:10px;">Processor: <?php echo $provisionView[0]['Processor'];?><br/>
			Memory: <?php echo $provisionView[0]['Memory'];?><br/>
			RAID: <?php echo $provisionView[0]['RAID'];?><br/>
			Mailserver: <?php echo $provisionView[0]['Mailserver'];?><br/>
			Panel:<?php echo $provisionView[0]['Panel'];?><br/>
			OS: <?php echo $provisionView[0]['OS'];?><br/>
			Managed:<?php if($provisionView[0]['managed_services']==1)
			{
				echo "Yes";
			}
			else
			{
				echo "No";
			}?><br/>
			IPs: <?php //echo $provisionView[0]['id'];?></p>
            <ul class="hornav">
                <li class="current"><a href="#default">Provisioning Info</a></li>
            </ul>
        </div><!--pageheader-->
        
        <div id="contentwrapper" class="contentwrapper">
        
        	<div id="default" class="subcontent">
                    <!-- START OF DEFAULT WIZARD -->
                    <form class="stdform" name="provision_frm" id="mytestform" method="post" action="<?php echo base_url();?>provision/provisions/provision_new/<?php echo $provisionView[0]['id'];?>">
                    <div id="wizard" class="wizard">
                    	
                        <ul class="hormenu">
                            <li>
                            	<a href="#wiz1step1">
                                	<span class="h2">Step 1</span>
                                    <span class="dot"><span></span></span>
                                    <span class="label">Server Information</span>
                                </a>
                            </li>
                            <li>
                            	<a href="#wiz1step2">
                                	<span class="h2">Step 2</span>
                                    <span class="dot"><span></span></span>
                                    <span class="label">Software Information</span>
                                </a>
                            </li>
                            <li>
                            	<a href="#wiz1step3">
                                	<span class="h2">Step 3</span>
                                    <span class="dot"><span></span></span>
                                    <span class="label">Checklist</span>
                                </a>
                            </li>
							<li>
                            	<a href="#wiz1step4">
                                	<span class="h2">Step 4</span>
                                    <span class="dot"><span></span></span>
                                    <span class="label">Confirm</span>
                                </a>
                            </li>
                        </ul>
                        
                        <br clear="all" /><br /><br />
                        	
                        <div id="wiz1step1" class="formwiz ">
                        	<h4>Step 1: Basic Information</h4>
                        	
								<p>
                                    <label>Start Date</label>
                                    <span class="field"><input type="text" id="datepicker1" name="start_time" class="required"/></span>
                                </p>
								
								<p>
                                    <label>Hostname</label>
                                    <span class="field"><input type="text" name="hostname" class="mediuminput required alpha" /></span>
									<div class="testerror"><?php echo form_error('anti_virus');?></div>
								</p>
                                
                                <p>
                                    <label>Primary IP</label>
                                    <span class="field"><input type="text" name="primaryip" class="mediuminput required digits" /></span>
                                </p>
								
								<p>
                                    <label>Secondary IPs</label>
                                    <span class="field"><input type="text" name="secondaryips" class="mediuminput required" /></span>
                                </p>
								
								<p>
                                    <label>Switch Port Speed</label>
                                    <span class="field"><select name="switch_port_speed" id="switch_port_speed" class="required">
                                        <option value="">Choose One</option>
                                        <option value="1">Autoneg / 100 Full duplex</option>
                                        <option value="2">Autoneg / 100 Half duplex</option>
                                    </select></span>
                                </p>
                                                                
                                <p>
                                    <label>LAN Card Speed</label>
                                    <span class="field"><select name="lan_card_speed" id="lan_card_speed" class="required">
                                        <option value="">Choose One</option>
                                        <option value="1">Autoneg / 100 Full duplex</option>
                                        <option value="2">Autoneg / 100 Half duplex</option>
                                    </select></span>
                                </p>
								
								<p>
                                    <label>Controller Software</label>
                                    <span class="field"><select name="controller_software" id="controller_software" class="required">
                                        <option value="">Choose One</option>
                                        <?php foreach($CSDetails as $cs)
							{?>
                            	<option value="<?php echo $cs['id'];?>"><?php echo $cs['name'];?></option>
								<?php 
							}?>
                                    </select></span>
                                </p>
								
								<p>
                                    <label>Raid Plan</label>
                                    <span class="field"><select name="raid_plan" class="required">
									<option value="">Choose One</option>
									<?php foreach($raidDetails as $raid)
							{?>
                            	<option value="<?php echo $raid['id'];?>"><?php echo $raid['name'];?></option>
								<?php 
							}?>
								
                            </select></span>
                                </p>
								
								<p>
                        	<label>Firewall Rules Applied</label>
                            <span class="field">
                            <select name="firewall_rules" class="required">
							<option value="">Choose One</option>
							<?php foreach($firewallDetails as $firewall)
							{?>
                            	<option value="<?php echo $firewall['id'];?>"><?php echo $firewall['name'];?></option>
								<?php 
							}?>
								
                            </select></span>
								</p>
								
								<p>
                        	<label>Local Firewall Stopped</label>
                            <span class="formwrapper">
                            	<input type="checkbox" name="firewall_stop" checked="checked" />
                            </span>
							</p>
                            
                        </div><!--#wiz1step1-->
                        
                        <div id="wiz1step2" class="formwiz">
                        	<h4>Step 2: Software Information</h4>
                            
                                <p>
                                    <label>OS installed</label>
                                    <span class="field"><select name="os_install" class="required">
									<option value="">Choose One</option>
									<?php foreach($osDetails as $os)
							{?>
                            	<option value="<?php echo $os['id'];?>"><?php echo $os['name'];?></option>
								<?php 
							}?>
								
                            </select></span>
                                </p>
								
							<p>
                        	<label>Anti-Virus installed</label>
                            <span class="field">
                            <select name="antivirus" class="required">
							<option value="">Choose One</option>
							<?php foreach($antivirusDetails as $virus)
							{?>
                            	<option value="<?php echo $virus['id'];?>"><?php echo $virus['name'];?></option>
								<?php 
							}?>
								
                            </select>
                            
                            </span>
                        </p>
						
							<p>
                        	<label>Control Panel installed</label>
                            <span class="field">
                            <select name="control_panel" class="required">
							<option value="">Choose One</option>
							<?php foreach($controlpanelDetails as $controlpanel)
							{?>
                            	<option value="<?php echo $controlpanel['id'];?>"><?php echo $controlpanel['name'];?></option>
								<?php 
							}?>
								
                            </select>
                            
                            </span>
                        </p>
						
						<p>
                        	<label>Database installed</label>
                            <span class="field">
                            <select name="database" class="required">
							<option value="">Choose One</option>
							<?php foreach($databaseDetails as $database)
							{?>
                            	<option value="<?php echo $database['id'];?>"><?php echo $database['name'];?></option>
								<?php 
							}?>
								
                            </select>
                            
                            </span>
                        </p>
                                                                                               
                        </div><!--#wiz1step2-->
                        
                        <div id="wiz1step3" class="formwiz">
							<h4>Step 3: Checklist</h4>
                        	<p>
                        	<label>Remote Access Enabled</label>
                            <span class="formwrapper">
                            	<input type="checkbox" name="remote" checked="checked" value="1" />
                            </span>
							</p>
							
							<p>
                        	<label>Monitoring Added</label>
                            <span class="formwrapper">
                            	<input type="checkbox" name="monitoring" checked="checked" value="1" />
                            </span>
							</p>
							<p>
                        	<label>PRTG login/pass created</label>
                            <span class="formwrapper">
                            	<input type="checkbox" name="PRTG" checked="checked" value="1" />
                            </span>
							</p>
							<p>
                                    <label>PRTG login</label>
                                    <span class="field"><input type="text" name="prtg_login" class="mediuminput required" /></span>
                                </p>
							<p>
                                    <label>PRTG password</label>
                                    <span class="field"><input type="password" name="prtg_password" class="mediuminput required" /></span>
                                </p>
							<p>
                                    <label>PRTG url</label>
                                    <span class="field"><input type="text" name="prtg_url" class="mediuminput required" /></span>
                                </p>
							<p>
                        	<label>Server Updates</label>
                            <span class="formwrapper">
                            	<input type="checkbox" name="server_updates" checked="checked" value="1"/>
                            </span>
							</p>
							<p>
                        	<label>Server Hardening</label>
                            <span class="formwrapper">
                            	<input type="checkbox" name="server_hardening" value="1"/>
                            </span>
							</p>
							<p>
                        	<label>Client details created in FC</label>
                            <span class="formwrapper">
                            	<input type="checkbox" name="client_details_fc" />
                            </span>
							</p>
							<p>
                                    <label>FC login</label>
                                    <span class="field"><input type="text" name="fc_login" class="mediuminput required" /></span>
                                </p>
							<p>
                                    <label>FC password</label>
                                    <span class="field"><input type="password" name="fc_password" class="mediuminput required" /></span>
                                </p>
							<p>
                                    <label>FC url</label>
                                    <span class="field"><input type="text" name="fc_url" class="mediuminput required" /></span>
                                </p>
							<p>
                        	<label>Server detail updated in FC</label>
                            <span class="formwrapper">
                            	<input type="checkbox" name="server_details_fc" value="1"/>
                            </span>
							</p>
							<p>
                                <label>Server username</label>
                                <span class="field"><input type="text" name="server_username" class="mediuminput required" /></span>
                                </p>
								<p>
                                    <label>Server password</label>
                                    <span class="field"><input type="password" name="server_password" class="mediuminput required" /></span>
                                </p>
								<p>
                                    <label>Other login credentials</label>
                                    <span class="field"><textarea cols="80" rows="5" class="longinput required" name="login_credentials"></textarea></span>
                                </p>
                        </div><!--#wiz1step3-->
						
						<div id="wiz1step4">
							<h4>Step 2: Confirm</h4>
                        	<p>
                        	<label>Delivery Date</label>
                            <span class="field"><input type="text" id="datepicker" name="delivery_date2" class="required"/></span>
						</p>
                        </div><!--#wiz1step4-->
                        
                    </div><!--#wizard-->
                    </form>
                    <!-- END OF DEFAULT WIZARD -->
                    
                    <br /><br />
                    
            </div><!-- #default -->
            
            
        </div><!--contentwrapper-->
        
 </div>
 <style>
	.actionBar input{
		background: none repeat scroll 0 0 #FB9337;
		border: 1px solid #F0882C;
		border-radius: 2px 2px 2px 2px;
		color: #FFFFFF;
		display: inline-block;
		float: right;
		font-weight: bold;
		line-height: 21px;
		margin-left: 5px;
		padding: 7px 15px;
 }

 .actionBar .buttonPrevious{
		background: none repeat scroll 0 0 #FB9337;
		border: 1px solid #F0882C;
		border-radius: 2px 2px 2px 2px;
		color: #FFFFFF;
		display: inline-block;
		float: right;
		font-weight: bold;
		line-height: 21px;
		margin-left: 5px;
        margin-right: 5px;
		padding: 7px 15px;
 }

  .actionBar .buttonFinish{
		background: none repeat scroll 0 0 #FB9337;
		border: 1px solid #F0882C;
		border-radius: 2px 2px 2px 2px;
		color: #FFFFFF;
		display: inline-block;
		float: right;
		font-weight: bold;
		line-height: 21px;
		margin-left: 5px;
        margin-right: 8px;
		padding: 7px 15px;
 }

  .actionBar .buttonNext{
		background: none repeat scroll 0 0 #FB9337;
		border: 1px solid #F0882C;
		border-radius: 2px 2px 2px 2px;
		color: #FFFFFF;
		display: inline-block;
		float: right;
		font-weight: bold;
		line-height: 21px;
		margin-left: 5px;
        margin-right: 8px;
		padding: 7px 15px;
 }
 </style>
