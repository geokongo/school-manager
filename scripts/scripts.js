function step1(url, form_data, content)
{
	$.ajax({
			url: url,
			type: 'POST',
			data: form_data,
			success: function(val) {
				
				$('#loader').hide();
				$('section').html(content);
			
			}
		});


}