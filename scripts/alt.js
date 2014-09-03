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

var form_data = {
			class1: $('#caa').val(),
			actionf: 'get_streams',
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