<div id="main">

<?php

echo "<img src=\"".base_url()."images/enter_ex.png\" /><p>";
echo "<img src=\"".base_url()."images/underline.jpg\" />";

echo heading('Entering Results into the Database', 2);
echo heading('Step 3', 2);
echo "<p>You have chosen to enter results for {$this->session->userdata('class')} {$this->session->userdata('streams')}";
echo "<p>Choose the Subject for which you want to enter results below then click next to proceed. </p>";

echo form_open('academics/enter');
echo form_hidden('actionf', 'step3');
echo form_label('Select Subject', 'step3');

?>

	<select name="subject" id="step3">
		<?php
		//get subjects
			
		if($subjects->num_rows() > 0)
		{
			foreach($subjects->result() as $row)
			{
				echo "<option value=\"{$row->SUBJECTS}\">{$row->SUBJECTS}</option>";
			
			}
		
		}
		
		?>
		
	</select><p>
	<?php
	echo "<a href=\"step2.php\">Back</a>";
	echo form_submit('submit', 'Next');
	echo "</p>";
	
	echo form_close();
	
	
?>

</div>
	