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
	
	$output = $this->session->userdata('sess');
	
	$array = array( 'id' => 'update_step2',
					'class' => 'adm_form');
	echo form_open('admissions/update', $array).'<header>';
	
	echo '<p>Student Details<br />';
	echo $output['f_name']." ";
	echo $output['m_name']." ";
	echo $output['l_name'].'<br />';
	echo 'Admission Number '.$output['adm'].'<br />'; 
	echo 'Select the Details to Update</p></header>';
	
	echo form_hidden('actionflag', 'step2').'<span>';
	
	$attrib1 = array( 'name' => 'pdetails',
					  'id' => 'pdetails',
					  'value' => 'pdetails'
					  );
	echo form_checkbox($attrib1).'</span>';
	echo form_label('Personal Details', 'pdetails').'<span>';
	
	$attrib2 = array( 'name' => 'pgdetails',
					  'id' => 'pgdetails',
					  'value' => 'pgdetails'
					  );
	echo form_checkbox($attrib2).'</span>';
	echo form_label('Parent/Guardian Details', 'pgdetails');
	echo form_label().'<span>';
	echo form_submit('submit', 'Go!', 'class="button"').'</span>';
	
	echo form_close();
	

?>


</div>	
</section>