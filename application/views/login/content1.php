

<?php 

$error1 = '';
$error2 = '';
	echo $error1;
	echo $error2;
	
	echo validation_errors();
	echo form_open('login/auth');
	
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