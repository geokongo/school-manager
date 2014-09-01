<div id="main">

<?php 

	echo "Cofigure the Database Settings below<p>";
	
	echo form_open('install/configuration');
	echo form_hidden('actionf', 'database');
	echo form_label('Hostname', 'hostname');
	
	$attrib1 = array( 'name' => 'hostname',
					  'id' => 'hostname',
					  'size' => 20
					  );
	echo form_input($attrib1)."<p>";
	
	echo form_label('Username', 'username');
	
	$attrib2 = array( 'name' => 'username',
					  'id' => 'username',
					  'size' => 20
					  );
	echo form_input($attrib2)."<p>";
	
	echo form_label('Password', 'password');
	
	$attrib3 = array( 'name' => 'password',
					  'id' => 'password',
					  'size' => 20
					  );
	echo form_input($attrib3)."<p>";
	
	echo form_label('Database', 'database');
	
	$attrib4 = array( 'name' => 'database',
					  'id' => 'database',
					  'size' => 20
					  );
	echo form_input($attrib4)."<p>";
	
	echo form_label('Dbdriver', 'dbdriver');
	
	$attrib4 = array( 'name' => 'dbdriver',
					  'id' => 'dbdriver',
					  'size' => 20
					  );
	echo form_input($attrib4)."<p>";
	
	echo form_submit('submit', 'Submit');
	echo form_close();


?>


</div>