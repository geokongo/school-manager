<section id="content">
	<div id="main">
	<?php

		$title = $_SESSION['output']->class.' '.$_SESSION['output']->stream.' '.$_SESSION['output']->subject;
		$exam = $_SESSION['output']->exam.' '.$_SESSION['output']->term.' '.$_SESSION['output']->year;
		
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