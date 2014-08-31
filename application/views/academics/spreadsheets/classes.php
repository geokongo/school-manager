<div id="main">

<?php 

echo "<img src=\"".base_url()."images/spreadsheets.png\" /><p>";
echo "<img src=\"".base_url()."images/underline.jpg\" /><p>";

echo "<p>Choose the Class for which to generate spreadsheet.</p>";
?>

<ul>
<?php 
foreach($classes->result() as $row)
{
	echo "<li><a href=\"".base_url()."academics/spreadsheets/class/{$row->CLASS}\">{$row->CLASS}</a></li>"; 

}
?>
</ul>


</div>