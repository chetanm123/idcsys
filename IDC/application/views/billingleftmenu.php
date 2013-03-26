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
					<li><a href="<?php echo base_url();?>billing/billing/active_billing">Active</a></li>               		
                    <li><a href="<?php echo base_url();?>billing/billing">All</a></li>
                </ul>
            </li>
			
        </ul>
        <a class="togglemenu"></a>
        <br /><br />
    </div><!--leftmenu-->