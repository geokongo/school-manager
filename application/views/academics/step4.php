<div id="main">

<?php

echo "<img src=\"".base_url()."images/enter_ex.png\" /><p>";
echo "<img src=\"".base_url()."images/underline.jpg\" />";

echo heading('Entering Results into the Database', 2);
echo heading('Step 4', 2);
echo "<p>You have chosen to enter {$this->session->userdata('subjects')} results for {$this->session->userdata('class')} {$this->session->userdata('streams')}</p>";
echo "<p>Choose the Examination for which you want to enter results below then click next to proceed. </p>";

echo form_open('academics/enter');
echo form_hidden('actionf', 'step4');
echo form_label('Select Stream', 'step4');

?>

	<select name="exam" id="step4">
		<?php
		//get examinations
			
		if($exams->num_rows() > 0)
		{
			foreach($exams->result() as $row)
			{
				echo "<option value=\"{$row->EXAM}\">{$row->EXAM}</option>";
			
			}
		
		}
		
		?>
	
	</select><p>
	<?php
	echo "<a href=\"step3.php\">Back</a>";
	echo form_submit('submit', 'Next');
	echo "</p>";
	echo form_close();
	
	
	
?>

</div>