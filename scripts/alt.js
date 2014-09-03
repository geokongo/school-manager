function step1(url, form_data)
{
	$.ajax({
			url: url,
			type: 'POST',
			dataType: 'json',
			data: form_data,
			success: function(val) {
				
				var info = val.data;
				var put = '<p>';
				put += val.data.is_ajax + '</p>';
				$.each(info.nested, function(index) {
					put += this.ADM + '</p>';
				
				});
				
				$('#loader').hide();
				$('#main').html(put);
			
			}
		});


}