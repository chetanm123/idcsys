<script type="text/javascript">

		window.onload=function(){

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
            <h1 class="pagetitle">Inventory ><a class="pagetitle listingplan" href="<?php echo base_url();?>admin/item">Items</a></h1>
            <span class="pagedesc">This is a sample description of a page</span>
            
            <ul class="hornav">
                <li class="current"><a href="#updates">Items</a></li>
                <li><a href="#activities">New Item</a></li>
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
                                    <th class="head0">Item</th>
									<th class="head0">Type</th>                                    
									<th class="head1"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- <tr>
                                    <td>1</td>
                                    <td>1TB/disk 7200 RPM</td>
									<td>Hard Disk</td>
                                    <td align="center"><a href="#">12312312</a></td>
									<td align="center"><a href="#">Edit</a></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Intel Xeon Sandy Bridge-EN (32 nm)</td>
									<td>Processor</td>
                                    <td align="center"><a href="#">Free</a></td>
									<td align="center"><a href="#">Edit</a></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>PV332G213C1QK 32GB Memory</td>
									<td>Memory</td>
                                    <td align="center"><a href="#">3313312</a></td>
									<td align="center"><a href="#">Edit</a></td>
                                </tr> -->

								<?php


									
								 $i=1;
									 foreach($list_item as $item)
									{	
										 
								?>
								
									<tr>
										<td><?php echo $i;?></td>
										<td><?php echo $item['details'];?></td>
										<td><?php echo $item['name'];?></td>										
										<td align="center"><a href="<?php echo base_url();?>admin/item/edit_item/<?php echo $item['id'];?>">Edit</a></td>
									</tr>
									<?php
									$i++;
									}
									?>
                            </tbody>
                        </table>
                    
                    
            </div><!-- #updates -->
            
            <div id="activities" class="subcontent" style="display:none;">
            	<form id="form1" class="stdform stdform2" method="post" action="<?php echo base_url()?>admin/item/create_item">
                    	<p>
                        	<label>Item</label>
                            <span class="field"><input type="text" name="name" id="firstname2" class="longinput required" /></span>
                        </p>
						<p>
                        	<label>Select</label>
                            <span class="field">
                            <!-- <select name="itemtype" id="selection">
                            	<option value="">Processor</option>
                                <option value="1">Hard Disk</option>
                                <option value="2">Memory</option>
                                <option value="3">Board</option>
                                <option value="4">Etc.</option>
                            </select> -->

							<?php
								  $class = 'id="selection" class="required"';
								  echo form_dropdown('itemtype',$list_itemtype,$this->input->post("itemtype"),$class);
							?>
                            </span>
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