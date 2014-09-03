<section id="content">

<?php
	if(isset($error))
	{
		echo "<div id=\"error\" style=\" display: block; \">Error. Please try again.</div>";

	}
	
	if(isset($success))
	{
		echo "<div id=\"success\" style=\" display: block; \">Success. You entered the basic details successfully.</div>";
	
	}


?>

<div id="main">
<?php 
	
	echo "<img src=\"".base_url()."images/admission.png\" /><p>";
	echo "<img src=\"".base_url()."images/underline.jpg\" /><p>";
	
	echo heading('Admission', 2);
	echo heading('Step 2- Personal Details', 3);
	
	$output = $this->session->userdata('sess');
	
	echo "<h4>You Admission Number is\t".$output['adm']."<p></h4>";
	
	echo form_open('admissions/addnew');
	echo form_hidden('actionflag', 'step2');

	
	echo form_label('Date of Birth:', 'datepicker');
	$attrib1 = array( 'name' => 'dob',
					  'id' => 'datepicker',
					  'size' => '20'
					  );
					  
	echo form_input($attrib1);
	
	
	
	//echo $this->calendar->generate();
	
	
	echo "<p>";
	echo form_label('Place of Birth:', 'pob');
	
	$attrib2 = array( 'name' => 'pob',
					  'id' => 'pob',
					  'size' => '20'
					  );
	
	echo form_input($attrib2);
	echo "<p>";
	echo form_label('Date of Admission:', 'doa');
	
	$attrib3 = array( 'name' => 'doa',
					  'id' => 'doa',
					  'size' => '20'
					  );
					  
	?>
	
	<input type="text" id="doa" name="doa" size="30" value="<?php $formats = array('l, F jS, Y'); foreach($formats as $format) echo "" . date($format) . "\n";?>" required /><p>
	
	
	<?php
	echo form_label('Class at Admission:', 'caa');
	
	?>

		
	<select name="caa" id="caa">
		<?php
		//get classes
			
		if($classes->num_rows() > 0)
		{
			foreach($classes->result() as $row)
			{
				echo "<option value=\"{$row->CLASS}\">{$row->CLASS}</option>";
			
			}
		
		}
		
		?>
	</select><p>
	
	<div id="streams">
	
	<?php
	echo form_label('Streams', 'stream');
	?>
	
	<select name="stream" id="stream">
		<?php
		//get streams
			
		if($streams->num_rows() > 0)
		{
			foreach($streams->result() as $row)
			{
				echo "<option value=\"{$row->STREAMS}\">{$row->STREAMS}</option>";
			
			}
		
		}
		
		?>
	</select><p>
	
	</div>
	
	<?php
	
	echo form_label('County:', 'county');
	
	$attrib5 = array( 'name' => 'county',
					  'id' => 'county',
					  'size' => '20'
					  );
	
	echo form_input($attrib5);
	echo "<p>";
	echo form_label('Gender:', 'gender');
	
	$attrib6 = array( 'name' => 'gender',
					  'id' => 'gender',
					  'size' => '20'
					  );
	
	echo form_input($attrib6);
	echo "<p>";
	echo form_label('Nationality:', 'nationality');
	
	$attrib7 = array( 'name' => 'nationality',
					  'id' => 'nationality',
					  'size' => '20'
					  );
	echo form_input($attrib7);
	echo "<p>";
	
	echo form_submit('submit', 'Save and Proceed', 'id=step2');
	
	echo form_close();
	
	
	
?>


</div>
</section>