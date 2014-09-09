<section id="content">
	<div id="main">

	<?php

		$output = $this->session->userdata('sess');
		$title = $_SESSION['output']['class'].$_SESSION['output']['stream'];
		
		$array = array( 'class' => 'adm_form');
		echo form_open('academics/enter', $array)."<header>";
		echo heading('Entering Results into the Database', 3);
		echo heading('Step 3', 4);
		echo heading($title, 3).'</header>';
		
		echo form_hidden('actionf', 'step3');

		echo form_label('Select Subject: ', 'step3').'<span>';

	?>

		<select name="subject" id="step3">
			<?php
			//get subjects
				
			if($subjects->num_rows() > 0)
			{
				foreach($subjects->result() as $row)
				{
					echo "<option value=\"{$row->SUBJECTS}\">{$row->SUBJECTS}</option>";
				
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
	