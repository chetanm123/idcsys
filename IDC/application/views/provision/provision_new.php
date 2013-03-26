<?php
		   if(isset($_REQUEST['issubmit']))
		   {
			  echo "<strong>form is sumbitted</strong>";
		   }

?>
<script type="text/javascript">
    $(document).ready(function()
	{
		$( "#datepicker" ).datepicker();
		$( "#datepicker1" ).datepicker();
    	    	
  		$('#wizard').smartWizard({transitionEffect:'slideleft',onLeaveStep:leaveAStepCallback,onFinish:onFinishCallback,enableFinishButton:true});

      function leaveAStepCallback(obj)
	  {
        var step_num = obj.attr('rel');
		
        return validateSteps(step_num);
      }
      
      function onFinishCallback()
	  {
       if(validateAllSteps())
	   {
        $('form').submit();
       }
      }

	  
	});
	   
    function validateAllSteps()
	{
       var isStepValid = true;
       
       if(validateStep1() == false)
	   {
         isStepValid = false;
         $('#wizard').smartWizard('setError',{stepnum:1,iserror:true});         
       }else{
         $('#wizard').smartWizard('setError',{stepnum:1,iserror:false});
       }
       
		if(validateStep2() == false)
	   {
         isStepValid = false;
         $('#wizard').smartWizard('setError',{stepnum:2,iserror:true});         
       }
	   else
	   {
         $('#wizard').smartWizard('setError',{stepnum:2,iserror:false});
       }

       if(validateStep3() == false)
	   {
         isStepValid = false;
         $('#wizard').smartWizard('setError',{stepnum:3,iserror:true});         
       }
	   else
	   {
         $('#wizard').smartWizard('setError',{stepnum:3,iserror:false});
       }
       
       if(!isStepValid)
	   {
          $('#wizard').smartWizard('showMessage','Please correct the errors in the steps and continue');
       }
              
       return isStepValid;
    } 	
		
		
	function validateSteps(step)
	{
		var isStepValid = true;
      
      if(step == 1)
	  {
		  
        if(validateStep1() == false )
		{
		  isStepValid = false; 
          $('#wizard').smartWizard('showMessage','Please correct the errors in step'+step+ ' and click next.');
          $('#wizard').smartWizard('setError',{stepnum:step,iserror:true});         
        }
		else
		{
          //$('#wizard').smartWizard('setError',{stepnum:step,iserror:false});
        }
      }
      
		if(step == 2)
		{
        if(validateStep2() == false )
		{
          isStepValid = false; 
          $('#wizard').smartWizard('showMessage','Please correct the errors in step'+step+' and click next.');
          $('#wizard').smartWizard('setError',{stepnum:step,iserror:true});         
        }else{
          //$('#wizard').smartWizard('setError',{stepnum:step,iserror:false});
        }
      }

      
      if(step == 3){
        if(validateStep3() == false )
		{
          isStepValid = false; 
          $('#wizard').smartWizard('showMessage','Please correct the errors in step'+step+ ' and click next.');
          $('#wizard').smartWizard('setError',{stepnum:step,iserror:true});         
        }
		else
		{
          //$('#wizard').smartWizard('setError',{stepnum:step,iserror:false});
        }
      }
      
      return isStepValid;
    }
		
		function validateStep1()
		{
			
       var isValid = true; 
       
       var un = $('#datepicker1').val();
	   
       if(!un){
		
         isValid = false;
         $('#msg_datepicker1').html('Please Select the Start Date').show();
       }else{
         $('#msg_datepicker1').html('').hide();
       }
       
       
       var host = $('#hostname').val();
	  
       if(!host){
         isValid = false;
         $('#msg_hostname').html('Please fill hostname').show();         
       }else{
         $('#msg_hostname').html('').hide();
       }
       
       
       var pip = $('#primaryip').val();
	   
       if(!pip){
         isValid = false;
         $('#msg_primaryip').html('Please fill primary ip').show();         
       }else{
         $('#msg_primaryip').html('').hide();
       }  

	   var sip = $('#secondaryips').val();
	   
       if(!sip){
         isValid = false;
         $('#msg_secondaryips').html('Please fill secondary ip').show();         
       }else
	   {
         $('#msg_secondaryips').html('').hide();
       } 

	  var sp = $('#switch_port_speed').val();
       if(!sp){
         isValid = false;
         $('#msg_switch_port_speed').html('Please select switch port speed').show();         
       }else{
         $('#msg_switch_port_speed').html('').hide();
       } 

	   var spno = $('#switch_port_no').val();
       if(!spno){
         isValid = false;
         $('#msg_switch_port_no').html('Please enter switch port number').show();         
       }else{
         $('#msg_switch_port_no').html('').hide();
       } 

	   var ls = $('#lan_card_speed').val();
       if(!ls){
         isValid = false;
         $('#msg_lan_card_speed').html('Please select lan card speed').show();         
       }else{
         $('#msg_lan_card_speed').html('').hide();
       } 

	    var cs = $('#controller_software').val();
       if(!cs){
         isValid = false;
         $('#msg_controller_software').html('Please select controller software').show();         
       }else{
         $('#msg_controller_software').html('').hide();
       } 

	    var rp = $('#raid_plan').val();
       if(!rp){
         isValid = false;
         $('#msg_raid_plan').html('Please select raid level').show();         
       }else{
         $('#msg_raid_plan').html('').hide();
       } 

	    var fr = $('#firewall_rules').val();
       if(!fr){
         isValid = false;
         $('#msg_firewall_rules').html('Please select firewall rules').show();         
       }else{
         $('#msg_firewall_rules').html('').hide();
       } 

	    
       return isValid;
    }

	function validateStep2()
	{
		var isValid = true; 
        var os = $('#os_install').val();
	    if(!os)
		{
			isValid = false;
            $('#msg_os_install').html('Please Select operating system').show();
        }
		else
		{
			$('#msg_os_install').html('').hide();
        }

		var anti = $('#antivirus').val();
	    if(!anti)
		{
			isValid = false;
            $('#msg_antivirus').html('Please Select the antivirus').show();
        }
		else
		{
			$('#msg_antivirus').html('').hide();
        }

		var cp = $('#control_panel').val();
	    if(!cp)
		{
			isValid = false;
            $('#msg_control_panel').html('Please Select the control panel').show();
        }
		else
		{
			$('#msg_control_panel').html('').hide();
        }

		var db = $('#database').val();
	    if(!db)
		{
			isValid = false;
            $('#msg_database').html('Please Select the Start Date').show();
        }
		else
		{
			$('#msg_database').html('').hide();
        }
		 return isValid;
	}
    
    function validateStep3()
	{
      var isValid = true; 
	  var prtg_login = $('#prtg_login').val();
	   if(!prtg_login)
		{
			isValid = false;
            $('#msg_prtg_login').html('Please enter PRTG login').show();
        }
		else
		{
			$('#msg_prtg_login').html('').hide();
        }

		 var prtg_pass = $('#prtg_password').val();
	   if(!prtg_pass)
		{
			isValid = false;
            $('#msg_prtg_password').html('Please enter prtg password').show();
        }
		else
		{
			$('#msg_prtg_password').html('').hide();
        }

		 var prtg_url = $('#prtg_url').val();
	   if(!prtg_url)
		{
			isValid = false;
            $('#msg_prtg_url').html('Please enter prtg url').show();
        }
		else
		{
			$('#msg_prtg_url').html('').hide();
        }

		 var client_fc = $('#client_details_fc').val();
	   if(!client_fc)
		{
			isValid = false;
            $('#msg_client_details_fc').html('Please Select the Start Date').show();
        }
		else
		{
			$('#msg_client_details_fc').html('').hide();
        }

		 var fc_login = $('#fc_login').val();
	   if(!fc_login)
		{
			isValid = false;
            $('#msg_fc_login').html('Please Select the Start Date').show();
        }
		else
		{
			$('#msg_fc_login').html('').hide();
        }

		 var fc_password = $('#fc_password').val();
	   if(!fc_password)
		{
			isValid = false;
            $('#msg_fc_password').html('Please Select the Start Date').show();
        }
		else
		{
			$('#msg_fc_password').html('').hide();
        }

		 var fc_url = $('#fc_url').val();
	   if(!fc_url)
		{
			isValid = false;
            $('#msg_fc_url').html('Please Select the Start Date').show();
        }
		else
		{
			$('#msg_dfc_url').html('').hide();
        }

		 var server_username = $('#server_username').val();
	   if(!server_username)
		{
			isValid = false;
            $('#msg_server_username').html('Please Select the Start Date').show();
        }
		else
		{
			$('#msg_server_username').html('').hide();
        }

		 var server_password = $('#server_password').val();
	   if(!server_password)
		{
			isValid = false;
            $('#msg_server_password').html('Please Select the Start Date').show();
        }
		else
		{
			$('#msg_server_password').html('').hide();
        }

		 var login_credentials = $('#login_credentials').val();
	   if(!login_credentials)
		{
			isValid = false;
            $('#msg_login_credentials').html('Please Select the Start Date').show();
        }
		else
		{
			$('#msg_login_credentials').html('').hide();
        }
		 
      
      return isValid;
    }
    
   
		
