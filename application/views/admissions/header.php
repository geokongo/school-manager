<!DOCTYPE html>
<html>
<head><title></title>
<?php
echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"".base_url()."style/css.css\">";
?>
<script src="<?php echo base_url(); ?>scripts/jquery-2.1.1.min.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo base_url(); ?>scripts/js.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>
<header>

<script type="text/javascript">
$(document).ready( function() {
	
	$("body").on('click', 'li.button > a', function() {
		$('#main').remove();
		$('#loader').show();
		

	});
		
	$("#content").on('submit', 'form#step1', function() {
		var action = $('input[type=hidden]').val();
		var url = $('form').attr('action');
		var form_data = {
			is_ajax: 1,
			adm: $('#adm').val(),
			f_name: $('#f_name').val(),
			m_name: $('#m_name').val(),
			l_name: $('#l_name').val(),
			actionflag: action
		};
		
		ajax(action, url, form_data);
		
	});
	
	$("#content").on('change', 'select#caa', function() {
		var actionf = 'get_streams';
		var form_data = {
			class1: $('#caa').val(),
			actionf: actionf,
			actionflag: $('input[type=hidden]').val()

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


	$("#content").on('submit', 'form#step2', function() {
			var action = $('input[type=hidden]').val();
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
				actionflag: action,
				is_ajax: 1
			};
			
		ajax(action, url, form_data);
		
	});
	
	$('#content').on('submit', 'form#step3', function() {
			var action = $('input[type=hidden]').val();
			var url = $('form').attr('action');
			var form_data = {
				pa: $('#pa').val(),
				pc: $('#pc').val(),
				town: $('#town').val(),
				actionflag: action,
				is_ajax: 1
			};
		
		ajax(action, url, form_data);
	
	});
	
	$('#content').on('submit', 'form#step4', function() {
			var action = $('input[type=hidden]').val();
			var url = $('form').attr('action');
			var form_data = {
				actionflag: action,
				is_ajax: 1
			
			};
		
		ajax(action, url, form_data);
	
	});
	
	$('#content').on('submit', 'form#step5', function() {
			var action = $('input[type=hidden]').val();
			var url = $('form').attr('action');
			var form_data = {
				actionflag: action,
				f_name: $('#f_name').val(),
				l_name: $('#l_name').val(),
				paddress: $('#paddress').val(),
				pcode: $('#pcode').val(),
				phone: $('#phone').val(),
				email: $('#email').val(),
				is_ajax: 1
			
			};
		
		ajax(action, url, form_data);
	
	});
	
	$('#content').on('submit', 'form#step6', function() {
		var action = $('input[type=hidden]').val();
		var url = $('form').attr('action');
		var form_data = {
				actionflag: action,
				f_name: $('#f_name').val(),
				l_name: $('#l_name').val(),
				paddress: $('#paddress').val(),
				pcode: $('#pcode').val(),
				phone: $('#phone').val(),
				email: $('#email').val(),
				is_ajax: 1
			
			};
		
		ajax(action, url, form_data);
	
	});
	
	$('#content').on('submit', 'form#step7', function() {
		var action = $('input[type=hidden]').val();
		var url = $('form').attr('action');
		var form_data = {
				actionflag: action,
				f_name: $('#f_name').val(),
				l_name: $('#l_name').val(),
				paddress: $('#paddress').val(),
				pcode: $('#pcode').val(),
				phone: $('#phone').val(),
				email: $('#email').val(),
				is_ajax: 1
			
			};
		
		ajax(action, url, form_data);
	
	});
	
});
</script>
<script type="text/javascript">
$(document).ready(function() {
	
	$('#content').on('submit', 'form#view1', function() {
			
			var action = $('input[type=hidden]').val();
			var url = $('form').attr('action');
			var form_data = {
				actionflag: action,
				is_ajax: 1,
				adm: $('#adm').val()
			
			};
		ajax(action, url, form_data);
	
	});
	
	$('#content').on('submit', 'form#view2', function() {
		
			var action = $('input[type=hidden]').val();
			var url = $('form').attr('action');
			var form_data = {
				actionflag: action,
				is_ajax: 1,
				pdetails: $('#pdetails').val(),
				pgdetails: $('#pgdetails').val()
				
			};
		
		ajax(action, url, form_data);
	
	});


});

</script>
<script type="text/javascript">
$(document).ready(function() {

	$('#content').on('submit', 'form#update_step1', function() {
			var action = $('input[type=hidden]').val();
			var url = $('form').attr('action');
			var form_data = {
				actionflag: action,
				adm: $('#adm').val(),
				is_ajax: 1
			};
		
		ajax(action, url, form_data);
	
	});
	
	$('#content').on('submit', 'form#update_step2', function() {
			var action = $('input[type=hidden]').val();
			var url = $('form').attr('action');
			var form_data = {
				actionflag: action,
				pdetails: $('#pdetails').val(),
				pgdetails: $('#pgdetails').val(),
				is_ajax: 1
			};
			
		ajax(action, url, form_data);
		
	});
	
	$('#content').on('submit', 'form#basic_up', function() {
			var action = $('input[type=hidden]').val();
			var url = $('form').attr('action');
			var form_data = {
				f_name: $('#f_name').val(),
				m_name: $('#m_name').val(),
				l_name: $('#l_name').val(),
				is_ajax: 1
			};
		
		ajax(action, url, form_data);
	
	});
	
	$('#content').on('submit', 'form#personal_up', function() {
			var action = $('input[type=hidden]').val();
			var url = $('form').attr('action');
			var form_data = {
				dob: $('#dob').val(),
				pob: $('#pob').val(),
				doa: $('#doa').val(),
				caa: $('#caa').val(),
				county: $('#county').val(),
				gender: $('#gender').val(),
				nationality: $('#nationality').val(),
				is_ajax: 1
			
			};
			
		ajax(action, url, form_data);
	
	});
	
	$('#content').on('submit', 'form#contacts_up', function() {
			var action = $('input[type=hidden]').val();
			var url = $('form').attr('action');
			var form_data = {
				paddress: $('#paddress').val(),
				pcode: $('#pcode').val(),
				town: $('#town').val(),
				is_ajax: 1
			
			};
		
		ajax(action, url, form_data);
		
	});
	
	$('#content').on('submit', 'form#fdetails_up', function() {
			var action = $('input[type=hidden]').val();
			var url = $('form').attr('action');
			var form_data = {
				f_name: $('#f_name').val(),
				l_name: $('#l_name').val(),
				paddress: $('#paddress').val(),
				pcode: $('#pcode').val(),
				phone: $('#phone').val(),
				email: $('#email').val(),
				is_ajax: 1
			
			};
			
		ajax(action, url, form_data);
	
	});

		$('#content').on('submit', 'form#mdetails_up', function() {
			var action = $('input[type=hidden]').val();
			var url = $('form').attr('action');
			var form_data = {
				f_name: $('#f_name').val(),
				l_name: $('#l_name').val(),
				paddress: $('#paddress').val(),
				pcode: $('#pcode').val(),
				phone: $('#phone').val(),
				email: $('#email').val(),
				is_ajax: 1
			
			};
			
		ajax(action, url, form_data);
	
	});

		$('#content').on('submit', 'form#gdetails_up', function() {
			var action = $('input[type=hidden]').val();
			var url = $('form').attr('action');
			var form_data = {
				f_name: $('#f_name').val(),
				l_name: $('#l_name').val(),
				paddress: $('#paddress').val(),
				pcode: $('#pcode').val(),
				phone: $('#phone').val(),
				email: $('#email').val(),
				is_ajax: 1
			
			};
			
		ajax(action, url, form_data);
	
	});

});

</script>
<script type="text/javascript">
$(document).ready(function() {
	
	$('#content').on('click', 'a', function() {
		
		$('#loader').show();
	
	});


});

</script>



<div id="logout"><p><a href="<?php echo base_url(); ?>logout">Logout</a></p></div>
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
