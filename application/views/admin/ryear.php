<div id="main">


<h1>Register A New Year</h1>

<?php
	echo form_open('admin/ryearnw');
	echo form_label('Type in the Year to Register', 'year');
	
	$attrib1 = array( 'name' => 'year',
					  'id' => 'year',
					  'size' => '20'
					  );
					  
	echo form_input($attrib1);
	echo form_submit('submit', 'Confirm');
	
	echo form_close();
	
?>
					  

					  
					  
</div>
	