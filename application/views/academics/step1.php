<section id="content">
	<div id="main">

		<?php
		$array = array( 'class' => 'adm_form');
		echo form_open('academics/enter', $array)."<header>";
		echo heading('Entering Results into the Database', 3);
		echo heading('Step 1', 4)."</header>";
		
		echo form_hidden('actionf', 'step1');

		echo form_label('Select Class: ', 'step1').'<span>';
		?>
		<select name="class" id="step1">
			<?php
			//get classes
				
			if($classes->num_rows() > 0)
			{
				foreach($classes->result() as $row)
				{
					echo "<option value=\"{$row->CLASS}\">{$row->CLASS}</option>";
				
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
</section id="content">
