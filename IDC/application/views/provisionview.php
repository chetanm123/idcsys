<?php //echo "<pre>";print_r($provisionView);exit;?>
<style type="text/css">
	.value { font-weight:bold; padding: 0px 10px; }
	.btn { color:#ff0000; font-size:0.7em; }
</style>

<?php //echo "<pre>";print_r($requestView);exit;?>
<div class="centercontent">
    
        <div class="pageheader notab">
            <h1 class="pagetitle">Provision <?php echo $provisionView[0]['id'];?></h1>
            <span class="pagedesc">This is a sample description of a page</span>
            
        </div><!--pageheader-->
        
        <div id="contentwrapper" class="contentwrapper widgetpage">
        <p>
                        <label>Hostname</label>&nbsp;<label class="value"><?php echo $provisionView[0]['hostname'];?></label><a class="btn" href="#"></a>
                        </p>
                        
                        <p>
                        	<label>Primary IP:</label>&nbsp;<label class="value"><?php echo $provisionView[0]['primary_ip'];?></label><a class="btn" href="#"></a>
                        </p>
                        
                        <p>
                        	<label>Secondary IPs:</label><span class="field"><p class="value"><?php echo $provisionView[0]['misc_ips'];?></p></span><a class="btn" href="#"></a>
                        </p>
                        
                        <p>
                        	<label>Switch Port Speed:</label>&nbsp;<label class="value"><?php echo $provisionView[0]['Switchport'];?></label><a class="btn" href="#"></a>
                        </p>
                        
                        <p>
                        	<label>LAN Card Speed:</label>&nbsp;<label class="value"><?php echo $provisionView[0]['Lan_Card'];?></label><a class="btn" href="#"></a>
                        </p>
						
						<p>
                        	<label>Controller Software:</label>&nbsp;<label class="value"><?php echo $provisionView[0]['CS'];?></label><a class="btn" href="#"></a>
                        </p>
						
						<p>
                        	<label>Raid Plan:</label>&nbsp;<label class="value"><?php echo $provisionView[0]['RAID'];?></label><a class="btn" href="#"></a>
                        </p>
						
						<p>
                        	<label>Firewall Rules Applied:</label>&nbsp;<label class="value"><?php echo $provisionView[0]['firewall'];?></label><a class="btn" href="#"></a>
                        </p>
						
						<p>
                        	<label>OS installed:</label>&nbsp;<label class="value"><?php echo $provisionView[0]['OS'];?></label><a class="btn" href="#"></a>
						</p>
						
						<p>
                        	<label>Anti-Virus installed:</label>&nbsp;<label class="value"><?php echo $provisionView[0]['antivirus'];?></label><a class="btn" href="#"></a>
                        </p>
						
						<p>
                        	<label>Control Panel installed:</label>&nbsp;<label class="value"><?php echo $provisionView[0]['Panel'];?></label><a class="btn" href="#"></a>
                        </p>
						
						<!--<p>
                        	<label>Database installed:</label>&nbsp;<label class="value"><?php echo $provisionView[0]['RAID'];?></label><a class="btn" href="#"></a>
                        </p>-->
												
						<p>
                        	<label>Delivery Date:</label>&nbsp;<label class="value"><?php echo $provisionView[0]['delivery_date'];?></label><a class="btn" href="#"></a>
                        </p>
						
						<!--<p>
                        	<label>Bandwidth:</label>&nbsp;<label class="value"><?php echo $requestView[0]['Bandwidth'];?></label><a class="btn" href="#"></a>
                        </p>
						
						<p>
                        	<label>Operating System:</label>&nbsp;<label class="value"><?php echo $requestView[0]['OS'];?></label><a class="btn" href="#"></a>
                        </p>
						
						<p>
                        	<label>OS Licence:</label>&nbsp;<label class="value"><?php echo $requestView[0]['Company_billed'];?></label><a class="btn" href="#"></a>
                        </p>
						
						<p>
                        	<label>Control Panel:</label>&nbsp;<label class="value"><?php echo $requestView[0]['Panel'];?></label><a class="btn" href="#"></a>
                        </p>
						
						<p>
                        	<label>Firewall:</label>&nbsp;<label class="value"><?php echo $requestView[0]['firewall'];?></label><a class="btn" href="#"></a>
                        </p>
						
						<p>
                        	<label>Mail Server:</label>&nbsp;<label class="value"><?php echo $requestView[0]['Mailserver'];?></label><a class="btn" href="#"></a>
                        </p>
						
						<p>
                        	<label>Anti-Virus:</label>&nbsp;<label class="value"><?php echo $requestView[0]['antivirus'];?></label><a class="btn" href="#"></a>
                        </p>
						
						<p>
                        	<label>Managed Service:</label>&nbsp;<label class="value"><?php if($requestView[0]['managed_services']==1)
							{
								echo "Yes";
							}
							else
							{
								echo "No";
							}
								?></label><a class="btn" href="#"></a>
                        </p>
						<p>
                        	<label>No. of Drivers:</label>&nbsp;<label class="value"><?php echo $requestView[0]['no_of_drivers'];?></label><a class="btn" href="#"></a>
                        </p>
						<p>
                        	<label>Miscellaneous:</label>&nbsp;<label class="value"><?php echo $requestView[0]['miscellaneous'];?></label><a class="btn" href="#"></a>
                        </p>-->
                    <!--<p><label>Requested by:</label>&nbsp;<label class="value">Requester</label></p>-->
                            
        </div><!--contentwrapper-->
        
	</div><!-- centercontent -->

	</div><!--bodywrapper-->

</body>

</html>