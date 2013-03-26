<style type="text/css">

.value {
font-weight: bold;
padding: 0px 10px;
}

</style>
<div class="centercontent">
    
        <div class="pageheader notab">
            <h1 class="pagetitle">Bill #<?php echo $billingrequestview[0]['id']?></h1>
            <span class="pagedesc">Related: <a href="#">S#<?php echo $billingrequestview[0]['request_id']?></a> <a href="#">P#<?php echo $billingrequestview[0]['provisionid']?></a></span>
            
        </div><!--pageheader-->
        
        <div id="contentwrapper" class="contentwrapper widgetpage">
        
                    
						<p>
                        	<label>Request:</label>&nbsp;<label class="value">#<?php echo $billingrequestview[0]['request_id']?></label>
                        </p>
						
						<p>
                        	<label>Provision:</label>&nbsp;<label class="value">#<?php echo $billingrequestview[0]['provisionid']?></label>
                        </p>
						
						<p>
                        	<label>Start Date:</label>&nbsp;<label class="value"><?php echo $billingrequestview[0]['billing_start']?></label>
                        </p>
						
						<p>
                        	<label>Setup Charge:</label>&nbsp;<label class="value"><?php echo $billingrequestview[0]['setup_charge'].' '.$billingrequestview[0]['setup_charge_currency']?></label><!-- <a class="editbtn" href="#">Edit</a> -->
                        </p>
						
						<p>
                        	<label>Billing cycle:</label>&nbsp;<label class="value"><?php echo $billingrequestview[0]['billingcyclename']?></label><!-- <a class="editbtn" href="#">Edit</a> -->
                        </p>
						
						<p>
                        	<label>Recurring Amount:</label>&nbsp;<label class="value"><?php echo $billingrequestview[0]['recurring_amount'].' '.$billingrequestview[0]['recurring_amount_currency']?></label><!-- <a class="editbtn" href="#">Edit</a> -->
                        </p>
						
						
						<p>
                        	<label>Contract Period:</label>&nbsp;<label class="value"><?php echo $billingrequestview[0]['contractperiodname']?></label><!-- <a class="editbtn" href="#">Edit</a> -->
                        </p>
						
						<!-- <p>
                        	<label>Customer ID:</label>&nbsp;<label class="value">customer4789</label><a class="editbtn" href="#">Edit</a>
                        </p> -->
						
						<p>
                        	<label>Packages:</label>&nbsp;<label class="value"><?php echo $billingrequestview[0]['packagename']?></label><!-- <a class="editbtn" href="#">Edit</a> -->
                        </p>
						
						<p>
                        	<label>Billing rep:</label>&nbsp;<label class="value"><?php echo $billingrequestview[0]['billingrepname']?></label><!-- <a class="editbtn" href="#">Edit</a> -->
                        </p>
						
						<!-- <p>
                        	<label>Cancellation Date:</label>&nbsp;<label class="value">2012-05-03</label>
                        </p> -->
						
						<!-- <p>
                        	<label>Suspension Date:</label>&nbsp;<label class="value">2012-05-03</label>
                        </p> -->
						
						<p>
                        	<label>Billed by:</label>&nbsp;<label class="value"><?php echo $this->session->userdata('username');?></label>
                        </p>
						
                            
        </div><!--contentwrapper-->
        
	</div><!-- centercontent -->