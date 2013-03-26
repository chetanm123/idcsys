<script>
	$(document).ready(function(){
		$("#form1").validate();
	  });
</script>
<div class="vernav2 iconmenu">
    	<ul>
        	<li><a href="#formsub" class="editor">Requests</a>
            	<span class="arrow"></span>
            	<ul id="formsub">
					<li><a href="<?php echo base_url();?>sales/sales/create_sales">New</a></li>
					<li><a href="<?php echo base_url();?>sales/sales/active_sales">Active</a></li>
               		<li><a href="<?php echo base_url();?>sales/sales/previous_sales">Request Provisioned</a></li>
                    <li><a href="<?php echo base_url();?>sales/sales/all_sales">All</a></li>
                </ul>
            </li>
			<!--<li><a href="#addons" class="addons">Misc</a>
            	<span class="arrow"></span>
            	<ul id="addons">
               		<li><a href="newsfeed.html">Misc item 1</a></li>
                    <li><a href="newsfeed.html">Misc item 2</a></li>
                </ul>
            </li>-->
        </ul>
        <a class="togglemenu"></a>
        <br /><br />
    </div><!--leftmenu-->