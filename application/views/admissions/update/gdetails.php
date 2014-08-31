<div id="main">

<?php 
	
	echo "<img src=\"".base_url()."images/admission.png\" /><p>";
	echo "<img src=\"".base_url()."images/underline.jpg\" /><p>";
	
	
	echo heading('Admission', 2);
	echo heading('Edit Guardian\'s Contact Details', 3);
	
	echo $this->session->userdata('f_name')." ";
	echo $this->session->userdata('m_name')." ";
	echo $this->session->userdata('l_name')."<p>";
	
	echo "Admission Number ".$this->session->userdata('admission')."<p>";
	
	if(isset($gdetails))
	{
		if($gdetails->num_rows() > 0)
		{
			foreach($gdetails->result() as $row)
			{
				$f_name = $row->f_name;
				$l_name = $row->l_name;
				$paddress = $row->PADDRESS;
				$pcode = $row->PCODE;
				$phone = $row->PHONE;
				$email = $row->EMAIL;
			
			}
			
			echo form_open('admissions/update/gdetails_up');
			echo "<table>";
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
			
			echo "</table>";
			echo form_submit( 'submit', 'Update');
			
			echo form_close();
		}
		
	}
?>


</div>