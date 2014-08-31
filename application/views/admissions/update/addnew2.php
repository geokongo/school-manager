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
	echo heading('Step 2- Personal Details', 3);
	
	echo "<h4>You Admission Number is\t".$this->session->userdata('admission')."<p></h4>";
	
	echo form_open('admissions/addnew');
	echo form_hidden('actionflag', 'step2');

	
	echo form_label('Date of Birth:', 'datepicker');
	$attrib1 = array( 'name' => 'dob',
					  'id' => 'datepicker',
					  'size' => '20'
					  );
					  
	echo form_input($attrib1);
	
	
	
	//echo $this->calendar->generate();
	
	
	echo "<p>";
	echo form_label('Place of Birth:', 'pob');
	
	$attrib2 = array( 'name' => 'pob',
					  'id' => 'pob',
					  'size' => '20'
					  );
	
	echo form_input($attrib2);
	echo "<p>";
	echo form_label('Date of Admission:', 'doa');
	
	$attrib3 = array( 'name' => 'doa',
					  'id' => 'doa',
					  'size' => '20'
					  );
					  
	?>
	
	<input type="text" id="doa" name="doa" size="30" value="<?php $formats = array('l, F jS, Y'); foreach($formats as $format) echo "" . date($format) . "\n";?>" required /><p>
	
	<?php
	
	/*
	$this->load->helper('date');
	$datestring = "Year: %Y Month: %m Day: %d - %h:%i %a";
	$time = time();

	echo mdate($datestring, $time);
	
	echo "<p>";
	*/
	echo form_label('Class at Admission:', 'caa');
	
	$attrib4 = array( 'name' => 'caa',
					  'ID' => 'caa',
					  'size' => '20'
					  );
					  
	echo form_input($attrib4);
	echo "<p>";
	echo form_label('County:', 'county');
	
	$attrib5 = array( 'name' => 'county',
					  'id' => 'county',
					  'size' => '20'
					  );
	
	echo form_input($attrib5);
	echo "<p>";
	echo form_label('Gender:', 'gender');
	
	$attrib6 = array( 'name' => 'gender',
					  'id' => 'gender',
					  'size' => '20'
					  );
	
	echo form_input($attrib6);
	echo "<p>";
	echo form_label('Nationality:', 'nationality');
	
	$attrib7 = array( 'name' => 'nationality',
					  'id' => 'nationality',
					  'size' => '20'
					  );
	echo form_input($attrib7);
	echo "<p>";
	
	echo form_submit('submit', 'Save and Proceed');
	
	echo form_close();
	
	
?>


</div>