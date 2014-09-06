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
	
	echo heading('Student Details', 3);
	
	$output = $this->session->userdata('sess');
	echo $output['f_name']." ";
	echo $output['m_name']." ";
	echo $output['l_name']."<p>";
	
	echo "Admission Number ".$output['adm']."<p>";
	
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
				
			echo "Full Names &nbsp&nbsp&nbsp&nbsp <a href=\"".base_url()."admissions/update/basic\">Edit</a><p>";
			echo "<table>";
			echo "<tr><td> First Name</td><td>{$f_name}</td></tr>";
			echo "<tr><td> Middle Name</td><td>{$m_name}</td></tr>";
			echo "<tr><td> Last Name</td><td>{$l_name}</td></tr>";
			echo "</table>";
			
		}
	
	}
	
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
			
			echo "<p><b>Personal Details</b> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <a href=\"".base_url()."admissions/update/personal\"> Edit </a></p>";
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
			
			echo "<p><b>Contact Details</b> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <a href=\"".base_url()."admissions/update/contacts\"> Edit </a></p>";
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
			
			echo "<p><b>Father's Details</b> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <a href=\"".base_url()."admissions/update/fdetails\"> Edit </a></p>";
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
			
			echo "<p><b>Mother's Details</b> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <a href=\"".base_url()."admissions/update/mdetails\"> Edit </a></p>";
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
			
			echo "<p><b>Guardian's Details</b> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <a href=\"".base_url()."admissions/update/gdetails\"> Edit </a></p>";
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
 </section>