 <?php 
 ?>
 <script>
$(function() {
$( "#datepicker" ).datepicker();
});
</script>
<?php //echo "<pre>"; print_r($locationDetails);?>
<?php //echo validation_errors(); ?>
<div class="centercontent">
    
        <div class="pageheader notab">
            <h1 class="pagetitle">Edit Request</h1>
            <span class="pagedesc">This is a sample description of a page</span>
            
        </div><!--pageheader-->
        
        <div id="contentwrapper" class="contentwrapper widgetpage">
        
         <form class="stdform" id="form1" action="<?php echo base_url();?>sales/sales/edit_sales/<?php echo $editDetails[0]['id'];?>" method="post" >
						<p>
                        	<label>Company Billed in:</label>
                            <span class="field">
							<select name="company_billed" id="company_billed" class="required">
							<?php foreach($companyDetails as $list)
							{?>
                            	<option value="<?php echo $list['id'];?>" <?php if($editDetails[0]['company_id']==$list['id'])
								{?>
									selected="selected"
									<?php
								}?>><?php echo $list['name'];?></option>
							<?php 
							}?>
                            </select></span>
							
                            <small class="desc">Company which the client is billed under.</small>
                        </p>
                        
                        <p>
                        	<label>Name of contact on the client side:</label>
                            <span class="field"><input type="text" name="contact_name" class="mediuminput required alpha"  value="<?php echo $editDetails[0]['contact_name'];?>" /></span>
							
							<small class="desc">Person liaisoning with web werks.</small>
                        </p>
                        
                        <p>
                        	<label>Client's Address:</label>
                            <span class="field"><textarea cols="80" rows="5" class="longinput required" name="address" id="address" ><?php echo $editDetails[0]['address'];?></textarea></span>
							
                        </p>
                        
                        <p>
                        	<label>Phone</label>
                            <span class="field"><input type="text" name="contact_no" class="mediuminput required digits" value="<?php echo $editDetails[0]['contact_no'];?>"/></span>
							<small class="desc">Landline no.</small>
							
                        </p>
                        
                        <p>
                        	<label>Mobile</label>
                            <span class="field"><input type="text" name="mobile_no" class="mediuminput required digits" value="<?php echo $editDetails[0]['mobile_no'];?>"/></span>
							<small class="desc">Mobile phone no.</small>
							
                        </p>
						
						<p>
                        	<label>Company Name:</label>
                            <span class="field"><input type="text" name="company_nm" class="mediuminput required alpha" value="<?php echo $editDetails[0]['company_name'];?>"/></span>
							
                        </p>
						
						<p>
                        	<label>Email:</label>
                            <span class="field"><input type="text" name="email" class="mediuminput required email" value="<?php echo $editDetails[0]['email'];?>"/></span>
							
                        </p>
						
						<p>
                        	<label>Fax:</label>
                            <span class="field"><input type="text" name="fax" class="mediuminput required digits" value="<?php echo $editDetails[0]['fax_no'];?>"/></span>
							
                        </p>
						
						<p>
                        	<label>Delivery Date:</label>
                            <span class="field"><input type="text" id="datepicker" class="required" name="delivery_date" value="<?php 
							$date = explode('-',$editDetails[0]['delivery_date']);
							$dt = $date[1]."/".$date[2]."/".$date[0];
							echo $dt;?>"/>
							</span>
							
						</p>
						
						<p>
                        	<label>Location requested:</label>
                            <span class="field">
                            <select name="location" class="required">
                            	<?php foreach($locationDetails as $location)
							{?>
                            	<option value="<?php echo $location['id'];?>" <?php if($editDetails[0]['location_id']==$location['id'])
								{?>
									selected="selected"
									<?php
								}?>><?php echo $location['name'];?></option>
								<?php 
							}?>
                            </select>
                            
                            </span>
							
                        </p>
						
						<p>
                        	<label>Processor:</label>
                            <span class="field">
                            <select name="processor" class="required">
							<?php foreach($processorDetails as $processor)
							{?>
                            	<option value="<?php echo $processor['id'];?>" <?php if($editDetails[0]['processor_id']==$processor['id'])
								{?>
									selected="selected"
									<?php
								}?>><?php echo $processor['name'];?></option>
								<?php 
							}?>
                            </select>
                            </span>
							
                        </p>
						
						<p>
                        	<label>RAID Level:</label>
                            <span class="field">
                            <select name="raid" class="required">
								<?php foreach($raidDetails as $raid)
							{?>
                            	<option value="<?php echo $raid['id'];?>" <?php if($editDetails[0]['raid_plan_id']==$raid['id'])
								{?>
									selected="selected"
									<?php
								}?>><?php echo $raid['name'];?></option>
								<?php 
							}?>
                            </select>
                            
                            </span>
							
                        </p>
						
						<p>
                        	<label>No of IP addresses:</label>
                            <span class="field"><input type="text" name="no_of_ip" class="mediuminput required digits" value="<?php echo $editDetails[0]['no_of_ips'];?>"/></span>
							
                        </p>
						
						<p>
                        	<label>Bandwidth:</label>
                            <span class="field">
                            <select name="bandwidth" class="required">
								<?php foreach($bandwidthDetails as $bandwidth)
							{?>
                            	<option value="<?php echo $bandwidth['id'];?>" <?php if($editDetails[0]['bandwidth_plan_id']==$bandwidth['id'])
								{?>
									selected="selected"
									<?php
								}?>><?php echo $bandwidth['name'];?></option>
								<?php 
							}?>
                            </select>
                            
                            </span>
							
                        </p>
						
						<p>
                        	<label>Operating System:</label>
                            <span class="field">
                            <select name="op" class="required">
								<?php foreach($osDetails as $os)
							{?>
                            	<option value="<?php echo $os['id'];?>" <?php if($editDetails[0]['os_id']==$os['id'])
								{?>
									selected="selected"
									<?php
								}?>><?php echo $os['name'];?></option>
								<?php 
							}?>
                            </select>
                            
                            </span>
							
                        </p>
						
						<p>
                        	<label>Memory:</label>
                            <span class="field">
                            <select name="memory" class="required">
							<?php 
							foreach($memoryDetails as $memory)
							{?>
                            <option value="<?php echo $memory['id'];?>" <?php if($editDetails[0]['memory_plan_id']==$memory['id'])
								{?>
									selected="selected"
									<?php
								}?>><?php echo $memory['name'];?></option>
							<?php 
							}
							?>
                            </select>
                            </span>
							
                        </p>
						
						<p>
                        	<label>Client provides licence for OS:</label>
                            <span class="formwrapper">
                            	<input type="checkbox" name="licence_os" checked="checked" />
                            </span>
                        </p>
						
						<p>
                        	<label>Control Panel:</label>
                            <span class="field">
                            <select name="control_panel" class="required">
							<?php foreach($controlpanelDetails as $cpanel)
							{?>
                            	<option value="<?php echo $cpanel['id'];?>" <?php if($editDetails[0]['control_panel_id']==$cpanel['id'])
								{?>
									selected="selected"
									<?php
								}?>><?php echo $cpanel['name'];?></option>
								<?php 
							}?>
                            </select>
                            </span>
							
                        </p>
						
						<p>
                        	<label>Firewall:</label>
                            <span class="field">
                            <select name="firewall" class="required">
								<?php foreach($firewallDetails as $firewall)
							{?>
                            	<option value="<?php echo $firewall['id'];?>" <?php if($editDetails[0]['firewall_plan_id']==$firewall['id'])
								{?>
									selected="selected"
									<?php
								}?>><?php echo $firewall['name'];?></option>
								<?php 
							}?>
                            </select>
                            
                            </span>
							
                        </p>
						
						<p>
                        	<label>Mail Server:</label>
                            <span class="field">
                            <select name="mail_server" class="required">
								<?php foreach($mailserverDetails as $mailserver)
							{?>
                            	<option value="<?php echo $mailserver['id'];?>" <?php if($editDetails[0]['mail_server_id']==$mailserver['id'])
								{?>
									selected="selected"
									<?php
								}?>><?php echo $mailserver['name'];?></option>
								<?php 
							}?>
                            </select>
                            
                            </span>
							
                        </p>
						
						<p>
                        	<label>Anti-Virus:</label>
                            <span class="field">
                            <select name="anti_virus" class="required">
								<?php foreach($antivirusDetails as $antivirus)
							{?>
                            	<option value="<?php echo $antivirus['id'];?>" <?php if($editDetails[0]['antivirus_id']==$antivirus['id'])
								{?>
									selected="selected"
									<?php
								}?>><?php echo $antivirus['name'];?></option>
								<?php 
							}?>
                            </select>
                            
                            </span>
							
                        </p>
						
						<p>
                        	<label>Managed Service:</label>
                            <span class="formwrapper">
                            	<input type="radio" name="radiofield" value="0" <?php if($editDetails[0]['managed_services']==0)
								{?> checked="checked" <?php }?> /> No &nbsp; &nbsp;
                            	<input type="radio" name="radiofield" value="1" <?php if($editDetails[0]['managed_services']==1)
								{?> checked="checked" <?php }?>/> Yes &nbsp; &nbsp;
                            </span>
                        </p>
						<p>
                        	<label>No. of Drivers:</label>
                            <span class="field"><input type="text" name="no_of_drivers" class="longinput required digits" value="<?php echo $editDetails[0]['no_of_drivers'];?>"/></span>
							
                        </p>
						<p>
                        	<label>Miscellaneous:</label>
                            <span class="field"><textarea cols="80" rows="5" class="longinput required" name="miscellaneous"><?php echo $editDetails[0]['miscellaneous'];?></textarea></span>
							
                        </p>
						

						<p>
                        	<label>Billing Start Date:</label>
                            <span class="field"><input type="text" id="datepicker" name="billingstart" class="required" /></span>
						</p>
					
                        
                        <p>
                        	<label>Setup charge</label>
                            <span class="field"><input type="text" name="setupcharge" class="mediuminput required digits" /></span>
							<span class="field">
                            <select name="setupcurrency" class="required">
                            	<option value="USD">USD</option>
                                <option value="INR">INR</option>
                                <option value="EUR">EUR</option>                                
                            </select>
                            
                            </span>
                        </p>
						
						<p>
                        	<label>Billing cycle</label>
                            <span class="field">
                            <!-- <select name="billingcycle">
                            	<option value="">Monthly</option>
                                <option value="">Yearly</option>
                                <option value="">Biannualy</option>
                                <option value="">Etc.</option>
                            </select> -->

							<?php
								  $class = 'class="required"';
								  echo form_dropdown('billingcycle',$billingcycle,$this->input->post("billingcycle"),$class);
							?>
                            
                            </span>
                        </p>
						
						<p>
                        	<label>Recurring amount</label>
                            <span class="field"><input type="text" name="recurringamount" class="mediuminput required digits" /></span>
							<span class="field">
                            <select name="recurringamountcurrency" class="required">
                            	<option value="USD">USD</option>
                                <option value="INR">INR</option>
                                <option value="EUR">EUR</option>
							</select>
                            </span>
                        </p>
						
						<p>
                        	<label>Contract Period</label>
                            <span class="field">
                            <!-- <select name="contractperiod">
                            	<option value="">Monthly</option>
                                <option value="">Yearly</option>
                                <option value="">Biannualy</option>
                                <option value="">Etc.</option>
                            </select> -->
                            <?php
								  $class = 'class="required"';
								  echo form_dropdown('contractperiod',$contract_period,$this->input->post("contractperiod"),$class);
							?>
                            </span>
                        </p>


						<br clear="all"/><br />
                        
                        <p class="stdformbutton">
                        	<button class="submit radius2" id="submit_radius2">Submit Button</button>
                            <input type="reset" class="reset radius2" value="Reset Button" />
                        </p>
                    </form>

                            
        </div><!--contentwrapper-->
        
	</div><!-- centercontent -->