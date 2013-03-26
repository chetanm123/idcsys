$(document).ready(function(){
	$('.checkboxflag').click(function(){          
						
						var checkboxid = $("checkboxflag").val();
						var base_url = "<?php echo base_url(); ?>";
						var url = $this->uri->segment(3)
						$.ajax({
							url: base_url+"user/getsubdepartment/"+departmentid,   
							type: 'POST',	                       
							success: function(result) 
							{
									$('#subdepartment').html(result);
									$('#subdepartment').next().html('Select Sub Department');
							}
						});
					});

});