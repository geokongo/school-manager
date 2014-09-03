function step1(url, form_data, content)
{
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
			
			return false;

		
		}
		
	});

}

function step2(url, form_data, content)
{
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
			
			return false;

		
		}
		
	});

}