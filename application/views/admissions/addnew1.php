<section id="content">

	<?php
		if(isset($error))
		{
			echo "<div id=\"error\" style=\" display: block; \">{$error}.</div>";

		}
		
		if(isset($success))
		{
			echo "<div id=\"success\" style=\" display: block; \">{$success}</div>";
		
		}


	?>

	<div id="main">
	<?php 
		
		$array = array( 'id' => 'step1',
						'class' => 'adm_form');
		echo form_open('admissions/addnew', $array)."<header>";
		
		echo heading('Admission', 2);
		echo heading('Step 1- Basic Details', 3)."</header>";
		
		
		echo form_hidden('actionflag', 'step1', 'id="actionflag"');
		
		echo form_label('Admission Number:', 'adm')."<span>";
		
		$attrib1 = array( 'name' => 'adm',
						  'id' => 'adm'
						 );
						 
		echo form_input($attrib1);
		echo "</span>";
		echo form_label('First Name:', 'f_name')."<span>";
		
		$attrib2 = array( 'name' => 'f_name',
						  'id' => 'f_name'
						  );
						  
		echo form_input($attrib2);
		echo "</span>";
		echo form_label('Middle Name:', 'm_name')."<span>";
		
		$attrib3 = array( 'name' => 'm_name',
						  'id' => 'm_name',
						  'size' => '20'
						  );
						  
		echo form_input($attrib3);
		echo "</span>";
		echo form_label('Last Name:', 'l_name')."<span>";
		
		$attrib4 = array( 'name' => 'l_name',
						  'id' => 'l_name',
						  'size' => '20'
						  );
						  
		echo form_input($attrib4);
		echo "</span>";
		
		echo form_label()."<span>";
		echo form_submit('submit', 'Save and Proceed', 'class="button"')."</span>";
		echo form_close();

		
		?>
		
	</div>
</section>