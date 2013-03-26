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
            <h1 class="pagetitle">Users ><a class="pagetitle listingplan" href="<?php echo base_url();?>admin/users">User List</a></h1>
            
            
            <ul class="hornav">
                <li class="current"><a href="#updates">Users</a></li>
                <li><a href="#activities">New User</a></li>
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
                            </colgroup>
                            <thead>
                                <tr>
                                    <th class="head1">No.</th>
                                    <th class="head0">User</th>
									<th class="head0">Role</th>
									<th class="head1"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- <tr>
                                    <td>1</td>
                                    <td>Tom</td>
									<td>Billing</td>
									<td align="center"><a href="#">Add another role</a></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Harry</td>
									<td>IT</td>
									<td align="center"><a href="#">Add another role</a></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Dick</td>
									<td>Sales</td>
									<td align="center"><a href="#">Add another role</a></td>
                                </tr> -->

								<?php


									
								 $i=1;
									 foreach($list_users as $users)
									{	
										 
								?>
								
									<tr>
										<td><?php echo $i;?></td>
										<td><?php echo $users['name'];?></td>
										<td><?php echo $users['rolename'];?></td>										
										<!-- <td align="center"><a href="<?php echo base_url();?>admin/users/create_anotherrole/<?php echo $users['id'];?>">Add another role</a></td> -->
										<td align="center"><a href="#">Add another role</a></td>
									</tr>
									<?php
									$i++;
									}
									?>
                            </tbody>
                        </table>
                    
                    
            </div><!-- #updates -->
            
            <div id="activities" class="subcontent" style="display:none;">
            	<form id="form1" class="stdform stdform2" method="post" action="<?php echo base_url()?>admin/users/create_users">
                    	<p>
                        	<label>Name</label>
                            <span class="field"><input type="text" name="name" id="name" class="longinput required" /></span>

							<label>Password</label>
                            <span class="field"><input type="password" name="password" id="password" class="longinput required" /></span>
                        </p>
						<p>
                        	<label>Select</label>
                            <span class="field">
                            <!-- <select name="selection" id="selection">
                            	<option value="">Billing</option>
                                <option value="1">IT</option>
                                <option value="2">Sales</option>
                                <option value="4">Etc.</option>
                            </select> -->

							<?php
								  $class = 'id="selection" class="required"';
								  echo form_dropdown('userroles',$roles_list,$this->input->post("userroles"),$class);
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