<div class="centercontent tables">
    
        <div class="pageheader notab">
            <h1 class="pagetitle">All Requests</h1>
            <span class="pagedesc">This is a sample description of a page</span>
            
        </div><!--pageheader-->
        
        <div id="contentwrapper" class="contentwrapper">
                        
                <!--<div class="contenttitle2">
                	<h3>Dynamic Table</h3>
                </div><!--contenttitle-->
				<?php
				if(!empty($allDetails))
				{
				?>
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
						<td><a href="<?php echo base_url();?>billing/billing/requestview/<?php echo $list['id'];?>"></a><?php echo $list['id'];?></td>
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
                            <td class="center"><?php echo $list['requestbillingcreatedon'];?></td>
							<!-- <td><a href="#">Active</a></td> -->
                            
                        <td><a href="<?php echo base_url();?>billing/billing/salesrequestview/<?php echo $list['id'];?>">SReq:#<?php  echo $list['id'];?></a><br/><a href="<?php echo base_url();?>billing/billing/billview/<?php echo $list['requestbillingid'];?>">B:#<?php echo $list['requestbillingid'];?></a><br/><a href="<?php echo base_url();?>billing/billing/provisionrequestview/<?php echo $list['requestprovisionid'];?>">Prov:#<?php echo $list['requestprovisionid'];?></a></td></tr>

						<?php } ?>
                    </tbody>
                </table>
				<?php
				}
				else
				{
				?>
				<h4>No Record Found</h4>
				<?php
				}
				?>
                
          <br /><br />
        </div><!--contentwrapper-->
        
	</div><!-- centercontent -->