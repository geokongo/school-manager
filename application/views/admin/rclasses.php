<div id="main">


<h1>Registration of Classes</h1>

<?php

echo form_open('admin/rclassesn');
echo form_label("Register a Class", "register");

$attrib1 = array( "name" => "submit",
				  "id" => "register",
				  "value" => "procede"
				 );
echo form_submit($attrib1);

echo form_close();

?>

</div>