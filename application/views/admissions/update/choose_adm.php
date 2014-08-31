<div id="main">

<?php 
	
	echo "<img src=\"".base_url()."images/admission.png\" /><p>";
	echo "<img src=\"".base_url()."images/underline.jpg\" /><p>";
	
	echo heading('Enter Admission Number in order to update records', 3);
	
	echo form_open('admissions/update');
	echo form_hidden('actionflag', 'step1');
	
	echo form_label('Enter Admission Number ', 'adm');
	
	$attrib1 = array( 'name' => 'adm',
					  'id' => 'adm',
					  'size' => '20'
					  );
	echo form_input($attrib1);
	echo "<p>";
	echo form_submit('submit', 'Go!');
	
	echo form_close();
	

	?>
	
</div>
	