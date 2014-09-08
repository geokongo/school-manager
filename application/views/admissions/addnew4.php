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
	
	$array = array( 'id' => 'step4',
					'class' => 'adm_form');
	echo form_open('admissions/addnew', $array).'<header>';
	
	echo '<p>Admission<br />';
	echo "You Admission Number is\t".$output['adm']."<br />";
	echo 'Step 4- Upload a Passport Photo</p></header>';
	
	echo form_hidden('actionflag', 'step4');
	echo form_label().'<span>';
	echo form_upload().'</span>';
	echo form_label().'<span>';
	echo form_submit('submit', 'Upload', 'class="button"').'</span>';
	echo form_close();
	
	
?>

</div>
</section>