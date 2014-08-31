<div id="main">

<?php
echo "<img src=\"".base_url()."images/enter_ex.png\" /><p>";
echo "<img src=\"".base_url()."images/underline.jpg\" />";

echo "<h2> {$this->session->userdata('exams')} {$this->session->userdata('terms')}</h2>";
echo heading('Entering Results into the Database', 2);
echo heading('Step 6', 2);
echo "<p>You have chosen to enter {$this->session->userdata('subjects')} results for {$this->session->userdata('class')} {$this->session->userdata('streams')}";
echo "<p>Choose the Year for which you want to enter results below then click next to proceed. </p>";

echo form_open('academics/enter');
echo form_hidden('actionf', 'create_table');
echo form_label('Select Year', 'step6');

?>

	<select name="year" id="step6">
		<?php
		//get years
			
		if($years->num_rows() > 0)
		{
			foreach($years->result() as $row)
			{
				echo "<option value=\"{$row->YEAR}\">{$row->YEAR}</option>";
			
			}
		
		}
		?>
		
	</select><p>
	<?php
	echo "<a href=\"step5.php\">Back</a>";
	echo form_submit('submit', 'Next');
	echo "</p>";
	
	echo form_close();
	
	
	
?>

</div>