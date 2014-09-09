<section id="content">
	<div id="main">

	<?php

		$output = $_SESSION['output'];
		$title = $output['class'].' '.$output['streams'].' '.$output['subjects'];
		$exam = $output['exams'].' '.$output['terms'];
		
		$array = array( 'class' => 'adm_form');
		echo form_open('academics/enter', $array)."<header>";
		echo heading('Entering Results into the Database', 3);
		echo heading('Step 6', 4);
		echo heading($title, 3);
		echo heading($exam, 3).'</header>';
		
		echo form_hidden('actionf', 'create_table');

		echo form_label('Select Year: ', 'step6').'<span>';

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
		
	</select></span>
	<?php
	echo form_label().'<span>';
	echo form_submit('submit', 'Next').'</span>';
	
	echo form_close();
	
	?>

	</div>
</section>