<section id="content">
	<div id="main">
	<?php
	
		$title = $_SESSION['output']->class.' '.$_SESSION['output']->stream.' '.$_SESSION['output']->subject;
		$exam = $_SESSION['output']->exam.' '.$_SESSION['output']->term.' '.$_SESSION['output']->year;
		
		$array = array( 'class' => 'adm_form');
		echo form_open_multipart('academics/enter', $array)."<header>";
		echo heading('Entering Results into the Database', 3);
		echo heading('Upload the Excel file of the Results', 4);
		echo heading($title, 3);
		echo heading($exam, 3).'</header>';
		
		echo form_hidden('actionf', 'upload');
		echo $error;
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

