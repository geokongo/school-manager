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
	
	$output = $this->session->userdata('sess');
	$array = array( 'id' => 'basic_up');
	echo form_open('admissions/update/basic_up', $array).'<p><p>';
	
	echo '<div id="adm_table">';
		echo '<table class="adm_table">';
			echo '<tr>';
			echo '<td colspan="42">';
			echo '<p>Update Records<br />';
			echo $output['f_name']." ";
			echo $output['m_name']." ";
			echo $output['l_name'].'<br />';
			echo 'Admission Number '.$output['adm'].'</p>'; 
			echo 'Edit Basic Details</p>';
			
			echo form_hidden('actionflag', 'basic_up');
			
			echo '</td>';
			echo '</tr>';
			
			if(isset($basic))
			{
				if($basic->num_rows() > 0)
				{
					foreach($basic->result() as $row)
					{
						$f_name = $row->f_name;
						$m_name = $row->m_name;
						$l_name = $row->l_name;
					
					}
					
					echo "<tr><td> First Name</td><td>{$f_name}</td><td>Enter New Value</td><td>";
					
					$attrib1 = array( 'name' => 'f_name',
								  'id' => 'f_name',
								  'size' => '20'
								  );
					echo form_input($attrib1)."</td></tr>";
					
					echo "<tr><td> Middle Name</td><td>{$m_name}</td><td>Enter New Value</td><td>";
					
					$attrib2 = array( 'name' => 'm_name',
								  'id' => 'm_name',
								  'size' => '20'
								  );
					echo form_input($attrib2)."</td></tr>";
					
					echo "<tr><td> Last Name</td><td>{$l_name}</td><td>Enter New Value</td><td>";
					
					$attrib3 = array( 'name' => 'l_name',
								  'id' => 'l_name',
								  'size' => '20'
								  );
					echo form_input($attrib3)."</td></tr>";
					echo '<tr><td colspan="42">';
					
					echo form_submit('submit', 'Update');
					echo '</td></tr>';
				}
			
			}
		echo '</table>';
	
	echo '</div>';
	
	echo form_close();

	
?>


</div>
</section>
