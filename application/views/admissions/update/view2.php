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
	
	echo "<img src=\"".base_url()."images/admission.png\" /><p>";
	echo "<img src=\"".base_url()."images/underline.jpg\" /><p>";
	
	echo heading('Student Details', 3);
	
	$output = $this->session->userdata('sess');
	echo $output['f_name']." ";
	echo $output['m_name']." ";
	echo $output['l_name']."<p>";
	
	echo "Admission Number ".$output['adm']."<p>";
	
	echo "Select the Details to Update.<p>";
	
	$array = array( 'id' => 'update_step2' );
	echo form_open('admissions/update', $array);
	echo form_hidden('actionflag', 'step2');
	
	$attrib1 = array( 'name' => 'pdetails',
					  'id' => 'pdetails',
					  'value' => 'pdetails'
					  );
	echo form_checkbox($attrib1);
	echo form_label('Personal Details', 'pdetails');
	echo "<p>";
	
	$attrib2 = array( 'name' => 'pgdetails',
					  'id' => 'pgdetails',
					  'value' => 'pgdetails'
					  );
	echo form_checkbox($attrib2);
	echo form_label('Parent/Guardian Details', 'pgdetails');
	echo "<p>";
	
	echo form_submit('submit', 'Go!');
	
	echo form_close();
	

?>


</div>	
</section>