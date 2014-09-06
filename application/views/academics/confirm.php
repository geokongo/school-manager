<section id="content">
	<div id="main">
	<?php

		$output = $this->session->userdata('sess');
		$title = $output['class'].' '.$output['streams'].' '.$output['subjects'];
		$exam = $output['exams'].' '.$output['terms'].' '.$output['year'];
		
		$array = array( 'class' => 'adm_form');
		echo form_open_multipart('academics/enter', $array)."<header>";
		echo heading('Entering Results into the Database', 3);
		echo heading('Confirm to Enter the Submitted Data', 4);
		echo heading($title, 3);
		echo heading($exam, 3).'</header>';
		
		echo form_hidden('actionf', 'insert_records');
		echo form_label().'<span>';

		echo form_submit('submit', 'Confirm').'</span>';
		echo form_close();
	
	?>
	
	</div>
</section>