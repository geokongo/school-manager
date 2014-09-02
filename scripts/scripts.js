<script type="text/javascript">
$(document).ready(function() {
	
	$('li.button > a').click(function() {
		$('#main').remove();
		$('#loader').show();
		

	});


	$('#submit').click( function() {
		
		var url = $('form').attr('action');
		var form_data = {
			adm: $('#adm').val(),
			f_name: $('#f_name').val(),
			m_name: $('#m_name').val(),
			l_name: $('#l_name').val(),
			actionflag: $('input[type=hidden]').val()
		};
		
		var empty = '';
		$('#main').html(empty);
		$('#loader').show();
		
		$.ajax({
			url: url,
			type: 'POST',
			data: form_data,
			success: function(msg) {
				$('#loader').hide();
				$('#main').html(msg);
			
			}
		});
		
		return false;
	});
});
	
</script>