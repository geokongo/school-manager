<div id="main">

<?php 

	echo "<img src=\"".base_url()."images/admission.png\" /><p>";
	echo "<img src=\"".base_url()."images/underline.jpg\" /><p>";
	
	echo heading('Student Details', 3);
	
	echo $this->session->userdata('f_name')." ";
	echo $this->session->userdata('m_name')." ";
	echo $this->session->userdata('l_name')."<p>";
	
	echo "Admission Number ".$this->session->userdata('admission')."<p>";
	
	if(isset($personal))
	{
		if($personal->num_rows() > 0)
		{
			foreach($personal->result() as $row)
			{
				$dob = $row->DOB;
				$pob = $row->POB;
				$doa = $row->DOA;
				$coa = $row->COA;
				$county = $row->COUNTY;
				$gender = $row->GENDER;
				$nationality = $row->NATIONALITY;
				
			}
			
			echo "<p><b>Personal Details</b></p>";
			echo "<table>";
			echo "<tr><td>Date of Birth: </td><td>{$dob}</td></tr>";
			echo "<tr><td>Place of Birth: </td><td>{$pob}</td></tr>";
			echo "<tr><td>Date of Admission: </td><td>{$doa}</td></tr>";
			echo "<tr><td>Class of Admission: </td><td>{$coa}</td></tr>";
			echo "<tr><td>County: </td><td>{$county}</td></tr>";
			echo "<tr><td>Gender: </td><td>{$gender}</td></tr>";
			echo "<tr><td>Nationality: </td><td>{$nationality}</td></tr>";
			echo "</table>";
		}
	}
	
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
			
			echo "<p><b>Contact Details</b></p>";
			echo "<table>";
			echo "<tr><td>Postal Address: </td><td>{$paddress}</td></tr>";
			echo "<tr><td>Postal Code: </td><td>{$pcode}</td></tr>";
			echo "<tr><td>Town: </td><td>{$town}</td></tr>";
			echo "</table>";
		
		}
	
	}
	
	if(isset($father_details))
	{
		if($father_details->num_rows() > 0)
		{
			foreach($father_details->result() as $row)
			{
				$f_name = $row->f_name;
				$l_name = $row->l_name;
				$paddress = $row->PADDRESS;
				$pcode = $row->PCODE;
				$phone = $row->PHONE;
				$email = $row->EMAIL;
				
			}
			
			echo "<p><b>Father's Details</b></p>";
			echo "<table>";
			echo "<tr><td>First Name: </td><td>{$f_name}</td></tr>";
			echo "<tr><td>Last Name: </td><td>{$l_name}</td></tr>";
			echo "<tr><td>Postal Address: </td><td>{$paddress}</td></tr>";
			echo "<tr><td>Postal Code: </td><td>{$pcode}</td></tr>";
			echo "<tr><td>Phone Number: </td><td>{$phone}</td></tr>";
			echo "<tr><td>Email Address: </td><td>{$email}</td></tr>";
			echo "</table>";
		
		}
	 
	}
	
	if(isset($mother_details))
	{
		if($mother_details->num_rows() > 0)
		{
			foreach($mother_details->result() as $row)
			{
				$f_name = $row->f_name;
				$l_name = $row->l_name;
				$paddress = $row->PADDRESS;
				$pcode = $row->PCODE;
				$phone = $row->PHONE;
				$email = $row->EMAIL;
				
			}
			
			echo "<p><b>Mother's Details</b></p>";
			echo "<table>";
			echo "<tr><td>First Name: </td><td>{$f_name}</td></tr>";
			echo "<tr><td>Last Name: </td><td>{$l_name}</td></tr>";
			echo "<tr><td>Postal Address: </td><td>{$paddress}</td></tr>";
			echo "<tr><td>Postal Code: </td><td>{$pcode}</td></tr>";
			echo "<tr><td>Phone Number: </td><td>{$phone}</td></tr>";
			echo "<tr><td>Email Address: </td><td>{$email}</td></tr>";
			echo "</table>";
		
		}
	 
	}
	
	if(isset($guardian_details))
	{
		if($guardian_details->num_rows() > 0)
		{
			foreach($guardian_details->result() as $row)
			{
				$f_name = $row->f_name;
				$l_name = $row->l_name;
				$paddress = $row->PADDRESS;
				$pcode = $row->PCODE;
				$phone = $row->PHONE;
				$email = $row->EMAIL;
				
			}
			
			echo "<p><b>Guardian's Details</b></p>";
			echo "<table>";
			echo "<tr><td>First Name: </td><td>{$f_name}</td></tr>";
			echo "<tr><td>Last Name: </td><td>{$l_name}</td></tr>";
			echo "<tr><td>Postal Address: </td><td>{$paddress}</td></tr>";
			echo "<tr><td>Postal Code: </td><td>{$pcode}</td></tr>";
			echo "<tr><td>Phone Number: </td><td>{$phone}</td></tr>";
			echo "<tr><td>Email Address: </td><td>{$email}</td></tr>";
			echo "</table>";
		
		}
	 
	}
 

 ?>
 
 
 </div>