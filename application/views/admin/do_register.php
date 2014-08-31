<div id="main">

<h1> Class Registration</h1>

<?php 
echo form_open('admin/rclassesnw');
echo form_label('Type in the CLass name', 'register');

$attrib1 = array( 'name' => 'class',
				  'size' => 10,
				  'id' => 'register',
				  'placeholder' => 'CLASS1'
				  );
echo form_input($attrib1);
echo form_submit('submit', 'Register');
echo form_close();

?>


</div>