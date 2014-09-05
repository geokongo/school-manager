function ajax(action, url, form_data)
{
	var content = $('#content').html();
	$('#main').remove();
	$('#loader').show();
	
	$.ajax({
		url: url,
		type: 'POST',
		data: form_data,
		success: function(val) {
			$('#loader').hide();
			$('#content').html(val);
			
			return false;
		
		},
		error: function(err, desc, val) {
			
			var error = '<div id="error" style=" display: block; ">' + val + '</div>';
			var initial_content = '<div id="main">' + content + '</div>';
			$('#loader').hide();
			$('#content').html(error);
			$('#content').append(initial_content);
			
			return false;
		
		}
	
	});
	
	
}