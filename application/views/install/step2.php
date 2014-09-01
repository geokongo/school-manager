<div id="main">

<?php 

	echo "Enter the details below<p>";
	
	echo form_open('install/configuration');
	echo form_hidden('actionf', 'url');
	echo form_label('Name of Institution ', 'institution');
	
	$attrib1 = array( 'name' => 'institution',
					  'id' => 'institution',
					  'size' => 40
					  );
	echo form_input($attrib1)."<p>";
	
	echo form_label('Installation Folder', 'folder');
	
	$attrib2 = array( 'name' => 'folder',
					  'id' => 'folder',
					  'size' => 35
					  );
	echo form_input($attrib2)."<p>";
	
	echo form_label('Site Url ', 'url');
	
	$attrib3 = array( 'name' => 'url',
					  'id' => 'url',
					  'size' => 35
					  );
	echo form_input($attrib3)."<p>";
	
	echo form_submit('submit', 'Submit');
	echo form_close();


?>


</div>