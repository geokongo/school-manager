<section id="content">
	<div id="main">

	<?php
		
		
		$title = $_SESSION['output']->class;
		
		$array = array( 'class' => 'adm_form');
		
		echo form_open('academics/enter', $array)."<header>";
		echo heading('Entering Results into the Database', 3);
		echo heading('Step 2', 4);
		echo heading($title, 3).'</header>';
		
		echo form_hidden('actionf', 'step2');

		echo form_label('Select Stream: ', 'step2').'<span>';

	?>
		<select name="stream" id="step2">
			<?php
			//get classes
				
			if($streams->num_rows() > 0)
			{
				foreach($streams->result() as $row)
				{
					echo "<option value=\"{$row->STREAMS}\">{$row->STREAMS}</option>";
				
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
	