<section id="content">

<?php
	if(isset($error))
	{
		echo "<div id=\"error\" style=\" display: block; \">{$error}div>";

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
	
	
	
	$output = $this->session->userdata('sess');
	
	
	$array = array( 'id' => 'step3',
					'class' => 'adm_form');
	echo form_open('admissions/addnew', $array).'<header>';
	
	echo '<p>Admission<br />';
	echo 'Step 3- Contact Details<br />';
	echo 'You Admission Number is '.$output['adm'].'<p></header>';
	
	echo form_hidden('actionflag', 'step3');

	echo form_label('Postal Address:', 'pa').'<span>';
	
	$attrib1 = array( 'name' => 'pa',
					  'id' => 'pa', 
					  'size' => '20'
					  );
	
	echo form_input($attrib1);
	echo "</span>";
	echo form_label('Postal Code:', 'pc').'<span>';
	
	$attrib2 = array( 'name' => 'pc',
					  'id' => 'pc',
					  'size' => '20'
					  );
					  
	echo form_input($attrib2);
	echo "</span>";
	echo form_label('Town', 'town').'<span>';
	
	$attrib3 = array( 'name' => 'town',
					  'id' => 'town',
					  'size' => '20'
					  );
					  
	echo form_input($attrib3);
	echo "</span>";
	echo form_label().'<span>';
	echo form_submit( 'submit' , 'Save and Proceed', 'class="button"').'</span>';
	
	echo form_close();
	
	
?>

</div>
</section>