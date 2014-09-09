<section id="content">
	<div id="main">

	<?php

		$output = $_SESSION['output'];
		$title = $output['class'].' '.$output['streams'].' '.$output['subjects'];
		
		$array = array( 'class' => 'adm_form');
		echo form_open('academics/enter', $array)."<header>";
		echo heading('Entering Results into the Database', 3);
		echo heading('Step 4', 4);
		echo heading($title, 3).'</header>';
		
		echo form_hidden('actionf', 'step4');

		echo form_label('Select Exam: ', 'step4').'<span>';

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
		
		</select></span>
		<?php
		echo form_label().'<span>';
		echo form_submit('submit', 'Next').'</span>';
		echo form_close();
		
	?>

	</div>
</section>