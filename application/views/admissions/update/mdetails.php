
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
	
	$array = array('id' => 'mdetails_up');
	echo form_open('admissions/update/mdetails_up', $array).'<p><p>';
	
	echo '<div id="adm_table">';
		echo '<table class="adm_table">';
			echo '<tr>';
			echo '<td colspan="42">';
			echo '<p>Update Records<br />';
			echo $output['f_name']." ";
			echo $output['m_name']." ";
			echo $output['l_name'].'<br />';
			echo 'Admission Number '.$output['adm'].'<br />'; 
			echo 'Edit Mother\'s Contact Details</p>';
			
			echo form_hidden('actionflag', 'mdetails_up');
			echo '</td></tr>';

	
			if(isset($mdetails))
			{
				if($mdetails->num_rows() > 0)
				{
					foreach($mdetails->result() as $row)
					{
						$f_name = $row->f_name;
						$l_name = $row->l_name;
						$paddress = $row->PADDRESS;
						$pcode = $row->PCODE;
						$phone = $row->PHONE;
						$email = $row->EMAIL;
					
					}
					
					echo "<tr><td>First Name</td><td>{$f_name}</td><td>Enter New Value</td><td>";
					
					$attrib1 = array( 'name' => 'f_name',
									  'id' => 'f_name',
									  'size' => '20'
									  );
					echo form_input($attrib1)."</td></tr>";
					
					echo "<tr><td>Last Name</td><td>{$l_name}</td><td>Enter New Value</td><td>";
					
					$attrib2 = array( 'name' => 'l_name',
									  'id' => 'l_name',
									  'size' => '20'
									  );
					echo form_input($attrib2)."</td></tr>";
					
					echo "<tr><td>Postal Address</td><td>{$paddress}</td><td>Enter New Value</td><td>";
					
					$attrib3 = array( 'name' => 'paddress',
									  'id' => 'paddress',
									  'size' => '20'
									);
					echo form_input($attrib3)."</td></tr>";
					
					echo "<tr><td>Postal Code</td><td>{$pcode}</td><td>Enter New Value</td><td>";
					
					$attrib4 = array( 'name' => 'pcode',
									  'id' => 'pcode',
									  'size' => '20'
									  );
					echo form_input($attrib4)."</td></tr>";
					
					echo "<tr><td>Phone</td><td>{$phone}</td><td>Enter New Value</td><td>";
					
					$attrib5 = array( 'name' => 'phone',
									  'id' => 'phone',
									  'size' => '20'
									  );
					echo form_input($attrib5)."</td></tr>";
					
					echo "<tr><td>Email</td><td>{$email}</td><td>Enter New Value</td><td>";
					
					$attrib6 = array( 'name' => 'email',
									  'id' => 'email',
									  'size' => '20'
									  );
					echo form_input($attrib6)."</td></tr>";
					
					echo '<tr><td colspan="42">';
					echo form_submit( 'submit', 'Update').'</td></tr>';
					
					echo form_close();
					
				}
				
			}
				
		echo '</table>';
		
	echo '<div>';
	
?>


</div>
</section>