function step1(url, form_data)
{
	$.ajax({
			url: url,
			type: 'POST',
			dataType: 'json',
			data: form_data,
			success: function(val) {
				
				var info = val.data;
				var put = info.FName;
				
				$('#loader').hide();
				$('#main').html(put);
			
			}
		});


}