<script type="text/javascript">

		window.onload=function(){
			jQuery('.activeinactiveflag').live('click',function(){
						
						var id = jQuery(this).attr('id');					
						
						var base_url = "<?php echo base_url(); ?>";
						jQuery.ajax({
							url: base_url+"admin/bandwidth/activeinactiveflag/"+id,   
							type: 'POST',	                       
							success: function(result) 
							{
									var activeinactivetext = jQuery('#'+id).text();
									if(activeinactivetext == 'Inactive')
									{
										jQuery('#'+id).text('Active');
									}
									if(activeinactivetext == 'Active')
									{
										jQuery('#'+id).text('Inactive');
									}									
							}
						});
					});

					jQuery('.listingplan').live('hover',function(){
						jQuery(this).css("color","#FB9337");
					});

					jQuery('.listingplan').live('mouseout',function(){
						jQuery(this).css("color","#485B79");
					});


		};
		
	</script>
<div class="centercontent">
    
        <div class="pageheader">
            <h1 class="pagetitle">Sales Plans ><a class="pagetitle listingplan" href="<?php echo base_url();?>admin/bandwidth">Bandwidth</a></h1>
            <span class="pagedesc">This is a sample description of a page</span>
			
            <ul class="hornav">
                <li class="current"><a href="#updates">Bandwidth Plans</a></li>
                <li><a href="#activities">New Plan</a></li>
            </ul>
        </div><!--pageheader-->
        
        <div id="contentwrapper" class="contentwrapper" >
			
        	<div id="updates" class="subcontent">
                    <table cellpadding="0" cellspacing="0" border="0" class="stdtable stdtablecb overviewtable2">
                            <colgroup>
                                <col class="con0" style="width: 4%" />
                                <col class="con1" />
                                <col class="con0" />
                                <col class="con1" />
                                <col class="con0" />
                                <col class="con1" />
                            </colgroup>
                            <thead>
                                <tr>
                                    <th class="head1">No.</th>
                                    <th class="head0">Plan</th>
                                    <th class="head1">Change Status</th>
									<th class="head1"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- <tr>
                                    <td>1</td>
                                    <td>1 TB/Month Standard - 10 Mbps Port</td>
                                    <td align="center"><input type="checkbox" /></td>
									<td align="center"><a href="#">Edit</a></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>1 TB/Month Standard - 100 Mbps Port</td>
                                    <td align="center"><input type="checkbox" /></td>
									<td align="center"><a href="#">Edit</a></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>10 Mbps Dedicated/Guaranteed</td>
                                    <td align="center"><input type="checkbox" /></td>
									<td align="center"><a href="#">Edit</a></td>
                                </tr> -->

								<?php
								if(!empty($list_bandwidth))
								{
									
									$i=$page_no;
									 foreach($list_bandwidth as $bandwidth)
									{	
										 
								?>
								
									<tr>
										<td><?php echo $i+1;?></td>
										<td><?php echo $bandwidth['name'];?></td>
										<?php
										if($bandwidth['disabled'] == '1')
										{
										?>
										<td align="left"><span id="<?php echo $bandwidth['id']?>" style="cursor:pointer" class="activeinactiveflag">Inactive</span></td>
										<?php
										}
										elseif($bandwidth['disabled'] == '0')
										{
										?>
										<td align="left"><span id="<?php echo $bandwidth['id']?>" style="cursor:pointer" class="activeinactiveflag">Active</span></td>
										<?php
										}
										?>
										<td align="left"><a href="<?php echo base_url();?>admin/bandwidth/edit_bandwidth/<?php echo $bandwidth['id'];?>">Edit</a></td>
									</tr>
										<?php
										$i++;
										}
									}else{
									?>
									<tr>
									   <td colspan="4" align="center" valign="middle">No Bandwidth Plan Available</td>
									</tr>
									<?php
									}
									?>
                            </tbody>
                        </table>
						<?php //echo "<pre>"; print_r($links);exit;?>
						<div class="pagination fr"><?php echo $links; ?></div>
                    
            </div><!-- #updates -->
            
            <div id="activities" class="subcontent" style="display:none;">				
				<form id="form1" class="stdform stdform2" method="post" action="<?php echo base_url()?>admin/bandwidth/create_bandwidth">
						<p>
							<label>Plan Name</label>
							<span class="field"><input type="text" name="name" id="firstname2" class="longinput required" /></span>
						</p>
						<p class="stdformbutton">
							<button class="submit radius2">Submit Button</button>
							<input type="reset" class="reset radius2" value="Reset Button" />
						</p>
				 </form>
            </div><!-- #activities -->
        
        </div><!--contentwrapper-->
        
        <br clear="all" />
        
	</div><!-- centercontent -->


	