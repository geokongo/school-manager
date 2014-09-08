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
	
	$array = array( 'id' => 'step6',
					'class' => 'adm_form');
	echo form_open('admissions/addnew', $array).'<header>';
	
	echo '<p>Admission<br />';
	echo "You Admission Number is\t".$output['adm']."<br />";
	echo 'Step 6- Mother\'s details</p></header>';
	
	echo form_hidden('actionflag', 'step6');

	echo form_label('First Name:', 'f_name').'<span>';
	
	$attrib1 = array( 'name' => 'f_name',
					  'id' => 'f_name',
					  'size' => '20'
					  );
	echo form_input($attrib1).'</span>';
	echo form_label('Last Name:', 'l_name').'<span>';
	
	$attrib2 = array( 'name' => 'l_name',
					  'id' => 'l_name',
					  'size' => '20'
					  );
	echo form_input($attrib2).'</span>';
	echo form_label('Postal Address:', 'paddress').'<span>';
	
	$attrib3 = array( 'name' => 'paddress',
					  'id' => 'paddress',
					  'size' => '20'
					);
	echo form_input($attrib3).'</span>';
	echo form_label('Postal Code:', 'pcode').'<span>';
	
	$attrib4 = array( 'name' => 'pcode',
					  'id' => 'pcode',
					  'size' => '20'
					  );
	echo form_input($attrib4).'</span>';
	echo form_label('Phone Number:', 'phone').'<span>';
	
	$attrib5 = array( 'name' => 'phone',
					  'id' => 'phone',
					  'size' => '20'
					  );
	echo form_input($attrib5).'</span>';
	echo form_label('Email Address', 'email').'<span>';
	
	$attrib6 = array( 'name' => 'email',
					  'id' => 'email',
					  'size' => '20'
					  );
	echo form_input($attrib6).'</span>';
	echo form_label().'<span>';
	echo form_submit( 'submit', 'Save and Proceed', 'class="button"').'</span>';
	
	echo form_close();
	
?>

</div>
</section>