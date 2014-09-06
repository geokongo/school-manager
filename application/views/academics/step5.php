<section id="content">
	<div id="main">

	<?php

		$output = $this->session->userdata('sess');
		$title = $output['class'].' '.$output['streams'].' '.$output['subjects'];
		$exam = $output['exams'];
		
		$array = array( 'class' => 'adm_form');
		echo form_open('academics/enter', $array)."<header>";
		echo heading('Entering Results into the Database', 3);
		echo heading('Step 5', 4);
		echo heading($title, 3);
		echo heading($exam, 3).'</header>';
		
		echo form_hidden('actionf', 'step5');

		echo form_label('Select Term: ', 'step5').'<span>';
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
		
	</select></span>
	<?php
	echo form_label().'<span>';
	echo form_submit('submit', 'Next').'</span>';
	echo form_close();
	
	?>

	</div>
</section>
	