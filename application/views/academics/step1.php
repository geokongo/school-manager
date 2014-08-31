<div id="main">

<?php

echo "<img src=\"".base_url()."images/enter_ex.png\" /><p>";
echo "<img src=\"".base_url()."images/underline.jpg\" />";
	
echo heading('Entering Results into the Database', 2);
echo heading('Step 1', 2);
echo "<p>Choose the Class for which you want to enter results below then click next to proceed. </p>";

echo form_open('academics/enter');
echo form_hidden('actionf', 'step1');
echo form_label('Select Class', 'step1');
?>
	<select name="class" id="step1">
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
	<?php 
	echo "<a href=\"#\">Back</a>";
	
	echo form_submit('submit', 'Next');
	echo "</p>";
	echo form_close();


	
?>

</div>
