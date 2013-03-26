 <?php //echo "<pre>";print_r($provisionDetails);?>
 <div class="centercontent tables">
    
        <div class="pageheader notab">
            <h1 class="pagetitle">Request Provisioned</h1>
            <span class="pagedesc">This is a sample description of a page</span>
            
        </div><!--pageheader-->
        
        <div id="contentwrapper" class="contentwrapper">
                        
                <!--<div class="contenttitle2">
                	<h3>Dynamic Table</h3>
                </div>--><!--contenttitle-->
				<?php 
				if(!empty($provisionDetails))
					{?>
                <table cellpadding="0" cellspacing="0" border="0" class="stdtable" id="dyntable">
                    <colgroup>
                        <col class="con0" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" />
						<col class="con0" />
                    </colgroup>
                    <thead>
                        <tr>
                            <th class="head0">Provision No.</th>
							<th class="head1">Details</th>
                            <th class="head0">Created By</th>
                            <th class="head1">Date</th>
							<!-- <th class="head1"></th> -->
							<th class="head0">Related</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th class="head0">Provision No.</th>
							<th class="head1">Details</th>
                            <th class="head0">Created By</th>
                            <th class="head1">Date</th>
							<!-- <th class="head1"></th> -->
							<th class="head0">Related</th>
                        </tr>
                    </tfoot>
                    <tbody>
					<?php 
						//echo "<pre>";
						//print_R($provisionDetails);exit;
						foreach($provisionDetails as $list)
						{?>
							<tr class="gradeX">
						
                            <td><a href="#"></a><?php echo $list['id'];?></td>
                            <td>Processor: <?php echo $list['Processor'];?><br/>							
							RAID: <?php echo $list['RAID'];?><br/>
							Mailserver: <?php echo $list['Mailserver'];?><br/>
							Panel:<?php echo $list['Panel'];?><br/>
							OS: <?php echo $list['OS'];?><br/>
							Managed:<?php if($list['managed_services']==0)
							{
								echo "No";
							}
							else
								echo "Yes";?><br/>
							
							</td>
                            <td><?php echo $list['Createdby'];?></td>
                            <td class="center"><?php echo $list['delivery_date'];?></td>
							<!-- <td><a href="<?php echo   base_url();?>provision/provisions/editprovision/<?php echo $list['request_id'];?>">Edit</a>
							</td> -->
							 <td><a href="<?php echo base_url();?>provision/provisions/requestview/<?php echo $list['request_provision_id'];?>">SReq:#<?php  echo $list['id'];?></a><br/><a href="<?php echo base_url();?>provision/provisions/provisionview/<?php echo $list['request_provision_id'];?>">Prov:#<?php echo $list['request_provision_id'];?></a><br/><a href="#"></a></td></tr>
                        <?php 
							} 
						?>
					</tbody>
                </table>
				<?php }
				else
				{
					echo "<h4>"."Record Not Found"."</h4>";
				}?>

                
          <br /><br />
        </div><!--contentwrapper-->
        
	</div><!-- centercontent -->