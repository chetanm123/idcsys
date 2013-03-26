 <style>
	.testerror{
		color:red;
		font-size:20px;
	}
 </style>
 
 <script>
$(function() 
{
$( "#datepicker" ).datepicker();

$('#datepickerbill').datepicker();

	$("#disk").change(function()
	{
		var val=$(this).val();
		//$("<label>Size</label> "+size).appendTo("#elementholder");
		$('#elementholder').append('<span>Qty :</span><input type="hidden" name="disk_id[]" value="'+val+'" /> <input type="text" name="qty[]"  id="qty" style="width:10%"/><span>Size :</span><input type="text" name="size[]" id="size" style="width:10%" /><span>Raid :</span><select name="raid1[]" id="raid1" >'+$("#raid").html()+'</select><br><br>');
	});
	
	

});
</script>

<?php //echo validation_errors(); ?>
<div class="centercontent">
    <div class="pageheader notab">
            <h1 class="pagetitle">New Request</h1>
            <span class="pagedesc">This is a sample description of a page</span>
            
        </div><!--pageheader-->
        
        <div id="contentwrapper" class="contentwrapper widgetpage">
        
         <form class="stdform" name="salesForm" id="form1" action="<?php echo base_url();?>sales/sales/create_sales" method="post" >
						<p>
                        	<label>Company Billed in:</label>
                            <span class="field">
							<select name="company_billed" id="company_billed" class="required">
							<option value="">Choose One</option>
							<?php foreach($companyDetails as $list)
							{?>
                            	<option value="<?php echo $list['id'];?>"><?php echo $list['name'];?></option>
							<?php 
							}?>
                            </select></span>
							
                            <small class="desc">Company which the client is billed under.</small>
							
                        </p>
                        
                        <p>
                        	<label>Name of contact on the client side:</label>
                            <span class="field"><input type="text" name="contact_name" class="mediuminput required alpha" />
							</span>
							
							<small class="desc">Person liaisoning with web werks.</small>
                        </p>
                        
                        <p>
                        	<label>Client's Address:</label>
                            <span class="field"><textarea cols="80" rows="5" class="longinput required" name="address" id="address"></textarea></span>
							
                        </p>
                        
                        <p>
                        	<label>Phone</label>
                            <span class="field"><input type="text" name="contact_no" class="mediuminput required digits" /></span>
							<small class="desc">Landline no.</small>
							
                        </p>
                        
                        <p>
                        	<label>Mobile</label>
                            <span class="field"><input type="text" name="mobile_no" class="mediuminput required digits" /></span>
							<small class="desc">Mobile phone no.</small>
							
                        </p>
						
						<p>
                        	<label>Company Name:</label>
                            <span class="field"><input type="text" name="company_nm" class="mediuminput required " /></span>
							
                        </p>
						
						<p>
                        	<label>Email:</label>
                            <span class="field"><input type="text" name="email" class="mediuminput required email" /></span>
							
                        </p>
						
						<p>
                        	<label>Fax:</label>
                            <span class="field"><input type="text" name="fax" class="mediuminput required digits" /></span>
						</p>
						
						<p>
                        	<label>Delivery Date:</label>
                            <span class="field"><input type="text" id="datepicker" name="delivery_date" class="required"/></span>
							
						</p>
						
						<p>
                        	<label>Location requested:</label>
                            <span class="field">
                            <select name="location" class="required">
							<option value="">Choose One</option>
                            	<?php foreach($locationDetails as $location)
							{?>
                            	<option value="<?php echo $location['id'];?>"><?php echo $location['name'];?></option>
								<?php 
							}?>
                            </select>
                            
                            </span>
							
                        </p>
						
						<p>
                        	<label>Processor:</label>
                            <span class="field">
                            <select name="processor" class="required">
							<option value="">Choose One</option>
								<?php foreach($processorDetails as $processor)
							{?>
                            	<option value="<?php echo $processor['id'];?>"><?php echo $processor['name'];?></option>
								<?php 
							}?>
                            </select>
                            
                            </span>
							
                        </p>
						
						<p>
                        	<label>Disk:</label>
                            <span class="field">
                            <select name="disk" class="required" id='disk'>
							<option value="">Choose One</option>
							<?php foreach($diskDetails as $disk)
							{?>
                            	<option value="<?php echo $disk['id'];?>"><?php echo $disk['name'];?></option>
								<?php 
							}?>
                            </select>
                            </span>
							
                        </p>
						<div id='elementholder'></div>
							
						<p style="display:none;">
                        	<label>RAID Level:</label>
                            <span class="field">
                            <select name="raid" id="raid" class="required">
							<option value="">Choose One</option>
							<?php foreach($raidDetails as $raid)
							{?>
                            	<option value="<?php echo $raid['id'];?>" ><?php echo $raid['name'];?></option>
								<?php 
							}?>
                            </select>
                            </span>
							
                        </p>
						
						<p>
                        	<label>Memory:</label>
                            <span class="field"><input type="text" name="memory" id="memory" class="mediuminput required digits" style="width:10%"/>GB</span>
						</p>
						
						<p>
                        	<label>No of IP addresses:</label>
                            <span class="field"><input type="text" name="no_of_ip" class="mediuminput required digits" /></span>
							
                        </p>
						
						<p>
                        	<label>Bandwidth:</label>
                            <span class="field">
                            <select name="bandwidth" class="required">
							<option value="">Choose One</option>
								<?php foreach($bandwidthDetails as $bandwidth)
							{?>
                            	<option value="<?php echo $bandwidth['id'];?>"><?php echo $bandwidth['name'];?></option>
								<?php 
							}?>
                            </select>
                            
                            </span>
							
                        </p>
						
						<p>
                        	<label>Operating System:</label>
                            <span class="field">
                            <select name="op" class="required">
							<option value="">Choose One</option>
								<?php foreach($osDetails as $os)
							{?>
                            	<option value="<?php echo $os['id'];?>"><?php echo $os['name'];?></option>
								<?php 
							}?>
                            </select>
                            
                            </span>
							
                        </p>
						
						
						
						<p>
                        	<label>Client provides licence for OS:</label>
                            <span class="formwrapper">
                            	<input type="checkbox" name="licence_os" checked="checked" class="required"/>
                            </span>
                        </p>
						
						<p>
                        	<label>Control Panel:</label>
                            <span class="field">
                            <select name="control_panel" class="required">
							<option value="">Choose One</option>
							<?php foreach($controlpanelDetails as $cpanel)
							{?>
                            	<option value="<?php echo $cpanel['id'];?>"><?php echo $cpanel['name'];?></option>
								<?php 
							}?>
                            </select>
                            </span>
							
                        </p>
						
						<p>
                        	<label>Firewall:</label>
                            <span class="field">
                            <select name="firewall" class="required">
							<option value="">Choose One</option>
								<?php foreach($firewallDetails as $firewall)
							{?>
                            	<option value="<?php echo $firewall['id'];?>"><?php echo $firewall['name'];?></option>
								<?php 
							}?>
                            </select>
                            
                            </span>
							
                        </p>
						
						<p>
                        	<label>Mail Server:</label>
                            <span class="field">
                            <select name="mail_server" class="required">
							<option value="">Choose One</option>
								<?php foreach($mailserverDetails as $mailserver)
							{?>
                            	<option value="<?php echo $mailserver['id'];?>"><?php echo $mailserver['name'];?></option>
								<?php 
							}?>
                            </select>
                            
                            </span>
							
                        </p>
						
						<p>
                        	<label>Anti-Virus:</label>
                            <span class="field">
                            <select name="anti_virus" class="required">
							<option value="">Choose One</option>
								<?php foreach($antivirusDetails as $antivirus)
							{?>
                            	<option value="<?php echo $antivirus['id'];?>"><?php echo $antivirus['name'];?></option>
								<?php 
							}?>
                            </select>
                            
                            </span>
							
                        </p>
						
						<p>
                        	<label>Managed Service:</label>
                            <span class="formwrapper">
                            	<input type="radio" name="radiofield" value="0" /> No &nbsp; &nbsp;
                            	<input type="radio" name="radiofield"  value="1" /> Yes &nbsp; &nbsp;
                            </span>

                        </p>
						
						
						<p>
                        	<label>Miscellaneous:</label>
                            <span class="field"><textarea cols="80" rows="5" class="longinput required" name="miscellaneous"></textarea></span>
							
						</p>


						<p>
                        	<label>Billing Start Date:</label>
                            <span class="field"><input type="text" id="datepickerbill" name="billingstart" class="required" /></span>
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
                            <!--<input type="reset" class="reset radius2" value="Reset Button" />-->
                        </p>
                    </form>

                            
        </div><!--contentwrapper-->
        
	</div><!-- centercontent -->