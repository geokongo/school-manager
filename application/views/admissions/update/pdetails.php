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
	
	$array = array('id' => 'personal_up');
	echo form_open('admissions/update/personal_up', $array).'<p><p>';
	
	echo '<div id="adm_table">';
		echo '<table class="adm_table">';
			echo '<tr>';
			echo '<td colspan="42">';
			echo '<p>Update Records<br />';
			echo $output['f_name']." ";
			echo $output['m_name']." ";
			echo $output['l_name'].'<br />';
			echo 'Admission Number '.$output['adm'].'<br />'; 
			echo 'Edit Personal Details</p>';
			
			echo form_hidden('actionflag', 'personal_up');
			echo '</td></tr>';

			foreach($personal->result() as $row)
			{
				echo "<tr><td>Date of Birth</td><td> {$row->DOB}</td><td>Enter New Value</td><td>";
				$attrib1 = array( 'name' => 'dob',
								  'id' => 'datepicker',
								  'size' => '20'
								  );
								  
				echo form_input($attrib1)."</td></tr>";
				
				echo "<tr>";
				echo "<td>Place of Birth</td><td> {$row->POB}</td><td>Enter New Value</td><td>";
				
				$attrib2 = array( 'name' => 'pob',
								  'id' => 'pob',
								  'size' => '20'
								  );
				
				echo form_input($attrib2)."</td></tr>";
				
				echo "<tr>";
				echo "<td>Date of Admission</td><td> {$row->DOA} </td><td>Enter New Value</td><td>";
				
				$attrib3 = array( 'name' => 'doa',
								  'id' => 'doa',
								  'size' => '20'
								  );
								  
				?>
				
				<input type="text" id="doa" name="doa" size="30" value="<?php $formats = array('l, F jS, Y'); foreach($formats as $format) echo "" . date($format) . "\n";?>" required /><p>
				</td></tr>
				<?php
				
				echo "<tr>";
				echo "<td>Class at Admission</td><td> {$row->COA} </td><td>Enter New Value</td><td>";
				
				$attrib4 = array( 'name' => 'coa',
								  'id' => 'coa',
								  'size' => '20'
								  );
								  
				echo form_input($attrib4)."</td></tr>";
				
				echo "<tr>";
				echo "<td>County</td><td> {$row->COUNTY} </td><td>Enter New Value</td><td>";
				
				$attrib5 = array( 'name' => 'county',
								  'id' => 'county',
								  'size' => '20'
								  );
				
				echo form_input($attrib5)."</td></tr>";
				
				echo "<tr>";
				echo "<td>Gender</td><td> {$row->GENDER}</td><td>Enter New Value</td><td>";
				
				$attrib6 = array( 'name' => 'gender',
								  'id' => 'gender',
								  'size' => '20'
								  );
				
				echo form_input($attrib6)."</td></tr>";
				
				echo "<tr>";
				echo "<td>Nationality</td><td> {$row->NATIONALITY}</td><td>Enter New Value</td><td>";
				
				$attrib7 = array( 'name' => 'nationality',
								  'id' => 'nationality',
								  'size' => '20'
								  );
				echo form_input($attrib7)."</td></tr>";
				
				echo '<tr><td colspan="42">';
				echo form_submit('submit', 'Update').'</td></tr>';
				
				echo form_close();
				
			}
		
		echo '</table>';
		
	echo '</div>';
	
	
?>


</div>
</section>