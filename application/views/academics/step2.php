<div id="main">

<?php

echo "<img src=\"".base_url()."images/enter_ex.png\" /><p>";
echo "<img src=\"".base_url()."images/underline.jpg\" />";

echo heading('Entering Results into the Database', 2);
echo heading('Step 2', 2);
echo "You have chosen to enter results for {$this->session->userdata('class')}<p>";
echo "Choose the Stream for which you want to enter results below then click next to proceed.<p>";

echo form_open('academics/enter');
echo form_hidden('actionf', 'step2');
echo form_label('Select Stream', 'step2');

?>
	<select name="stream" id="step2">
		<?php
		//get classes
			
		if($streams->num_rows() > 0)
		{
			foreach($streams->result() as $row)
			{
				echo "<option value=\"{$row->STREAMS}\">{$row->STREAMS}</option>";
			
			}
		
		}
		
		?>
	</select><p>
	<?php
	echo "<a href=\"step1.php\">Back</a>";
	echo form_submit('submit', 'Next');
	echo "</p>";
	echo form_close();
	
	
?>

</div>
	