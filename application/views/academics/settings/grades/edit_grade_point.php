<div id="main">

<?php 

echo "<img src=\"".base_url()."images/settings.png\" /><p>";
echo "<img src=\"".base_url()."images/underline.jpg\" /><p>";

echo "Enter the new value and click on submit.<p>";

echo "<table>";
echo "<tr><td>Grade</td><td> {$grade} </td></tr>";
echo "<tr><td>Current Points</td><td> {$points} </td></tr>";
echo "<tr><td>Enter new value</td><td>";

echo "<form method=\"post\" action=\"".base_url()."academics/settings/id/grades/action/edit/grade/{$grade}\">";

$attrib1 = array( 'name' => 'point',
				  'id' => 'point',
				  'size' => '5'
				  );
echo form_input($attrib1);
echo form_submit('submit', 'Submit');
echo form_close();

echo "</td></tr>";
echo "</table>";


?>


</div>