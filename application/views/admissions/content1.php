<div id="main">

<?php 

	echo "<img src=\"".base_url()."images/admission.png\" /><p>";
	echo "<img src=\"".base_url()."images/underline.jpg\" /><p>";

$error1 = '';
$error2 = '';
	echo $error1;
	echo $error2;
	
	echo validation_errors();
	echo form_open('login');
	
	echo "<p>Username:";
	
	echo form_input('username', set_value('username'));
	echo "</p>";
	
	echo "<p>Password:";
	echo form_password('password');
	echo "</p>";
	
	echo form_submit('submit', 'Login');
	
	echo form_close();
	
?>


</div>

	
