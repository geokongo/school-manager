<div id="main">


<h1>Register Subjects</h1>

<?php
echo form_open('admin/rsubjectsnw');
?>
	<label for="register"> Select Class</label>
	<select name="class" id="register">
		<?php
		//get classes 
		
		
			foreach($classes as $rows) {
				
				$class = $rows->CLASS;
				echo "<option value=\"".$class."\">".$class."</option>";
				}
			
		?>
	</select><p>
	
	<?php 
	echo form_label('Enter a Subject to Register', 'subject');
	
	$attrib1 = array( 'name' => 'subject',
					  'id' => 'subject',
					  'size' => '10'
					  );
	echo form_input($attrib1);
	echo form_submit('submit', 'Confirm');
	echo form_close();
	?>


	
</div>
	