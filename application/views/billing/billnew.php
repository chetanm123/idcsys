 <script>
$(function() {
$( "#datepicker" ).datepicker();
});
</script>
<div class="centercontent">
		<?php
		if(!empty($allDetails))
		{
		?>
        <div class="pageheader">
            <h1 class="pagetitle">Billing - Request #<?php echo $allDetails[0]['id'];?></h1>
            <p style="margin-left:10px;">Processor: <?php echo $allDetails[0]['Processor'];?><br/>RAID: <?php echo $allDetails[0]['RAID'];?><br/>Mailserver: <?php echo $allDetails[0]['Mailserver'];?><br/>Panel:<?php echo $allDetails[0]['Panel'];?><br/>OS: <?php echo $allDetails[0]['OS'];?><br/>Managed:<?php if($allDetails[0]['managed_services']==0)
							{
								echo "No";
							}
							else
								echo "Yes";?>
			</p>
            <ul class="hornav">
                <li class="current"><a href="#default">Billing Info</a></li>
            </ul>
        </div><!--pageheader-->
		<?php
		}
		?>
        
        <div id="contentwrapper" class="contentwrapper">
        
        	<div id="default" class="subcontent">
                    <!-- START OF DEFAULT WIZARD -->
                    <form id="form1" class="stdform" action="#" method="post">
						<p>
                        	<label>Billing Start Date:</label>
                            <span class="field"><input type="text" id="datepicker" readonly="true" name="billingstart" class="required" value="<?php echo $allDetails[0]['billing_start']?>"/></span>
						</p>
					
                        
                        <p>
                        	<label>Setup charge</label>
                            <span class="field"><input type="text" name="setupcharge" readonly="true" class="mediuminput required digits" value="<?php echo $allDetails[0]['setup_charge']?>"/></span>
							<span class="field">
                            <select name="setupcurrency" readonly value="<?php echo $allDetails[0]['setup_charge_currency']?>">
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
								  $class = 'readonly';
								  echo form_dropdown('billingcycle',$billingcycle,$allDetails[0]['billing_cycle_id'],$class);
							?>
                            
                            </span>
                        </p>
						
						<p>
                        	<label>Recurring amount</label>
                            <span class="field"><input type="text" name="recurringamount" readonly="true" class="mediuminput required digits" value="<?php echo $allDetails[0]['recurring_amount']?>"/></span>
							<span class="field">
                            <select name="recurringamountcurrency" readonly="true" value="<?php echo $allDetails[0]['recurring_amount_currency']?>">
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
								  $class = 'readonly="true"';
								  echo form_dropdown('contractperiod',$contract_period,$allDetails[0]['contract_period_id'],$class);
							?>
                            </span>
                        </p>
						
						<!-- <p>
                        	<label>Customer ID</label>
                            <span class="field"><input type="text" name="customerid" class="mediuminput" /></span>
					
                        </p> -->
						
						<!-- <p>
                        	<label>Packages</label>
                            <span class="field">
                            <!-- <select name="packages">
                            	<option value="">Package 1</option>
                                <option value="">PAckage 2</option>
                                <option value="">Etc.</option>
                            </select> -->

							<?php
								  //$class = 'class="required"';
								  //echo form_dropdown('packages',$packages,$this->input->post("packages"),$class);
							?>
                            
                            <!--</span>
                        </p> -->
						<p>

						<label>Packages</label>
                            <span class="field"><input type="text" id="packages" style="width:60%" name="packages" class="required" value="<?php echo $this->input->post("packages")?>"/></span>
						</p>
						<!-- 
						<p>
                        	<label>Billing rep</label>
                            <span class="field">
                            <select name="billingrep">
                            	<option value="">Billing rep 1</option>
                                <option value="">Billing rep 2</option>
                                <option value="">Etc.</option>
                            </select>

							<?php
								  $class = 'class="required"';
								  echo form_dropdown('billingrep',$billing_rep,$this->input->post("billingrep"),$class);
							?>
                            
                            </span>
                        </p> -->
                        
                        <!-- <p>
                        	<label>Miscellaneous:</label>
                            <span class="field"><textarea cols="80" rows="5" class="longinput" name="miscellaneous"></textarea></span>
                        </p> -->
						
						<br clear="all" /><br />
                        
                        <p class="stdformbutton">
                        	<button class="submit radius2">Submit Button</button>
                            <input type="reset" class="reset radius2" value="Reset Button" />
                        </p>
                    </form>
                    <!-- END OF DEFAULT WIZARD -->
                    
                    <br /><br />
                    
            </div><!-- #default -->
            
            
        </div><!--contentwrapper-->
        
	</div><!-- centercontent -->