
<style type="text/css">
	.value { font-weight:bold; padding: 0px 10px; }
	.editbtn { color:#ff0000; font-size:0.7em; }
</style>

<?php //echo "<pre>";print_r($provisionView);exit;?>
<div class="centercontent">
    
        <div class="pageheader notab">
            <h1 class="pagetitle">Provision #<?php echo $provisionView[0]['id'];?> <!-- - <a class="editbtn" href="provisioncancel.html">Cancel</a>--></h1>
            <span class="pagedesc">This is a sample description of a page</span>
            
        </div><!--pageheader-->
        
        <div id="contentwrapper" class="contentwrapper widgetpage">
						
						

						<p>
                        <label>Hostname:</label>&nbsp;<label class="value"><?php echo $provisionView[0]['hostname'];?></label><a class="btn" href="#"></a>
                        </p>
                        
                        <p>
                        <label>Primary IP:</label>&nbsp;<label class="value"><?php echo $provisionView[0]['primary_ip'];?></label><a class="btn" href="#"></a>
                        </p>
                        
                        <p>
                        <label>Secondary IPs:</label><span class="value"><?php echo $provisionView[0]['misc_ips'];?></span><a class="btn" href="#"></a>
                        </p>
                        
                        <p>
                        <label>Switch Port Speed:</label>&nbsp;<label class="value"><?php echo $provisionView[0]['Switchport'];?></label><a class="btn" href="#"></a>
                        </p>
                        
						<p>
                        <label>Controller Software:</label>&nbsp;<label class="value"><?php echo $provisionView[0]['CS'];?></label><a class="btn" href="#"></a>
                        </p>

                        <p>
                        <label>LAN Card Speed:</label>&nbsp;<label class="value"><?php echo $provisionView[0]['Lan_Card'];?></label><a class="btn" href="#"></a>
                        </p>
						
						
						<p>
                        <label>RAID Level and Details:</label>&nbsp;<label class="value"><?php echo $provisionView[0]['RAID'];?></label><a class="btn" href="#"></a>
                        </p>
						
						

						<p>
                        <label>Operating System:</label>&nbsp;<label class="value"><?php echo $provisionView[0]['OS'];?></label><a class="btn" href="#"></a>
						</p>

						<p>
                        <label>Firewall Details:</label>&nbsp;<label class="value"><?php echo $provisionView[0]['firewall'];?></label><a class="btn" href="#"></a>
                        </p>

						
						
						<p>
                        <label>Anti-Virus:</label>&nbsp;<label class="value"><?php echo $provisionView[0]['antivirus'];?></label><a class="btn" href="#"></a>
                        </p>
						
						<p>
                        	<label>Control Panel:</label>&nbsp;<label class="value"><?php echo $provisionView[0]['Panel'];?></label><a class="btn" href="#"></a>
                        </p>

						<p>
                        	<label>Database Installed:</label>&nbsp;<label class="value"><?php echo $provisionView[0]['DB'];?></label><a class="btn" href="#"></a>
                        </p>

						<p>
                        	<label>Remote Access Enabled:</label>&nbsp;<label class="value"><?php if($provisionView[0]['remote_access']==1)
							{
								echo "Yes";
							}
							else
							{
								echo "No";
							}
							?>
							</label><a class="btn" href="#"></a>
                        </p>

						<p>
                        	<label>Monitoring Added:</label>&nbsp;<label class="value"><?php if($provisionView[0]['monitor_added']==1)
							{
								echo "Yes";
							}
							else
							{
								echo "No";
							}
							?>
							</label><a class="btn" href="#"></a>
                        </p>

						<p>
                        	<label>PRTG Login Created:</label>&nbsp;<label class="value"><?php if($provisionView[0]['PRTG_created']==1)
							{
								echo "Yes";
							}
							else
							{
								echo "No";
							}
							?></label>
							<a class="btn" href="#"></a>
                        </p>

						<p>
                        	<label>PRTG Login:</label>&nbsp;<label class="value"><?php echo $provisionView[0]['PRTG_login'];?></label><a class="btn" href="#"></a>
                        </p>

						<p>
                        	<label>PRTG Url</label>&nbsp;<label class="value"><?php echo $provisionView[0]['PRTG_url'];?></label><a class="btn" href="#"></a>
                        </p>

						<p>
                        	<label>Server Updates:</label>&nbsp;<label class="value"><?php if($provisionView[0]['server_updates']==1)
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
                        	<label>Server Hardening:</label>&nbsp;<label class="value"><?php if($provisionView[0]['server_hardening']==1)
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
                        	<label>Client Details in FC:</label>&nbsp;<label class="value"><?php if($provisionView[0]['client_details_FC']==1)
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
                        	<label>FC Login:</label>&nbsp;<label class="value"><?php echo $provisionView[0]['FC_login'];?></label><a class="btn" href="#"></a>
                        </p>

						<p>
                        	<label>FC Url:</label>&nbsp;<label class="value"><?php echo $provisionView[0]['FC_url'];?></label><a class="btn" href="#"></a>
                        </p>

						<p>
                        	<label>Server Details Updates in FC:</label>&nbsp;<label class="value"><?php if($provisionView[0]['server_details_FC']==1)
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
                        	<label>Server Username:</label>&nbsp;<label class="value"><?php echo $provisionView[0]['server_username'];?></label><a class="btn" href="#"></a>
                        </p>

						<p>
                        	<label>Other Login Credentials:</label>&nbsp;<label class="value"><?php echo $provisionView[0]['login_credentials'];?></label><a class="btn" href="#"></a>
                        </p>

						<p>
                        	<label>Delivery Date:</label>&nbsp;<label class="value"><?php echo $provisionView[0]['delivery_date'];?></label><a class="btn" href="#"></a>
                        </p>
						
						<p>
                        	<label>Miscellaneous:</label>&nbsp;<label class="value"><?php echo $provisionView[0]['miscellaneous'];?></label><a class="btn" href="#"></a>
                        </p>

						<p>
                        	<label>Provisioned by:</label>&nbsp;<label class="value">Provisioner</label>
                        </p>
						
						
                    <!--<p><label>Requested by:</label>&nbsp;<label class="value">Requester</label></p>-->
                            
        </div><!--contentwrapper-->
        
	</div><!-- centercontent -->

	</div><!--bodywrapper-->

</body>

</html>