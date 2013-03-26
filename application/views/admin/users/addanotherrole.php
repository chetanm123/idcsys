<?php //print_r($Details);?>
<div class="centercontent">
    
        <div class="pageheader">
            <h1 class="pagetitle">Users > User List</h1>
            <span class="pagedesc">This is a sample description of a page</span>
            
            <ul class="hornav">
                <li class="current"><a href="#">Edit User</a></li>
                <!--<li><a href="#activities">New Company</a></li>-->
            </ul>
        </div><!--pageheader-->
		<div id="contentwrapper" class="contentwrapper">
		
		<div id="activities" class="subcontent" style="display:block;">
            	<form class="stdform stdform2" method="post" action="<?php echo base_url();?>admin/users/edit_users/<?php echo $Details[0]['id'];?>">
                    	<p>
                        	<label>User Name</label>
                            <span class="field"><input type="text" name="name" id="firstname2" class="longinput" value="<?php echo $Details[0]['details'];?>" /></span>
                        </p>

						<p>
                        	<label>Select</label>
                            <span class="field">
                            <!-- <select name="selection" id="selection">
                            	<option value="">Processor</option>
                                <option value="1">Hard Disk</option>
                                <option value="2">Memory</option>
                                <option value="3">Board</option>
                                <option value="4">Etc.</option>
                            </select> -->

							<?php
								  
								  if($this->input->post("roles"))
								  {
									$roles = $this->input->post("roles");
								  }
								  else
								  {
									$roles = $users_details[0]['roleid'];
								  }
								  $class = 'id="selection"';
								  echo form_dropdown('roles',$roles_list,$roles,$class);
							?>
                            </span>
                        </p>

                        <p class="stdformbutton">
                        	<button class="submit radius2">Submit Button</button>
                            <input type="reset" class="reset radius2" value="Reset Button" />
                        </p>
                    </form>
            </div>
		</div>
		
 <br clear="all" />
        
</div><!-- centercontent -->



