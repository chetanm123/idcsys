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
					<li><a href="<?php echo base_url();?>index.php/provision/provisions">Active</a></li>
               		<li><a href="<?php echo base_url();?>index.php/provision/provisions/provisioned">Request Provisioned</a></li>
                    </ul>
            </li>
			<li><a href="<?php echo base_url();?>index.php/provision/provisions/provisioned" class="gallery">Provisions</a></li>
			<!-- <li><a href="<?php echo base_url();?>provision/provisions/provision_status" class="gallery">Provision Status</a></li> -->
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