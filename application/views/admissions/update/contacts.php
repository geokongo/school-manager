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
	
	
	echo heading('Admission', 2);
	echo heading('Edit Student Details', 3);
	
	echo $this->session->userdata('f_name')." ";
	echo $this->session->userdata('m_name')." ";
	echo $this->session->userdata('l_name')."<p>";
	
	echo "Admission Number ".$this->session->userdata('admission')."<p>";
	
	echo form_open('admissions/update/contacts_up');

	if(isset($contacts))
	{
		if($contacts->num_rows() > 0)
		{
			foreach($contacts->result() as $row)
			{
				$paddress = $row->PADDRESS;
				$pcode = $row->PCODE;
				$town = $row->TOWN;
			
			}
			
			echo "<table>";
			echo "<tr><td> Postal Address</td><td>{$paddress}</td><td>Enter New Value</td><td>";
			
			$attrib1 = array( 'name' => 'paddress',
						  'id' => 'paddress',
						  'size' => '20'
						  );
			echo form_input($attrib1)."</td></tr>";
			
			echo "<tr><td> Postal Code</td><td>{$pcode}</td><td>Enter New Value</td><td>";
			
			$attrib2 = array( 'name' => 'pcode',
						  'id' => 'pcode',
						  'size' => '20'
						  );
			echo form_input($attrib2)."</td></tr>";
			
			echo "<tr><td> Town</td><td>{$town}</td><td>Enter New Value</td><td>";
			
			$attrib3 = array( 'name' => 'town',
						  'id' => 'town',
						  'size' => '20'
						  );
			echo form_input($attrib3)."</td></tr>";
			echo "</table>";
			
			echo form_submit('submit', 'Update');
			
		}
	
	}
	
	echo form_close();
	
	
	
?>


</div>
</section>
