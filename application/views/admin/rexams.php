<div id="main">

<h1>Register Examinations</h1>

<?php
echo form_open('admin/rexamsnw');
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
	echo form_label('Enter Examination to Register', 'exam');
	
	$attrib1 = array( 'name' => 'exam',
					  'id' => 'exam',
					  'size' => '20'
					  );
					  
	echo form_input($attrib1);
	echo form_submit('submit', 'Confirm');
	
	echo form_close();
	
	?>

	
	
</div>
	