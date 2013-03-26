<?php //echo "<pre>"; print_r($editDetails);exit;?>
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

      /* if(validateStep3() == false)
	   {
         isStepValid = false;
         $('#wizard').smartWizard('setError',{stepnum:3,iserror:true});         
       }
	   else
	   {
         $('#wizard').smartWizard('setError',{stepnum:3,iserror:false});
       }*/
       
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
			
         // $('#wizard').smartWizard('setError',{stepnum:step,iserror:false});
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
         // $('#wizard').smartWizard('setError',{stepnum:step,iserror:false});
        }
      }

      
     /*if(step == 3){
        if(validateStep3() == false )
		{
          isStepValid = false; 
          $('#wizard').smartWizard('showMessage','Please correct the errors in step'+step+ ' and click next.');
          $('#wizard').smartWizard('setError',{stepnum:step,iserror:true});         
        }
		else
		{
          $('#wizard').smartWizard('setError',{stepnum:step,iserror:false});
        }
      }*/
      
      return isStepValid;
    }
		
	function validateStep1()
	{
			
       var isValid = true; 
       
      /* var un = $('#datepicker1').val();
	   
       if(!un){
		
         isValid = false;
         $('#msg_datepicker1').html('Please Select the Start Date').show();
       }else{
         $('#msg_datepicker1').html('').hide();
       }*/
       
       
       var host = $('#hostname').val();
	   
       if(!host){
         isValid = false;
         $('#msg_hostname').html('Please fill hostname').show();         
       }else{
         $('#msg_hostname').html('').hide();
       }
       
       
       var pip = $('#primaryip').val();
	   ;
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
    
    /*function validateStep3()
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
    }*/
    
   
		
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
<?php
//echo "<pre>";
//print_r($provisionView);exit;
?>
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
                    <!--<form class="stdform" name="provision_frm" method="post" action="<?php echo base_url();?>provision/provisions/editprovision/<?php echo $editDetails[0]['id'];?>">-->
					<form action="#" method="POST" class="stdform">
					<input type='hidden' name="issubmit" value="1">
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
                        	
                        <div id="wiz1step1" class="formwiz">
                        	<h4>Step 1: Basic Information</h4>
                        	
								<p>
                                    <label>Start Date</label>
                                    <span class="field"><input type="text" id="datepicker1" name="start_time" id="start_time" value="<?php echo $editDetails[0]['startdate'];?>"/></span>
									<span id="msg_datepicker1" class="float"></span>&nbsp;
								</p>
								
                                <p>
                                    <label>Hostname</label>
                                    <span class="field"><input type="text" name="hostname" id="hostname" class="mediuminput" value="<?php echo $editDetails[0]['hostname'];?>" /></span>
									<span id="msg_hostname" class="float"></span>&nbsp;
                                </p>
                                
                                <p>
                                    <label>Primary IP</label>
                                    <span class="field"><input type="text" name="primaryip" id="primaryip" class="mediuminput" value="<?php echo $editDetails[0]['primary_ip'];?>" /></span>
									<span id="msg_primaryip" class="float"></span>&nbsp;
                                </p>
								
								<p>
                                    <label>Secondary IPs</label>
                                    <span class="field"><input type="text" name="secondaryips" id="secondaryips" class="mediuminput" value="<?php echo $editDetails[0]['misc_ips'];?>"/></span>
									<span id="msg_secondaryips" class="float"></span>&nbsp;
                                </p>
								
								<p>
                                    <label>Switch Port Speed</label>
                                    <span class="field"><select name="switch_port_speed" id="switch_port_speed">
                                        
                                        
									<?php foreach($switchportDetails as $switch)
							{?>
                            	<option value="<?php echo $switch['id'];?>" <?php if($editDetails[0]['switchport_speed_id']==$switch['id'])
								{?>
									selected="selected"
									<?php
								}?>><?php echo $switch['name'];?></option>
								<?php 
							}?>
                                    </select></span>
                                </p>

								
								<p>
                                    <label>Switch Port No.</label>
                                    <span class="field"><input type="text" name="switch_port_no" id="switch_port_no" class="mediuminput" /></span>
									<span id="msg_switch_port_no" class="float"></span>&nbsp;
                                </p>


                                                                
                                <p>
                                    <label>LAN Card Speed</label>
                                    <span class="field"><select name="lan_card_speed" id="lan_card_speed">
                                       
                                       
									<?php foreach($lancardDetails as $lancard)
							{?>
                            	<option value="<?php echo $lancard['id'];?>" <?php if($editDetails[0]['lancard_speed_id']==$lancard['id'])
								{?>
									selected="selected"
									<?php
								}?>><?php echo $lancard['name'];?></option>
								<?php 
							}?>
                                    </select></span>
                                </p>
								
								<p>
                                    <label>Controller Software</label>
                                    <span class="field"><select name="controller_software" id="controller_software">
                                        
									<?php foreach($CSDetails as $cs)
							{?>
                            	<option value="<?php echo $cs['id'];?>" <?php if($editDetails[0]['controller_software']==$cs['id'])
								{?>
									selected="selected"
									<?php
								}?>><?php echo $cs['name'];?></option>
								<?php 
							}?>
                                    </select></span>
                                </p>
								
								<p>
                                    <label>Raid Plan</label>
                                    <span class="field"><select name="raid_plan" id="raid_plan">
									
									<?php foreach($raidDetails as $raid)
							{?>
                            	<option value="<?php echo $raid['id'];?>" <?php if($editDetails[0]['raid_plan_id']==$raid['id'])
								{?>
									selected="selected"
									<?php
								}?>><?php echo $raid['name'];?></option>
								<?php 
							}?>
								
                            </select></span>
                                </p>
								
								<p>
                        	<label>Firewall Rules Applied</label>
                            <span class="field">
                            <select name="firewall_rules" id="firewall_rules" >
							
							<?php foreach($firewallDetails as $firewall)
							{?>
                            	<option value="<?php echo $firewall['id'];?>" <?php if($editDetails[0]['firewall_rules']==$firewall['id'])
								{?>
									selected="selected"
									<?php
								}?>><?php echo $firewall['name'];?></option>
								<?php 
							}?>
								
                            </select></span>
								</p>
								
								<p>
                        	<label>Local Firewall Stopped</label>
                            <span class="formwrapper">
                            	<input type="checkbox" name="firewall_stop" id="firewall_stop" <?php if($editDetails[0]['local_firewall_stopped'] == 1)
								{
									?>
									checked="checked" value="1"
									<?php 
								}
								?>
								/>
                            </span>
							</p>
                           
							<p>
                        	<label>Miscellaneous:</label>
                            <span class="field"><textarea cols="80" rows="5" class="longinput required" name="miscellaneous">
							<?php echo $editDetails[0]['miscellaneous'];?></textarea></span>
							</p>
						
                        </div><!--#wiz1step1-->
                        
                        <div id="wiz1step2" class="formwiz">
                        	<h4>Step 2: Software Information</h4>
                            
                                <p>
                                    <label>OS installed</label>
                                    <span class="field"><select name="os_install" id="os_install">
									
									<?php foreach($osDetails as $os)
							{?>
                            	<option value="<?php echo $os['id'];?>" <?php if($editDetails[0]['os_id']==$os['id'])
								{?>
									selected="selected"
									<?php
								}?>><?php echo $os['name'];?></option>
								<?php 
							}?>
								
                            </select></span>
                                </p>
								
							<p>
                        	<label>Anti-Virus installed</label>
                            <span class="field">
                            <select name="antivirus" id="antivirus">
							
							<?php foreach($antivirusDetails as $virus)
							{?>
                            	<option value="<?php echo $virus['id'];?>" <?php if($editDetails[0]['antivirus_id']==$virus['id'])
								{?>
									selected="selected"
									<?php
								}?>><?php echo $virus['name'];?></option>
								<?php 
							}?>
								
                            </select>
                            
                            </span>
                        </p>
						
							<p>
                        	<label>Control Panel installed</label>
                            <span class="field">
                            <select name="control_panel" id="control_panel">
							
							<?php foreach($controlpanelDetails as $controlpanel)
							{?>
                            	<option value="<?php echo $controlpanel['id'];?>" <?php if($editDetails[0]['control_panel_id']==$controlpanel['id'])
								{?>
									selected="selected"
									<?php
								}?>><?php echo $controlpanel['name'];?></option>
								<?php 
							}?>
								
                            </select>
                            
                            </span>
                        </p>
						
						<p>
                        	<label>Database installed</label>
                            <span class="field">
                            <select name="database" id="database">
							
							<?php foreach($dbDetails as $database)
							{?>
                            	<option value="<?php echo $database['id'];?>" <?php if($editDetails[0]['db_id']==$database['id'])
								{?>
									selected="selected"
									<?php
								}?>><?php echo $database['name'];?></option>
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
                            	<input type="checkbox" name="remote" <?php if($editDetails[0]['remote_access'] == 1)
								{
									?>
									checked="checked" value="1"
									<?php }
									?>/>
                            </span>
							</p>
							
							<p>
                        	<label>Monitoring Added</label>
                            <span class="formwrapper">
                            	<input type="checkbox" name="monitoring" <?php if($editDetails[0]['monitor_added'] == 1)
								{
									?>
									checked="checked" value="1"
									<?php }
									?> />
                            </span>
							</p>
							<p>
                        	<label>PRTG login/pass created</label>
                            <span class="formwrapper">
                            	<input type="checkbox" name="PRTG" <?php if($editDetails[0]['PRTG_created'] == 1)
								{
									?>
									checked="checked" value="1"
									<?php }
									?> />
                            </span>
							</p>
							<p>
                                    <label>PRTG login</label>
                                    <span class="field"><input type="text" name="prtg_login" id="prtg_login" class="mediuminput" value="<?php echo $editDetails[0]['PRTG_login'];?>"/></span>
                                </p>
							<p>
                                    <label>PRTG password</label>
                                    <span class="field"><input type="password" name="prtg_password" id="prtg_password" class="mediuminput" /></span>
                                </p>
							<p>
                                    <label>PRTG url</label>
                                    <span class="field"><input type="text" name="prtg_url" id="prtg_url" class="mediuminput" value="<?php echo $editDetails[0]['PRTG_url'];?>"/></span>
                                </p>
							<p>
                        	<label>Server Updates</label>
                            <span class="formwrapper">
                            	<input type="checkbox" name="server_updates" id="server_updates" <?php if($editDetails[0]['server_updates'] == 1)
								{
									?>
									checked="checked" value="1"
									<?php }
									?>/>
                            </span>
							</p>
							<p>
                        	<label>Server Hardening</label>
                            <span class="formwrapper">
                            	<input type="checkbox" name="server_hardening" id="server_hardening" <?php if($editDetails[0]['server_hardening'] == 1)
								{
									?>
									checked="checked" value="1"
									<?php }
									?>/>
                            </span>
							</p>
							<p>
                        	<label>Client details created in FC</label>
                            <span class="formwrapper">
                            	<input type="checkbox" name="client_details_fc" id="client_details_fc" <?php if($editDetails[0]['client_details_FC'] == 1)
								{
									?>
									checked="checked" value="1"
									<?php }
									?>/>
                            </span>
							</p>
							<p>
                                    <label>FC login</label>
                                    <span class="field"><input type="text" name="fc_login" id="fc_login" class="mediuminput" value="<?php echo $editDetails[0]['FC_login'];?>"/></span>
                                </p>
								<p>
                                    <label>FC password</label>
                                    <span class="field">
									<input type="password" name="fc_password" id="fc_password" class="mediuminput" />
									</span>
                                </p>
								<p>
                                    <label>FC url</label>
                                    <span class="field"><input type="text" name="fc_url" id="fc_url" class="mediuminput" value="<?php echo $editDetails[0]['FC_url'];?>"/></span>
                                </p>
							<p>
                        	<label>Server detail updated in FC</label>
                            <span class="formwrapper">
                            	<input type="checkbox" name="server_details_fc" id="server_details_fc" <?php if($editDetails[0]['server_details_FC'] == 1)
								{
									?>
									checked="checked" value="1"
									<?php }
									?>/>
                            </span>
							</p>
							<p>
                                    <label>Server username</label>
                                    <span class="field"><input type="text" name="server_username" id="server_username" class="mediuminput" value="<?php echo $editDetails[0]['server_username'];?>"/></span>
                                </p>
								<p>
                                    <label>Server password</label>
                                    <span class="field"><input type="password" name="server_password" id="server_password" class="mediuminput" value=""/></span>
                                </p>
								<p>
                                    <label>Other login credentials</label>
                                    <span class="field"><textarea cols="80" rows="5" class="longinput" name="login_credentials" id="login_credentials"><?php echo $editDetails[0]['login_credentials'];?></textarea></span>
                                </p>
                        </div><!--#wiz1step3-->
						
						<div id="wiz1step4">
							<h4>Step 2: Confirm</h4>
                        	<p>
                        	<label>Delivery Date</label>
                            <span class="field"><input type="text" id="datepicker" name="delivery_date2" id="delivery_date2" value="<?php echo $editDetails[0]['delivery_date'];?>"/></span>
						</p>
                        </div><!--#wiz1step4-->
                        
                    </div><!--#wizard-->
                    </form>
                    <!-- END OF DEFAULT WIZARD -->
                    
                    <br /><br />
                    
            </div><!-- #default -->
            
            
        </div><!--contentwrapper-->
        
 </div>