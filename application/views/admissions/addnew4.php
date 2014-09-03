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
	
	
	echo heading('Admission', 2);
	echo heading('Step 4- Upload a Passport Photo', 3);
	
	$output = $this->session->userdata('sess');
	echo "<h4>You Admission Number is\t".$output['adm']."<p></h4>";
	
	echo form_open('admissions/addnew');
	echo form_hidden('actionflag', 'step4');

	echo form_upload();
	echo "<p>";
	echo form_submit('submit', 'Upload', 'id="step4"');
	echo form_close();
	
	
?>

</div>
</section>