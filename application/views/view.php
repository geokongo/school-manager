<!DOCTYPE html>
<html>
<head>
<title>Facebook Sweetness</title>
</head>
<body>
	<h1>Facebook stuff</h1>
	
	<?php 
		if(@$user_profile): ?>
		<pre>
			<?php echo print_r($user_profile, TRUE); ?>
			
		</pre>
		<a href="<?= $logout_url ?>">Logout</a>
	<?php else: ?>
		<h2>Welcome, please login below</h2>
		<a href="<?= $login_url ?>">Login</a>
		
	<?php endif; ?>
	
</body>
</html>