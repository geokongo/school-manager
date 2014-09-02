<!DOCTYPE html>
<html>
<head><title></title>
<?php
echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"".base_url()."style/css.css\">";
?>
<script src="<?php echo base_url(); ?>scripts/jquery.min.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>
<header>




<script type="text/javascript">
$(document).ready(function() {

	$('form').submit(function(e) {

		alert($('#f_name').val());
		
		


	});

	$('a').click(function() {
		alert('Hey');
		

	});


	$('#submit').click( function() {
		
		var form_data = {
			adm: $('#adm').val(),
			f_name: $('#f_name').val(),
			m_name: $('#m_name').val(),
			l_name: $('#l_name').val(),
			actionflag: $('input[type=hidden]').val()
		};
		
		$.ajax({
			url: "<?php echo base_url('admissions/addnew'); ?>",
			type: 'POST',
			data: form_data,
			success: function(msg) {
				$('#main').html(msg);
			
			}
		});
		
		return false;
	});
});
	
</script>



<?php 


?>


<script type="text/javascript">

	$('#submit').click(function() {
		
		return false;
	
	});

</script>


<?php

echo "<p>".NAME."</p>";

echo "<ul><li class=\"button\"><a href=\"";
echo base_url();
echo "admissions\"";
echo ">Dashboard</a></li>";
?>
<li class="button"><a href="<?php echo base_url(); ?>admissions/addnew">Admission</a></li>
<li class="button"><a href="<?php echo base_url(); ?>admissions/view">Student Details</a></li>
<li class="button"><a href="<?php echo base_url(); ?>admissions/update">Update Records</a></li>

</ul>


</header>

