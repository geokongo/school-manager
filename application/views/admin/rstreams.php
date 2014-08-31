<div id="main">


<h1> Register Streams</h1>


<?php
echo form_open('admin/rstreamsnw');
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
	echo form_label('Enter Stream to Register', 'stream');
	
	$attrib1 = array('name' => 'stream',
					 'id' => 'stream',
					 'size' => '10'
					 );
	
	echo form_input($attrib1);
	echo "<p>";
	echo form_submit('submit', 'Confirm');
	

	echo form_close();
?>
	

	
</div>