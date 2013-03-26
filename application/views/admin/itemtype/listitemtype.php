<script type="text/javascript">

		window.onload=function(){
			jQuery('.activeinactiveflag').live('click',function(){
						
						var id = jQuery(this).attr('id');					
						
						var base_url = "<?php echo base_url(); ?>";
						jQuery.ajax({
							url: base_url+"admin/itemtype/activeinactiveflag/"+id,   
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
            <h1 class="pagetitle">Inventory ><a class="pagetitle listingplan" href="<?php echo base_url();?>admin/itemtype">Item Types</a></h1>
           
            <ul class="hornav">
                <li class="current"><a href="#updates">Item Types</a></li>
                <li><a href="#activities">New Item Type</a></li>
            </ul>
        </div><!--pageheader-->
        
        <div id="contentwrapper" class="contentwrapper">
        
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
                                    <th class="head0">Item Types</th>                                    
									<th class="head1"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- <tr>
                                    <td>1</td>
                                    <td>Processor</td>
                                    <td align="center"><input type="checkbox" /></td>
									<td align="center"><a href="#">Edit</a></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Hard Disk</td>
                                    <td align="center"><input type="checkbox" /></td>
									<td align="center"><a href="#">Edit</a></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Memory</td>
                                    <td align="center"><input type="checkbox" /></td>
									<td align="center"><a href="#">Edit</a></td>
                                </tr> -->

								<?php


									
								 $i=1;
									 foreach($list_itemtype as $itemtype)
									{	
										 
								?>
								
									<tr>
										<td><?php echo $i;?></td>
										<td><?php echo $itemtype['name'];?></td>										
										<td align="center"><a href="<?php echo base_url();?>admin/itemtype/edit_itemtype/<?php echo $itemtype['id'];?>">Edit</a></td>
									</tr>
									<?php
									$i++;
									}
									?>
                            </tbody>
                        </table>
                    
                    
            </div><!-- #updates -->
            
            <div id="activities" class="subcontent" style="display:none;">
            	<form id="form1" class="stdform stdform2" method="post" action="<?php echo base_url()?>admin/itemtype/create_itemtype">
                    	<p>
                        	<label>Item Type</label>
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