function insert(action, url, form_data)
{
	var content = $('#main').html();
	$('div#main').remove();
	$('#loader').show();

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

function update(action, url, form_data)
{
	var content = $('#content').html();
	
	if(action == 'update_step1')
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
	
	if(action == 'update_step2')
	{
	
	
	}
	
	if(action == 'basic_up')
	{
	
	
	}
	
	if(action == 'personal_up')
	{
	
	
	}
	
	if(action == 'contacts_up')
	{
	
	
	}
	
	if(action == 'fdetails_up')
	{
	
	
	}
	
	if(action == 'mdetails_up')
	{
	
	
	}
	
	if(action == 'gdetails_up')
	{
	
	
	}

}