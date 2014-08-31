<div id="main">


<h1>Register A New Term</h1>

<?php
	echo form_open('admin/rtermsnw');
	echo form_label('Type in the Term  to Register', 'class');

	$attrib1 = array( 'name' => 'term',
				  'id' => 'term',
				  'size' => '20'
				  );
	echo form_input($attrib1);
	echo form_submit('submit', 'Confirm');
	
	echo form_close();
	
	?>

	
	
</div>
	