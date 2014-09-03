function step1(url, form_data)
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

function step2(url, form_data)
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

function step3(url, form_data)
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

function step4(url, form_data)
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

function step5(url, form_data)
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