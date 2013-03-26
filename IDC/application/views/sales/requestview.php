<style type="text/css">
	.value { font-weight:bold; padding: 0px 10px; }
	.btn { color:#ff0000; font-size:0.7em; }
</style>

<?php //echo "<pre>";print_r($requestView);exit;?>
<div class="centercontent">
    
        <div class="pageheader notab">
            <h1 class="pagetitle">Request #<?php echo $requestView[0]['id'];?></h1>
            <span class="pagedesc">This is a sample description of a page</span>
            
        </div><!--pageheader-->
        
        <div id="contentwrapper" class="contentwrapper widgetpage">
        <p>
                        <label>Company Billed in:</label>&nbsp;<label class="value"><?php echo $requestView[0]['Company_billed'];?></label><a class="btn" href="#"></a>
                        </p>
                        
                        <p>
                        	<label>Name of contact on the client side:</label>&nbsp;<label class="value"><?php echo $requestView[0]['contact_name'];?></label><a class="btn" href="#"></a>
                        </p>
                        
                        <p>
                        	<label>Client's Address:</label><span class="field"><p class="value"><?php echo $requestView[0]['address'];?></p></span><a class="btn" href="#"></a>
                        </p>
                        
                        <p>
                        	<label>Phone</label>&nbsp;<label class="value"><?php echo $requestView[0]['contact_no'];?></label><a class="btn" href="#"></a>
                        </p>
                        
                        <p>
                        	<label>Mobile</label>&nbsp;<label class="value"><?php echo $requestView[0]['mobile_no'];?></label><a class="btn" href="#"></a>
                        </p>
						
						<p>
                        	<label>Company Name:</label>&nbsp;<label class="value"><?php echo $requestView[0]['company_name'];?></label><a class="btn" href="#"></a>
                        </p>
						
						<p>
                        	<label>Email:</label>&nbsp;<label class="value"><?php echo $requestView[0]['email'];?></label><a class="btn" href="#"></a>
                        </p>
						
						<p>
                        	<label>Fax:</label>&nbsp;<label class="value"><?php echo $requestView[0]['fax_no'];?></label><a class="btn" href="#"></a>
                        </p>
						
						<p>
                        	<label>Delivery Date:</label>&nbsp;<label class="value"><?php echo $requestView[0]['delivery_date'];?></label><a class="btn" href="#"></a>
						</p>
						
						<p>
                        	<label>Location requested:</label>&nbsp;<label class="value"><?php echo $requestView[0]['location'];?></label><a class="btn" href="#"></a>
                        </p>
						
						<p>
                        	<label>Processor:</label>&nbsp;<label class="value"><?php echo $requestView[0]['Processor'];?></label><a class="btn" href="#"></a>
                        </p>

						<table border="1" style="border-spacing: 10px;">
						<tr>
						<th>DISK</th>
						<th>Quantity</th>
						<th>Size</th>
						</tr>
						<?php
						
						foreach($discDetails as $listDisk)
						{
						?>
						<tr>
						<td align="center">
                        	<?php echo $listDisk['disk_name'];?>
						</td>
						<td align="center">
                        	<?php echo $listDisk['quantity'];?>
						</td>

						<td align="center">
                        	<?php echo $listDisk['size'];?>
						</td>
						</tr>
						
						<?php
						}
						?>
						</table>
						
						<p>
                        	<label>RAID Level:</label>&nbsp;<label class="value"><?php echo $requestView[0]['RAID'];?></label><a class="btn" href="#"></a>
                        </p>
												
						<p>
                        	<label>No of IP addresses:</label>&nbsp;<label class="value"><?php echo $requestView[0]['no_of_ips'];?></label><a class="btn" href="#"></a>
                        </p>
						
						<p>
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
                        </p>
                    <!--<p><label>Requested by:</label>&nbsp;<label class="value">Requester</label></p>-->
                            
        </div><!--contentwrapper-->
        
	</div><!-- centercontent -->

	</div><!--bodywrapper-->

</body>

</html>