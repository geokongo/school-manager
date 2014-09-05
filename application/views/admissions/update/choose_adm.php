<section id="content">

<?php
	if(isset($error))
	{
		echo "<div id=\"error\" style=\" display: block; \">{$error}</div>";

	}
	
	if(isset($success))
	{
		echo "<div id=\"success\" style=\" display: block; \">{$success}</div>";
	
	}


?>
<div id="main">

<?php 
	
	$array = array( 'id' => 'update_step1',
					'class' => 'adm_form');
	echo form_open('admissions/update', $array).'<header>';
	
	echo '<p>Update Records<br />';
	echo 'Enter Admission Number to Update Records</p></header>';
	
	echo form_hidden('actionflag', 'step1');
	
	echo form_label('Enter Admission Number ', 'adm').'<span>';
	
	$attrib1 = array( 'name' => 'adm',
					  'id' => 'adm',
					  'size' => '20'
					  );
	echo form_input($attrib1).'</span>';
	echo form_label().'<span>';
	echo form_submit('submit', 'Go!', 'class="button"').'</span>';
	
	echo form_close();
	

	?>
	
</div>
</section>