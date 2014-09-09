<section id="content">
	<div id="main">
	<?php

		$output = $this->session->userdata('sess');
		$title = $output['class'].' '.$output['streams'].' '.$output['subjects'];
		$exam = $output['exams'].' '.$output['terms'].' '.$output['years'];
		
		$array = array( 'class' => 'adm_form');
		echo form_open_multipart('academics/enter', $array)."<header>";
		echo heading('Entering Results into the Database', 3);
		echo heading('Upload the Excel file of the Results', 4);
		echo heading($title, 3);
		echo heading($exam, 3).'</header>';
		
		echo form_hidden('actionf', 'upload');

		echo form_label('Chooose file to Upload: ', 'userfile').'<span>';

		$attrib1 = array( 'name' => 'userfile',
						  'id' => 'userfile',
						  'size' => '20'
						  );
		echo form_upload($attrib1).'</span>';
		echo form_label().'<span>';
		echo form_submit('submit', 'Upload').'</span>';
		echo form_close();

	?>

	</div>
</section>