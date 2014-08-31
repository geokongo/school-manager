<div id="main">

<?php

echo "<img src=\"".base_url()."images/enter_ex.png\" /><p>";
echo "<img src=\"".base_url()."images/underline.jpg\" />";;

echo heading($this->session->userdata('exams'), 2);
echo heading('Entering Results into the Database', 2);
echo heading('Step 5', 2);
echo "<p>You have chosen to enter {$this->session->userdata('subjects')} results for {$this->session->userdata('class')} {$this->session->userdata('streams')}";
echo "<p>Choose the Term for which you want to enter results below then click next to proceed. </p>";

echo form_open('academics/enter');
echo form_hidden('actionf', 'step5');
echo form_label('Select Term', 'step5');

?>

	<select name="term" id="step5">
		<?php
		//get terms
			
		if($terms->num_rows() > 0)
		{
			foreach($terms->result() as $row)
			{
				echo "<option value=\"{$row->TERM}\">{$row->TERM}</option>";
			
			}
		
		}
		?>
		
	</select><p>
	<?php
	echo "<a href=\"step4.php\">Back</a>";
	echo form_submit('submit', 'Next');
	echo "</p>";
	echo form_close();
	
	
?>

</div>
	