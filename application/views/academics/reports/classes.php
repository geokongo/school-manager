<div id="main">

<?php 

echo "<img src=\"".base_url()."images/report.png\" /><p>";
echo "<img src=\"".base_url()."images/underline.jpg\" /><p>";

echo "<p>Choose the Class for which to generate end term reports.</p>";
?>

<ul>
<?php 
foreach($classes->result() as $row)
{
	echo "<li><a href=\"".base_url()."academics/reports/class/{$row->CLASS}\">{$row->CLASS}</a></li>"; 

}
?>
</ul>




</div>