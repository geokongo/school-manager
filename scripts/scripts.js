function step1(url, form_data)
{
	var content = $('section').html();
	var empty = '';
	$('div#main').remove();
	$('#loader').show();
	
	$.ajax({
		url: url,
		type: 'POST',
		data: form_data,
		async: false,
		success: function(val) {
			
			$('#loader').hide();
			$('section').html(val);
		
		}
		
	});

}

f