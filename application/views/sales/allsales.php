<?php //echo "<pre>";print_r($allDetails);exit;?>
<div class="centercontent tables">
    
        <div class="pageheader notab">
            <h1 class="pagetitle">All Requests</h1>
            <span class="pagedesc">This is a sample description of a page</span>
            
        </div><!--pageheader-->
        
        <div id="contentwrapper" class="contentwrapper">
                        
                <!--<div class="contenttitle2">
                	<h3>Dynamic Table</h3>
                </div><!--contenttitle-->
				
                <table cellpadding="0" cellspacing="0" border="0" class="stdtable" id="dyntable">
                    <colgroup>
                        <col class="con0" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" />
						<col class="con0" />
						<col class="con1" />
                    </colgroup>
                    <thead>
                        <tr>
                            <th class="head0">Request No.</th>
							<th class="head1">Details</th>
                            <th class="head0">Created By</th>
                            <th class="head1">Date</th>
							<!-- <th class="head1"></th> -->
							<th class="head0">Related</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th class="head0">Request No.</th>
							<th class="head1">Details</th>
                            <th class="head0">Created By</th>
                            <th class="head1">Date</th>
							<!-- <th class="head1"></th> -->
							<th class="head0">Related</th>
                        </tr>
                    </tfoot>
                    <tbody>
						<?php foreach($allDetails as $list)
						{?>
                        <tr class="gradeX">
						<td><a href="<?php echo base_url();?>index.php/sales/sales/requestview/<?php echo $list['id'];?>"></a><?php echo $list['id'];?></td>
							<td>Processor: <?php echo $list['Processor'];?><br/>
							Memory: <?php echo $list['memory_size'];?><br/>
							RAID: <?php echo $list['RAID'];?><br/>
							Mailserver: <?php echo $list['Mailserver'];?><br/>
							Panel:<?php echo $list['Panel'];?><br/>
							OS: <?php echo $list['OS'];?><br/>
							Managed:<?php if($list['managed_services']==0)
							{
								echo "No";
							}
							else
								echo "Yes";
							?><br/>
							
							</td>
                            <td><?php echo $list['Createdby'];?></td>
<<<<<<< HEAD
                            <td class="center"><?php echo $list['delivery_date'];?></td><td><a href="<?php echo base_url();?>index.php/sales/sales/edit_sales/<?php echo $list['id'];?>">Edit</a></td>
=======
                            <td class="center"><?php echo $list['delivery_date'];?></td>
							<!-- <td><a href="<?php echo base_url();?>sales/sales/edit_sales/<?php echo $list['id'];?>">Edit</a></td> -->
>>>>>>> 1d076ea6e9a4954ea39192575f9541152cf4e1a9
                            
                        <td><a href="<?php echo base_url();?>index.php/sales/sales/requestview/<?php echo $list['id'];?>">SReq:#<?php  echo $list['id'];?></a><br/><a href="#"></a><br/><a href="#"></a></td></tr>
						
						<?php } ?>
                        
                    </tbody>
                </table>
                
          <br /><br />
        </div><!--contentwrapper-->
        
	</div><!-- centercontent -->