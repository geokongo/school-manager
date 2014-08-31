<div id="main">

<?php 

echo "<img src=\"".base_url()."images/settings.png\" /><p>";
echo "<img src=\"".base_url()."images/underline.jpg\" /><p>";

	if($grades->num_rows() > 0)
	{
		echo "<b>These are the grades that have been set.</b><p>";
		
		echo "<table>";
		echo "<tr><td>Grade</td><td>Points</td><td> &nbsp </td></tr>";
		
		foreach($grades->result() as $row)
		{
			echo "<tr><td> {$row->GRADE} </td><td> {$row->POINTS} </td><td><a href=\"".base_url()."academics/settings/id/grades/grade/{$row->GRADE}/points/{$row->POINTS}/action/edit\">Edit</a></td></tr>";
		
		}
		
		echo "</table>";
		
		echo "<p><a href=\"".base_url()."academics/settings/id/new_grade\">Add a new Grade</a></p>";
		

	}

	else
	{
		echo "<p><font color=\"#777\">No grades have been defined yet. Please define grades using the format below.</font><p>";
		
		echo "<p><i><font color=\"#777\">Example</font></i></p>";
		
		echo "<table>";
		echo "<tr><td><font color=\"#777\">Grade</td><td><font color=\"#777\">Points</td></tr>";
		echo "<tr><td><font color=\"#777\">A</td><td><font color=\"#777\">12</td></tr>";
		echo "</table>";
		
		echo form_open('academics/settings/id/grades/action/addnew');
		echo form_label('Grade : ', 'grade');
		
		$attrib1 = array( 'name' => 'grade',
						  'id' => 'grade',
						  'size' => '10'
						  );
		echo form_input($attrib1)."<p>";
		
		echo form_label('Points : ', 'points');
		
		$attrib2 = array( 'name' => 'points',
						  'id' => 'points',
						  'size' => '10'
						  );
		echo form_input($attrib2)."<p>";
		
		echo form_submit('submit', 'Add');
		
		echo form_close();
		

	}
	
?>


</div>