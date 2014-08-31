<div id="main">

<?php 

echo "<img src=\"".base_url()."images/view.png\" /><p>";
echo "<img src=\"".base_url()."images/underline.jpg\" />";

echo "<p>Choose the Classes below and view results.</p>";
?>

<ul>
<?php 
foreach($classes->result() as $row)
{
	echo "<li><a href=\"".base_url()."academics/view/class/{$row->CLASS}\">{$row->CLASS}</a></li>"; 

}
?>
</ul>


</div>