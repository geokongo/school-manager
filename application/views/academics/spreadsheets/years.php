<div id="main">

<?php 

echo "<img src=\"".base_url()."images/spreadsheets.png\" /><p>";
echo "<img src=\"".base_url()."images/underline.jpg\" /><p>";

echo "<b>{$this->session->userdata('class')} {$this->session->userdata('streams')}</b>";
echo "<p>Choose the Year below and view results.</p>";
?>
<ul>
<?php 
foreach($years->result() as $row)
{
	echo "<li><a href=\"".base_url()."academics/spreadsheets/years/{$row->YEAR}\">{$row->YEAR}</a></li>"; 

}
?>
</ul>


</div>