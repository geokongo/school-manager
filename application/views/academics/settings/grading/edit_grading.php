<div id="main">

<?php 

echo "<img src=\"".base_url()."images/settings.png\" /><p>";
echo "<img src=\"".base_url()."images/underline.jpg\" /><p>";

echo "<b>Set {$this->session->userdata('class')} Grading Criteria</b><p>";

echo "Enter the new values and click on submit.<p>";

echo "<table>";
echo "<tr><td>Grade</td><td>Score</td><td>Remarks</td></tr>";
echo "<tr><td> {$grade} </td><td>Current {$from} - {$to} </td><td> Current {$remarks} </td></tr>";
echo "<tr><td> &nbsp </td><td>Enter new Values <br />";

	echo "<form method=\"post\" action=\"".base_url()."academics/settings/id/grading/action/edit/grade/{$grade}\">";
	echo form_label('From', 'from');
	
	$attrib2 = array( 'name' => 'from',
					  'id' => 'from',
					  'size' => '5'
					  );
	echo form_input($attrib2);
	
	echo form_label('To', 'to');
	
	$attrib3 = array( 'name' => 'to',
					  'id' => 'to',
					  'size' => '5'
					  );
	echo form_input($attrib3);
	
echo "</td><td> Enter new Remarks <br />";
	
	$attrib4 = array( 'name' => 'remarks',
					  'id' => 'remarks',
					  'cols' => '10',
					  'rows' => '5'
					  );
	echo form_textarea($attrib4);
	
echo "</td></tr>";
echo "<tr><td>";

echo form_submit('submit', 'Submit');
echo form_close();

echo "</td><td></td><td></td><td>";

echo "</table>";


?>


</div>