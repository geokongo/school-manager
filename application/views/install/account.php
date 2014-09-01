<div id="main">

<?php 

	echo "Enter the details below to create a user account. You will use the Credentials to log into the System<p>";
	
	echo form_open('install/configuration');
	echo form_hidden('actionf', 'account');
	echo form_label('First Name ', 'f_name');
	
	$attrib1 = array( 'name' => 'f_name',
					  'id' => 'f_name',
					  'size' => 20
					  );
	echo form_input($attrib1)."<p>";
	
	echo form_label('Last Name ', 'l_name');
	
	$attrib2 = array( 'name' => 'l_name',
					  'id' => 'l_name',
					  'size' => 20
					  );
	echo form_input($attrib2)."<p>";
	
	echo form_label('Choose a Username ', 'username');
	
	$attrib3 = array( 'name' => 'username',
					  'id' => 'username',
					  'size' => 20
					  );
	echo form_input($attrib3)."<p>";
	
	echo form_label('Choose a Password ', 'password');
	
	$attrib4 = array( 'name' => 'password',
					  'id' => 'password',
					  'size' => 20
					  );
	echo form_password($attrib4)."<p>";
	
	echo form_label('Confirm Password ', 'cpassword');
	
	$attrib5 = array( 'name' => 'cpassword',
					  'id' => 'cpassword',
					  'size' => 20
					  );
	echo form_password($attrib5)."<p>";
	
	echo form_submit('submit', 'Submit');
	echo form_close();


?>


</div>