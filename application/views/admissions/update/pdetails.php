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

?>
	
	<script src="<?php echo base_url(); ?>scripts/jquery-1.7.2.js"></script>
	<script src="<?php echo base_url(); ?>scripts/jquery.ui.datepicker.js"></script>
	<script src="<?php echo base_url(); ?>scripts/jquery.ui.core.js"></script>
	<script src="<?php echo base_url(); ?>scripts/jquery.ui.widget.js"></script>
	
	<script>
	$(function() {
		$( "#datepicker" ).datepicker({
			showOn: "button",
			buttonImage: "<?php echo base_url(); ?>images/calendar.gif",
			buttonImageOnly: true
		});
	});
	</script>
	
	<script type="text/javascript" language="javascript">
	function isNumberKey(evt)
	{
	var charCode=(evt.which)? evt.which:event.keyCode
	if(charCode>31 &&(charCode<48||charCode>57))
	return false;
	return true;
	}
	</script>
	<script language="Javascript" type="text/javascript">
 

  function lettersOnly(evt) {
       evt = (evt) ? evt : event;
       var charCode = (evt.charCode) ? evt.charCode : ((evt.keyCode) ? evt.keyCode :
          ((evt.which) ? evt.which : 0));
       if (charCode > 31 && (charCode < 65 || charCode > 90) &&
          (charCode < 97 || charCode > 122))
          return false;
       
       return true;
     }
    </script>

<?php
	
	echo "<img src=\"".base_url()."images/admission.png\" /><p>";
	echo "<img src=\"".base_url()."images/underline.jpg\" /><p>";
	
	
	echo heading('Admission', 2);
	echo heading('Edit Personal Details', 3);
	
	echo $this->session->userdata('f_name')." ";
	echo $this->session->userdata('m_name')." ";
	echo $this->session->userdata('l_name')."<p>";
	
	echo "Admission Number ".$this->session->userdata('admission')."<p>";
	
	echo form_open('admissions/update/personal_up');

	foreach($personal->result() as $row)
	{
		echo "<table>";
		
		echo "<tr>";
		echo "<td>Date of Birth</td><td> {$row->DOB}</td><td>Enter New Value</td><td>";
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
		
		echo "</table>";
		
		echo "<p>";
		
		echo form_submit('submit', 'Update');
		
		echo form_close();
		
	}
	
	
	
?>


</div>
</section>