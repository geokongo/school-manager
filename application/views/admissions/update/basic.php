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
	
	echo form_open('admissions/update/basic_up');

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
			
			echo "<table>";
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
			echo "</table>";
			
			echo form_submit('submit', 'Update');
			
		}
	
	}
	
	echo form_close();

	
?>


</div>
</section>
