<?php //print_r($Details);?>
<div class="centercontent">
    
        <div class="pageheader">
            <h1 class="pagetitle">Users > User Roles</h1>
            <span class="pagedesc">This is a sample description of a page</span>
            
            <ul class="hornav">
                <li class="current"><a href="#updates">Edit Roles</a></li>
                <!--<li><a href="#activities">New Company</a></li>-->
            </ul>
        </div><!--pageheader-->
		<div id="contentwrapper" class="contentwrapper">
		
		<div id="activities" class="subcontent" style="display:block;">
            	<form id="form1" class="stdform stdform2" method="post" action="<?php echo base_url();?>admin/userroles/edit_userroles/<?php echo $Details[0]['id'];?>">
                    	<p>
                        	<label>Role Name</label>
                            <span class="field"><input type="text" name="name" id="firstname2" class="longinput required" value="<?php echo $Details[0]['name'];?>" /></span>
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