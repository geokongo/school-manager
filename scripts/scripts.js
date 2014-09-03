function insert(url, form_data)
{
	if(action == 'step1')
	{
		$('div#main').remove();
		$('#loader').show();
		
		$.ajax({
			url: url,
			type: 'POST',
			data: form_data,
			success: function(val) {
				
				$('#loader').hide();
				$('#content').html(val);
				
				return false;
			
			}
			
		});
		
	}

	if(action == 'step2')
	{

		$('div#main').remove();
		$('#loader').show();
		
		$.ajax({
			url: url,
			type: 'POST',
			data: form_data,
			success: function(val) {
				
				$('#loader').hide();
				$('#content').html(val);
				
				return false;
			
			}
			
		});
		
	}

	if(action == 'step3')
	{

		$('div#main').remove();
		$('#loader').show();
		
		$.ajax({
			url: url,
			type: 'POST',
			data: form_data,
			success: function(val) {
				
				$('#loader').hide();
				$('#content').html(val);
				
				return false;
			
			}
			
		});
		
	}

	if(action == 'step4')
	{
		$('div#main').remove();
		$('#loader').show();
		
		$.ajax({
			url: url,
			type: 'POST',
			data: form_data,
			success: function(val) {
				
				$('#loader').hide();
				$('#content').html(val);
				
				return false;
			
			}
		
		});
		
	}

	if(action == 'step5')
	{
		$('div#main').remove();
		$('#loader').show();
		
		$.ajax({
			url: url,
			type: 'POST',
			data: form_data,
			success: function(val) {
				$('#loader').hide();
				$('#content').html(val);
				
				return false;
			
			}
			
		});
		
	}

	if(action == 'step6')
	{
		$('div#main').remove();
		$('#loader').show();
		
		$.ajax({
			url: url,
			type: 'POST',
			data: form_data,
			success: function(val) {
				$('#loader').hide();
				$('#content').html(val);
				
				return false;
			
			}
			
		});
		
	}

	if(action == 'step7')
	{
		$('div#main').remove();
		$('#loader').show();
		
		$.ajax({
			url: url,
			type: 'POST',
			data: form_data,
			success: function(val) {
				$('#loader').hide();
				$('#content').html(val);
				
				return false;
			
			}
			
		});
		
	}

}

function view(action, url, form_data)
{
	
	if( action == 'step1')
	{
		$('div#main').remove();
		$('#loader').show();
		
		$.ajax({
			url: url,
			type: 'POST',
			data: form_data,
			success: function(val) {
				$('#loader').hide();
				$('#content').html(val);
				
				return false;
			
			}
		
		});
	
	}
	
	if(action == 'step2')
	{
		$('div#main').remove();
		$('#loader').show();
		
		$.ajax({
			url: url,
			type: 'POST',
			data: form_data,
			success: function(val) {
				$('#loader').hide();
				$('#content').html(val);
				
				return false;
			
			}
		
		});
	
	}


}