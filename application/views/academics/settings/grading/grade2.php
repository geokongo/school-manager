<div id="main">

<?php 

echo "<img src=\"".base_url()."images/settings.png\" /><p>";
echo "<img src=\"".base_url()."images/underline.jpg\" /><p>";

echo "<b>Set {$this->session->userdata('class')} Grading Criteria</b><p>";

	if($grading->num_rows() > 0)
	{
		echo "<b>These are the grading criteria that have been set.</b><p>";
		
		echo "<table>";
		echo "<tr><td>Grade</td><td>Score</td><td> Remarks </td><td> &nbsp </td></tr>";
		
		foreach($grading->result() as $row)
		{
			echo "<tr><td> {$row->GRADE} </td><td> {$row->FROM_} - {$row->TO_} </td><td> {$row->REMARKS} </td><td><a href=\"".base_url()."academics/settings/id/grading/action/edit/grade/{$row->GRADE}/from/{$row->FROM_}/to/{$row->TO_}/remarks/{$row->REMARKS}\">Edit</a></td></tr>";
		
		}
		
		echo "</table>";
		
		echo "<p><a href=\"".base_url()."academics/settings/id/grading/action/add_grading\">Add a new Grading</a></p>";
		

	}

	else
	{
		echo "<p><font color=\"#777\">No grading criteria have been defined yet. Please define grading criteria using the format below.</font><p>";
		
		echo "<p><i><font color=\"#777\">Example</font></i></p>";
		
		echo "<table>";
		echo "<tr><td><font color=\"#777\">Grade</td><td><font color=\"#777\">Score</td><td><font color=\"#777\">Remarks</td></tr></font>";
		echo "<font color=\"#777\"><tr><td><font color=\"#777\">A</td><td><font color=\"#777\">60 - 64</td><td><i><font color=\"#777\">Good</i></td></tr></font>";
		echo "</table>";
		
		echo form_open('academics/settings/id/grading/action/addnew');
		echo form_label('Grade : ', 'grade');
		
		$attrib1 = array( 'name' => 'grade',
						  'id' => 'grade',
						  'size' => '10'
						  );
		echo form_input($attrib1)."<p>";
		
		echo form_label('From : ', 'from');
		$attrib2 = array( 'name' => 'from',
						  'id' => 'from',
						  'size' => '10'
						  );
		echo form_input($attrib2)."<p>";
		
		echo form_label('To : ', 'to');
		$attrib3 = array( 'name' => 'to',
						  'id' => 'to',
						  'size' => '10'
						  );
		echo form_input($attrib3)."<p>";
		
		echo form_label('Remarks : ', 'remarks')."<br />";
		$attrib4 = array( 'name' => 'remarks',
						  'id' => 'remarks',
						  'rows' => '3',
						  'cols' => '20'
						  );
		echo form_textarea($attrib4)."<p>";
		
		echo form_submit('submit', 'Add');
		
		echo form_close();
		

	}
	
	
?>


</div>