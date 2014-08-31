<div id="main">

<?php 

echo "<img src=\"".base_url()."images/settings.png\" /><p>";
echo "<img src=\"".base_url()."images/underline.jpg\" /><p>";

echo "<a href=\"";
echo base_url();
echo "academics/settings\"";
echo ">Settings Dashboard</a><p>";

echo "<p><font color=\"#777\">Please define grades using the format below.</font><p>";
		
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
		
		
?>


</div>		