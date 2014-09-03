<!DOCTYPE html>
<html>
<head><title></title>
<?php
echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"".base_url()."style/css.css\">";
?>
<script src="<?php echo base_url(); ?>scripts/jquery-2.1.1.min.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo base_url(); ?>scripts/scripts.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>
<header>

<script type="text/javascript">
$(document).ready( function() {
	
	$("document").on('click', 'li.button > a', function() {
		$('#main').remove();
		$('#loader').show();
		

	});
		
	$("#content").on('click', '#step1', function() {
		
		var url = $('form').attr('action');
		var form_data = {
			is_ajax: 1,
			adm: $('#adm').val(),
			f_name: $('#f_name').val(),
			m_name: $('#m_name').val(),
			l_name: $('#l_name').val(),
			actionflag: $('input[type=hidden]').val(),
		};
		
		step1(url, form_data);
		
	});

	$("#content").on('click', '#step2', function() {
		
			var url = $('form').attr('action');
			var form_data = {
				dob: $('#dob').val(),
				pob: $('#pob').val(),
				doa: $('#doa').val(),
				caa: $('#caa').val(),
				stream: $('#stream').val(),
				county: $('#county').val(),
				gender: $('#gender').val(),
				nationality: $('#nationality').val(),
				actionflag: $('input[type=hidden]').val(),
				is_ajax: 1
			};
			
		step2(url, form_data);
		
	});

	$("#content").on('change', 'input#caa', function() {

		var form_data = {
			class: $('#caa').val(),
			actionf: 'get_streams'
		};
		
		$.ajax({
			url: $('form').attr('action'),
			type: 'POST',
			data: form_data,
			success: function(msg) {
				$('div#streams').html(msg);
			
			}
			
		});
		
	});

});
</script>


<div id="logout"><p><a href="#">Logout</a></p></div>
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
<div class="space"></div>

<div id="loader">
<div id="ajaxloader"></div>
</div>
