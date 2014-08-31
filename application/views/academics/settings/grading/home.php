<div id="main">

<?php 

echo "<img src=\"".base_url()."images/settings.png\" /><p>";
echo "<img src=\"".base_url()."images/underline.jpg\" /><p>";

echo "Select the Class to Set Grading Criteria.<p>";

echo "<ul>";

	foreach($classes->result() as $row)
	{
		echo "<li><a href=\"".base_url()."academics/settings/id/grading/action/get_class/class/{$row->CLASS}\"> {$row->CLASS} </li>";
	
	}
	
echo "</ul>";


?>


</div>