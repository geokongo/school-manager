<div id="main">

<?php 

	echo form_open('admin/login');
	
	echo "<p>Username:";
	echo form_input();
	echo "</p>";
	
	echo "<p>Password:";
	echo form_password();
	echo "</p>";
	
	echo form_submit('', 'Login');
	
	echo form_close();
	


	
?>

</div>