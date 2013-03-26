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
<?php //print_r($Details);?>
<div class="centercontent">
    
        <div class="pageheader">
            <h1 class="pagetitle">Inventory ><a class="pagetitle listingplan" href="<?php echo base_url();?>admin/item">Items</a></h1>
            <span class="pagedesc">This is a sample description of a page</span>
            
            <ul class="hornav">
                <li><a href="#activities">Edit Item</a></li>
                <!--<li><a href="#activities">New Company</a></li>-->
            </ul>
        </div><!--pageheader-->
		<div id="contentwrapper" class="contentwrapper">
		
		<div id="activities" class="subcontent" style="display:block;">
            	<form id="form1" class="stdform stdform2" method="post" action="<?php echo base_url();?>admin/item/edit_item/<?php echo $Details[0]['id'];?>">
                    	<p>
                        	<label>Item Name</label>
                            <span class="field"><input type="text" name="name" id="firstname2" class="longinput required" value="<?php echo $Details[0]['details'];?>" /></span>
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
								  
								  if($this->input->post("itemtype"))
								  {
									$items = $this->input->post("itemtype");
								  }
								  else
								  {
									$items = $item_details[0]['itemtypeid'];
								  }
								  $class = 'id="selection" class="required"';
								  echo form_dropdown('itemtype',$list_itemtype,$items,$class);
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



