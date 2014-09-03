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
	
	echo $this->session->userdata('f_name')." ";
	echo $this->session->userdata('m_name')." ";
	echo $this->session->userdata('l_name')."<p>";
	
	echo "Admission Number ".$this->session->userdata('admission')."<p>";
	
	echo "Select the Details to View.<p>";
	
	$array = array( 'id' => 'view2' );
	echo form_open('admissions/view', $array);
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