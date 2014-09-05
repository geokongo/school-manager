<div class="login_container">
	<div class="login">
		<h1> Login</h1>
		<?php 
		
		$error1 = '';
		$error2 = '';
		echo validation_errors();
		echo form_open('login/auth');
		
		echo $error1;
		echo form_label('Username', 'name');
		
		$attrib1 = array( 'name' => 'username',
						  'id' => 'name',
						  'placeholder' => 'Username',
						  'size' => 20
						  );
		echo form_input($attrib1)."</p><p>";
		
		echo $error2;

		echo form_label('Password', 'pass');
		
		$attrib2 = array( 'name' => 'password',
						  'id' => 'pass',
						  'placeholder' => 'Password',
						  'size' => 20
						  );
		echo form_password($attrib2)."</p><p class=\"submit\">";
		echo form_submit('submit', 'Login')."<p>";
		
		echo form_close();
		
		?>
	</div>
</div>