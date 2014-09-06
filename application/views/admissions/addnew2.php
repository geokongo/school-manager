<section id="content">

	<?php
		if(isset($error))
		{
			echo "<div id=\"error\" style=\" display: block; \">{$error}</div>";

		}
		
		if(isset($success))
		{
			echo "<div id=\"success\" style=\" display: block; \">{$success}</div>";
		
		}


	?>

	<div id="main">
		<?php 
			
			echo "<img src=\"".base_url()."images/admission.png\" /><p>";
			echo "<img src=\"".base_url()."images/underline.jpg\" /><p>";
			
			$output = $this->session->userdata('sess');
			
			
			$array = array( 'id' => 'step2',
							'class' => 'adm_form');
			echo form_open('admissions/addnew', $array)."<header>";
			
			echo '<p>Admission<br />';
			echo "You Admission Number is\t".$output['adm']."<br />";
			echo 'Step 2- Personal Details</p></header>';
			
			echo form_hidden('actionflag', 'step2');

			
			echo form_label('Date of Birth:', 'datepicker').'<span>';
			$attrib1 = array( 'name' => 'dob',
							  'id' => 'datepicker',
							  'size' => '20'
							  );
							  
			echo form_input($attrib1).'</span>';
			echo form_label('Place of Birth:', 'pob').'<span>';
			
			$attrib2 = array( 'name' => 'pob',
							  'id' => 'pob',
							  'size' => '20'
							  );
			
			echo form_input($attrib2).'</span>';
			echo form_label('Date of Admission:', 'doa').'<span>';
							  
			?>
			
			<input type="text" id="doa" name="doa" size="30" value="<?php $formats = array('l, F jS, Y'); foreach($formats as $format) echo "" . date($format) . "\n";?>" required /></span>
			
			
			<?php
			echo form_label('Class at Admission:', 'caa').'<span>';
			
			?>

				
			<select name="caa" id="caa">
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
			
			<div id="streams" style=" display: inline; ">
			
			<?php
			echo form_label('Streams: ', 'stream').'<span>';
			?>
			
			<select name="stream" id="stream">
				<?php
				//get streams
					
				if($streams->num_rows() > 0)
				{
					foreach($streams->result() as $row)
					{
						echo "<option value=\"{$row->STREAMS}\">{$row->STREAMS}</option>";
					
					}
				
				}
				
				?>
			</select></span>
			
			</div>
			
			<?php
			
			echo form_label('County:', 'county').'<span>';
			
			$attrib5 = array( 'name' => 'county',
							  'id' => 'county',
							  'size' => '20'
							  );
			
			echo form_input($attrib5).'</span>';
			echo form_label('Gender:', 'gender').'<span>';
			
			$attrib6 = array( 'name' => 'gender',
							  'id' => 'gender',
							  'size' => '20'
							  );
			
			echo form_input($attrib6).'</span>';
			echo form_label('Nationality:', 'nationality').'<span>';
			
			$attrib7 = array( 'name' => 'nationality',
							  'id' => 'nationality',
							  'size' => '20'
							  );
			echo form_input($attrib7).'</span>';
			echo form_label().'<span>';
			echo form_submit('submit', 'Save and Proceed', 'class="button"')."</span>";
			
			echo form_close();
			
			
			
		?>


	</div>
</section>