</script>
<style>
.float {
    color: red;
    float: left;
    font-size: 12px;
    margin-left: 220px;
    margin-top: 5px;
}
</style>

		<div class="centercontent"> 
		<?php if(!empty($provisionView)) 
		{
		?>
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
			}?>
			<br/>
			IPs: <?php //echo $provisionView[0]['id'];?></p>
            <ul class="hornav">
                <li class="current"><a href="#default">Provisioning Info</a></li>
            </ul>
        </div><!--pageheader-->
		<?php
		}
		?>

		<div id="contentwrapper" class="contentwrapper">
		<div id="default" class="subcontent">
		
		<form action="#" method="POST" class="stdform">
		<input type='hidden' name="issubmit" value="1">
		
  		<div id="wizard" class="wizard">
		<br />
  			<ul class="hormenu">
                            <li>
                            	<a href="#step-1">
                                	<span class="h2">Step 1</span>
                                    <span class="dot"><span></span></span>
                                    <span class="label">Server Information</span>
                                </a>
                            </li>
                            <li>
                            	<a href="#step-2">
                                	<span class="h2">Step 2</span>
                                    <span class="dot"><span></span></span>
                                    <span class="label">Software Information</span>
                                </a>
                            </li>
                            <li>
                            	<a href="#step-3">
                                	<span class="h2">Step 3</span>
                                    <span class="dot"><span></span></span>
                                    <span class="label">Checklist</span>
                                </a>
                            </li>
							<li>
                            	<a href="#step-4">
                                	<span class="h2">Step 4</span>
                                    <span class="dot"><span></span></span>
                                    <span class="label">Confirm</span>
                                </a>
                            </li>
                        </ul>
                        
                        <br clear="all" /><br /><br />
  				<div id="step-1" class="formwiz">	
				<h4>Step 1: Basic Information</h4>
								<p>
                                    <label>Start Date</label>
                                    <span class="field"><input type="text" id="datepicker1" name="start_time" /></span>
									<span id="msg_datepicker1" class="float"></span>&nbsp;
								</p>
								
								<p>
                                    <label>Hostname</label>
                                    <span class="field"><input type="text" name="hostname" id="hostname" class="mediuminput" /></span>
									<span id="msg_hostname" class="float"></span>&nbsp;
								</p>
                                
                                <p>
                                    <label>Primary IP</label>
                                    <span class="field"><input type="text" name="primaryip" id="primaryip" class="mediuminput" /></span>
									<span id="msg_primaryip" class="float"></span>&nbsp;
                                </p>
								
								<p>
                                    <label>Secondary IPs</label>
                                    <span class="field"><input type="text" name="secondaryips" id="secondaryips" class="mediuminput" /></span>
									<span id="msg_secondaryips" class="float"></span>&nbsp;
                                </p>
								
								<p>
                                    <label>Switch Port Speed</label>
                                    <span class="field"><select name="switch_port_speed" id="switch_port_speed" >
                                        <option value="">Choose One</option>
                                        <option value="1">Autoneg / 100 Full duplex</option>
                                        <option value="2">Autoneg / 100 Half duplex</option>
                                    </select></span>
									<span id="msg_switch_port_speed" class="float"></span>&nbsp;
                                </p>

								<p>
                                    <label>Switch Port No.</label>
                                    <span class="field"><input type="text" name="switch_port_no" id="switch_port_no" class="mediuminput" /></span>
									<span id="msg_switch_port_no" class="float"></span>&nbsp;
                                </p>
                                                                
                                <p>
                                    <label>LAN Card Speed</label>
                                    <span class="field"><select name="lan_card_speed" id="lan_card_speed" >
                                        <option value="">Choose One</option>
                                        <option value="1">Autoneg / 100 Full duplex</option>
                                        <option value="2">Autoneg / 100 Half duplex</option>
                                    </select></span>
									<span id="msg_lan_card_speed" class="float"></span>&nbsp;
                                </p>
								
								<p>
                                    <label>Controller Software</label>
                                    <span class="field"><select name="controller_software" id="controller_software" ">
                                        <option value="">Choose One</option>
                                        <?php foreach($CSDetails as $cs)
							{?>
                            	<option value="<?php echo $cs['id'];?>"><?php echo $cs['name'];?></option>
								<?php 
							}?>
                                    </select></span>
									<span id="msg_controller_software" class="float"></span>&nbsp;
                                </p>
								
								<p>
                                    <label>Raid Plan</label>
                                    <span class="field"><select name="raid_plan" id="raid_plan">
									<option value="">Choose One</option>
									<?php foreach($raidDetails as $raid)
							{?>
                            	<option value="<?php echo $raid['id'];?>"><?php echo $raid['name'];?></option>
								<?php 
							}?>
								
                            </select></span>
							<span id="msg_raid_plan" class="float"></span>&nbsp;
                                </p>
								
								<p>
                        	<label>Firewall Rules Applied</label>
                            <span class="field">
                            <select name="firewall_rules" id="firewall_rules">
							<option value="">Choose One</option>
							<?php foreach($firewallDetails as $firewall)
							{?>
                            	<option value="<?php echo $firewall['id'];?>"><?php echo $firewall['name'];?></option>
								<?php 
							}?>
								
                            </select></span>
							<span id="msg_firewall_rules" class="float"></span>&nbsp;
								</p>
								
								<p>
                        	<label>Local Firewall Stopped</label>
                            <span class="formwrapper">
                            	<input type="checkbox" name="firewall_stop" value="1" />
                            </span>
							</p>

							<p>
                        	<label>Miscellaneous:</label>
                            <span class="field"><textarea cols="80" rows="5" class="longinput required" name="miscellaneous"></textarea></span>
							
						</p>
                   			
						 </div>
  						<div id="step-2" class="formwiz">
                        	<h4>Step 2: Software Information</h4>
                            
                                <p>
                                    <label>OS installed</label>
                                    <span class="field"><select name="os_install" id="os_install" class="required">
									<option value="">Choose One</option>
									<?php foreach($osDetails as $os)
							{?>
                            	<option value="<?php echo $os['id'];?>"><?php echo $os['name'];?></option>
								<?php 
							}?>
								
                            </select></span>
							<span id="msg_os_install" class="float"></span>&nbsp;
                                </p>
								
							<p> 
                        	<label>Anti-Virus installed</label>
                            <span class="field">
                            <select name="antivirus" id="antivirus" class="required">
							<option value="">Choose One</option>
							<?php foreach($antivirusDetails as $virus)
							{?>
                            	<option value="<?php echo $virus['id'];?>"><?php echo $virus['name'];?></option>
								<?php 
							}?>
								
                            </select>
                            
                            </span>
							<span id="msg_antivirus" class="float"></span>&nbsp;
                        </p>
							
							<p>
                        	<label>Control Panel installed</label>
                            <span class="field">
                            <select name="control_panel" id="control_panel" class="required">
							<option value="">Choose One</option>
							<?php foreach($controlpanelDetails as $controlpanel)
							{?>
                            	<option value="<?php echo $controlpanel['id'];?>"><?php echo $controlpanel['name'];?></option>
							<?php 
							}
							?>
								
                            </select>
                            
                            </span>
							<span id="msg_control_panel" class="float"></span>&nbsp;
                        </p>
						
						<p>
                        	<label>Database installed</label>
                            <span class="field">
                            <select name="database" id="database" class="required">
							<option value="">Choose One</option>
							<?php foreach($databaseDetails as $database)
							{?>
                            	<option value="<?php echo $database['id'];?>"><?php echo $database['name'];?></option>
								<?php 
							}?>
								
                            </select>
                            
                            </span>
							<span id="msg_database" class="float"></span>&nbsp;
                        </p>
                                                                                               
                        </div><!--#wiz1step2-->
                        
                        <div id="step-3" class="formwiz">
							<h4>Step 3: Checklist</h4>
                        	<p>
                        	<label>Remote Access Enabled</label>
                            <span class="formwrapper">
                            	<input type="checkbox" name="remote"  value="1" />
                            </span>
							</p>
							
							<p>
                        	<label>Monitoring Added</label>
                            <span class="formwrapper">
                            	<input type="checkbox" name="monitoring"  value="1" />
                            </span>
							</p>
							<p>
                        	<label>PRTG login/pass created</label>
                            <span class="formwrapper">
                            	<input type="checkbox" name="PRTG"  value="1" />
                            </span>

							</p>
							<p>
                                    <label>PRTG login</label>
                                    <span class="field"><input type="text" name="prtg_login" id="prtg_login" class="mediuminput required" /></span>
									<span id="msg_prtg_login" class="float"></span>&nbsp;
                                </p>
							<p>
                                    <label>PRTG password</label>
                                    <span class="field"><input type="text" name="prtg_password" id="prtg_password" class="mediuminput required" /></span>
									<span id="msg_prtg_password" class="float"></span>&nbsp;
                                </p>
							<p>
                                    <label>PRTG url</label>
                                    <span class="field"><input type="text" name="prtg_url" id="prtg_url" class="mediuminput required" /></span>
									<span id="msg_prtg_url" class="float"></span>&nbsp;
                                </p>
							<p>
                        	<label>Server Updates</label>
                            <span class="formwrapper">
                            	<input type="checkbox" name="server_updates" " value="1"/>
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
                            	<input type="checkbox" name="client_details_fc" id="client_details_fc"/>
                            </span>
							<span id="msg_client_details_fc" class="float"></span>&nbsp;
							</p>
							<p>
                                    <label>FC login</label>
                                    <span class="field"><input type="text" name="fc_login" id="fc_login" class="mediuminput required" /></span>
									<span id="msg_fc_login" class="float"></span>&nbsp;
                                </p>
							<p>
                                    <label>FC password</label>
                                    <span class="field"><input type="text" name="fc_password" id="fc_password" class="mediuminput required" /></span>
									<span id="msg_fc_password" class="float"></span>&nbsp;
                                </p>
							<p>
                                    <label>FC url</label>
                                    <span class="field"><input type="text" name="fc_url" id="fc_url" class="mediuminput required" /></span>
									<span id="msg_fc_url" class="float"></span>&nbsp;
                                </p>
							<p>
                        	<label>Server detail updated in FC</label>
                            <span class="formwrapper">
                            	<input type="checkbox" name="server_details_fc" value="1"/>
                            </span>
							</p>
							<p>
                                <label>Server username</label>
                                <span class="field"><input type="text" name="server_username" id="server_username" class="mediuminput required" /></span>
								<span id="msg_server_username" class="float"></span>&nbsp;
                                </p>
								<p>
                                    <label>Server password</label>
                                    <span class="field"><input type="text" name="server_password" id="server_password" class="mediuminput required" /></span>
									<span id="msg_password" class="float"></span>&nbsp;
                                </p>
								<p>
                                    <label>Other login credentials</label>
                                    <span class="field"><textarea cols="80" rows="5" id="login_credentials" class="longinput required" name="login_credentials"></textarea></span>
									<span id="msg_login_credentials" class="float"></span>&nbsp;
                                </p>
                        </div><!--#wiz1step3-->
						
						<div id="step-4">
							<h4>Step 2: Confirm</h4>
                        	<p>
                        	<label>Delivery Date</label>
                            <span class="field"><input type="text" id="datepicker" name="delivery_date2" /></span>
						</p>
                        </div><!--#wiz1step4-->
                        
                    </div><!--#wizard-->
				</form><br /><br />
			</div>
  		</div>  		
</div>
                    
                   